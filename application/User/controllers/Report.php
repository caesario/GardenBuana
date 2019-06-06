<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'GardenBuana | Admin Dasboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/vendor_footer');
    }

    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['trx_pesanan'] = $this->Admin_model->getAllPesanan();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/pesanan', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function buktibayar()
    {
        $data['title'] = 'Bukti Bayar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['buktibayar'] = $this->Admin_model->getAllBuktiBayar();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/bukti_bayar', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function testimoni()
    {
        $data['title'] = 'Testimoni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['testimoni'] = $this->Admin_model->getAllTestimoni();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/testimoni', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function data_pelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->Admin_model->getAllPelanggan();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/data_pelanggan', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function data_vendor()
    {
        $data['title'] = 'Data Vendor';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['vendor'] = $this->Admin_model->getAllVendor();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/data_vendor', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function riwayat_pesanan()
    {
        $data['title'] = 'Riwayat Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['history'] = $this->Admin_model->getAllHistoryPesanan();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/history_pesanan', $data);
        $this->load->view('templates/vendor_footer');
    }
}
