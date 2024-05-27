<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_pelanggan extends CI_Model
{ // nama class harus sesuai dengan nama file 
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan 
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    function list_pelanggan_baru()
    {
        return $this->db->get('tbl_daftar')->result();
    }

    function getPelangganByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tbl_daftar')->row();;
    }

    function getFilePelangganByID($id, $jenis)
    {
        if ($jenis == 'ktp') {
            $this->db->select('file_ktp');
        } elseif ($jenis == 'kk') {
            $this->db->select('file_kk');
        } elseif ($jenis == 'pbb') {
            $this->db->select('file_pbb');
        } elseif ($jenis == 'rmh') {
            $this->db->select('foto_rumah');
        }
        $this->db->where('id', $id);
        return $this->db->get('tbl_daftar')->row();
    }

    function getDataPelanggan($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tbl_daftar')->row_array();;
    }

    function editstatus($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_daftar', $data);
    }

    function fixpelanggan($data)
    {
        $this->db->insert('datapelanggan', $data);
    }

    public function kec_kendal()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Kendal');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_brangsong()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Brangsong');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_cepiring()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Cepiring');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_kangkung()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Kangkung');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_ngampel()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Ngampel');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_patebon()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Patebon');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_pegandon()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Pegandon');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_boja()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Boja');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_gemuh()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Gemuh');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_kaliwungu()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Kaliwungu');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_kaliwungu_selatan()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Kaliwungu Selatan');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }
    public function kec_limbangan()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Limbangan');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_plantungan()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Plantungan');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_pageruyung()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Pageruyung');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_patean()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Patean');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_ringinarum()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Ringinarum');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_rowosari()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Rowosari');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_singorojo()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Singorojo');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_sukorejo()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Sukorejo');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function kec_weleri()
    {
        $this->db->select('*');
        $this->db->from('datapelanggan'); // Tabel yang digunakan
        $this->db->where('kecamatan', 'Kecamatan Weleri');
        $this->db->order_by('OGR_FID', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }
}
