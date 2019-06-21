<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_model');
        $this->load->model('Admin_model');
        $this->load->model('Pesanan_model');
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
            $data['session'] = $this->session->all_userdata();
            $data['vendor'] = $this->Vendor_model->getVendorProfilById($this->session->userdata('id_user'));
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
            $data['vendor'] = $this->Vendor_model->getVendorProfilById($this->session->userdata('id_user'));

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

        // $this->form_validation->set_rules('namaVendor', 'Nama Vendor');
        // $this->form_validation->set_rules('name', 'Nama');

        $datauser = $this->Vendor_model->getUserProfilById($this->session->userdata('id_user'));
        $idVendor = $datauser['id_userfk'];
        $idUser = $this->session->userdata('id_user');


        // Original Code
        /*if ($this->form_validation->run() == false) {
            // redirect('vendor_admin/profil');
            echo"<pre>"; print_r($this->input->post());exit();
        } else {

            $data = $this->input->post();
            echo"<pre>"; print_r($data);exit();


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
        }*/

        if ($this->input->post()) {
            $data = $this->input->post();
            $dateNow = date('Y-m-d H:i:s');

            $dataVendor = array(
                'nama_vendor' => $this->input->post('namaVendor'),
                'id_kota' => $this->input->post('kotaVendor'),
                'telpon' => $this->input->post('noTelp'),
                'info_vendor' => $this->input->post('infoVendor'),
                'createTime' => $dateNow
            );
            $dataUser = array(
                'name' => $this->input->post('nama'),
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
        } else {
            redirect('vendor_admin/profil');
        }
    }

    public function pesanan()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Pesanan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->session->userdata("id_user");

            $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            $getVendorId = $getVendor->id_vendor;

            $data['trx_pesanan'] = $this->Vendor_model->getAllPesananVendor($getVendorId);

            // echo "<pre>";print_r($data['trx_pesanan']);exit();

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

    public function detail_pesanan($id)
    {
        if ($this->session->userdata("role_id") == 1) {
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

    public function update_pesanan()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data = $this->input->post();

            $query = $this->db->query("UPDATE trx_pesanan SET harga = " . $this->input->post('harga') . ", id_status_trans = 2 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");

            if ($query) {
                $this->session->set_flashdata('success', 'Data Berhasil Diubah');
                redirect('vendor_admin/pesanan');
            }
        } else {
            redirect("home");
        }
    }

    /* PESANAN KONFIRMASI */
    public function pesanan_konfirmasi()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Pesanan Konfirmasi';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->session->userdata("id_user");

            $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            $getVendorId = $getVendor->id_vendor;

            $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $getVendorId . " AND id_status_trans = 2")->result_array();

            // echo "<pre>";print_r($data['trx_pesanan']);exit();

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
}
