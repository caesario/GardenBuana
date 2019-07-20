<!-- Begin Page Content -->
<div class="container-fluid bg-white px-5 pt-4">

  <div class="row">
    <div class="col-6">
      <h3 class="text-dark"><?= $title; ?></h3>
    </div>
    <div class="col-6">
      <a href="<?= base_url('Vendor_admin/edit_password'); ?>" class="btn btn-sm float-right btn-danger rounded-0">Ubah Password</a>
      <a href="<?= base_url('Vendor_admin/editProfil'); ?>" class="btn btn-sm float-right btn-primary gb-btn-order rounded-0 mr-2">Edit Profil</a>
    </div>
  </div>

  <!-- <?php var_dump(time()); ?> -->
  <!-- <?php var_dump($_SESSION); ?> -->

  <hr class="mt-0">

  <div class="row">
    <div class="col-6 col-lg-9">
      <h6 class="mb-0 text-dark font-weight-bold">Nama</h6>
      <p class="text-dark"><?= $user['name']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Nama Vendor</h6>
      <p class="text-dark"><?= $vendor['nama_vendor']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Email</h6>
      <p class="text-dark"><?= $vendor['email']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Nomor Telpon</h6>
      <p class="text-dark"><?= $vendor['telpon']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Kota</h6>
      <p class="text-dark"><?= $vendor['nama_kota']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Alamat</h6>
      <p class="text-dark"><?= $vendor['alamat']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Informasi Vendor</h6>
      <p class="text-dark"><?= $vendor['info_vendor']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Status Akun</h6>
      <p class="text-dark"><?= $vendor['nama_status']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Bergabung Pada</h6>
      <p class="text-dark"><?= $vendor['date_created']; ?></p>
    </div>
    <div class="col-6 col-lg-3">
      <div class="float-right">
        <img class="card-img-top p-3 gb-img-size-profil mb-3 border rounded-0" src="<?= base_url('assets/img/'); ?><?= $vendor['logo']; ?>" alt="Card image cap">
      </div>
    </div>
  </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->