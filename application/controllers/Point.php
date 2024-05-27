<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Point extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        NotLogin();
        AdminSecure();
        //Load Dependencies 
        $this->load->model('model_point'); // model yang diload 
    }
    public function index()
    {
        $data = array(
            'judul' => 'Data Point', // Keterangan Judul
            'point' => $this->model_point->list_data(), // Pembuatan variabel buat looping dari model dan function
            'content' => 'v_point'
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    // Add a new item 
    public function add()
    {
        $this->form_validation->set_rules('nama_objek', 'Nama Objek', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('latitude', 'latitude', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('marker', 'Marker', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 4000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'judul' => 'Add Data Point',
                    'content' => 'v_add_point'
                );
                flashData(strip_tags($this->upload->display_errors()), 'File Upload Error', 'error');
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_objek' => $this->input->post('nama_objek'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'marker' => $this->input->post('marker'),
                    'gambar' => $upload_data['uploads']['file_name'],
                    'status' => 'Diproses',
                );
                $this->model_point->add($data);
                flashData('Berhasil menambahkan point!', 'Berhasil', 'success');
                redirect('point');
            }
        }
        $data = array(
            'judul' => 'Add Data Point',
            'content' => 'v_add_point'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    // Edit a new item 
    public function edit($id = null)
    {
        $this->form_validation->set_rules('nama_objek', 'Nama Objek', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('latitude', 'latitude', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('marker', 'Marker', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 4000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'judul' => 'Edit Data Point',
                    'error_upload' => $this->upload->display_errors(),
                    'point' => $this->model_point->detail($id),
                    'content' => 'v_edit_point'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                //menghapus file foto lama
                $gambar = $this->model_point->detail($id);
                if ($gambar->gambar != "") {
                    unlink(FCPATH . 'assets/gambar/' . $gambar->gambar);
                }
                $data = array(
                    'id' => $id,
                    'nama_objek' => $this->input->post('nama_objek'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'marker' => $this->input->post('marker'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->model_point->edit($data);
                flashData('Data Berhasil diperbaharui !!!', 'Edit Success', 'success');
                redirect('point');
            }
            $data = array(
                'id' => $id,
                'nama_objek' => $this->input->post('nama_objek'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'marker' => $this->input->post('marker'),
            );
            $this->model_point->edit($data);
            flashData('Data Berhasil diperbaharui !!!', 'Edit Success', 'success');
            redirect('point');
        }
        $data = array(
            'judul' => 'Edit Data Point',
            'point' => $this->model_point->detail($id),
            'content' => 'v_edit_point'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    //Delete item 
    public function delete($id)
    {
        $data = array('id' => $id);
        //menghapus file foto lama
        $gambar = $this->model_point->detail($id);
        if ($gambar->gambar != "") {
            unlink(FCPATH . 'assets/gambar/' . $gambar->gambar);
        }
        $this->model_point->delete($data);
        flashData('Data Berhasil dihapus !!!', 'Delete Success', 'success');
        redirect('point');
    }

    function status($id = null)
    {
        $data = array(
            'id' => $id,
            'status' => 'Sukses',
        );
        $this->model_point->edit($data);
        flashData('Data berhasil diperbarui!', 'Berhasil', 'success');
        redirect('point');
    }
} 
/* End of file point.php */
