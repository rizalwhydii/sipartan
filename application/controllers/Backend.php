<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Backend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        NotLogin();
        AdminSecure();
        $this->load->model('model_berita'); // model yang diload 
        $this->load->model('model_backend');
    }
    public function index()
    {
        $data = array(
            'judul' => 'Dashboard SIPARTAN',
            'content' => 'admin',
            'jumlah_sd' => ($this->model_backend->jumlah_sd() + $this->model_backend->realisasi_sumur()),
            'jumlah_reservoar' => $this->model_backend->jumlah_reservoar() + $this->model_backend->realisasi_reservoar(),
            'jumlah_genset' => $this->model_backend->jumlah_genset() + $this->model_backend->realisasi_genset(),
            'jumlah_pipa' => $this->model_backend->jumlah_pipa() + $this->model_backend->realisasi_pipa(),
            'jumlah_pelanggan' => $this->model_backend->jumlah_pelanggan(),
            'jumlah_point' => $this->model_backend->jumlah_point(),
            'jumlah_polyline' => $this->model_backend->jumlah_polyline(),
            'jumlah_polygon' => $this->model_backend->jumlah_polygon(),
            'jumlah_pengaduan' => $this->model_backend->jumlah_pengaduan(),
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    function Book()
    {
        $data = array(
            'judul' => 'Manual Book',
            'content' => 'manual_book',
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    function download_book()
    {
        if (file_exists(FCPATH . "assets/manual_book/MANUAL_BOOK_SIPARTAN.pdf") == FALSE) {
            flashData('Data tidak ditemukan!', 'Gagal', 'error');
            redirect('backend/book', 'refresh');
        }
        $path = file_get_contents(base_url() . "assets/manual_book/MANUAL_BOOK_SIPARTAN.pdf");
        force_download('MANUAL_BOOK_SIPARTAN.pdf', $path, FALSE);
    }
} 
/* End of file Backend.php */