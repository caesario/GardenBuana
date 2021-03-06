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

    public function getAllVendorVerif()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->join('kota', 'kota.id_kota =  vendor.id_kota');
        $this->db->join('data_verif', 'data_verif.id_vendor = vendor.id_vendor');
        $this->db->where('id_status_verif = 3');
        $this->db->order_by('id_vendor', 'RANDOM');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllVendorLimit()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->join('kota', 'kota.id_kota =  vendor.id_kota');
        $this->db->join('data_verif', 'data_verif.id_vendor = vendor.id_vendor');
        $this->db->where('id_status_verif = 3');
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
            $this->db->from('vendor');
            $this->db->join('kota', 'kota.id_kota =  vendor.id_kota');
            $this->db->join('data_verif', 'data_verif.id_vendor = vendor.id_vendor');
            $this->db->where('id_status_verif = 3');
            $result = $this->db->get();
            return $result->result_array();
        } elseif ($kota != null && $keyword == null) {
            $this->db->select('*');
            $this->db->join('kota', 'kota.id_kota =  ven.id_kota');
            $this->db->join('data_verif', 'data_verif.id_vendor = ven.id_vendor');
            $this->db->where('ven.id_kota', $kota);
            $this->db->where('id_status_verif = 3');
            // $this->db->or_like('kota', $keyword);

            return $this->db->get('vendor as ven')->result_array();
        } elseif ($keyword != null && $kota == null) {
            $this->db->select('*');
            $this->db->join('kota', 'kota.id_kota =  ven.id_kota');
            $this->db->join('data_verif', 'data_verif.id_vendor = ven.id_vendor');
            $this->db->where('id_status_verif = 3');
            $this->db->like('nama_vendor', $keyword);
            // $this->db->or_like('kota', $keyword);

            return $this->db->get('vendor as ven')->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('ven.id_kota', $kota);
            $this->db->join('kota', 'kota.id_kota =  ven.id_kota');
            $this->db->join('data_verif', 'data_verif.id_vendor = ven.id_vendor');
            $this->db->where('ven.id_status_verif = 3');
            $this->db->like('nama_vendor', $keyword);
            // $this->db->or_like('kota', $keyword);

            return $this->db->get('vendor as ven')->result_array();
        }
    }

    public function getPendapatanByVendorId($idVendor)
    {
        $this->db->select('SUM(harga) as total');
        $this->db->from('trx_pesanan');
        $this->db->where('id_vendor', $idVendor);
        $this->db->where('trx_pesanan.id_status_trans = 7');
        $result = $this->db->get();
        return $result->row()->total;
    }

    public function getPendapatanByVendorId8($idVendor)
    {
        $this->db->select('SUM(harga) as total');
        $this->db->from('trx_pesanan');
        $this->db->where('id_vendor', $idVendor);
        $this->db->where('trx_pesanan.id_status_trans = 8');
        $result = $this->db->get();
        return $result->row()->total;
    }

    public function getPesananByVendorId($idVendor)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->where('id_vendor', $idVendor);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getPesananAktifByVendorId($idVendor)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->where('id_vendor', $idVendor);
        $this->db->where('id_status_trans <= 7');
        $result = $this->db->get();
        return $result->num_rows();
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

        $query = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $id . " AND id_status_trans = 1 OR id_status_trans = 2");
        // $result = $query->result_array();
        return $query->result_array();
    }

    public function getPortfolioById($id)
    {
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where('id_vendor', $id);
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

    public function getVerifVendorById($getVendorId)
    {
        $this->db->select('*');
        $this->db->from('data_verif');
        $this->db->join('status_verif', 'status_verif.id_status_verif = data_verif.id_status_verif');
        $this->db->where('id_vendor', $getVendorId);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getTarikDanaVendor($getVendorId)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('status_tarik', 'status_tarik.id_status_tarik = trx_pesanan.id_status_tarik');
        $this->db->where('id_vendor', $getVendorId);
        $this->db->where('id_status_trans >= 7');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getTarikDanaById($getVendorId)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('status_tarik', 'status_tarik.id_status_tarik = trx_pesanan.id_status_tarik');
        $this->db->where('id_vendor', $getVendorId);
        $this->db->where('id_status_trans >= 7');
        $result = $this->db->get();
        return $result->row_array();
    }
}
