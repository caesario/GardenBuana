<!-- Begin Page Content -->
<div class="container-fluid bg-white px-5 pt-4">

  <?php if ($this->session->flashdata('success')) : ?>
    <div class="row mt-3">
      <div class="col">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $this->session->flashdata('success'); ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-6">
      <h3 class="text-dark"><?= $title; ?></h3>
    </div>
    <div class="col-6">
      <a href="<?= base_url('Vendor_admin/verifikasi_vendor'); ?>" class="btn btn-sm float-right btn-danger rounded-0"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
      <!-- <button class="btn btn-sm float-right btn-primary gb-btn-order rounded-0 mr-2">Edit Profil</button> -->
    </div>
  </div>

  <!-- <?php var_dump($data); ?> -->

  <hr class="mt-0">

  <div class="row">
    <div class="col-6 col-lg-9">
      <form action="<?= site_url('Vendor_admin/ubahVerif'); ?>" method="post" enctype="multipart/form-data">
        <h6 class="mb-0 text-dark font-weight-bold">No. KTP</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" name="noKTP" type="text" value="">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0 border-0 p-0" name="fotoKTP" id="fotoKTP" type="file">
        </div>

        <h6 class="mb-0 text-dark font-weight-bold">No. NPWP</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" name="noNPWP" type="text" value="">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0 border-0 p-0" name="fotoNPWP" id="fotoNPWP" type="file">
        </div>

        <!-- <h6 class="mb-0 text-dark font-weight-bold">Keterangan</h6>
        <div class="col-5 p-0 form-group">
          <input class="form-control form-control-sm mt-1 mb-3 rounded-0" name="keterangan" type="text" value="" readonly>
        </div> -->
        <button type="submit" name="update" class="btn btn-sm btn-primary gb-btn-order rounded-0 mb-5">Kirim Data</button>
      </form>
    </div>
  </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->