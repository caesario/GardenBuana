<?php

class Admin_model extends CI_Model
{


    public function getAllPengguna()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.role_id = user.role_id');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getPenggunaById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function ubahDataPengguna()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "password" => $this->input->post('password', true),
            "is_active" => $this->input->post('is_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function getAllPesanan()
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('user', 'user.id_user = trx_pesanan.id_user');
        $this->db->join('vendor', 'vendor.id_userfk = user.id_user');
        $this->db->join('status_transaksi', 'status_transaksi.id_status = trx_pesanan.id_status');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getPesananById($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('user', 'user.id_user = trx_pesanan.id_user');
        $this->db->join('status_transaksi', 'status_transaksi.id_status = trx_pesanan.id_status');
        $this->db->where('id_pesanan', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getAllVendor()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->join('kota', 'vendor.id_kota = kota.id_kota');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllPelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        // $this->db->where('role_id = 2');
        $this->db->join('kota', 'pelanggan.id_kota = kota.id_kota');
        $this->db->join('user', 'pelanggan.id_userfk = user.id_user');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllBuktiBayar()
    {
        $this->db->select('*');
        $this->db->from('trx_bukti_bayar');
        $this->db->join('trx_pesanan', 'trx_pesanan.id_pesanan = trx_bukti_bayar.id_pesanan');
        $this->db->join('status_transaksi', 'status_transaksi.id_status = trx_bukti_bayar.id_status');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllTestimoni()
    {
        $this->db->select('*');
        $this->db->from('trx_testimoni');
        $this->db->join('trx_pesanan', 'trx_pesanan.id_pesanan = trx_testimoni.id_pesanan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = trx_testimoni.id_pelanggan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_testimoni.id_vendor');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllHistoryPesanan()
    {
        $this->db->select('*');
        $this->db->from('riwayat_pesanan');
        $this->db->join('trx_pesanan', 'trx_pesanan.id_pesanan = riwayat_pesanan.id_pesanan');
        $this->db->join('status_transaksi', 'status_transaksi.id_status = riwayat_pesanan.id_status');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllWilayah()
    {
        $this->db->select('*');
        $this->db->from('kota');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getInfoWeb()
    {
        $this->db->select('*');
        $this->db->from('info_garden');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getProfilAdminbyId($id)
    {
        $this->db->select('*');
        $this->db->from('info_garden');
        $this->db->where('id_info', $id);
        $result = $this->db->get();
        return $result->row_array();
    }
}
