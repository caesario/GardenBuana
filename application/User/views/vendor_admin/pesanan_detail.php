<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4> -->

  <!-- <?php var_dump($detail_pesanan); ?> -->

  <div class="row container pr-0">
    <div class="col">
      <a href="<?= site_url('vendor_admin/konfirmasi_bukti_bayar'); ?>" class="btn btn-primary btn-sm rounded-0"><i class="mr-2 fas fa-arrow-left"></i>Kembali</a>
    </div>
    <div class="col">
      <a href="<?= site_url('vendor_admin/cetak_pesanan/'); ?><?= $detail_pesanan['id_pesanan']; ?>" class="btn btn-primary btn-sm float-right ml-1 rounded-0">Cetak Pesanan<i class="ml-2 fas fa-print"></i></a>
    </div>

  </div>

  <!--==========================
      Clients Section
    ============================-->
  <section id="clients" class="section-bg">

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
                <p class="my-0 gb-font-small"><?= $detail_pesanan['id_pesanan']; ?></p>
              </div>
              <div class="col-6">
                <h6 class="font-weight-bold my-0 text-right">Nama Vendor</h6>
                <p class="my-0 gb-font-small text-right"><?= $detail_pesanan['nama_vendor']; ?></p>
              </div>
            </div>

          </div>
          <div class="card-body">
            <div class="row text-center">
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Nama Pesanan</h6>
                <p class="my-0 gb-font-small"><?= $detail_pesanan['nama_pemesan']; ?></p>
              </div>
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Tanggal Pengerjaan</h6>
                <p class="my-0 gb-font-small"><?= $detail_pesanan['tanggal_pengerjaan']; ?></p>
              </div>
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Nomor Telpon</h6>
                <p class="my-0 gb-font-small"><?= $detail_pesanan['telpon']; ?></p>
              </div>
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Email</h6>
                <p class="my-0 gb-font-small"><?= $detail_pesanan['email']; ?></p>
              </div>
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Alamat</h6>
                <p class="my-0 gb-font-small"><?= $detail_pesanan['alamat']; ?></p>
              </div>
              <div class="col-4 mt-5">
                <h6 class="font-weight-bold my-0">Harga</h6>
                <p class="my-0 gb-font-small">Rp. <?= number_format($detail_pesanan['harga'], 0, ".", ".") ?>,-</p>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col mt-5">
                <h6 class="font-weight-bold my-0 text-center">Status</h6>
                <p class="my-0 gb-font-small px-5 text-center"><?= $detail_pesanan['nama_status']; ?></p>
              </div>
              <div class="col mt-5">
                <h6 class="font-weight-bold my-0 text-center">Keterangan</h6>
                <p class="my-0 gb-font-small px-0 text-center"><?= $detail_pesanan['keterangan']; ?></p>
              </div>
              <div class="col mt-5">
                <h6 class="font-weight-bold my-0 text-center">Tanggal Pesanan</h6>
                <p class="my-0 gb-font-small px-5 text-center"><?= $detail_pesanan['createTime']; ?></p>
              </div>
            </div>
          </div>
        </div>
    </div>

  </section>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->