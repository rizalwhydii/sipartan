<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        NotLogin();
        AdminSecure();
        //Load Dependencies 
        $this->load->model('model_point'); // model yang diload 
        $this->load->model('model_polyline'); // model yang diload
        $this->load->model('model_polygon'); // model yang diload 
        $this->load->model('model_pelanggan'); // model yang diload 
        $this->load->model('model_peta');
    }

    function Maps()
    {
        $data = array(
            'judul' => 'Peta Inventarisasi Aset', // Keterangan Judul
            'pointP' => $this->model_point->tampil_data_perencanaan(),
            'polylineP' => $this->model_polyline->tampil_data_perencanaan(),
            'polygonP' => $this->model_polygon->tampil_data_perencanaan(),
            'pointE' => $this->model_point->tampil_data_existing(),
            'polylineE' => $this->model_polyline->tampil_data_existing(),
            'polygonE' => $this->model_polygon->tampil_data_existing(),
            'dataSD' => $this->model_peta->data_sd(),
            'dataR' => $this->model_peta->data_reservoar(),
            'dataG' => $this->model_peta->data_genset(),
            'dataP' => $this->model_peta->data_pipa(),
            'dataA' => $this->model_peta->data_admin(),
            'titikKec' => $this->model_peta->titik_kecamatan(),
            'content' => 'peta/maps'
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    function Pelanggan()
    {
        $data = array(
            'judul' => 'Peta Persebaran Pelanggan', // Keterangan Judul
            'content' => 'peta/pelanggan',
            'kec_boja' => $this->model_pelanggan->kec_boja(),
            'kec_brangsong' => $this->model_pelanggan->kec_brangsong(),
            'kec_cepiring' => $this->model_pelanggan->kec_cepiring(),
            'kec_gemuh' => $this->model_pelanggan->kec_gemuh(),
            'kec_kaliwungu' => $this->model_pelanggan->kec_kaliwungu(),
            'kec_kaliwungu_selatan' => $this->model_pelanggan->kec_kaliwungu_selatan(),
            'kec_kangkung' => $this->model_pelanggan->kec_kangkung(),
            'kec_kendal' => $this->model_pelanggan->kec_kendal(),
            'kec_limbangan' => $this->model_pelanggan->kec_limbangan(),
            'kec_ngampel' => $this->model_pelanggan->kec_ngampel(),
            'kec_pageruyung' => $this->model_pelanggan->kec_pageruyung(),
            'kec_patean' => $this->model_pelanggan->kec_patean(),
            'kec_patebon' => $this->model_pelanggan->kec_patebon(),
            'kec_rowosari' => $this->model_pelanggan->kec_rowosari(),
            'kec_plantungan' => $this->model_pelanggan->kec_plantungan(),
            'kec_ringinarum' => $this->model_pelanggan->kec_ringinarum(),
            'kec_singorojo' => $this->model_pelanggan->kec_singorojo(),
            'kec_sukorejo' => $this->model_pelanggan->kec_sukorejo(),
            'kec_weleri' => $this->model_pelanggan->kec_weleri(),
            'kec_pegandon' => $this->model_pelanggan->kec_pegandon(),
            'dataSD' => $this->model_peta->data_sd(),
            'dataR' => $this->model_peta->data_reservoar(),
            'dataG' => $this->model_peta->data_genset(),
            'dataP' => $this->model_peta->data_pipa(),
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }
} 
/* End of file Frontend.php */