<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'GardenBuana | Dasboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('user _admin/index');
        $this->load->view('templates/vendor_footer');
    }

    public function profil()
    {
        $data['title'] = 'GardenBuana | Vendor Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $_SESSION['id_user'];
        $data['data_user'] = $this->Admin_model->getUserProfilById($id);
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('user_admin/profil_user');
        $this->load->view('templates/vendor_footer');
    }

    public function editProfil()
    {
        $data['title'] = 'GardenBuana | Vendor Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $_SESSION['id_user'];
        $data['vendor'] = $this->Admin_model->getVendorProfilById($id);
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('vendor_admin/edit_profil_vendor');
        $this->load->view('templates/vendor_footer');
    }

    public function pesanan()
    {
        if ($this->session->userdata("role_id") == 2) {
            $data['title'] = 'Pesanan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');
            $data['trx_pesanan'] = $this->User_model->getAllPesananPelanggan($id);
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('user_admin/pesanan', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function riwayat_pesanan()
    {
        if ($this->session->userdata("role_id") == 2) {
            $data['title'] = 'Riwayat Pesanan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');
            $data['trx_pesanan'] = $this->User_model->getAllPesananPelanggan($id);
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('user_admin/riwayat_pesanan', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }
}
