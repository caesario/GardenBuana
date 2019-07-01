<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

        // echo"<pre>";print_r($this->session->userdata("role_id"));exit();
        // echo'<pre>';print_r($this->session->userdata("role_id"));exit;

        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Dasboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['t_pengguna'] = $this->Admin_model->getRowPengguna();
            $data['t_pesanan'] = $this->Admin_model->getRowPesanan();
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('admin/index');
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function konfirmasi_bukti_bayar()
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Konfirmasi Pembayaran';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->session->userdata("id_user");

            // $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            // $getVendorId = $getVendor->id_vendor;

            $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_status_trans = 3")->result_array();

            // echo "<pre>";print_r($data['trx_pesanan']);exit();

            $data['session'] = $this->session->all_userdata();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('admin/pesanan_verif', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function detail_pembayaran($id)
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'GardenBuana | Konfirmasi Pembayaran';
            $data['trx_pesanan'] = $this->Pesanan_model->getPesananById($id);
            $data['bukti_bayar'] = $this->Pesanan_model->getBuktiById($id);
            $data['info_web'] = $this->Admin_model->getInfoWeb();
            $data['session'] = $this->session->all_userdata();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            // $data['list_nego'] = $this->db->query("select * from list_nego_pesanan where id_pesanan = '$id'")->result_array();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('admin/konfirmasi_pembayaran', $data);
            // $this->load->view('templates/footer', $data);
        } else {
            redirect("home");
        }
    }

    public function upd_konfirmasi_pembayaran()
    {
        if ($this->session->userdata("role_id") == 3) {
            $data = $this->input->post();

            $query = $this->db->query("UPDATE trx_pesanan SET id_status_trans = 6 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");
            $query = $this->db->query("UPDATE trx_bukti_bayar SET id_status_trans = 6 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");
            $query = $this->db->query("UPDATE trx_pesanan SET id_status_tarik = 1 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");

            if ($query) {
                $this->session->set_flashdata('success', 'Data Berhasil Diubah');
                redirect('admin/konfirmasi_bukti_bayar');
            }
        } else {
            redirect("admin/konfirmasi_bukti_bayar");
        }
    }

    public function verif()
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Verifikasi User';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['pengguna'] = $this->Admin_model->getAllPengguna();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('admin/verif_user', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function verif_detail($id)
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Verifikasi User';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['pengguna'] = $this->Admin_model->getPenggunaById($id);

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('admin/verif_user_detail', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function verif_edit($id)
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Verifikasi User | Edit';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['pengguna'] = $this->Admin_model->getPenggunaById($id);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('emailPengguna', 'Nama Pengguna', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/vendor_header', $data);
                $this->load->view('templates/vendor_sidebar', $data);
                $this->load->view('templates/vendor_topbar', $data);
                $this->load->view('admin/verif_user_edit', $data);
                $this->load->view('templates/vendor_footer');
            } else {
                $this->Admin_model->ubahDataUser($id);
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('verif');
            }
        } else {
            redirect("home");
        }
    }

    public function upd_verif($id)
    {
        if ($this->session->userdata("role_id") == 3) {

            // echo "<pre>";
            // print_r($this->input->post());
            // exit();

            if ($this->input->post()) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'is_active' => $this->input->post('status')
                );

                $this->db->where('id_user', $id);
                $update = $this->db->update('user', $data);

                if ($update) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diubah');
                    redirect('Admin/verif');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diubah');
                    redirect('Admin/verif');
                }
            } else {
                redirect("home");
            }
        } else {
            redirect("home");
        }
    }

    public function hapus_user($id)
    {
        $this->Admin_model->hapusDataUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/verif');
    }

    public function wilayah()
    {
        $data['title'] = 'Wilayah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['wilayah'] = $this->Admin_model->getAllWilayah();
        $data['jakpus'] = $this->Admin_model->getRowJakPus();
        $data['jaktim'] = $this->Admin_model->getRowJakTim();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/wilayah', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function dataPerwilayah()
    {
        $result = array('data' => array());

        $data = $this->Admin_model->getAllWilayah();
        $no = 1;
        foreach ($data as $key => $value) {

            $jumlahpengguna = $this->Admin_model->getJumlahPengguna($value['id_kota']);
            $jumlahvendor = $this->Admin_model->getJumlahVendor($value['id_kota']);
            $result['data'][$key] = array(
                $no,
                $value['nama_kota'],
                $jumlahpengguna,
                $jumlahvendor
            );
            $no++;
        } // /foreach

        echo json_encode($result);
    }

    public function profil_admin($id)
    {
        $data['title'] = 'Lihat Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['p_admin'] = $this->Admin_model->getProfilAdminbyId($id);

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('admin/lihat_profil', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function verif_vendor()
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Verifikasi Vendor';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['vendor'] = $this->Admin_model->getAllVendorVerif();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('admin/verif_vendor', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function verif_vendor_detail($id)
    {
        if ($this->session->userdata("role_id") == 3) {
            $data['title'] = 'Verifikasi Vendor';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['vendor_verif'] = $this->Admin_model->getVendorVerifByID($id);
            $data['status'] = $this->Admin_model->getAllStatus();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('admin/verif_vendor_detail', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function update_vendor_verifikasi()
    {
        if ($this->session->userdata("role_id") == 3) {
            $idVendor = $this->input->post('id_vendor');
            $dateNow = date('Y-m-d H:i:s');
            $pilihanVerif = $this->input->post('verifikasi');
            $dataVerif = array(
                'id_status_verif' => $pilihanVerif,
                'edit_date' => $dateNow
            );
            // var_dump($dataVerif);
            // die();
            $this->db->where('id_vendor', $idVendor);
            $query = $this->db->update('data_verif', $dataVerif);
            if ($query) {
                $this->session->set_flashdata('success', 'Success');
                redirect('admin/verif_vendor');
            } else {
                $this->session->set_flashdata('success', 'Success');
                redirect('admin/verifikasi_vendor');
                // redirect($redirect . $this->input->post('id_pesanan'));
            }
        } else {
            redirect("home");
        }
    }
}
