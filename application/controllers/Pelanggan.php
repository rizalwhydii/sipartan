<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        NotLogin();
        AdminSecure();
        //Load Dependencies 
        $this->load->model('model_pelanggan'); // model yang diload 
        $this->load->model('model_pengaduan'); // model yang diload 
    }
    public function index()
    {
        $data = array(
            'judul' => 'Data Pelanggan', // Keterangan Judul
            'pelanggan' => $this->model_pelanggan->tampil_data(), // Pembuatan variabel buat looping dari model dan function
            'content' => 'pelanggan'
        );

        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    // Add a new item 
    public function list()
    {
        $data = array(
            'judul' => 'Pendaftaran Sambungan Baru', // Keterangan Judul
            'content' => 'data_daftar_baru',
            'n_pelanggan' => $this->model_pelanggan->list_pelanggan_baru()
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    function status($id)
    {
        $pelanggan = $this->model_pelanggan->getDataPelanggan($id);
        $this->form_validation->set_rules('nosr', 'Nomor SR', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $fixpelanggan = [
                'nosr' => $this->input->post('nosr'),
                'nama' => $pelanggan['nama'],
                'alamat_sr' => $pelanggan['detail_alamat'],
                'latitude' => $pelanggan['latitude'],
                'longitude' => $pelanggan['longitude'],
                'tglpemasan' => $pelanggan['tgl_daftar'],
                'kecamatan' => $pelanggan['kecamatan'],
                'telepon' => $pelanggan['telepon'],
                'status' => 'Aktif'
            ];
            $status = ['status' => 'Selesai'];
            $this->model_pelanggan->fixpelanggan($fixpelanggan);
            $this->model_pelanggan->editstatus($id, $status);
            redirect('pelanggan', 'refresh');
        }
        $data = array(
            'judul' => 'Pendaftaran Sambungan Baru', // Keterangan Judul
            'content' => 'pelanggan_baru',
            'pelanggan' => $pelanggan
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    function status_pengaduan($id_pengaduan)
    {
        $status = ['status' => 'Selesai'];
        $this->model_pengaduan->editstatus($id_pengaduan, $status);
        redirect('pelanggan/pengaduan', 'refresh');
    }

    function detail_pelanggan($id)
    {
        $data = array(
            'judul' => 'Detail Pelanggan Baru', // Keterangan Judul
            'content' => 'detail_new_pelanggan',
            'pelanggan' => $this->model_pelanggan->getPelangganByID($id)
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    function download($id)
    {
        $jenis = $this->input->get('jns');
        $data = $this->model_pelanggan->getFilePelangganByID($id, $jenis);
        if ($jenis == 'ktp') {
            $nama_file = $data->file_ktp;
        } elseif ($jenis == 'kk') {
            $nama_file = $data->file_kk;
        } elseif ($jenis == 'pbb') {
            $nama_file = $data->file_pbb;
        } elseif ($jenis == 'rmh') {
            $nama_file = $data->foto_rumah;
        } elseif ($jenis == 'bp') {
            $nama_file = $this->model_pengaduan->getPengaduanByID($id)->file_bp;
        } else {
            redirect('pelanggan/list', 'refresh');
        }
        if ($jenis == 'bp') {
            if (file_exists(FCPATH . "assets/user_pengaduan/" . $nama_file) == FALSE) {
                flashData('Data tidak ditemukan!', 'Gagal', 'error');
                redirect('pengaduan/list', 'refresh');
            }
        } else {
            if (file_exists(FCPATH . "assets/user_daftar/" . $nama_file) == FALSE) {
                flashData('Data tidak ditemukan!', 'Gagal', 'error');
                redirect('pelanggan/list', 'refresh');
            }
        }
        if ($jenis == 'bp') {
            $path = file_get_contents(base_url() . "assets/user_pengaduan/" . $nama_file);
        } else {
            $path = file_get_contents(base_url() . "assets/user_daftar/" . $nama_file);
        }
        force_download($nama_file, $path, FALSE);
    }

    function pengaduan()
    {
        $data = array(
            'judul' => 'Data Pengaduan', // Keterangan Judul
            'content' => 'v_data_pengaduan',
            'pengaduan' => $this->model_pengaduan->tampil_data()
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    function detail_pengaduan($id)
    {
        $data = array(
            'id' => $id,
            'judul' => 'Detail Pengaduan', // Keterangan Judul
            'content' => 'detail_pengaduan',
            'pengaduan' => $this->model_pengaduan->getPengaduanByID($id)
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }
}
