<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Vendor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'GardenBuana | List Vendor';
        $data['vendor'] = $this->Vendor_model->getAllVendor();
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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('vendor/detail_vendor', $data);
        $this->load->view('templates/footer', $data);
    }

    public function pesan_vendor($id)
    {
        $data['title'] = 'GardenBuana | Detail Vendor';
        $data['vendor'] = $this->Vendor_model->getVendorById($id);
        $data['session'] = $this->session->all_userdata();
        $data['info_web'] = $this->Admin_model->getInfoWeb();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('vendor/pesan_vendor', $data);
        $this->load->view('templates/footer', $data);
    }
}
