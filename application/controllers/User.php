<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        NotLogin();
        //Load Dependencies 
        $this->load->model('Model_daftar'); // model yang diload 
        $this->load->model('Model_pengaduan'); // model yang diload 
    }
    public function daftar()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('rt', 'RT', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('rw', 'RW', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kode_pos', 'Kode POS', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('fungsi_bangunan', 'Fungsi Bangunan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|decimal', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('latitude', 'latitude', 'required|decimal', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('detail_alamat', 'Detail Alamat', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('jp_tetap', 'Jumlah Penghuni Tetap', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('jp_tdk_tetap', 'Jumlah Penghuni Tidak Tetap', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('lebar_jalan', 'Lebar Jalan', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('luas_tanah', 'Luas Tanah', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('luas_bangunan', 'Luas Bangunan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('tegangan_listrik', 'Tegangan Listrik', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));


        if ($this->form_validation->run() == TRUE) {
            $upload = [];
            if (isset($_FILES['files'])) {
                $count = count($_FILES['files']['name']);

                for ($i = 0; $i < $count; $i++) {

                    if (!empty($_FILES['files']['name'][$i])) {
                        $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                        $config['upload_path'] = './assets/user_daftar/';
                        $config['allowed_types'] = 'jpg|jpeg';
                        $config['max_size'] = 10000;
                        $config['file_name'] = $_FILES['files']['name'][$i];
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('file')) {
                            $uploadData = $this->upload->data();
                            $filename = $uploadData['file_name'];

                            $upload['totalFiles'][] = $filename;
                        } else {
                            flashData('File yang diupload ada yang belum sesuai!', 'Gagal Upload File', 'error');
                            redirect('user/daftar', 'refresh');
                        }
                    }
                }
            }

            $data = array(
                'nama' => $this->input->post('nama'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kode_pos' => $this->input->post('kode_pos'),
                'fungsi_bangunan' => $this->input->post('fungsi_bangunan'),
                'longitude' => $this->input->post('longitude'),
                'latitude' => $this->input->post('latitude'),
                'detail_alamat' => $this->input->post('detail_alamat'),
                'jp_tetap' => $this->input->post('jp_tetap'),
                'jp_tdk_tetap' => $this->input->post('jp_tdk_tetap'),
                'lebar_jalan' => $this->input->post('lebar_jalan'),
                'luas_tanah' => $this->input->post('luas_tanah'),
                'luas_bangunan' => $this->input->post('luas_bangunan'),
                'tegangan_listrik' => $this->input->post('tegangan_listrik'),
                'file_ktp' => $upload['totalFiles'][0],
                'file_kk' => $upload['totalFiles'][1],
                'file_pbb' => $upload['totalFiles'][2],
                'foto_rumah' => $upload['totalFiles'][3],
                'status' => 'Diproses'
            );

            $this->Model_daftar->add($data);
            flashData('Pendaftaran Sambungan Baru Berhasil!', 'Berhasil', 'success');
            redirect('frontend');
        }

        $data = array(
            'judul' => 'Pendaftaran Sambungan Baru', // Keterangan Judul
            'content' => 'user_akses/v_daftar'
        );
        $this->load->view('layout_frontend/viewunion', $data, FALSE); // Template Backend
    }

    function pengaduan()
    {
        $this->form_validation->set_rules('nomor_pam', 'Nomor PAM', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('email', 'Alamat Email', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|numeric', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kategori_pengaduan', 'Kategori Pengaduan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('isi_pengaduan', 'Isi Pengaduan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nomor_pam' => $this->input->post('nomor_pam'),
                'nama' => $this->input->post('nama'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'longitude' => $this->input->post('longitude'),
                'latitude' => $this->input->post('latitude'),
                'kategori_pengaduan' => $this->input->post('kategori_pengaduan'),
                'isi_pengaduan' => $this->input->post('isi_pengaduan'),
                'status' => 'Diproses'
            );

            $this->Model_pengaduan->add($data);
            flashData('Pengaduan berhasil dikirim!', 'Berhasil', 'success');
            redirect('frontend');
        }

        $data = array(
            'judul' => 'Form Pengaduan', // Keterangan Judul
            'content' => 'user_akses/v_pengaduan'
        );
        $this->load->view('layout_frontend/viewunion', $data, FALSE); // Template Backend
    }
} 
/* End of file point.php */
