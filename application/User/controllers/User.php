<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Admin_model');
  }

  public function index()
  {
    if ($this->session->userdata("role_id") == 2) {
      $data['title'] = 'Dasboard';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('templates/vendor_sidebar', $data);
      $this->load->view('templates/vendor_topbar', $data);
      $this->load->view('user/profil');
      $this->load->view('templates/vendor_footer');
    } else {
      redirect("home");
    }
  }

  public function profil_user()
  {
    if ($this->session->userdata("role_id") == 2) {
      $data['title'] = 'My Profile';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['pengguna'] = $this->User_model->getUserProfilById($this->session->userdata('id_user'));
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('templates/vendor_sidebar', $data);
      $this->load->view('templates/vendor_topbar', $data);
      $this->load->view('user_admin/profil_user');
      $this->load->view('templates/vendor_footer');
    } else {
      redirect("home");
    }
  }

  public function editProfil_user()
  {
    if ($this->session->userdata("role_id") == 2) {
      $data['title'] = 'My Profil';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['pengguna'] = $this->User_model->getUserProfilById($this->session->userdata('id_user'));

      $this->load->view('templates/vendor_header', $data);
      $this->load->view('templates/vendor_sidebar', $data);
      $this->load->view('templates/vendor_topbar', $data);
      $this->load->view('user_admin/edit_profil_user');
      $this->load->view('templates/vendor_footer');
    } else {
      redirect("home");
    }
  }

  public function pesanan()
  {
    if ($this->session->userdata("role_id") == 2) {
      $data['title'] = 'Pesanan';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $id = $_SESSION['id_user'];
      $data['trx_pesanan'] = $this->User_model->getAllPesananVendor($id);
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('templates/vendor_sidebar', $data);
      $this->load->view('templates/vendor_topbar', $data);
      $this->load->view('user_admin/pesanan');
      $this->load->view('templates/vendor_footer');
    } else {
      redirect("home");
    }
  }
}
