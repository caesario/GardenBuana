<!-- Begin Page Content -->
<div class="container-fluid bg-white px-5 pt-4">

  <div class="row">
    <div class="col-6">
      <h3 class="text-dark">Profil Vendor</h3>
    </div>
    <div class="col-6">
      <a href="<?= base_url('Vendor_admin/profil'); ?>" class="btn btn-sm float-right btn-danger rounded-0">Kembali</a>
      <!-- <button class="btn btn-sm float-right btn-primary gb-btn-order rounded-0 mr-2">Edit Profil</button> -->
    </div>
  </div>

  <!-- <?php var_dump($vendor); ?> -->

  <hr class="mt-0">

  <div class="row">
    <div class="col-6 col-lg-9">
      <form action="">
        <h6 class="mb-0 text-dark font-weight-bold">Nama</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" type="text" value="<?= $vendor['name']; ?>">
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Nama Vendor</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" type="text" value="<?= $vendor['nama_vendor']; ?>">
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Email</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" type="text" value="<?= $vendor['email']; ?>" readonly>
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Nomor Telpon</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" type="text" value="<?= $vendor['telpon']; ?>">
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Kota</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" type="text" value="<?= $vendor['nama_kota']; ?>">
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Informasi Vendor</h6>
        <div class="col-5 p-0 form-group">
          <textarea class="form-control mt-1 mb-3 rounded-0" type="text" value="<?= $vendor['info_vendor']; ?>"></textarea>
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Status Akun</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" type="text" value="<?= $vendor['nama_status']; ?>">
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Bergabung Pada</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" type="text" value="<?= $vendor['date_created']; ?>" readonly>
        </div>

        <button type="submit" name="update" class="btn btn-sm btn-primary gb-btn-order rounded-0">Update Data</button>
      </form>
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