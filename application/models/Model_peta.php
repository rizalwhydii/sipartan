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
        return $this->db->get('data_pipa')->result_array();
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
