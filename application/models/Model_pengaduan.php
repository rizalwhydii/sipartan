<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_pengaduan extends CI_Model
{ // nama class harus sesuai dengan nama file 
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_pengaduan'); // Tabel yang digunakan 
        $this->db->order_by('id_pengaduan', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_pengaduan', $data);
    }

    public function detail($id_pengaduan)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengaduan');
        $this->db->where('id_pengaduan', $id_pengaduan);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id_pengaduan', $data['id_pengaduan']);
        $this->db->update('tbl_pengaduan', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_pengaduan', $data['id_pengaduan']);
        $this->db->delete('tbl_pengaduan', $data);
    }

    function getPengaduanByID($id)
    {
        $this->db->where('id_pengaduan', $id);
        return $this->db->get('tbl_pengaduan')->row();
    }

    function editstatus($id, $data)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->update('tbl_pengaduan', $data);
    }
}
