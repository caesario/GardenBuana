<?php

class Vendor_model extends CI_model
{

    public function getAllVendor()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->join('kota', 'kota.id_kota =  vendor.id_kota');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllVendorLimit()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->join('kota', 'kota.id_kota =  vendor.id_kota');
        $this->db->limit(8);
        $this->db->order_by('id_vendor', 'RANDOM');
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

    public function cariDataVendor($kota, $keyword)
    {
        if ($kota == null && $keyword == null) {
            $this->db->select('*');
            $this->db->join('kota', 'kota.id_kota =  vendor.id_kota');
            $this->db->from('vendor');
            $result = $this->db->get();
            return $result->result_array();
        } elseif ($kota != null && $keyword == null) {
            $this->db->select('*');
            $this->db->where('ven.id_kota', $kota);
            $this->db->join('kota', 'kota.id_kota =  ven.id_kota');
            // $this->db->or_like('kota', $keyword);

            return $this->db->get('vendor as ven')->result_array();
        } elseif ($keyword != null && $kota == null) {
            $this->db->select('*');
            $this->db->join('kota', 'kota.id_kota =  ven.id_kota');
            $this->db->like('nama_vendor', $keyword);
            // $this->db->or_like('kota', $keyword);

            return $this->db->get('vendor as ven')->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('ven.id_kota', $kota);
            $this->db->join('kota', 'kota.id_kota =  ven.id_kota');
            $this->db->like('nama_vendor', $keyword);
            // $this->db->or_like('kota', $keyword);

            return $this->db->get('vendor as ven')->result_array();
        }
    }

    public function getVendorById($id)
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->join('kota', 'kota.id_kota = vendor.id_kota');
        $this->db->join('user', 'user.id_user = vendor.id_userfk');
        $this->db->where('id_vendor', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getVendorProfilById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('vendor', 'vendor.id_userfk = user.id_user');
        $this->db->join('kota', 'kota.id_kota = vendor.id_kota', 'left');
        $this->db->join('status_akun', 'status_akun.id_status = vendor.id_status');
        $this->db->where('id_user', $id);

        $result = $this->db->get();
        return $result->row_array();
    }

    public function getUserProfilById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('vendor', 'vendor.id_userfk = user.id_user');
        // $this->db->join('kota', 'kota.id_kota = user.id_kota');
        // $this->db->join('status_akun', 'status_akun.id_status = vendor.id_status');
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

    public function updateProfilVendor($data, $id)
    {
        if ($data && $id) {
            $this->db->where('id_userfk', $id);
            $update = $this->db->update('vendor', $data);
            return ($update == true) ? true : false;
        }
    }

    public function getVendorPesanById($id)
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->join('kota', 'kota.id_kota = vendor.id_kota');
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

    public function getAllPesananVendor($id)
    {
        /*$this->db->select('*');
        $this->db->from('trx_pesanan');
        // $this->db->join('vendor', 'vendor.id_vendor = pesanan.id_vendor');
        $this->db->where('id_vendor', $id);
        $result = $this->db->get();
        return $result->result_array();*/

        $query = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $id . " AND id_status_trans = 1");
        // $result = $query->result_array();
        return $query->result_array();
    }
}

//test
