<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {

        // echo"<pre>";print_r($this->session->userdata("role_id"));exit();
        // echo'<pre>';print_r($this->session->userdata("role_id"));exit;

        if($this->session->userdata("role_id") == 3) {
            $data['title'] = 'GardenBuana | Admin Dasboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('admin/index');
            $this->load->view('templates/vendor_footer');
        }
        else {
            redirect("home");
        }
    }
}
