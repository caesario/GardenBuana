<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Transaksi_model');
    }

    public function index()
    {
        $data['title'] = 'GardenBuana | Testimoni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['info_web'] = $this->Admin_model->getInfoWeb();

        $data['testimoni'] = $this->Transaksi_model->getAllTestimoni();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        // $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('testimoni/index');
        $this->load->view('templates/footer');
    }
}
