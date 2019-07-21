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
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['session'] = $this->session->all_userdata();
            $datauser = $this->Vendor_model->getUserProfilById($this->session->userdata('id_user'));
            $idVendor = $datauser['id_vendor'];
            $data['pendapatan'] = $this->Vendor_model->getPendapatanByVendorId($idVendor);
            $data['pesanan'] = $this->Vendor_model->getPesananByVendorId($idVendor);
            $data['aktif'] = $this->Vendor_model->getPesananAktifByVendorId($idVendor);

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/index', $data);
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
            $data['kota'] = $this->Vendor_model->getAllKota();
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

        if ($this->input->post()) {
            $data = $this->input->post();
            $dateNow = date('Y-m-d H:i:s');

            $dataVendor = array(
                'nama_vendor' => $this->input->post('namaVendor'),
                'id_kota' => $this->input->post('kota'),
                'telpon' => $this->input->post('noTelp'),
                'alamat' => $this->input->post('alamat'),
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

                $cekVerif = $this->db->get_where('vendor', ['id_userfk' => $_SESSION['id_user']])->row();
                if (!isset($cekVerif->ktp)) {
                    redirect('vendor_admin/verifikasi_vendor');
                } else {
                    redirect('vendor_admin/profil');
                };
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Diubah');
                redirect('vendor_admin/profil');
            }
        } else {
            redirect('vendor_admin/profil');
        }
    }

    function ubahLogo()
    {

        $fotoVendor = $this->upload();
        if (!$fotoVendor) {
            return false;
        } else {
            $datalogo = array(
                'logo' => $fotoVendor
            );
            // Query untuk insert ke DB
            $iduser = $_SESSION['id_user'];
            $this->db->where('id_userfk', $iduser);
            $update = $this->db->update('vendor', $datalogo);
            if ($update) {
                $this->session->set_flashdata('success', 'Berhasil Diubah');
                redirect('Vendor_admin/editProfil');
            } else {
                $this->session->set_flashdata('gagal', 'Data Berhasil Diubah');
                redirect('Vendor_admin/editProfil');
            }
        }
    }

    // Function Upload
    public function upload()
    {
        $namaFile = $_FILES['fotoVendor']['name'];
        $ukuranFile = $_FILES['fotoVendor']['size'];
        $error = $_FILES['fotoVendor']['error'];
        $tmpName = $_FILES['fotoVendor']['tmp_name'];

        // Cek upload gambar
        if ($error === 4) {
            echo "<script>
				alert('Tidak Ada Gambar Yang Dipilih!');
			  </script>";
            return false;
        }

        // Cek validasi gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        // echo $namaFile;
        // die();
        // Cek ekstensi gambar
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
				alert('File Yang Dimasukkan Bukan Gambar!');
			  </script>";
            return false;
        }

        // Cek size gambar
        if ($ukuranFile > 5000000) {
            echo "<script>
				alert('Ukuran Gambar Melebihi 5 Mb!');
			  </script>";
            return false;
        }

        // Generate nama gambar
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        // Pindah direktori
        move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
        return $namaFileBaru;
    }

    public function edit_password()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Profil';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // $data['vendor'] = $this->Vendor_model->getVendorProfilById($this->session->userdata('id_user'));


            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/edit_password');
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function verifikasi_vendor()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Verifikasi Data';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['session'] = $this->session->all_userdata();
            $id = $this->session->userdata("id_user");
            $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            $getVendorId = $getVendor->id_vendor;
            $data['verif'] = $this->Vendor_model->getVerifVendorById($getVendorId);
            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/verifikasi');
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function edit_verifikasi()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Verifikasi Data';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/edit_verifikasi');
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    function ubahVerif()
    {

        $fotoKTP = $this->uploadKTP();
        $fotoNPWP = $this->uploadNPWP();
        $dateNow = date('Y-m-d H:i:s');
        if (!$fotoKTP) {
            return false;
        } else {
            $dataVerif = array(
                'ktp' => $this->input->post('noKTP'),
                'gambar_ktp' => $fotoKTP,
                'npwp' => $this->input->post('noNPWP'),
                'gambar_npwp' => $fotoNPWP,
                'id_status_verif' => 2,
                'edit_date' => $dateNow = date('Y-m-d H:i:s')
            );

            // Query untuk insert ke DB
            $id = $this->session->userdata("id_user");
            $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            $getVendorId = $getVendor->id_vendor;
            $this->db->where('id_vendor', $getVendorId);
            $update = $this->db->update('data_verif', $dataVerif);
            if ($update) {
                $this->session->set_flashdata('success', 'Berhasil Diubah');
                redirect('Vendor_admin/verifikasi_vendor');
            } else {
                $this->session->set_flashdata('gagal', 'Data Berhasil Diubah');
                redirect('Vendor_admin/editProfil');
            }
        }
    }

    public function uploadKTP()
    {
        $namaFile = $_FILES['fotoKTP']['name'];
        $ukuranFile = $_FILES['fotoKTP']['size'];
        $error = $_FILES['fotoKTP']['error'];
        $tmpName = $_FILES['fotoKTP']['tmp_name'];
        // Cek upload gambar
        if ($error === 4) {
            echo "<script>
				alert('Tidak Ada Gambar Yang Dipilih!');
			  </script>";
            return false;
        }

        // Cek validasi gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        // Cek ekstensi gambar
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
				alert('File Yang Dimasukkan Bukan Gambar!');
			  </script>";
            return false;
        }

        // Cek size gambar
        if ($ukuranFile > 5000000) {
            echo "<script>
				alert('Ukuran Gambar Melebihi 5 Mb!');
			  </script>";
            return false;
        }

        // Generate nama gambar
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        // Pindah direktori
        move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
        return $namaFileBaru;
    }

    public function uploadNPWP()
    {
        $namaFile = $_FILES['fotoNPWP']['name'];
        $ukuranFile = $_FILES['fotoNPWP']['size'];
        $error = $_FILES['fotoNPWP']['error'];
        $tmpName = $_FILES['fotoNPWP']['tmp_name'];
        // echo $namaFile;
        // die();
        // Cek upload gambar
        if ($error === 4) {
            echo "<script>
				alert('Tidak Ada Gambar Yang Dipilih!');
			  </script>";
            return false;
        }

        // Cek validasi gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        // Cek ekstensi gambar
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
				alert('File Yang Dimasukkan Bukan Gambar!');
			  </script>";
            return false;
        }

        // Cek size gambar
        if ($ukuranFile > 5000000) {
            echo "<script>
				alert('Ukuran Gambar Melebihi 5 Mb!');
			  </script>";
            return false;
        }

        // Generate nama gambar
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        // Pindah direktori
        move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
        return $namaFileBaru;
    }

    public function portfolio()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Portfolio';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['session'] = $this->session->all_userdata();
            $id = $this->session->userdata("id_user");
            $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            $getVendorId = $getVendor->id_vendor;
            $data['portfolio'] = $this->Vendor_model->getPortfolioById($getVendorId);

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/portfolio', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function tambahGambar()
    {
        $datauser = $this->Vendor_model->getUserProfilById($this->session->userdata('id_user'));
        $idVendor = $datauser['id_userfk'];
        $dateNow = date('Y-m-d H:i:s');

        $berkas = $this->upload_portfolio();
        if (!$berkas) {
            return false;
        } else {
            $dataUpload = array(
                'gambar' => $berkas,
                'id_vendor' => $datauser['id_vendor'],
                'keterangan' => $this->input->post('keterangan'),
                'create_date' => $dateNow
            );
            // Query untuk insert ke DB

            // $this->db->where('id_vendor', $idVendor);
            $insertGambar = $this->db->insert('portfolio', $dataUpload);
            // var_dump($idVendor);
            // die();
            if ($insertGambar) {
                $this->session->set_flashdata('success', 'Berhasil Diubah');
                redirect('Vendor_admin/portfolio');
            } else {
                $this->session->set_flashdata('gagal', 'Data Berhasil Diubah');
                redirect('Vendor_admin/portfolio');
            }
        }
    }

    // Function Upload
    public function upload_portfolio()
    {
        $namaFile = $_FILES['berkas']['name'];
        $ukuranFile = $_FILES['berkas']['size'];
        $error = $_FILES['berkas']['error'];
        $tmpName = $_FILES['berkas']['tmp_name'];

        // Cek upload gambar
        if ($error === 4) {
            echo "<script>
            alert('Tidak Ada Gambar Yang Dipilih!');
          </script>";
            return false;
        }

        // Cek validasi gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        // echo $namaFile;
        // die();
        // Cek ekstensi gambar
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
            alert('File Yang Dimasukkan Bukan Gambar!');
          </script>";
            return false;
        }

        // Cek size gambar
        if ($ukuranFile > 5000000) {
            echo "<script>
            alert('Ukuran Gambar Melebihi 5 Mb!');
          </script>";
            return false;
        }

        // Generate nama gambar
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        // Pindah direktori
        move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
        return $namaFileBaru;
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

    public function pesanan_detail($id)
    {
        $data['title'] = 'Konfirmasi Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail_pesanan'] = $this->Pesanan_model->getPesananCetakById($id);

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('vendor_admin/pesanan_detail', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function cetak_pesanan($id)
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'GardenBuana | Pesanan';
            $data['trx_pesanan'] = $this->Pesanan_model->getPesananCetakById($id);
            $data['info_web'] = $this->Admin_model->getInfoWeb();
            $data['session'] = $this->session->all_userdata();

            $this->load->view('templates/header', $data);
            $this->load->view('user_admin/cetak_pesanan', $data);
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

    public function detail_pesanan($id)
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'GardenBuana | Pesanan';
            $data['trx_pesanan'] = $this->Pesanan_model->getPesananById($id);
            $data['info_web'] = $this->Admin_model->getInfoWeb();
            $data['session'] = $this->session->all_userdata();

            $data['list_nego'] = $this->db->query("select * from list_nego_pesanan where id_pesanan = '$id'")->result_array();

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

    /* PESANAN BUKTI BAYAR */
    public function pesanan_bukti_bayar()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Pesanan Bukti Bayar';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->session->userdata("id_user");

            $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            $getVendorId = $getVendor->id_vendor;

            $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $getVendorId . " AND id_status_trans = 3")->result_array();

            // echo "<pre>";print_r($data['trx_pesanan']);exit();

            $data['session'] = $this->session->all_userdata();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/pesanan_bukti_bayar', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function konfirmasi_bukti_bayar()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Konfirmasi Pembayaran';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $id = $this->session->userdata("id_user");
            $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            $getVendorId = $getVendor->id_vendor;
            $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $getVendorId . " AND id_status_trans = 3")->result_array();
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

    public function konfirmasi_pekerjaan()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Konfirmasi Pekerjaan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $id = $this->session->userdata("id_user");
            $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            $getVendorId = $getVendor->id_vendor;
            $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $getVendorId . " AND id_status_trans = 6 OR id_status_trans = 7")->result_array();

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

    public function detail_konfirmasi_pengerjaan($id)
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'GardenBuana | Pesanan';
            $data['trx_pesanan'] = $this->Pesanan_model->getPesananById($id);
            $data['info_web'] = $this->Admin_model->getInfoWeb();
            $data['session'] = $this->session->all_userdata();

            $data['list_nego'] = $this->db->query("select * from list_nego_pesanan where id_pesanan = '$id'")->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('transaksi/detail_konfirmasi_pengerjaan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect("home");
        }
    }

    public function upd_konfirmasi_pengerjaan()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data = $this->input->post();
            $pengerjaan = $this->uploadPengerjaan();
            $dateNow = date('Y-m-d H:i:s');

            $dataUpload = array(
                'id_pesanan' => $this->input->post('id_pesanan'),
                'gambar_pengerjaan' => $pengerjaan,
                'tanggal_pengerjaan' => $this->input->post('tanggal'),
                'keterangan' => $this->input->post('keterangan'),
                'created_date' => $dateNow
            );

            // var_dump($dataUpload);
            // die();

            $insertPengerjaan = $this->db->insert('trx_pengerjaan', $dataUpload);
            $query = $this->db->query("UPDATE trx_pesanan SET id_status_trans = 7 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");
            $query = $this->db->query("UPDATE trx_pesanan SET id_status_tarik = 1 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");

            if ($query || $insertPengerjaan) {
                $this->session->set_flashdata('success', 'Data Berhasil Diubah');
                redirect('vendor_admin/konfirmasi_pekerjaan');
            }
        } else {
            redirect("vendor_admin/konfirmasi_pekerjaan");
        }
    }

    public function uploadPengerjaan()
    {
        $namaFile = $_FILES['gambarPengerjaan']['name'];
        $ukuranFile = $_FILES['gambarPengerjaan']['size'];
        $error = $_FILES['gambarPengerjaan']['error'];
        $tmpName = $_FILES['gambarPengerjaan']['tmp_name'];

        // Cek upload gambar
        if ($error === 4) {
            echo "<script>
				alert('Tidak Ada Gambar Yang Dipilih!');
			  </script>";
            return false;
        }

        // Cek validasi gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        // echo $namaFile;
        // die();
        // Cek ekstensi gambar
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
				alert('File Yang Dimasukkan Bukan Gambar!');
			  </script>";
            return false;
        }

        // Cek size gambar
        if ($ukuranFile > 5000000) {
            echo "<script>
				alert('Ukuran Gambar Melebihi 5 Mb!');
			  </script>";
            return false;
        }

        // Generate nama gambar
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        // Pindah direktori
        move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
        return $namaFileBaru;
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['trx_pesanan'] = $this->Admin_model->getAllPesanan();

        $id = $this->session->userdata("id_user");
        $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
        $getVendorId = $getVendor->id_vendor;
        $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $getVendorId . " AND id_status_trans >= 8")->result_array();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('vendor_admin/riwayat_transaksi', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function detail_riwayat_pesanan($id)
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['title'] = 'Riwayat Transaksi';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // $id = $this->db->get_where('pelanggan', ['id_userfk' => $this->session->userdata('id_user')])->row('id_pelanggan');

            $data['riwayat'] = $this->Vendor_model->getRiwayatById($id);
            $data['data_pengerjaan'] = $this->Vendor_model->getPengerjaanById($id);
            // $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
            // $getVendorId = $getVendor->id_pelanggan;

            // $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_pelanggan = " . $getVendorId . " AND id_status_trans = 5")->result_array();

            $this->load->view('templates/vendor_header', $data);
            $this->load->view('templates/vendor_sidebar', $data);
            $this->load->view('templates/vendor_topbar', $data);
            $this->load->view('vendor_admin/detail_riwayat_pesanan', $data);
            $this->load->view('templates/vendor_footer');
        } else {
            redirect("home");
        }
    }

    public function cetak_riwayat_pesanan($id)
    {
        $data['title'] = 'Riwayat Transaksi';
        $data['riwayat'] = $this->Vendor_model->getRiwayatById($id);
        $data['data_pengerjaan'] = $this->Vendor_model->getPengerjaanById($id);
        $this->load->view('templates/vendor_header', $data);
        $this->load->view('vendor_admin/cetak_riwayat_pesanan', $data);
    }

    public function invoice($id)
    {
        if ($this->session->userdata("role_id") == 1) {
            $data['trx_pesanan'] = $this->Pesanan_model->getPesananById($id);
            $data['info_web'] = $this->Admin_model->getInfoWeb();
            $data['session'] = $this->session->all_userdata();

            $this->load->view('user_admin/invoice');
        } else {
            redirect("home");
        }
    }

    public function tarik_dana()
    {
        $data['title'] = 'Tarik Dana';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->session->userdata("id_user");
        $getVendor = $this->db->query('select * from vendor where id_userfk = ' . $id)->row();
        $getVendorId = $getVendor->id_vendor;

        $data['tarik_dana'] = $this->Vendor_model->getTarikDanaVendor($getVendorId);
        $data['tarik_dana_id'] = $this->Vendor_model->getTarikDanaById($getVendorId);
        // $data['trx_pesanan'] = $this->db->query("select * from list_pesanan_vendor where id_vendor = " . $getVendorId . " AND id_status_trans = 8")->result_array();

        $this->load->view('templates/vendor_header', $data);
        $this->load->view('templates/vendor_sidebar', $data);
        $this->load->view('templates/vendor_topbar', $data);
        $this->load->view('vendor_admin/tarik_dana', $data);
        $this->load->view('templates/vendor_footer');
    }

    public function update_tarik_dana()
    {
        $dateNow = date('Y-m-d H:i:s');
        $idPesanan = $this->input->post('id_pesanan');
        $dataTarik = [
            'id_pesanan' => $this->input->post('id_pesanan'),
            'id_vendor' => $this->input->post('id_vendor'),
            'rekening' => $this->input->post('rekening'),
            'bank' => $this->input->post('bank'),
            'pemilik' => $this->input->post('pemilik'),
            'create_date' => $dateNow
        ];

        $query = $this->db->query("UPDATE trx_pesanan SET id_status_tarik = 2 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");

        $queryTarik = $this->db->insert('rekening_tarik', $dataTarik);
        if ($dataTarik) {
            $this->session->set_flashdata('success', 'Berhasil Diubah');
            redirect('Vendor_admin/tarik_dana');
        } else {
            $this->session->set_flashdata('gagal', 'Data Berhasil Diubah');
            redirect('Vendor_admin/tarik_dana');
        }
    }

    public function update_testimoni()
    {
        if ($this->session->userdata("role_id") == 1) {
            $data = $this->input->post();

            $query = $this->db->query("UPDATE trx_testimoni SET status_tampil = 2 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");

            if ($query) {
                $this->session->set_flashdata('success', 'Data Berhasil Diubah');
                redirect('vendor_admin/pesanan');
            }
        } else {
            redirect("home");
        }
    }
}
