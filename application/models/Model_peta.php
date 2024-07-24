<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_peta extends CI_Model
{ // nama class harus sesuai dengan nama file 
    function data_sd()
    {
        return $this->db->get('data_sd')->result_array();
    }

    function data_reservoar()
    {
        return $this->db->get('data_reservoar')->result_array();
    }

    function data_genset()
    {
        return $this->db->get('data_genset')->result_array();
    }

    function data_pipa()
    {
        $this->db->select('data_pipa.*, panjang_pipa.panjang');
        $this->db->from('data_pipa');
        $this->db->join('panjang_pipa', 'data_pipa.ogr_fid = panjang_pipa.ogr_fid');
        return $this->db->get()->result_array();
    }

    function data_admin()
    {
        return $this->db->get('kec_pelanggan')->result_array();
    }

    function titik_kecamatan()
    {
        return $this->db->get('titik_kecamatan')->result_array();
    }
}
