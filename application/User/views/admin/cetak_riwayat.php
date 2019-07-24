<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4> -->

  <!-- <?php var_dump($detail_pesanan); ?> -->

  <!--==========================
      Clients Section
    ============================-->
  <section id="clients" class="section-bg">

    <a href="javascript:window.print()" class="btn btn-primary text-white btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>
    <div class="container wow fadeInUp mt-3">
      <section class="bg-white px-5 py-4 rounded-0">
        <div class="section-header">
          <h5 class="text-center font-weight-bold">Detail Pesanan</h5>
        </div>

        <div class="card rounded-0">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h6 class="font-weight-bold my-0">ID Pesanan</h6>
                <p class="my-0 gb-font-small"><?= $history['id_pesanan']; ?></p>
              </div>
              <div class="col-6">
                <h6 class="font-weight-bold my-0 text-right">Nama Vendor</h6>
                <p class="my-0 gb-font-small text-right"><?= $history['nama_vendor']; ?></p>
              </div>
            </div>

          </div>
          <div class="card-body">
            <div class="row text-center">
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Nama Pesanan</h6>
                <p class="my-0 gb-font-small"><?= $history['nama_pemesan']; ?></p>
              </div>
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Tanggal Pengerjaan</h6>
                <p class="my-0 gb-font-small"><?= $history['tanggal_pengerjaan']; ?></p>
              </div>
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Nomor Telpon</h6>
                <p class="my-0 gb-font-small"><?= $history['telpon']; ?></p>
              </div>
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Email</h6>
                <p class="my-0 gb-font-small"><?= $history['email']; ?></p>
              </div>
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Alamat</h6>
                <p class="my-0 gb-font-small"><?= $history['alamat']; ?></p>
              </div>
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Harga</h6>
                <p class="my-0 gb-font-small">Rp. <?= number_format($history['harga'], 0, ".", ".") ?>,-</p>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col mt-5">
                <h6 class="font-weight-bold my-0 text-center">Status</h6>
                <p class="my-0 gb-font-small px-5 text-center"><?= $history['nama_status']; ?></p>
              </div>
              <div class="col mt-5">
                <h6 class="font-weight-bold my-0 text-center">Keterangan</h6>
                <p class="my-0 gb-font-small px-0 text-center"><?= $history['keterangan']; ?></p>
              </div>
              <div class="col mt-5">
                <h6 class="font-weight-bold my-0 text-center">Tanggal Pesanan</h6>
                <p class="my-0 gb-font-small px-5 text-center"><?= $history['createTime']; ?></p>
              </div>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col">
            <h6 class="text-left font-weight-bold">Bukti Pembayaran</h6>
            <img src="<?= base_url('assets/img/'); ?><?= $history['upload']; ?>" style="width:300px; height: 300px;">
            <p class="my-0 gb-font-small mt-2 text-left">*Note <br><?= $history['keterangan_bayar']; ?></p>
          </div>
          <div class="col">
            <h6 class="text-left font-weight-bold">Hasil Pekerjaan</h6>
            <img src="<?= base_url('assets/img/'); ?><?= $history['gambar_pengerjaan']; ?>" style="width:300px; height: 300px;">
            <p class="my-0 gb-font-small mt-2 text-left">*Note <br><?= $history['keterangan']; ?></p>
          </div>
        </div>
    </div>

  </section>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->