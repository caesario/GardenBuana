<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->model('Admin_model');
    }

    public function pesanan($id)
    {
        if ($this->session->userdata("role_id") == 2) {
            $data['title'] = 'GardenBuana | Pesanan';
            $data['trx_pesanan'] = $this->Pesanan_model->getPesananById($id);
            $data['info_web'] = $this->Admin_model->getInfoWeb();
            $data['session'] = $this->session->all_userdata();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('transaksi/nego_pesan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect("home");
        }
    }



    public function konfirmasi_bukti()
    {
        $data['title'] = 'GardenBuana | Konfirmasi Bukti Bayar';
        $data['info_web'] = $this->Admin_model->getInfoWeb();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('transaksi/konfirmasi_bukti', $data);
        $this->load->view('templates/footer', $data);
    }

    public function konfirmasi_pembayaran()
    {
        $data['title'] = 'GardenBuana | Konfirmasi Pembayaran';
        $data['info_web'] = $this->Admin_model->getInfoWeb();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('transaksi/konfirmasi_pembayaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function testimoni_pesanan()
    {
        $data['title'] = 'GardenBuana | Testimoni Pesanan';
        $data['info_web'] = $this->Admin_model->getInfoWeb();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('transaksi/testimoni_pesanan', $data);
        $this->load->view('templates/footer', $data);
    }
}
