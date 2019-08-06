<!--==========================
      Clients Section
    ============================-->
<section id="clients" class="section-bg">
  <div class="container wow fadeInUp mt-5">
    <section class="bg-white px-5 py-4 rounded-0">
      <div class="section-header">
        <h5 class="text-center font-weight-bold">Konfirmasi Pekerjaan Selesai</h5>
      </div>

      <!-- <?php var_dump($trx_pesanan); ?> -->

      <div class="card rounded-0">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h6 class="font-weight-bold my-0">ID Pesanan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['id_pesanan']; ?></p>
            </div>
            <div class="col-6">
              <button class="btn btn-sm btn-new gb-btn-order float-right rounded-0 ml-1" data-toggle="modal" data-target="#exampleModal">Konfirmasi Selesai</button>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="row text-center">
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Nama Pesanan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['nama_pemesan']; ?></p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Tanggal Pesanan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['tanggal_pengerjaan']; ?></p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Nomor Telpon</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['telpon']; ?></p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Email</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['email']; ?></p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Alamat</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['alamat']; ?></p>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col mt-5">
              <h6 class="font-weight-bold my-0 text-center">Keterangan</h6>
              <p class="my-0 gb-font-small px-5 text-center"><?= $trx_pesanan['keterangan']; ?></p>
            </div>
          </div>
        </div>
      </div>


      <div class="mt-4 mb-3">
        <h5 class="font-weight-bold mb-0">Konfirmasi Pekerjaan Selesai</h5>
        <!-- <h3 class="display-6 mb-3">Rp. <?= number_format($trx_pesanan['harga'], 0, ".", ".") ?>,-</h3> -->
      </div>

      <form action="<?= site_url('vendor_admin/upd_konfirmasi_pengerjaan'); ?>" method="post" enctype="multipart/form-data">

        <div class="mt-4 pt-1">
          <h6 class="font-weight-bold mb-2">Upload Hasil Pekerjaan</h6>
          <input type="file" class="form-control-file btn-sm gb-font-small mb-3" id="gambarPengerjaan" name="gambarPengerjaan" value="HARDCODE">
          <input type="hidden" name="id_pesanan" value="<?= $trx_pesanan['id_pesanan']; ?>">
          <p class="gb-font-small mb-2">Tanggal Pekerjaan</p>
          <input type="date" name="tanggal" value="" required>
          <p class="gb-font-small mb-2 mt-3">Keterangan Pekerjaan</p>
          <textarea name="keterangan" id="" cols="40" rows="3" class="gb-font-small mb-3" required></textarea>
          <br>
          <button class="btn btn-sm btn-new gb-btn-order rounded-0">Konfirmasi Selesai</button>
        </div>
      </form>
  </div>

  </div>


</section>