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
        $this->db->where('trx_pesanan.id_status_trans !=', '8');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllPesananRiwayat($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan as trx_p');
        $this->db->join('status_transaksi', 'status_transaksi.id_status_trans = trx_p.id_status_trans');
        $this->db->join('vendor', 'vendor.id_vendor = trx_p.id_vendor');
        $this->db->where('id_pelanggan', $id);
        $this->db->where('trx_p.id_status_trans', 8);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getRiwayatById($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('status_transaksi', 'status_transaksi.id_status_trans = trx_pesanan.id_status_trans');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->where('id_pesanan', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getPengerjaanById($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pengerjaan');
        $this->db->where('id_pesanan', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getBuktiBayarById($id)
    {
        $this->db->select('*');
        $this->db->from('trx_bukti_bayar');
        $this->db->join('trx_pesanan', 'trx_pesanan.id_pesanan = trx_bukti_bayar.id_pesanan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_bukti_bayar.id_vendor');
        $this->db->where('trx_bukti_bayar.id_pelanggan', $id);
        $this->db->where('trx_bukti_bayar.id_status_trans >= 3');
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

    public function getDataInvoiceById($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('trx_bukti_bayar', 'trx_bukti_bayar.id_pesanan = trx_pesanan.id_pesanan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->where('trx_pesanan.id_pesanan', $id);
        $result = $this->db->get();
        return $result->row_array();
    }
}
