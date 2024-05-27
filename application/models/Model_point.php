<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_point extends CI_Model
{ // nama class harus sesuai dengan nama file 
    public function list_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_point'); // Tabel yang digunakan 
        $this->db->order_by('id', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }
    public function tampil_data_perencanaan()
    {
        $this->db->select('*');
        $this->db->from('tbl_point'); // Tabel yang digunakan 
        $this->db->order_by('id', 'desc'); // Id yang di tabel 
        $this->db->where('status', 'Diproses');
        return $this->db->get()->result();
    }

    public function tampil_data_existing()
    {
        $this->db->select('*');
        $this->db->from('tbl_point'); // Tabel yang digunakan 
        $this->db->order_by('id', 'desc'); // Id yang di tabel 
        $this->db->where('status', 'Sukses');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_point', $data);
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_point');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_point', $data);
    }

    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('tbl_point', $data);
    }
} 
/* End of file Model_point.php */
