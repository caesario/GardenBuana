<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col pb-0">
      <h4 class="h4 mb-0 text-gray-800 float-left"><?= $title; ?></h4>
    </div>
    <div class="col">
      <a href="<?= site_url('report/testimoni'); ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="mr-2 fas fa-arrow-left"></i>Kembali</a>
    </div>
  </div>


  <!-- <?php var_dump($detail_testimoni); ?> -->
  <div class="row">
    <div class="col-6 col-lg-9">
      <h6 class="mb-0 text-dark font-weight-bold">ID Pesanan</h6>
      <p class="text-dark">TRX-0<?= $detail_testimoni['id_pesanan']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Nama Pelanggan</h6>
      <p class="text-dark"><?= $detail_testimoni['nama_pemesan']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Vendor</h6>
      <p class="text-dark"><?= $detail_testimoni['nama_vendor']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Status</h6>
      <p class="text-dark"><?= $detail_testimoni['testimoni']; ?></p>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->