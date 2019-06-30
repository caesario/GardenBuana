<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model');
    $this->load->model('Vendor_model');
    $this->load->model('Transaksi_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'GardenBuana | List Vendor';
    $data['vendor'] = $this->Vendor_model->getAllVendorVerif();
    $data['kota'] = $this->Vendor_model->getAllKota();
    $data['session'] = $this->session->all_userdata();
    $data['info_web'] = $this->Admin_model->getInfoWeb();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu', $data);
    $this->load->view('vendor/list_vendor', $data);
    $this->load->view('templates/footer', $data);
  }

  public function cariVendor()
  {
    $data['title'] = 'GardenBuana | List Vendor';
    $data['vendor'] = $this->Vendor_model->getAllVendor();
    $kota = $this->input->post('kota');
    $keyword = $this->input->post('keyword');
    // var_dump($keyword);
    // die();
    $data['vendor'] = $this->Vendor_model->cariDataVendor($kota, $keyword);

    $data['kota'] = $this->Vendor_model->getAllKota();
    $data['session'] = $this->session->all_userdata();
    $data['info_web'] = $this->Admin_model->getInfoWeb();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu', $data);
    $this->load->view('vendor/list_vendor', $data);
    $this->load->view('templates/footer', $data);
  }

  public function detail_vendor($id)
  {
    $data['title'] = 'GardenBuana | Detail Vendor';
    $data['vendor'] = $this->Vendor_model->getVendorById($id);
    $data['session'] = $this->session->all_userdata();
    $data['info_web'] = $this->Admin_model->getInfoWeb();
    $data['portfolio'] = $this->Vendor_model->getPortfolioById($id);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('vendor/detail_vendor', $data);
    $this->load->view('templates/footer', $data);
  }

  public function hubungi_vendor($id)
  {
    $data['title'] = 'GardenBuana | Detail Vendor';
    $data['vendor'] = $this->Vendor_model->getVendorById($id);
    $data['session'] = $this->session->all_userdata();
    $data['info_web'] = $this->Admin_model->getInfoWeb();
    // $data['hub_vendor'] = $this->Transaksi_model->getInfoVendor($id);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('vendor/hub_vendor', $data);
    $this->load->view('templates/footer', $data);
  }

  public function pesan_vendor($id)
  {
    if ($this->session->userdata("role_id") == 2) {
      $data['title'] = 'GardenBuana | Detail Vendor';
      $data['vendor'] = $this->Vendor_model->getVendorById($id);
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['session'] = $this->session->all_userdata();
      $data['info_web'] = $this->Admin_model->getInfoWeb();
      $data['dataPelanggan'] = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row_array();
      // $data['pelanggan'] = $this->Transaksi_model->getIdPelanggan();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('vendor/pesan_vendor', $data);
      $this->load->view('templates/footer', $data);
    } else {
      redirect("Auth");
    }
  }

  public function create_pesanan()
  {

    $idUser = $this->session->userdata("id_user");

    $this->form_validation->set_rules('namaPemesan', 'Nama', 'required');
    $this->form_validation->set_rules('emailPesanan', 'Email', 'required');
    $this->form_validation->set_rules('telponPesanan', 'Telpon', 'required');
    $this->form_validation->set_rules('tanggalPengerjaan', 'Tanggal', 'required');
    $this->form_validation->set_rules('alamatPesanan', 'Alamat', 'required');
    $this->form_validation->set_rules('keteranganPesanan', 'Keteragan', 'required');

    if ($this->form_validation->run() == TRUE) {
      $id = uniqid('TRX-');
      $idvendor = $this->input->post('id_vendor');
      $idpelanggan = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');
      $dateNow = date('Y-m-d H:i:s');
      $data = array(
        'id_pesanan' => $id,
        'id_pelanggan' => $idpelanggan,
        'id_vendor' => $idvendor,
        'nama_pemesan' => $this->input->post('namaPemesan'),
        'email' => $this->input->post('emailPesanan'),
        'telpon' => $this->input->post('telponPesanan'),
        'tanggal_pengerjaan' => $this->input->post('tanggalPengerjaan'),
        'alamat' => $this->input->post('alamatPesanan'),
        'keterangan' => $this->input->post('keteranganPesanan'),
        'id_status_trans' => 1,
        'create_date' => $dateNow
      );

      // var_dump($data);
      // die();

      $create = $this->Transaksi_model->createPesanan($data);
      if ($create == TRUE) {
        // step selanjutnya
        redirect('transaksi/pesanan/' . $id, 'refresh');
      } else {
        // gagal nyimpan database
        $this->session->set_flashdata('gagal', 'Pesanan tidak berhasil dibuat');
        redirect('vendor/pesan_vendor/' . $idvendor, 'refresh');
      }
    } else {
      // gagal di form
      $this->session->set_flashdata('gagal', 'form salah');
      redirect('vendor');
    }
  }
}
