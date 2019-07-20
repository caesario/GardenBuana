<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Pesanan_model');
    }

    public function index()
    {
        $data['title'] = 'GardenBuana | Dasboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('user _admin/index');
        $this->load->view('templates/vendor_footer');
    }

    public function profil()
    {
        $data['title'] = 'GardenBuana | Vendor Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $_SESSION['id_user'];
        $data['data_user'] = $this->Admin_model->getUserProfilById($id);
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('user_admin/profil_user');
        $this->load->view('templates/vendor_footer');
    }

    public function editProfil()
    {
        $data['title'] = 'GardenBuana | Vendor Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $_SESSION['id_user'];
        $data['vendor'] = $this->Admin_model->getVendorProfilById($id);
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('vendor_admin/edit_profil_vendor');
        $this->load->view('templates/vendor_footer');
    }

    public function pesanan()
    {
        if ($this->session->userdata("role_id") == 2) {
            $data['title'] = 'Pesanan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');
            $data['trx_pesanan'] = $this->User_model->getAllPesananPelanggan($id);
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('user_admin/pesanan', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function hapus_pesanan($id)
    {
        $this->User_model->hapusDataPesanan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user_admin/pesanan');
    }

    public function cetak_pesanan($id)
    {
        if ($this->session->userdata("role_id") == 2) {
            $data['title'] = 'GardenBuana | Pesanan';
            $data['trx_pesanan'] = $this->Pesanan_model->getPesananCetakById($id);
            $data['info_web'] = $this->Admin_model->getInfoWeb();
            $data['session'] = $this->session->all_userdata();
            $data['list_nego'] = $this->db->query("select * from list_nego_pesanan where id_pesanan = '$id'")->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('user_admin/cetak_pesanan', $data);
        } else {
            redirect("home");
        }
    }

    public function riwayat_pesanan()
    {
        if ($this->session->userdata("role_id") == 2) {
            $data['title'] = 'Riwayat Pesanan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');

            $data['trx_pesanan'] = $this->User_model->getAllPesananRiwayat($id);
            // $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            // $getVendorId = $getVendor->id_pelanggan;

            // $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_pelanggan = " . $getVendorId . " AND id_status_trans = 5")->result_array();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('user_admin/riwayat_pesanan', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function detail_riwayat_pesanan($id)
    {
        if ($this->session->userdata("role_id") == 2) {
            $data['title'] = 'Riwayat Pesanan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // $id = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');

            $data['riwayat'] = $this->User_model->getRiwayatById($id);
            $data['data_pengerjaan'] = $this->User_model->getPengerjaanById($id);
            // $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            // $getVendorId = $getVendor->id_pelanggan;

            // $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_pelanggan = " . $getVendorId . " AND id_status_trans = 5")->result_array();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('user_admin/detail_riwayat_pesanan', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function cetak_riwayat_pesanan($id)
    {
        if ($this->session->userdata("role_id") == 2) {
            $data['title'] = 'GardenBuana | Pesanan';
            $data['riwayat'] = $this->User_model->getRiwayatById($id);
            $data['data_pengerjaan'] = $this->User_model->getPengerjaanById($id);
            $data['info_web'] = $this->Admin_model->getInfoWeb();
            $data['session'] = $this->session->all_userdata();

            $this->load->view('templates/header', $data);
            $this->load->view('user_admin/cetak_riwayat_pesanan', $data);
        } else {
            redirect("home");
        }
    }

    public function riwayat_pembayaran()
    {
        if ($this->session->userdata("role_id") == 2) {
            $data['title'] = 'Riwayat Pembayaran';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');

            $data['trx_bukti'] = $this->User_model->getBuktiBayarById($id);
            // $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            // $getVendorId = $getVendor->id_pelanggan;

            // $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_pelanggan = " . $getVendorId . " AND id_status_trans = 5")->result_array();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('user_admin/riwayat_pembayaran', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function invoice($id)
    {
        if ($this->session->userdata("role_id") == 2) {
            $data['title'] = 'GardenBuana | Invoice';
            // $data['trx_pesanan'] = $this->Pesanan_model->getPesananById();
            $data['invoice'] = $this->User_model->getDataInvoiceById($id);
            $data['session'] = $this->session->all_userdata();

            $this->load->view('user_admin/invoice', $data);
        } else {
            redirect("home");
        }
    }
}
