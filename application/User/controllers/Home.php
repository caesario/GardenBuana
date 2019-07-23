<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Vendor_model');
    $this->load->model('Admin_model');
    $this->load->model('Transaksi_model');
  }

  public function index()
  {
    $data['title'] = 'GardenBuana | Home';
    $data['session'] = $this->session->all_userdata();
    $data['info_web'] = $this->Admin_model->getInfoWeb();
    $data['vendor'] = $this->Vendor_model->getAllVendorLimit();
    $data['kota'] = $this->Vendor_model->getAllKota();
    $data['testimoni'] = $this->Transaksi_model->getAllTestimoni();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu', $data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/footer', $data);
  }
}
