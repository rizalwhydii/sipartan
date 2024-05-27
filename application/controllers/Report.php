<?php
defined('BASEPATH') or exit('No direct script access allowed');

class report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        NotLogin();
        AdminSecure();
        $this->load->library('pdf_report');
        $this->load->model('model_daftar');
    }

    public function index()
    {
        $id = $this->input->get('np');
        // ambil data 
        $data = ['user' => $this->model_daftar->getDaftarByID($id)];
        $this->load->view('laporan/v_report', $data);
    }
}
