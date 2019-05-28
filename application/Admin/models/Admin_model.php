<?php

class Admin_model extends CI_Model
{
    public function getVendorProfilById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('vendor', 'vendor.id_userfk = user.id_user');
        $this->db->join('kota', 'kota.id_kota = vendor.id_kota');
        $this->db->join('status_akun', 'status_akun.id_status = vendor.id_status');
        $this->db->where('id_user', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getUserProfilById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        // $this->db->join('vendor', 'vendor.id_userfk = user.id_user');
        // $this->db->join('kota', 'kota.id_kota = user.id_kota');
        // $this->db->join('status_akun', 'status_akun.id_status = vendor.id_status');
        $this->db->where('id_user', $id);
        $result = $this->db->get();
        return $result->row_array();
    }
}
