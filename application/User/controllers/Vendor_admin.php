<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'GardenBuana | Dasboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/index');
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function profil()
    {
        $data['title'] = 'GardenBuana | Vendor Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $_SESSION['id_user'];
        $data['vendor'] = $this->Admin_model->getVendorProfilById($id);
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('vendor_admin/profil_vendor');
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
}
