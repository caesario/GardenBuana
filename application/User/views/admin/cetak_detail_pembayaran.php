<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4> -->

  <!--==========================
      Clients Section
    ============================-->
  <section id="clients" class="">

    <div class="container wow fadeInUp">
      <section class="bg-white px-5 mt-5 rounded-0">
        <div class="section-header">
          <h5 class="text-center font-weight-bold">Konfirmasi Bukti Bayar</h5>
        </div>

        <div class="card rounded-0">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h6 class="font-weight-bold my-0">ID Pesanan</h6>
                <p class="my-0 gb-font-small"><?= $trx_pesanan['id_pesanan']; ?></p>
              </div>
              <div class="col-6">
                <h6 class="font-weight-bold my-0 text-right">Nama Vendor</h6>
                <p class="my-0 gb-font-small text-right"><?= $trx_pesanan['nama_vendor']; ?></p>
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
                <h6 class="font-weight-bold my-0">Tanggal Pengerjaan</h6>
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
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Harga</h6>
                <p class="my-0 gb-font-small">Rp. <?= number_format($trx_pesanan['harga'], 0, ".", ".") ?>,-</p>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col mt-5">
                <h6 class="font-weight-bold my-0 text-center">Status</h6>
                <p class="my-0 gb-font-small px-5 text-center"><?= $trx_pesanan['nama_status']; ?></p>
              </div>
              <div class="col mt-5">
                <h6 class="font-weight-bold my-0 text-center">Keterangan</h6>
                <p class="my-0 gb-font-small px-0 text-center"><?= $trx_pesanan['keterangan']; ?></p>
              </div>
              <div class="col mt-5">
                <h6 class="font-weight-bold my-0 text-center">Tanggal Pesanan</h6>
                <p class="my-0 gb-font-small px-5 text-center"><?= $trx_pesanan['createTime']; ?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-4">
          <h6 class="font-weight-bold mb-2">Bukti Pembayaran</h6>
          <img class="card-img-top col-3 p-3 gb-img-size mb-3 border rounded-0" src="<?= base_url('assets/img/'); ?><?= $bukti_bayar['upload']; ?>" alt="">
          <p class="gb-font-small col-6 p-0 mb-3"><?= $bukti_bayar['keterangan_bayar']; ?></p>
          <input type="hidden" name="id_pesanan" value="<?= $trx_pesanan['id_pesanan']; ?>">
        </div>
    </div>

  </section>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->