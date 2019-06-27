<!-- Begin Page Content -->
<div class="container-fluid bg-white px-5 pt-4">

  <div class="row">
    <div class="col-6">
      <h3 class="text-dark"><?= $title; ?></h3>
    </div>
    <div class="col-6">
      <a href="<?= base_url('Vendor_admin/edit_verifikasi'); ?>" class="btn btn-sm float-right btn-primary gb-btn-order rounded-0 mr-2"><i class="fas fa-cogs mr-2"></i>Edit Data</a>
    </div>
  </div>

  <!-- <?php var_dump(time()); ?> -->
  <?php var_dump($verif); ?>

  <hr class="mt-0">

  <div class="row">
    <div class="col-6 col-lg-9">
      <h6 class="mb-0 text-dark font-weight-bold">No KTP</h6>
      <p class="text-dark"><?= $verif['ktp']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">No NPWP</h6>
      <p class="text-dark"><?= $verif['npwp']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Status</h6>
      <p class="text-dark"><?= $verif['nama_status_verif']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Keterangan</h6>
      <p class="text-dark"><?= $verif['keterangan']; ?></p>

      <!-- <h6 class="mb-0 text-dark font-weight-bold">Diupload Pada</h6>
      <p class="text-dark"><?= $verif['create_date']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Diubah Pada</h6>
      <p class="text-dark"><?= $verif['edit_date']; ?></p> -->
    </div>
  </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->