<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col pb-0">
      <h4 class="h4 mb-0 text-gray-800 float-left"><?= $title; ?></h4>
    </div>
    <div class="col">
      <a href="<?= site_url('admin/verif'); ?>" class="btn btn-primary btn-sm mb-3 float-right"><i class="mr-2 fas fa-arrow-left"></i>Kembali</a>
    </div>
  </div>


  <!-- <?php var_dump($pengguna); ?> -->
  <div class="row">
    <div class="col-6 col-lg-9">
      <h6 class="mb-0 text-dark font-weight-bold">Nama Pengguna</h6>
      <p class="text-dark"><?= $pengguna['name']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Email</h6>
      <p class="text-dark"><?= $pengguna['email']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Role</h6>
      <p class="text-dark"><?= $pengguna['nama_role']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Status</h6>
      <p class="text-dark"><?= $pengguna['nama_status']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Bergabung Tanggal</h6>
      <p class="text-dark"><?= $pengguna['date_created']; ?></p>
    </div>
    <!-- <div class="col-6 col-lg-3">
      <div class="float-right">
        <img class="card-img-top p-3 gb-img-size mb-3 border rounded-0" src="<?= base_url('assets/img/clients/client-3.png'); ?>" alt="Card image cap">
      </div>
    </div> -->
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->