<!-- Begin Page Content -->
<div class="container-fluid bg-white px-5 pt-4">

  <div class="row">
    <div class="col-6">
      <h3 class="text-dark">Profil Pengguna</h3>
    </div>
    <div class="col-6">
      <button class="btn btn-sm float-right btn-danger rounded-0">Ubah Password</button>
      <a href="<?= base_url('Vendor_admin/editProfil'); ?>" class="btn btn-sm float-right btn-primary gb-btn-order rounded-0 mr-2">Edit Profil</a>
    </div>
  </div>

  <!-- <?php var_dump($data_user); ?> -->

  <hr class="mt-0">

  <div class="row">
    <div class="col-6 col-lg-9">
      <h6 class="mb-0 text-dark font-weight-bold">Nama</h6>
      <p class="text-dark"><?= $data_user['name']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Email</h6>
      <p class="text-dark"><?= $data_user['email']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Nomor Telpon</h6>
      <p class="text-dark"><?= $data_user['telpon']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Alamat</h6>
      <p class="text-dark"><?= $data_user['alamat']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Informasi Vendor</h6>
      <p class="text-dark"><?= $data_user['info_vendor']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Status Akun</h6>
      <p class="text-dark"><?= $data_user['nama_status']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Bergabung Pada</h6>
      <p class="text-dark"><?= $data_user['date_created']; ?></p>
    </div>
    <div class="col-6 col-lg-3">
      <div class="float-right">
        <img class="card-img-top p-3 gb-img-size mb-3 border rounded-0" src="<?= base_url('assets/img/clients/client-3.png'); ?>" alt="Card image cap">
      </div>
    </div>
  </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->