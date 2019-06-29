<!--==========================
      Clients Section
    ============================-->

<section id="clients" class="section-bg">

  <div class="container wow fadeInUp mt-5">
    <section class="bg-white px-5 py-4 rounded-0">
      <div class="section-header">
        <h5 class="text-center font-weight-bold">Konfirmasi Bukti Bayar</h5>
        <!-- <?php var_dump($bukti_bayar); ?> -->
      </div>

      <div class="card rounded-0">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h6 class="font-weight-bold my-0">ID Pesanan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['id_pesanan']; ?></p>
            </div>
            <div class="col-6">
              <a href="<?= site_url('admin/konfirmasi_bukti_bayar'); ?>" class="btn btn-sm btn-primary gb-btn-order float-right rounded-0 ml-1">Kembali</a>
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

      <form action="<?= site_url('admin/upd_konfirmasi_pembayaran'); ?>" method="post">
        <div class="mt-4">
          <h6 class="font-weight-bold mb-2">Bukti Pembayaran</h6>
          <img class="card-img-top col-3 p-3 gb-img-size mb-3 border rounded-0" src="<?= base_url('assets/img/'); ?><?= $bukti_bayar['upload']; ?>" alt="Card image cap">
          <p class="gb-font-small col-6 p-0 mb-3"><?= $bukti_bayar['keterangan_bayar']; ?></p>
          <input type="hidden" name="id_pesanan" value="<?= $trx_pesanan['id_pesanan']; ?>">
          <button class="btn btn-sm btn-primary gb-btn-order rounded-0" type="submit">Konfirmasi Pembayaran</button>
        </div>
      </form>

  </div>

</section>