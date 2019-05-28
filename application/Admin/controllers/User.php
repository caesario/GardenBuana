<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function index()
  {
    $data['judul'] = 'GardenBuana | Home';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu_user');
    $this->load->view('User/index');
    $this->load->view('templates/footer');
  }
}
