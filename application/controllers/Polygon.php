<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Polygon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        NotLogin();
        AdminSecure();
        //Load Dependencies 
        $this->load->model('model_polygon'); // model yang diload 
    }
    public function index()
    {
        $data = array(
            'judul' => 'Data Polygon', // Keterangan Judul
            'polygon' => $this->model_polygon->list_data(), // Pembuatan variabel buat looping dari model dan function
            'content' => 'v_polygon'
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    // Add a new item 
    public function add()
    {
        $this->form_validation->set_rules('nama_objek', 'Nama Objek', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('color', 'Color', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('geojson', 'GeoJSON', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 4000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'judul' => 'Add Data Polygon',
                    'error_upload' => $this->upload->display_errors(),
                    'content' => 'v_add_polygon'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_objek' => $this->input->post('nama_objek'),
                    'color' => $this->input->post('color'),
                    'geojson' => $this->input->post('geojson'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->model_polygon->add($data);
                flashData('Data berhasil diperbaharui !!!', 'Tambah Data Berhasil', 'success');
                redirect('polygon');
            }
        }
        $data = array(
            'judul' => 'Add Data Polygon',
            'content' => 'v_add_polygon'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    // Edit a new item 
    public function edit($id = null)
    {
        $this->form_validation->set_rules('nama_objek', 'Nama Objek', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('color', 'Color', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('geojson', 'GeoJSON', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 4000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'judul' => 'Edit Data Polygon',
                    'error_upload' => $this->upload->display_errors(),
                    'polygon' => $this->model_polygon->detail($id),
                    'content' => 'v_edit_polygon'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $gambar = $this->model_polygon->detail($id);
                if ($gambar->gambar != "") {
                    unlink(FCPATH . 'assets/gambar/' . $gambar->gambar);
                }
                $data = array(
                    'id' => $id,
                    'nama_objek' => $this->input->post('nama_objek'),
                    'color' => $this->input->post('color'),
                    'geojson' => $this->input->post('geojson'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->model_polygon->edit($data);
                flashData('Data berhasil diperbaharui !!!', 'Edit Success', 'success');
                redirect('polygon');
            }
            $data = array(
                'id' => $id,
                'nama_objek' => $this->input->post('nama_objek'),
                'color' => $this->input->post('color'),
                'geojson' => $this->input->post('geojson')
            );
            $this->model_polygon->edit($data);
            flashData('Data berhasil diperbaharui !!!', 'Edit Success', 'success');
            redirect('polygon');
        }
        $data = array(
            'judul' => 'Edit Data Polygon',
            'polygon' => $this->model_polygon->detail($id),
            'content' => 'v_edit_polygon'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    //Delete item 
    public function delete($id)
    {
        $data = array('id' => $id);
        $gambar = $this->model_polygon->detail($id);
        if ($gambar->gambar != "") {
            unlink(FCPATH . 'assets/gambar/' . $gambar->gambar);
        }
        $this->model_polygon->delete($data);
        flashData('Data berhasil dihapus !!!', 'Delete Success', 'success');
        redirect('polygon');
    }

    function status($id = null)
    {
        $data = array(
            'id' => $id,
            'status' => 'Sukses',
        );
        $this->model_polygon->edit($data);
        flashData('Data berhasil diperbarui!', 'Berhasil', 'success');
        redirect('polygon');
    }
} 
/* End of file polygon.php */
