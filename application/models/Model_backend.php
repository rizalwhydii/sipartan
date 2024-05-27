<?php
defined('BASEPATH') or exit('No direct script access allowed');
class model_backend extends CI_Model
{ // nama class harus sesuai dengan nama file 
    // Sumur Dalam
    function jumlah_sd()
    {
        return $this->db->get('data_sd')->num_rows();
    }
    function realisasi_sumur()
    {
        $this->db->where('marker', 'markerSD.png');
        $this->db->where('status', 'Sukses');
        return $this->db->get('tbl_point')->num_rows();
    }

    // Reservoar
    function jumlah_reservoar()
    {
        return $this->db->get('data_reservoar')->num_rows();
    }
    function realisasi_reservoar()
    {
        $this->db->where('marker', 'markerR.png');
        $this->db->where('status', 'Sukses');
        return $this->db->get('tbl_point')->num_rows();
    }

    // Genset
    function jumlah_genset()
    {
        return $this->db->get('data_genset')->num_rows();
    }
    function realisasi_genset()
    {
        $this->db->where('marker', 'markerG.png');
        $this->db->where('status', 'Sukses');
        return $this->db->get('tbl_point')->num_rows();
    }

    // Pipa
    function jumlah_pipa()
    {
        return $this->db->get('data_pipa')->num_rows();
    }
    function realisasi_pipa()
    {
        $this->db->where('status', 'Sukses');
        return $this->db->get('tbl_polyline')->num_rows();
    }

    function jumlah_pelanggan()
    {
        return $this->db->get('datapelanggan')->num_rows();
    }
    function jumlah_point()
    {
        $this->db->where('status', 'Diproses');
        return $this->db->get('tbl_point')->num_rows();
    }
    function jumlah_polyline()
    {
        $this->db->where('status', 'Diproses');
        return $this->db->get('tbl_polyline')->num_rows();
    }
    function jumlah_polygon()
    {
        $this->db->where('status', 'Diproses');
        return $this->db->get('tbl_polygon')->num_rows();
    }
    function jumlah_pengaduan()
    {
        return $this->db->get('tbl_pengaduan')->num_rows();
    }
}
