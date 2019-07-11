<!-- Begin Page Content -->

<!-- <?php var_dump($buktibayar); ?> -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col pb-0">
      <h4 class="h4 mb-0 text-gray-800 float-left"><?= $title; ?></h4>
    </div>
    <div class="col">
      <a href="<?= site_url('report/invoice/'); ?><?= $buktibayar['id_pesanan']; ?>" class="btn btn-success btn-sm mb-3 float-right ml-2">Cetak Invoice<i class="ml-2 fas fa-print"></i></a>
      <a href="<?= site_url('report/buktibayar'); ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="mr-2 fas fa-arrow-left"></i>Kembali</a>
    </div>
  </div>



  <div class="row">
    <div class="col-6 col-lg-9">
      <h6 class="mb-0 text-dark font-weight-bold">ID Pesanan</h6>
      <p class="text-dark"><?= $buktibayar['id_pesanan']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Keterangan</h6>
      <p class="text-dark"><?= $buktibayar['keterangan_bayar']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Status</h6>
      <p class="text-dark"><?= $buktibayar['nama_status']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Tanggal Pembayaran</h6>
      <p class="text-dark"><?= $buktibayar['create_date_bayar']; ?></p>
    </div>
    <div class="col-6 col-lg-3">
      <div class="float-right">
        <img class="card-img-top p-3 gb-img-size mb-3 border rounded-0" src="<?= base_url('assets/img/'); ?><?= $buktibayar['upload']; ?>" alt="Card image cap">
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->