<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_daftar extends CI_Model
{ // nama class harus sesuai dengan nama file 
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_daftar'); // Tabel yang digunakan 
        $this->db->order_by('id', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_daftar', $data);
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_daftar');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_daftar', $data);
    }

    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('tbl_daftar', $data);
    }

    public function getDaftarByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tbl_daftar')->row();
    }
} 
/* End of file Model_point.php */
