<!-- Begin Page Content -->
<div class="container-fluid bg-white px-5 pt-4">

  <div class="row">
    <div class="col-6">
      <h3 class="text-dark"><?= $title; ?></h3>
    </div>
    <div class="col-6">
      <button class="btn btn-sm btn-primary float-right rounded-0" data-toggle="modal" data-target="#exampleModal">Upload Portfolio</button>
    </div>
  </div>

  <!-- <?php var_dump(time()); ?> -->
  <!-- <?php var_dump($getVendorId); ?> -->

  <hr class="mt-0">

  <div class="row">
    <?php foreach ($portfolio as $data) : ?>
      <div class="col-3">
        <a href="">
          <img class="card-img-top p-3 gb-img-port mb-4 border rounded-0" src="<?= base_url('assets/img/'); ?><?= $data['gambar']; ?>" alt="Card image cap">
        </a>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content col-8 rounded-0">
        <div class="modal-header">
          <h6 class="text-center font-weight-bold">Upload Porfolio</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= site_url('Vendor_admin/tambahGambar'); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <p class="mb-0 text-dark gb-font-small">Masukan Gambar</p>
            <div class="col form-group p-0">
              <input class="form-control form-control-sm mt-1 mb-3 gb-font-small gb-line rounded-0" type="file" value="" name="berkas">
            </div>
            <div class="col p-0 form-group">
              <p class="mb-0 text-dark gb-font-small">Masukan Keterangan</p>
              <input class="form-control form-control-sm mt-1 mb-3 gb-font-small rounded-0" type="text" value="" name="keterangan">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" value="upload_portfolio" class="btn btn-sm btn-primary rounded-0">Konfirmasi</button>
            <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>



  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->