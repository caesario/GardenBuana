<?php

class Pesanan_model extends CI_Model
{
  public function getPesananById($id)
  {
    $this->db->select('*');
    $this->db->from('trx_pesanan');
    $this->db->where('id_pesanan', $id);
    $result = $this->db->get();
    return $result->row_array();
  }

  public function getKonfirmasiById($id)
  {
    $this->db->select('*');
    $this->db->from('trx_pesanan');
    $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
    $this->db->where('id_pesanan', $id);
    $result = $this->db->get();
    return $result->row_array();
  }

  public function getBuktiById($id)
  {
    $this->db->select('*');
    $this->db->from('trx_bukti_bayar');
    $this->db->where('id_pesanan', $id);
    $result = $this->db->get();
    return $result->row_array();
  }
}


    // $this->db->join('vendor', 'vendor.id_userfk = user.id_user');
    // $this->db->join('kota', 'kota.id_kota = vendor.id_kota');
    // $this->db->join('status_akun', 'status_akun.id_status = vendor.id_status');
