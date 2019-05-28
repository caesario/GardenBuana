<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bug extends CI_Controller
{
    public function index()
    {
        $this->load->helper('string');

        $data['acak'] = 'TRX-' . random_string('alnum', 5);

        $this->load->view('bug', $data);
    }

    public function tambah()
    {

        $this->load->model("Bug_model");
        $this->Bug_model->tambahData();
        redirect('Bug');
    }
}
