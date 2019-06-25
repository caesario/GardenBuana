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

    public function updateProfilUser($data, $id)
    {
        if ($data && $id) {
            $this->db->where('id_user', $id);
            $update = $this->db->update('user', $data);
            return ($update == true) ? true : false;
        }
    }

    public function updateProfilPelanggan($data, $id)
    {
        if ($data && $id) {
            $this->db->where('id_userfk', $id);
            $update = $this->db->update('pelanggan', $data);
            return ($update == true) ? true : false;
        }
    }

    public function getAllPesananPelanggan($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('status_transaksi', 'status_transaksi.id_status_trans = trx_pesanan.id_status_trans');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->where('id_pelanggan', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function cekField()
    {
        $this->db->select('telpon');
        $this->db->from('pelanggan');
        $result = $this->db->get();
        return $result->row();
    }
}
