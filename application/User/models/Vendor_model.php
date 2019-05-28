<?php

class Vendor_model extends CI_model
{

    public function getAllVendor()
    {
        $this->db->select('*');
        $this->db->join('kota', 'kota.id_kota =  vendor.id_kota');
        $this->db->from('vendor');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllKota()
    {
        $this->db->select('*');
        $this->db->from('kota');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getVendorById($id)
    {
        $this->db->select('*');
        $this->db->join('kota', 'kota.id_kota = vendor.id_kota');
        $this->db->from('vendor');
        $this->db->where('id_vendor', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getVendorPesanById($id)
    {
        $this->db->select('*');
        $this->db->join('kota', 'kota.id_kota = vendor.id_kota');
        $this->db->from('vendor');
        $this->db->where('id_vendor', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function tambahDataPesanan()
    {
        $data = [
            "namaPemesan" => $this->input->post('nama_pemesan', true),
            "emailPemesan" => $this->input->post('email', true),
            "telponPemesan" => $this->input->post('telpon', true),
            "tanggalPemesan" => $this->input->post('tanggal_pengerjaan', true),
            "alamatPemesan" => $this->input->post('alamat', true),
            "keteranganPemesan" => $this->input->post('keterangan', true),
            "gambarPemesan" => $this->input->post('gambar', true)
        ];

        $this->db->insert('trx_pesanan', $data);
        redirect('home');
    }
}
