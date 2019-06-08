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

    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Dasboard';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates/vendor_header', $data);
      $this->load->view('templates/vendor_sidebar', $data);
      $this->load->view('templates/vendor_topbar', $data);
      $this->load->view('admin/index');
      $this->load->view('templates/vendor_footer');
    } else {
      redirect("home");
    }
  }

  public function verif()
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Verifikasi User';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['pengguna'] = $this->Admin_model->getAllPengguna();

      $this->load->view('templates/vendor_header', $data);
      $this->load->view('templates/vendor_sidebar', $data);
      $this->load->view('templates/vendor_topbar', $data);
      $this->load->view('admin/verif_user', $data);
      $this->load->view('templates/vendor_footer');
    } else {
      redirect("home");
    }
  }

  public function verif_detail($id)
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Verifikasi User';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['pengguna'] = $this->Admin_model->getPenggunaById($id);

      $this->load->view('templates/vendor_header', $data);
      $this->load->view('templates/vendor_sidebar', $data);
      $this->load->view('templates/vendor_topbar', $data);
      $this->load->view('admin/verif_user_detail', $data);
      $this->load->view('templates/vendor_footer');
    } else {
      redirect("home");
    }
  }

  public function verif_edit($id)
  {
    if ($this->session->userdata("role_id") == 3) {
      $data['title'] = 'Verifikasi User | Edit';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['pengguna'] = $this->Admin_model->getPenggunaById($id);

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('emailPengguna', 'Nama Pengguna', 'required');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/verif_user_edit', $data);
        $this->load->view('templates/vendor_footer');
      } else {
        $this->Admin_model->ubahDataUser($id);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('verif');
      }
    } else {
      redirect("home");
    }
  }

  public function hapus_user($id)
  {
    $this->Admin_model->hapusDataUser($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('admin/verif');
  }

  public function wilayah()
  {
    $data['title'] = 'Wilayah';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['wilayah'] = $this->Admin_model->getAllWilayah();

    $this->load->view('templates/vendor_header', $data);
    $this->load->view('templates/vendor_sidebar', $data);
    $this->load->view('templates/vendor_topbar', $data);
    $this->load->view('admin/wilayah', $data);
    $this->load->view('templates/vendor_footer');
  }

  public function profil_admin($id)
  {
    $data['title'] = 'Lihat Profil';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['p_admin'] = $this->Admin_model->getProfilAdminbyId($id);

    $this->load->view('templates/vendor_header', $data);
    $this->load->view('templates/vendor_sidebar', $data);
    $this->load->view('templates/vendor_topbar', $data);
    $this->load->view('admin/lihat_profil', $data);
    $this->load->view('templates/vendor_footer');
  }
}
