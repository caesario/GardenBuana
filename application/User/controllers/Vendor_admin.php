<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['session'] = $this->session->all_userdata();
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/index');
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function profil()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Profil';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $_SESSION['id_user'];
            $data['session'] = $this->session->all_userdata();
            $data['vendor'] = $this->Vendor_model->getVendorProfilById($id);
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/profil_vendor');
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function editProfil()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Profil';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $_SESSION['id_user'];
            $data['vendor'] = $this->Vendor_model->getVendorProfilById($id);
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/edit_profil_vendor');
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function updateEditProfil()
    {

        $this->form_validation->set_rules('namaVendor', 'Nama Vendor');
        $this->form_validation->set_rules('name', 'Nama');

        $datauser = $this->Vendor_model->getUserProfilById($_SESSION['id_user']);
        $idVendor = $datauser['id_userfk'];
        $idUser = $_SESSION['id_user'];


        if ($this->form_validation->run() == false) {
            redirect('vendor_admin/profil');
        } else {
            $dataVendor = array(
                'nama_vendor' => $this->input->post('namaVendor'),
            );
            $dataUser = array(
                'name' => $this->input->post('name'),
            );

            $updateVendor = $this->Vendor_model->updateProfilVendor($dataVendor, $idVendor);
            $updateUser = $this->Vendor_model->updateProfilUser($dataUser, $idUser);
            if ($updateVendor == true || $updateUser == true) {
                $this->session->set_flashdata('success', 'Data Berhasil Diubah');
                redirect('vendor_admin/profil');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Diubah');
                redirect('vendor_admin/profil');
            }
        }
    }

    public function pesanan()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Pesanan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $_SESSION['id_user'];
            $data['trx_pesanan'] = $this->Vendor_model->getAllPesananVendor($id);
            $data['session'] = $this->session->all_userdata();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/pesanan', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function tertunda()
    {
        $data['title'] = 'Pesanan Tertunda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['trx_pesanan'] = $this->Admin_model->getAllPesanan();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('vendor_admin/pesanan_tertunda', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['trx_pesanan'] = $this->Admin_model->getAllPesanan();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('vendor_admin/riwayat_transaksi', $data);
        $this->load->view('templates/vendor_footer');
    }
}
