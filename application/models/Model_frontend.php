<?php
defined('BASEPATH') or exit('No direct script access allowed');
class model_frontend extends CI_Model
{
    function register($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    function data_admin()
    {
        return $this->db->get('kecamatan_ar')->result_array();
    }

    function titik_kecamatan()
    {
        return $this->db->get('titik_kecamatan')->result_array();
    }
}
