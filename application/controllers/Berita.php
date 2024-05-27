<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        NotLogin();
        AdminSecure();
        $this->load->model('model_berita'); // model yang diload 
    }

    public function index()
    {
        $data = array(
            'judul' => 'Data Berita',
            'berita' => $this->model_berita->tampil_data(),
            'content' => 'berita/v_list'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    // Add a new item 
    public function add()
    {
        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar_berita/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 4000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_berita')) {
                $data = array(
                    'judul' => 'Tambahkan Berita',
                    'content' => 'berita/v_add_berita'
                );
                flashData(strip_tags($this->upload->display_errors()), 'File Upload Error', 'error');
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar_berita/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_admin' => $this->input->post('nama_admin'),
                    'judul_berita' => $this->input->post('judul_berita'),
                    'isi_berita' => $this->input->post('isi_berita'),
                    'tgl_berita' => date('y-m-d'),
                    'gambar_berita' => $upload_data['uploads']['file_name'],
                );
                $this->model_berita->add($data);
                flashData('Berhasil menambahkan berita!', 'Berhasil', 'success');
                redirect('berita');
            }
        }
        $data = array(
            'judul' => 'Tambahkan Berita',
            'content' => 'berita/v_add_berita'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    // Edit a new item 
    public function edit($id_berita = null)
    {
        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar_berita/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 4000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_berita')) {
                $data = array(
                    'judul' => 'Pengeditan Berita',
                    'error_upload' => $this->upload->display_errors(),
                    'berita' => $this->model_berita->detail($id_berita),
                    'content' => 'berita/v_edit_berita'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar_berita/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                //menghapus file foto lama
                $berita = $this->model_berita->detail($id_berita);
                if ($berita->gambar_berita != "") {
                    unlink('assets/gambar_berita/' . $berita->gambar_berita);
                }
                $data = array(
                    'id_berita' => $id_berita,
                    'nama_admin' => $this->input->post('nama_admin'),
                    'judul_berita' => $this->input->post('judul_berita'),
                    'isi_berita' => $this->input->post('isi_berita'),
                    'gambar_berita' => $upload_data['uploads']['file_name'],
                );
                $this->model_berita->edit($data);
                flashData('Berita berhasil diperbarui !!!', 'Berhasil', 'success');
                redirect('berita');
            }
            $data = array(
                'id_berita' => $id_berita,
                'nama_admin' => $this->input->post('nama_admin'),
                'judul_berita' => $this->input->post('judul_berita'),
                'isi_berita' => $this->input->post('isi_berita'),
            );
            $this->model_berita->edit($data);
            flashData('Berita berhasil diperbarui !!!', 'Berhasil', 'success');
            redirect('berita');
        }
        $data = array(
            'judul' => 'Pengeditan Berita',
            'berita' => $this->model_berita->detail($id_berita),
            'content' => 'berita/v_edit_berita'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    //Delete item 
    public function delete($id)
    {
        $data = array('id_berita' => $id);
        //menghapus file foto lama
        $berita = $this->model_berita->detail($id);
        if ($berita->gambar_berita != "") {
            unlink(FCPATH . 'assets/gambar_berita/' . $berita->gambar_berita);
        }
        $this->model_berita->delete($data);
        flashData('Berita berhasil dihapus !!!', 'Berhasil', 'success');
        redirect('berita');
    }
} 
/* End of file point.php */
