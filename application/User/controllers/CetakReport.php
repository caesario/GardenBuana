<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CetakReport extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model');
    $this->load->model('Vendor_model');
    $this->load->model('User_model');
  }

  public function index()
  { }

  public function konfirmasi_pembayaran()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Konfirmasi Pembayaran';
      $data['konfirmasi_bayar'] = $this->Admin_model->getAllKonfirmsiPembayaran();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/konfirmasi_pembayaran', $data);
    } else {
      redirect("home");
    }
  }

  public function penarikan_dana()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Tarik Dana';
      $data['tarik_dana'] = $this->Admin_model->getAllTarikDana();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/penarikan_dana', $data);
    } else {
      redirect("home");
    }
  }

  public function verifikasi_user()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Verifikasi User';
      $data['pengguna'] = $this->Admin_model->getAllPengguna();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/verifikasi_user', $data);
    } else {
      redirect("home");
    }
  }

  public function verifikasi_vendor()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Verifikasi Vendor';
      $data['vendor'] = $this->Admin_model->getAllVendorVerif();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/verifikasi_vendor', $data);
    } else {
      redirect("home");
    }
  }

  public function pesanan()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Pesanan Aktif';
      $data['trx_pesanan'] = $this->Admin_model->getAllPesanan();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/pesanan', $data);
    } else {
      redirect("home");
    }
  }

  public function riwayat_pesanan()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Riwayat Pesanan';
      $data['riwayat'] = $this->Admin_model->getAllHistoryPesanan();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/riwayat_pesanan', $data);
    } else {
      redirect("home");
    }
  }

  public function bukti_bayar()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Bukti Bayar';
      $data['buktibayar'] = $this->Admin_model->getAllBuktiBayar();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/bukti_bayar', $data);
    } else {
      redirect("home");
    }
  }

  public function testimoni()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Tesimoni';
      $data['testimoni'] = $this->Admin_model->getAllTestimoni();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/testimoni', $data);
    } else {
      redirect("home");
    }
  }

  public function data_pelanggan()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Data Pelanggan';
      $data['pelanggan'] = $this->Admin_model->getAllPelanggan();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/data_pelanggan', $data);
    } else {
      redirect("home");
    }
  }

  public function data_vendor()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Data Vendor';
      $data['vendor'] = $this->Admin_model->getAllVendor();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/data_vendor', $data);
    } else {
      redirect("home");
    }
  }

  public function penilaian_vendor()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Penilaian Vendor';
      $data['penilaian'] = $this->Admin_model->getLoopVendor();
      $vendorPenilaian = $this->loop_penilaian();
      $data['vendorPenilaian'] = $vendorPenilaian;
      $vendorTransaksi = $this->loop_transaksi();
      $data['vendorTransaksi'] = $vendorTransaksi;
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/penilaian_vendor', $data);
    } else {
      redirect("home");
    }
  }

  private function loop_penilaian()
  {
    $data = array();
    $dataVendor = $this->Admin_model->getLoopVendor();
    $panjangRow = $this->Admin_model->getRowVendor();
    // var_dump($dataVendor);
    // die();
    for ($i = 0; $i < $panjangRow; $i++) {
      $penilaian = $this->Admin_model->getAllPenilaianById($dataVendor[$i]['id_vendor']);
      array_push($data, $penilaian);
    }
    return $data;
  }

  private function loop_transaksi()
  {
    $data = array();
    $dataVendor = $this->Admin_model->getLoopVendor();
    $panjangRow = $this->Admin_model->getRowVendor();
    // var_dump($dataVendor);
    // die();
    for ($i = 0; $i < $panjangRow; $i++) {
      $penilaian = $this->Admin_model->getRowVendorPesanan($dataVendor[$i]['id_vendor']);
      array_push($data, $penilaian);
    }
    return $data;
  }

  public function pendapatan_vendor()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Pendapatan Vendor';
      $data['pendapatan'] = $this->Admin_model->getLoopVendor();
      $vendorPendapatan = $this->loop_pendapatan();
      $data['vendorPendapatan'] = $vendorPendapatan;
      $vendorTransaksi = $this->loop_transaksi_pesanan();
      $data['vendorTransaksi'] = $vendorTransaksi;
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/pendapatan_vendor', $data);
    } else {
      redirect("home");
    }
  }

  private function loop_pendapatan()
  {
    $data = array();
    $dataVendor = $this->Admin_model->getLoopVendor();
    $panjangRow = $this->Admin_model->getRowVendor();
    // var_dump($dataVendor);
    // die();
    for ($i = 0; $i < $panjangRow; $i++) {
      $pendapatan = $this->Admin_model->getAllPendapatanById($dataVendor[$i]['id_vendor']);
      array_push($data, $pendapatan);
    }
    return $data;
  }

  private function loop_transaksi_pesanan()
  {
    $data = array();
    $dataVendor = $this->Admin_model->getLoopVendor();
    $panjangRow = $this->Admin_model->getRowVendor();
    // var_dump($dataVendor);
    // die();
    for ($i = 0; $i < $panjangRow; $i++) {
      $pendapatan = $this->Admin_model->getRowVendorPesananTrx($dataVendor[$i]['id_vendor']);
      array_push($data, $pendapatan);
    }
    return $data;
  }

  public function wilayah()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Report Wilayah Pengguna';
      $data['wilayah'] = $this->Admin_model->getAllWilayah();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report/wilayah', $data);
      $this->load->view('templates/vendor_footer');
    } else {
      redirect("home");
    }
  }

  public function dataPerwilayah()
  {
    $result = array('data' => array());

    $data = $this->Admin_model->getAllWilayah();
    $no = 1;
    foreach ($data as $key => $value) {

      $jumlahpengguna = $this->Admin_model->getJumlahPengguna($value['id_kota']);
      $jumlahvendor = $this->Admin_model->getJumlahVendor($value['id_kota']);
      $result['data'][$key] = array(
        $no,
        $value['nama_kota'],
        $jumlahpengguna,
        $jumlahvendor
      );
      $no++;
    } // /foreach

    echo json_encode($result);
  }

  public function pesanan_vendor()
  {
    if ($this->session->userdata("role_id") == 1) {
      $data['title'] = 'Report Pesanan';
      $id = $this->session->userdata("id_user");
      $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
      $getVendorId = $getVendor->id_vendor;
      $data['trx_pesanan'] = $this->Vendor_model->getAllPesananVendor($getVendorId);

      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report_vendor/pesanan', $data);
    } else {
      redirect("home");
    }
  }

  public function konfirmasi_pembayaran_vendor()
  {
    if ($this->session->userdata("role_id") == 1) {
      $data['title'] = 'Report Konfirmasi Pembayaran';
      $id = $this->session->userdata("id_user");
      $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
      $getVendorId = $getVendor->id_vendor;
      $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $getVendorId . " AND id_status_trans = 3")->result_array();

      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report_vendor/pesanan', $data);
    } else {
      redirect("home");
    }
  }

  public function konfirmasi_pekerjaan_vendor()
  {
    if ($this->session->userdata("role_id") == 1) {
      $data['title'] = 'Report Konfirmasi Pekerjaan';
      $id = $this->session->userdata("id_user");
      $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
      $getVendorId = $getVendor->id_vendor;
      $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $getVendorId . " AND id_status_trans = 6 OR id_status_trans = 7")->result_array();


      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report_vendor/pesanan', $data);
    } else {
      redirect("home");
    }
  }

  public function riwayat_transaksi_vendor()
  {
    if ($this->session->userdata("role_id") == 1) {
      $data['title'] = 'Report Riwayat Transaksi';
      $id = $this->session->userdata("id_user");
      $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
      $getVendorId = $getVendor->id_vendor;
      $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $getVendorId . " AND id_status_trans >= 8")->result_array();


      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report_vendor/riwayat_transaksi', $data);
    } else {
      redirect("home");
    }
  }

  public function tarik_dana_vendor()
  {
    if ($this->session->userdata("role_id") == 1) {
      $data['title'] = 'Report Riwayat Transaksi';
      $id = $this->session->userdata("id_user");
      $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
      $getVendorId = $getVendor->id_vendor;

      $data['tarik_dana'] = $this->Vendor_model->getTarikDanaVendor($getVendorId);
      $data['tarik_dana_id'] = $this->Vendor_model->getTarikDanaById($getVendorId);

      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report_vendor/tarik_dana', $data);
    } else {
      redirect("home");
    }
  }



  public function pesanan_pelanggan()
  {
    if ($this->session->userdata("role_id") == 2) {
      $data['title'] = 'Report Pesanan';
      $id = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');
      $data['trx_pesanan'] = $this->User_model->getAllPesananPelanggan($id);

      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report_pelanggan/pesanan', $data);
    } else {
      redirect("home");
    }
  }

  public function riwayat_pembayaran_pelanggan()
  {
    if ($this->session->userdata("role_id") == 2) {
      $data['title'] = 'Report Riwayat Pembayaran';
      $id = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');
      $data['trx_bukti'] = $this->User_model->getBuktiBayarById($id);

      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report_pelanggan/riwayat_pembayaran', $data);
    } else {
      redirect("home");
    }
  }

  public function riwayat_pesanan_pelanggan()
  {
    if ($this->session->userdata("role_id") == 2) {
      $data['title'] = 'Report Riwayat Pesanan';
      $id = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');
      $data['trx_pesanan'] = $this->User_model->getAllPesananRiwayat($id);

      $this->load->view('templates/vendor_header', $data);
      $this->load->view('cetak_report_pelanggan/riwayat_pesanan', $data);
    } else {
      redirect("home");
    }
  }
}
