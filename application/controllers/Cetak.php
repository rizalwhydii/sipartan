<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf_report');
        $this->load->model('model_pengaduan');
    }

    public function index()
    {
        $id = $this->input->get('pengaduan');
        // ambil data 
        $data = ['user' => $this->model_pengaduan->getPengaduanByID($id)];
        $this->load->view('laporan/v_cetak', $data);
    }
}
