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

  public function batal_pesanan()
  {
    // $data = array(
    //   'id_pesanan' => $this->input->post('id_pesanan'),
    //   'id_status_trans' => $this->input->post('batal'),
    //   'created_date' => date('Y-m-d H:i:s')
    // );

    // var_dump($data);
    // die();

    $query = $this->db->query("UPDATE trx_pesanan SET id_status_trans = 11 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");

    if ($query) {
      $this->session->set_flashdata('success', 'Data Berhasil Diubah');
      redirect('user_admin/pesanan');
    } else {
      redirect('transaksi/pesanan');
    }
  }

  public function batal_pesanan_vendor()
  {

    $query = $this->db->query("UPDATE trx_pesanan SET id_status_trans = 12 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");

    if ($query) {
      $this->session->set_flashdata('success', 'Data Berhasil Diubah');
      redirect('user_admin/pesanan');
    } else {
      redirect('transaksi/pesanan');
    }
  }

  public function nego_pesan()
  {
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

    if ($this->input->post('type') == 'P') {
      $redirect = "transaksi/pesanan/";
    } else {
      $redirect = "vendor_admin/detail_pesanan/";
    }

    $insert = $this->db->insert('trx_nego', $data_insert);
    if ($insert) {
      $this->session->set_flashdata('success', 'Success');
      redirect($redirect . $this->input->post('id_pesanan'));
    } else {
      $this->session->set_flashdata('success', 'Success');
      redirect($redirect . $this->input->post('id_pesanan'));
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

  public function update_bukti_bayar()
  {
    $buktiBayar = $this->uploadGambar();
    if (!$buktiBayar) {
      redirect('transaksi/konfirmasi_bukti/' . $this->input->post('id_pesanan'), 'refresh');
      return false;
    } else {
      $data = $this->input->post();

      // echo "<pre>";print_r($data);exit();Untuk pembayaran jasa Delima Garden atas nama Natalia


      $queryInsert = $this->db->query("INSERT INTO trx_bukti_bayar (id_pesanan,id_pelanggan,id_vendor,upload,keterangan_bayar,id_status_trans, create_date_bayar) values 
            ('" . $this->input->post('id_pesanan') . "', '" . $this->input->post('id_pelanggan') . "', '" . $this->input->post('id_vendor') . "', '" . $buktiBayar . "', '" . $this->input->post('keterangan') . "',
            '3', '" . date('Y-m-d H:i:s') . "')
            ");
      // var_dump($query);
      // die();
      if ($queryInsert) {
        $query = $this->db->query("UPDATE trx_pesanan SET id_status_trans = 3 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");

        if ($query) {
          $this->session->set_flashdata('success', 'Success');
          redirect('user_admin/pesanan');
        }
      } else {
        $this->session->set_flashdata('error', 'Failed');
        redirect('home');
      }
    }
  }

  function uploadBuktiBayar()
  {

    $buktiBayar = $this->uploadGambar();
    if (!$buktiBayar) {
      return false;
    } else {
      $datalogo = array(
        'id_pesanan' => $this->input->post('id_pesanan'),
        'upload' => $buktiBayar,
        'keternagan_bayar' => $this->input->post('keterangan')
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

  public function uploadGambar()
  {
    $namaFile = $_FILES['buktiBayar']['name'];
    $ukuranFile = $_FILES['buktiBayar']['size'];
    $error = $_FILES['buktiBayar']['error'];
    $tmpName = $_FILES['buktiBayar']['tmp_name'];

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


  public function konfirmasi_pekerjaan($id)
  {
    $data['title'] = 'GardenBuana | Pesanan';
    $data['trx_pesanan'] = $this->Pesanan_model->getKonfirmasiById($id);
    $data['data_pengerjaan'] = $this->Pesanan_model->getPengerjaanById($id);
    $data['info_web'] = $this->Admin_model->getInfoWeb();
    $data['session'] = $this->session->all_userdata();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('transaksi/konfirmasi_pekerjaan', $data);
    $this->load->view('templates/footer', $data);
  }

  public function update_konfirmasi_pekerjaan()
  {
    $dateNow = date('Y-m-d H:i:s');
    $data_testimoni = array(
      'id_pesanan' => $this->input->post('id_pesanan'),
      'id_pelanggan' => $this->input->post('id_pelanggan'),
      'id_vendor' => $this->input->post('id_vendor'),
      'testimoni' => $this->input->post('testimoni'),
      'status_tampil' => 0,
      'create_date' => $dateNow
    );

    $data_penilaian = array(
      'id_pesanan' => $this->input->post('id_pesanan'),
      'id_pelanggan' => $this->input->post('id_pelanggan'),
      'id_vendor' => $this->input->post('id_vendor'),
      'penilaian' => $this->input->post('penilaian'),
      'create_date' => $dateNow
    );

    $queryTestimoni = $this->db->insert('trx_testimoni', $data_testimoni);
    $queryPenilaian = $this->db->insert('penilaian', $data_penilaian);
    $query = $this->db->query("UPDATE trx_pesanan SET id_status_trans = 8 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");

    if ($queryTestimoni && $queryPenilaian == TRUE) {
      $this->session->set_flashdata('success', 'Success');
      redirect('user_admin/riwayat_pesanan');
    } else {
      $this->session->set_flashdata('error', 'Failed');
      redirect('user_admin/pesanan');
    }
  }

  public function update_komplain()
  {
    $gambar = $this->gambarKomplain();
    $dateNow = date('Y-m-d H:i:s');
    $data_komplain = array(
      'id_pesanan' => $this->input->post('id_pesanan'),
      'id_pelanggan' => $this->input->post('id_pelanggan'),
      'id_vendor' => $this->input->post('id_vendor'),
      'keterangan' => $this->input->post('keterangan'),
      'gambar_komplain' => $gambar,
      'status_komplain' => 1,
      'create_date' => $dateNow
    );

    // var_dump($data_komplian);
    // die();

    $insertKomplain = $this->db->insert('komplain', $data_komplain);
    $query = $this->db->query("UPDATE trx_pesanan SET id_status_trans = 4 where id_pesanan = '" . $this->input->post('id_pesanan') . "' ");

    if ($insertKomplain) {
      $this->session->set_flashdata('success', 'Success');
      redirect('user_admin/pesanan');
    } else {
      $this->session->set_flashdata('error', 'Failed');
      redirect('user_admin/pesanan');
    }
  }

  public function gambarKomplain()
  {
    $namaFile = $_FILES['gambarKomplain']['name'];
    $ukuranFile = $_FILES['gambarKomplain']['size'];
    $error = $_FILES['gambarKomplain']['error'];
    $tmpName = $_FILES['gambarKomplain']['tmp_name'];

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

  public function detai_riwayat()
  {
    $data['title'] = 'Detail Riwayat';
    $data['info_web'] = $this->Admin_model->getInfoWeb();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('transaksi/detail_riwayat', $data);
    $this->load->view('templates/footer', $data);
  }
}
