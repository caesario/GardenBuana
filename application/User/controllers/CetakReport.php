<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CetakReport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    { }

    public function verifikasi_user()
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Report Verifikasi User';
            $data['pengguna'] = $this->Admin_model->getAllPengguna();
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('cetak_report/verifikasi_user', $data);
        } else {
            redirect("home");
        }
    }

    public function verifikasi_vendor()
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Report Verifikasi User';
            $data['pengguna'] = $this->Admin_model->getAllVendorVerif();
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('cetak_report/verifikasi_vendor', $data);
        } else {
            redirect("home");
        }
    }

    public function pesanan()
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Report Pesanan Aktif';
            $data['trx_pesanan'] = $this->Admin_model->getAllPesanan();
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('cetak_report/pesanan', $data);
        } else {
            redirect("home");
        }
    }
}



// public function verifikasi_user()
//     {
//         if ($this->session->userdata("role_id") == 3) {
//             $data['title'] = 'Verifikasi User';
//             $this->load->view('templates/vendor_header', $data);
//             $this->load->view('cetak_report/verifikasi_user', $data);
//         } else {
//             redirect("home");
//         }
//     }
