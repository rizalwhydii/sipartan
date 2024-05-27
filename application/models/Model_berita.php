<?php
defined('BASEPATH') or exit('No direct script access allowed');
class model_berita extends CI_Model
{ // nama class harus sesuai dengan nama file 
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_berita'); // Tabel yang digunakan 
        $this->db->order_by('id_berita', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_berita', $data);
    }

    public function detail($id_berita)
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->where('id_berita', $id_berita);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id_berita', $data['id_berita']);
        $this->db->update('tbl_berita', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_berita', $data['id_berita']);
        $this->db->delete('tbl_berita', $data);
    }

    function getBeritaByID($id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        return $this->db->get('tbl_berita')->row();
    }

    function jumlahdata()
    {
        return $this->db->count_all('tbl_berita');
    }

    function getberita($limit, $offset)
    {
        return $this->db->get('tbl_berita', $limit, $offset)->result_array();
    }

    function cekberita($id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        return $this->db->get('tbl_berita')->num_rows();;
    }
} 
/* End of file Model_point.php */