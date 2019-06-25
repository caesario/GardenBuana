<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    //Validasi form
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
    if ($this->form_validation->run() == false) { //Jika validasi gagal
      $data['title'] = 'GardenBuana | Login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/index');
      $this->load->view('templates/auth_footer');
    } else {
      //Jika validasi sukses
      $this->_login();
    }
  }

  public function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //Jika user ada
    if ($user) {
      //Jika user aktif
      if ($user['is_active'] == 1) {
        //Cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id'],
            'id_user' => $user['id_user']
          ];
          $this->session->set_userdata($data);
          $cekNamaVendor = $this->db->get_where('vendor', ['id_userfk' => $user['id_user']])->row();
          if ($user['role_id'] == 1) {
            if (!isset($cekNamaVendor->nama_vendor)) {
              redirect('Vendor_admin/editProfil');
            } else {
              redirect('Vendor_admin');
            }
          }
          $cekTable = $this->db->get_where('pelanggan', ['id_userfk' => $user['id_user']])->row();
          // var_dump($cekTable);
          // die();
          if ($user['role_id'] == 2) {
            if (!isset($cekTable->telpon)) {
              redirect('User/editProfil_user');
            } else {
              redirect('home');
            }
          } else {
            redirect('Admin');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Email anda belum diaktivasi!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar!</div>');
      redirect('auth');
    }
  }

  public function regist()
  {
    $data['title'] = 'GardenBuana | Registrasi';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/regist');
    $this->load->view('templates/auth_footer');
  }

  public function regist_vendor()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
      'matches' => 'Password dont match!',
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'GardenBuana Registration';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/register_vendor');
      $this->load->view('templates/auth_footer');
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 1,
        'is_active' => 1,
        'date_created' => date("Y-m-d")
      ];

      $this->db->insert('user', $data);
      $insert_id = $this->db->insert_id();

      $dataVendor = [
        'id_userfk' => $insert_id,
        'id_status' => 1
      ];
      $this->db->insert('vendor', $dataVendor);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda berhasil dibuat, Silahkan Login</div>');
      redirect('auth');
    }
  }

  public function regist_user()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
      'matches' => 'Password dont match!',
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'GardenBuana Registration';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/register_user');
      $this->load->view('templates/auth_footer');
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];
      $this->db->insert('user', $data);
      $id_user = $this->db->insert_id();

      $data_pelanggan = [
        'id_userfk' => $id_user,
        'id_status' => 1,
        'create_date' => date('Y-m-d H:i:s')
      ];

      $this->db->insert('pelanggan', $data_pelanggan);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda berhasil dibuat, Silahkan Login</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->unset_userdata('id_user');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah keluar!</div>');
    redirect('');
  }
}
