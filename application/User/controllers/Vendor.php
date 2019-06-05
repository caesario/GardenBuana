<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'GardenBuana | List Vendor';
        $data['vendor'] = $this->Vendor_model->getAllVendor();
        $data['kota'] = $this->Vendor_model->getAllKota();
        $data['session'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('vendor/list_vendor', $data);
        $this->load->view('templates/footer');
    }

    public function detail_vendor($id)
    {
        $data['title'] = 'GardenBuana | Detail Vendor';
        $data['vendor'] = $this->Vendor_model->getVendorById($id);
        $data['session'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('vendor/detail_vendor', $data);
        $this->load->view('templates/footer');
    }

    public function pesan_vendor($id)
    {
        $data['title'] = 'GardenBuana | Detail Vendor';
        $data['vendor'] = $this->Vendor_model->getVendorById($id);
        $data['session'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('vendor/pesan_vendor', $data);
        $this->load->view('templates/footer');
    }
}
