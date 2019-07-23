<?php

class Transaksi_model extends CI_Model
{

    public function createPesanan($data)
    {
        if ($data) {
            $insert = $this->db->insert('trx_pesanan', $data);
            return ($insert == TRUE) ? TRUE : FALSE;
        }
    }

    public function getAllTestimoni()
    {
        $this->db->select('*');
        $this->db->from('trx_testimoni');
        $this->db->join('vendor', 'vendor.id_vendor = trx_testimoni.id_vendor');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = trx_testimoni.id_pelanggan');
        $this->db->join('user', 'user.id_user = pelanggan.id_userfk');
        $this->db->join('kota', 'kota.id_kota = pelanggan.id_kota');
        $this->db->where('status_tampil = 1');
        $result = $this->db->get();
        return $result->result_array();
    }
}
