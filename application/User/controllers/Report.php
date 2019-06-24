<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'GardenBuana | Admin Dasboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['trx_pesanan'] = $this->Admin_model->getAllPesanan();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/pesanan', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function pesanan_detail($id)
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail_pesanan'] = $this->Admin_model->getPesananById($id);

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/pesanan_detail', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function pesanan_hapus($id)
    {
        $this->Admin_model->hapusDataPesanan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('report/pesanan');
    }

    public function buktibayar()
    {
        $data['title'] = 'Bukti Bayar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['buktibayar'] = $this->Admin_model->getAllBuktiBayar();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/bukti_bayar', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function buktibayar_detail($id)
    {
        $data['title'] = 'Bukti Bayar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['buktibayar'] = $this->Admin_model->getBuktiBayarById($id);

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/bukti_bayar_detail', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function testimoni()
    {
        $data['title'] = 'Testimoni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['testimoni'] = $this->Admin_model->getAllTestimoni();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/testimoni', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function testimoni_detail($id)
    {
        $data['title'] = 'Testimoni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail_testimoni'] = $this->Admin_model->getTestimoniById($id);

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/testimoni_detail', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function testimoni_hapus($id)
    {
        $this->Admin_model->hapusDataTestimoni($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('report/testimoni');
    }

    public function data_pelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->Admin_model->getAllPelanggan();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/data_pelanggan', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function pelanggan_detail($id)
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail_pelanggan'] = $this->Admin_model->getPelangganById($id);

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/data_pelanggan_detail', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function pelanggan_edit($id)
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Data Pelanggan | Edit';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['detail_pelanggan'] = $this->Admin_model->getPelangganById($id);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('emailPengguna', 'Nama Pengguna', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/vendor_header', $data);
                $this->load->view('templates/vendor_sidebar', $data);
                $this->load->view('templates/vendor_topbar', $data);
                $this->load->view('admin/pelanggan_edit', $data);
                $this->load->view('templates/vendor_footer');
            } else {
                $this->Admin_model->ubahDataPelanggan($id);
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('report/data_pelanggan');
            }
        } else {
            redirect("home");
        }
    }

    public function data_vendor()
    {
        $data['title'] = 'Data Vendor';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['vendor'] = $this->Admin_model->getAllVendor();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/data_vendor', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function riwayat_pesanan()
    {
        $data['title'] = 'Riwayat Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['history'] = $this->Admin_model->getAllHistoryPesanan();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/history_pesanan', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function penilaian()
    {
        $data['title'] = 'Penilaian Vendor';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penilaian'] = $this->Admin_model->getAllPenilaian();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/penilaian_vendor', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function pendapatan()
    {
        $data['title'] = 'Pendapatan Vendor';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['history'] = $this->Admin_model->getAllHistoryPesanan();
        $data['pendapatan'] = $this->Admin_model->getAllPendapatan();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/pendapatan_vendor', $data);
        $this->load->view('templates/vendor_footer');
    }
}
