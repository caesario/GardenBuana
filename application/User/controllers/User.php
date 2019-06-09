<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function index()
  {
    echo 'test index';
  }

  public function profil_user()
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
}
