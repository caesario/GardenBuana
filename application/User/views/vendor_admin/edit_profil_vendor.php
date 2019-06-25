<!-- Begin Page Content -->
<div class="container-fluid bg-white px-5 pt-4">

  <div class="row">
    <div class="col-6">
      <h3 class="text-dark"><?= $title; ?></h3>
    </div>
    <div class="col-6">
      <a href="<?= base_url('Vendor_admin/profil'); ?>" class="btn btn-sm float-right btn-danger rounded-0">Kembali</a>
      <!-- <button class="btn btn-sm float-right btn-primary gb-btn-order rounded-0 mr-2">Edit Profil</button> -->
    </div>
  </div>

  <!-- <?php var_dump($data); ?> -->

  <hr class="mt-0">

  <div class="row">
    <div class="col-6 col-lg-9">
      <form action="<?= site_url('Vendor_admin/updateEditProfil'); ?>" method="post">
        <h6 class="mb-0 text-dark font-weight-bold">Nama</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" name="nama" type="text" value="<?= $user['name']; ?>">
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Nama Vendor</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" name="namaVendor" type="text" value="<?= $vendor['nama_vendor']; ?>">
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Email</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" name="email" type="text" value="<?= $vendor['email']; ?>" readonly>
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Nomor Telpon</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" name="noTelp" type="text" value="<?= $vendor['telpon']; ?>">
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Kota</h6>
        <div class="col-5 p-0 form-group">
          <select class="form-control" id="kota" name="kota">
            <?php foreach ($kota as $data) : ?>
              <?php var_dump($data); ?>
              <option value="<?= $data['id_kota']; ?>"><?= $data['nama_kota']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Alamat</h6>
        <div class="col-5 p-0 form-group">
          <textarea rows="3" class="form-control mt-1 mb-3 rounded-0" type="text" name="alamat" value=""><?= $vendor['alamat']; ?></textarea>
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Informasi Vendor</h6>
        <div class="col-5 p-0 form-group">
          <textarea rows="7" class="form-control mt-1 mb-3 rounded-0" type="text" name="infoVendor" value=""><?= $vendor['info_vendor']; ?></textarea>
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Status Akun</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" type="text" value="<?= $vendor['nama_status']; ?>" readonly>
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">Bergabung Pada</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" type="text" name="createTime" value="<?= $vendor['date_created']; ?>" readonly>
        </div>

        <button type="submit" name="update" class="btn btn-sm btn-primary gb-btn-order rounded-0">Update Data</button>
      </form>
    </div>

    <div class="col-6 col-lg-3">
      <form action="<?= site_url('Vendor_admin/ubahLogo'); ?>" method="post">
        <div class="float-right">
          <img class="card-img-top p-3 gb-img-size mb-3 border rounded-0" src="<?= base_url('assets/img/clients/client-3.png'); ?>" alt="Card image cap">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0 border-0 p-0" name="fotoVendor" id="fotoVendor" type="file">
          <button type="submit" name="update" class="btn btn-sm btn-primary gb-btn-order rounded-0">Update Logo</button>
        </div>
      </form>
    </div>
  </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->