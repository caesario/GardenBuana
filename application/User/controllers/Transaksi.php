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

            $data['list_nego'] = $this->db->query("select * from list_nego_pesanan where id_pesanan = '$id'")->result_array();

            // echo"<pre>"; print_r($data['list_nego']); exit();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('transaksi/nego_pesan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect("home");
        }
    }

    public function nego_pesan() {
        $data = $this->input->post();
        $data_insert = array(
            'id_pesanan' => $this->input->post('id_pesanan'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_vendor' => $this->input->post('id_vendor'),
            'pesan' => $this->input->post('keterangan'),
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => $this->input->post('id_user'),
            'type' => $this->input->post('type')
        );

        // echo"<pre>"; print_r($data_insert); exit();

        if($this->input->post('type') == 'P') {
            $redirect = "transaksi/pesanan/";
        } else {
            $redirect = "vendor_admin/detail_pesanan/";
        }

        $insert = $this->db->insert('trx_nego', $data_insert);
        if($insert) {
            $this->session->set_flashdata('success', 'Success');
            redirect($redirect.$this->input->post('id_pesanan'));
        } else {
            $this->session->set_flashdata('success', 'Success');
            redirect($redirect.$this->input->post('id_pesanan'));
        }
    }

    public function konfirmasi_bukti($id)
    {
        $data['title'] = 'GardenBuana | Pesanan';
        $data['trx_pesanan'] = $this->Pesanan_model->getPesananById($id);
        $data['info_web'] = $this->Admin_model->getInfoWeb();
        $data['session'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
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

    public function update_bukti_bayar() {
        $data = $this->input->post();
        // echo "<pre>";print_r($data);exit();

        $queryInsert = $this->db->query("INSERT INTO trx_bukti_bayar (id_pesanan,upload,keterangan_bayar,id_status_trans, create_date_bayar) values 
            ('".$this->input->post('id_pesanan')."', '".$this->input->post('gambar')."', '".$this->input->post('keterangan')."',
            '3', '".date('Y-m-d H:i:s')."')
            ");

        if($queryInsert) {
            $query = $this->db->query("UPDATE trx_pesanan SET id_status_trans = 3 where id_pesanan = '".$this->input->post('id_pesanan')."' ");

            if($query) {
                $this->session->set_flashdata('success', 'Success');
                redirect('home');
            }
        }

        else {
            $this->session->set_flashdata('error', 'Failed');
            redirect('home');
        }

        

            
    }
}
