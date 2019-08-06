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
        $this->db->join('user_role', 'user_role.role_id = user.role_id');
        $this->db->join('status_akun', 'status_akun.id_status = user.is_active');
        $this->db->where('id_user', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    // public function updateProfilUser($data, $id)
    // {
    //     if ($data && $id) {
    //         $this->db->where('id_user', $id);
    //         $update = $this->db->update('user', $data);
    //         return ($update == true) ? true : false;
    //     }
    // }

    public function ubahDataUser()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),

        ];

        $this->db->where('id_user', $this->input->post('id'));
        $this->db->update('user', $data);

        // if ($data && $id) {
        //     $this->db->where('id_user', $id);
        //     $update = $this->db->update('user', $data);
        //     return ($update == true) ? true : false;
        // }

        // $data = [
        //     "name" => $this->input->post('name', true),
        //     "email" => $this->input->post('email', true),
        //     "password" => $this->input->post('password', true),
        //     "is_active" => $this->input->post('is_active', true)
        // ];

        // $this->db->where('id', $this->input->post('id'));
        // $this->db->update('user', $data);
    }

    public function ubahDataVendor()
    {
        $data = [
            "telpon" => $this->input->post('telpon', true),
            "kota" => $this->input->post('id_kota', true),
            "alamat" => $this->input->post('alamat', true),
            "info_vendor" => $this->input->post('infoVendor', true)
        ];

        $this->db->where('id_vendor', $this->input->post('id'));
        $this->db->update('vendor', $data);
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function hapusDataVendor($id)
    {
        $this->db->where('id_userfk', $id);
        $this->db->delete('vendor');
    }

    public function hapusDataVerif($id)
    {
        $this->db->where('id_vendor', $id);
        $this->db->delete('data_verif');
    }

    public function getAllPesanan()
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = trx_pesanan.id_pelanggan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->join('status_transaksi', 'status_transaksi.id_status_trans = trx_pesanan.id_status_trans');
        $this->db->where('trx_pesanan.id_status_trans <= 7');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getPesananById($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->join('status_transaksi', 'status_transaksi.id_status_trans = trx_pesanan.id_status_trans');
        $this->db->where('id_pesanan', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function hapusDataPesanan($id)
    {
        $this->db->where('id_pesanan', $id);
        $this->db->delete('trx_pesanan');
    }

    public function getAllVendorVerif()
    {
        $this->db->select('*');
        $this->db->from('data_verif');
        $this->db->join('vendor', 'vendor.id_vendor = data_verif.id_vendor');
        $this->db->join('kota', 'vendor.id_kota = kota.id_kota');
        $this->db->join('status_verif', 'status_verif.id_status_verif = data_verif.id_status_verif');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getVendorVerifById($id)
    {
        $this->db->select('*');
        $this->db->from('data_verif');
        $this->db->join('status_verif', 'status_verif.id_status_verif = data_verif.id_status_verif');
        $this->db->where('id_vendor', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getAllStatus()
    {
        $this->db->select('*');
        $this->db->from('status_verif');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllVendor()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->join('kota', 'vendor.id_kota = kota.id_kota');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getVendorById($id)
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->join('kota', 'vendor.id_kota = kota.id_kota');
        $this->db->where('id_vendor', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getAllPelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->join('kota', 'pelanggan.id_kota = kota.id_kota');
        $this->db->join('user', 'pelanggan.id_userfk = user.id_user');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getPelangganById($id)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->join('kota', 'pelanggan.id_kota = kota.id_kota');
        $this->db->join('user', 'pelanggan.id_userfk = user.id_user');
        $this->db->where('id_pelanggan', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getAllBuktiBayar()
    {
        $this->db->select('*');
        $this->db->from('trx_bukti_bayar');
        $this->db->join('trx_pesanan', 'trx_pesanan.id_pesanan = trx_bukti_bayar.id_pesanan');
        $this->db->join('status_transaksi', 'status_transaksi.id_status_trans = trx_bukti_bayar.id_status_trans');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getBuktiBayarById($id)
    {
        $this->db->select('*');
        $this->db->from('trx_bukti_bayar');
        $this->db->join('trx_pesanan', 'trx_pesanan.id_pesanan = trx_bukti_bayar.id_pesanan');
        $this->db->join('status_transaksi', 'status_transaksi.id_status_trans = trx_bukti_bayar.id_status_trans');
        $this->db->where('id_bayar', $id);
        $result = $this->db->get();
        return $result->row_array();
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

    public function getTestimoniById($id)
    {
        $this->db->select('*');
        $this->db->from('trx_testimoni');
        $this->db->join('trx_pesanan', 'trx_pesanan.id_pesanan = trx_testimoni.id_pesanan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = trx_testimoni.id_pelanggan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_testimoni.id_vendor');
        $this->db->where('id_testimoni', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function hapusDataTestimoni($id)
    {
        $this->db->where('id_testimoni', $id);
        $this->db->delete('trx_testimoni');
    }

    public function getAllHistoryPesanan()
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = trx_pesanan.id_pelanggan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->join('status_transaksi', 'status_transaksi.id_status_trans = trx_pesanan.id_status_trans');
        $this->db->join('trx_pengerjaan', 'trx_pengerjaan.id_pesanan = trx_pesanan.id_pesanan');
        $this->db->where('trx_pesanan.id_status_trans >= 8');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllHistoryPesananById($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = trx_pesanan.id_pelanggan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->join('status_transaksi', 'status_transaksi.id_status_trans = trx_pesanan.id_status_trans');
        $this->db->join('trx_pengerjaan', 'trx_pengerjaan.id_pesanan = trx_pesanan.id_pesanan');
        $this->db->join('trx_bukti_bayar', 'trx_bukti_bayar.id_pesanan = trx_pesanan.id_pesanan');
        $this->db->where('trx_pesanan.id_pesanan', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getAllWilayah()
    {
        $this->db->select('*');
        $this->db->from('kota');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllWilayahKotaPengguna($id)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_kota', $id);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getAllWilayahKotaVendor($id)
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->where('id_kota', $id);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getTotalAllWilayah()
    {
        $this->db->select('*');
        $this->db->from('kota');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getJumlahPengguna($id)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_kota', $id);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getJumlahVendor($id)
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->where('id_kota', $id);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getRowJakPus()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_kota = 2');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getRowJakTim()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_kota = 4');
        $result = $this->db->get();
        return $result->num_rows();
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

    public function getAllPenilaian()
    {
        $this->db->select('*');
        $this->db->from('penilaian');
        $this->db->join('vendor', 'vendor.id_vendor = penilaian.id_vendor');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllPenilaianById($id)
    {
        $this->db->select_sum('penilaian');
        // $this->db->select('*');
        $this->db->from('penilaian');
        $this->db->join('vendor', 'vendor.id_vendor = penilaian.id_vendor');
        $this->db->where('penilaian.id_vendor', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getLoopVendor()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getRowVendor()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getRowVendorPesanan($id)
    {
        $this->db->select('*');
        $this->db->from('penilaian');
        $this->db->where('id_vendor', $id);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getRowVendorPesananTrx($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->where('id_vendor', $id);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getAllPendapatan()
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllPendapatanById($id)
    {
        $this->db->select_sum('harga');
        $this->db->from('trx_pesanan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->where('trx_pesanan.id_vendor', $id);
        $this->db->where('trx_pesanan.id_status_tarik = 3');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getRowPengguna()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getRowPesanan()
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getRowPesananAktif()
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->where('id_status_trans <= 7');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getRowPesananBatal()
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->where('id_status_trans >= 11');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getRowPekerjaanSelesai()
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->where('id_status_trans >= 7');
        $this->db->where('id_status_trans <= 8');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function getRowTarikDanaVendor()
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->where('id_status_tarik = 3');
        $result = $this->db->get();
        return $result->num_rows();
    }

    // public function getRowHarga()
    // {
    //     $this->db->select('harga, count(*)');
    //     $this->db->from('trx_pesanan');
    //     $result = $this->db->get();
    //     return $result->result();
    // }

    public function getAllTarikDana()
    {
        $this->db->select('*');
        $this->db->from('rekening_tarik');
        $this->db->join('trx_pesanan', 'trx_pesanan.id_pesanan = rekening_tarik.id_pesanan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->join('status_transaksi', 'status_transaksi.id_status_trans = trx_pesanan.id_status_trans');
        $this->db->where('trx_pesanan.id_status_tarik = 2');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getTotalPendapatan()
    {
        $this->db->select('SUM(harga) as total');
        $this->db->from('trx_pesanan');
        $this->db->where('id_status_trans >= 6');
        $result = $this->db->get();
        return $result->row()->total;
    }

    public function getTotalPendapatanBulanan($bulan)
    {
        $this->db->select('SUM(harga) as total');
        $this->db->from('trx_pesanan');
        $this->db->where('month(create_date)', $bulan);
        $this->db->where('id_status_trans >= 6');
        $result = $this->db->get();
        return $result->row()->total;
    }

    public function getInvoiceById($id)
    {
        $this->db->select('*');
        $this->db->from('trx_pesanan');
        $this->db->join('trx_bukti_bayar', 'trx_bukti_bayar.id_pesanan = trx_pesanan.id_pesanan');
        $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        // $this->db->join('vendor', 'vendor.id_vendor = trx_pesanan.id_vendor');
        $this->db->where('trx_pesanan.id_pesanan', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getAllKonfirmsiPembayaran()
    {
        $this->db->select('*');
        $this->db->from('list_pesanan_vendor');
        $this->db->where('id_status_trans = 3');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAllKomplain()
    {
        $this->db->select('*');
        $this->db->from('komplain');
        $this->db->join('vendor', 'vendor.id_vendor = komplain.id_vendor');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = komplain.id_pelanggan');
        $this->db->join('user', 'user.id_user = pelanggan.id_userfk');
        $this->db->where('status_komplain = 1');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function hapusGambarPortfolio($id)
    {
        $this->db->where('id_portfolio', $id);
        $this->db->delete('portfolio');
    }
}
