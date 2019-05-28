<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
    }

    public function index($id)
    {
        $data['title'] = 'GardenBuana | Pesanan';
        $data['trx_pesanan'] = $this->Pesanan_model->getPesananById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('transaksi/nego_pesan', $data);
        $this->load->view('templates/footer');
    }

    public function konfirmasi_bukti()
    {
        $data['title'] = 'GardenBuana | Konfirmasi Bukti Bayar';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('transaksi/konfirmasi_bukti', $data);
        $this->load->view('templates/footer');
    }

    public function konfirmasi_pembayaran()
    {
        $data['title'] = 'GardenBuana | Konfirmasi Pembayaran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('transaksi/konfirmasi_pembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function testimoni_pesanan()
    {
        $data['title'] = 'GardenBuana | Testimoni Pesanan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('transaksi/testimoni_pesanan', $data);
        $this->load->view('templates/footer');
    }
}
