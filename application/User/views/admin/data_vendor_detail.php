<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col pb-0">
      <h4 class="h4 mb-0 text-gray-800 float-left"><?= $title; ?></h4>
    </div>
    <div class="col">
      <a href="<?= site_url('report/data_vendor'); ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="mr-2 fas fa-arrow-left"></i>Kembali</a>
    </div>
  </div>

  <!-- <?php var_dump($vendor); ?> -->
  <div class="row">
    <div class="col-6 col-lg-9">
      <h6 class="mb-0 text-dark font-weight-bold">Nama Vendor</h6>
      <p class="text-dark"><?= $vendor['nama_vendor']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Telpon</h6>
      <p class="text-dark"><?= $vendor['telpon']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Kota</h6>
      <p class="text-dark"><?= $vendor['nama_kota']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Alamat</h6>
      <p class="text-dark"><?= $vendor['alamat']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Bergabung Tanggal</h6>
      <p class="text-dark"><?= $vendor['createTime']; ?></p>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->