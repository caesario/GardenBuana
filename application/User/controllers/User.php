<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Admin_model');
    $this->load->model('Vendor_model');
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
      $data['kota'] = $this->Vendor_model->getAllKota();

      $this->load->view('templates/vendor_header', $data);
      $this->load->view('templates/vendor_sidebar', $data);
      $this->load->view('templates/vendor_topbar', $data);
      $this->load->view('user_admin/edit_profil_user');
      $this->load->view('templates/vendor_footer');
    } else {
      redirect("home");
    }
  }

  public function updateProfilUser()
  {
    $datauser = $this->User_model->getUserProfilById($this->session->userdata('id_user'));
    $idPelanggan = $datauser['id_userfk'];
    $idUser = $this->session->userdata('id_user');

    if ($this->input->post()) {
      $data = $this->input->post();
      $dateNow = date('Y-m-d H:i:s');

      $dataPelanggan = array(
        'telpon' => $this->input->post('noTelp'),
        'alamat' => $this->input->post('alamat'),
        'id_kota' => $this->input->post('kota'),
        'edit_date' => $dateNow
      );
      $dataUser = array(
        'name' => $this->input->post('nama'),
      );

      $updatePelanggan = $this->User_model->updateProfilPelanggan($dataPelanggan, $idPelanggan);
      $updateUser = $this->User_model->updateProfilUser($dataUser, $idUser);
      if ($updatePelanggan == true || $updateUser == true) {
        $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('user/profil_user');
      } else {
        $this->session->set_flashdata('error', 'Data Gagal Diubah');
        redirect('user/profil_user');
      }
    } else {
      redirect('user/profil_user');
    }
  }
}
