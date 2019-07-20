<!-- Begin Page Content -->
<div class="container-fluid bg-white px-5 pt-4">

  <?php if ($this->session->flashdata('success')) : ?>
    <div class="row mt-3">
      <div class="col">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Gambar <strong>Logo</strong> <?= $this->session->flashdata('success'); ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-6">
      <h3 class="text-dark">Ubah Password</h3>
    </div>
    <div class="col-6">
      <a href="<?= base_url('User/profil_user'); ?>" class="btn btn-sm float-right btn-danger rounded-0">Kembali</a>
      <!-- <button class="btn btn-sm float-right btn-primary gb-btn-order rounded-0 mr-2">Edit Profil</button> -->
    </div>
  </div>

  <!-- <?php var_dump($data); ?> -->

  <hr class="mt-0">

  <div class="row">
    <div class="col-6 col-lg-9">
      <form action="<?= site_url('Vendor_admin/updateEditProfil'); ?>" method="post">
        <h6 class="mb-0 text-dark">Password Lama</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" name="nama" type="text" value="">
        </div>

        <h6 class="mb-0 text-dark">Password Baru</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" name="namaVendor" type="text" value="">
        </div>

        <h6 class="mb-0 text-dark">Konfirmasi Password</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" name="email" type="text" value="">
        </div>

        <button type="submit" name="update" class="btn btn-sm btn-primary gb-btn-order rounded-0 mb-5">Ubah Password</button>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->