<?php

class User_model extends CI_model
{
    public function getUserProfilById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('pelanggan', 'pelanggan.id_userfk = user.id_user');
        $this->db->join('kota', 'kota.id_kota = pelanggan.id_kota', 'left');
        $this->db->join('status_akun', 'status_akun.id_status = pelanggan.id_status');
        $this->db->where('id_user', $id);

        $result = $this->db->get();
        return $result->row_array();
    }

    public function getAllPesananVendor($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        // $this->db->join('vendor', 'vendor.id_vendor = pesanan.id_vendor');
        $this->db->where('id_user', $id);
        $result = $this->db->get();
        return $result->result_array();
    }
}
