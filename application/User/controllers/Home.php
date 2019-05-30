<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function index()
  {
    $data['title'] = 'GardenBuana | Home';

    $data['session'] = $this->session->all_userdata();

    // echo "<pre>";print_r($this->session->all_userdata())."</pre>";exit;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu',$data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/footer');
  }
}
