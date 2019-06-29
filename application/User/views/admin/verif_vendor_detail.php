<!-- Begin Page Content -->
<div class="container-fluid bg-white px-5 pt-4">

  <div class="row">
    <div class="col-6">
      <h3 class="text-dark"><?= $title; ?></h3>
    </div>
    <div class="col-6">
      <button class="btn btn-sm btn-primary gb-btn-order float-right rounded-0 ml-1" data-toggle="modal" data-target="#exampleModal">Konfirmasi Pekerjaan</button>
    </div>
  </div>

  <!-- <?php var_dump($vendor_verif); ?> -->

  <hr class="mt-0">

  <div class="row">
    <div class="col-6 col-lg-9">
      <h6 class="mb-0 text-dark font-weight-bold">No KTP</h6>
      <p class="text-dark"><?= $vendor_verif['ktp']; ?></p>
      <img class="card-img-top p-3 mb-3 border gb-img-ktp rounded-0" src="<?= base_url('assets/img/'); ?><?= $vendor_verif['gambar_ktp']; ?>" alt="Card image cap">

      <h6 class="mb-0 text-dark font-weight-bold">No NPWP</h6>
      <p class="text-dark"><?= $vendor_verif['npwp']; ?></p>
      <img class="card-img-top p-3 mb-3 border gb-img-ktp rounded-0" src="<?= base_url('assets/img/'); ?><?= $vendor_verif['gambar_npwp']; ?>" alt="Card image cap">

      <h6 class="mb-0 text-dark font-weight-bold">Status</h6>
      <p class="text-dark"><?= $vendor_verif['nama_status_verif']; ?></p>

      <h6 class="mb-0 text-dark font-weight-bold">Diubah Pada</h6>
      <p class="text-dark"><?= $vendor_verif['edit_date']; ?></p>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?= site_url('Admin/update_vendor_verifikasi'); ?>" method="post">
        <div class="modal-content col-8 rounded-0">
          <div class="modal-header">
            <h6 class="text-center font-weight-bold">Verifikasi Vendor</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- <p class="mb-0 text-dark gb-font-small">Masukan Harga</p> -->
            <input class="form-control form-control-sm mt-1 mb-3 gb-font-small rounded-0" type="hidden" value="<?= $vendor_verif['id_vendor']; ?>" name="id_vendor">
            <div class="col p-0 form-group">
              <select class="form-control" id="verifikasi" name="verifikasi">
                <option value="3">Verifikasi</option>
                <option value="4">Tolak</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary rounded-0">Konfirmasi</button>
            <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Batal</button>
          </div>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->