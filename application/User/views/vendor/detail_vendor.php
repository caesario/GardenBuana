<!--==========================
      Clients Section
    ============================-->
<section id="clients" class="section-bg">

  <!-- <?php var_dump($portfolio); ?> -->

  <div class="container wow fadeInUp">

    <div class="section-header mt-5">
    </div>

    <section class="bg-white p-5 rounded-0">
      <div class="row">
        <div class="col-3">
          <img class="card-img-top p-3 gb-img-size mb-3 border rounded-0" src="<?= base_url('assets/img/'); ?><?= $vendor['logo']; ?>" alt="Card image cap">
          <h5 class="mb-0"><?= $vendor['nama_vendor']; ?></h5>
          <!-- <hr class="my-1"> -->
          <p class="gb-p-detail mb-3"><?= $vendor['alamat']; ?>, <?= $vendor['nama_kota']; ?></p>
          <p class="gb-p-detail mb-3 text-justify"><?= $vendor['info_vendor']; ?></p>
          <a href="<?= site_url('vendor/pesan_vendor/'); ?><?= $vendor['id_vendor']; ?>" class="btn btn-sm btn-block btn-primary gb-btn-order rounded-0">
            Buat Pesanan
          </a>
          <a href="<?= site_url('vendor/hubungi_vendor/'); ?><?= $vendor['id_vendor']; ?>" class="btn btn-sm btn-block btn-primary rounded-0">
            Hubungi Vendor
          </a>
          <a href="<?= base_url('Vendor'); ?>" class="btn btn-sm btn-block btn-danger rounded-0">
            Kembali
          </a>

        </div>
        <div class="col-9 pl-5">
          <h4 class="mb-0">Portfolio Vendor</h4>
          <hr>
          <div class="row">
            <?php foreach ($portfolio as $data) : ?>
              <div class="col-4 bg-container">
                <img class="card-img-top gb-img-port mb-4 border rounded-0" data-toggle="modal" data-target="#exampleModal2" src="<?= base_url('assets/img/'); ?><?= $data['gambar']; ?>">
                <!-- <div class="bg-overlay-2">
                        <div class="bg-text-2"><?= $data['keterangan']; ?></div>
                      </div> -->
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content col rounded-0">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/img/'); ?><?= $data['gambar']; ?>" style="width: 440px;" alt="">
      </div>
      <p class="ml-3"><?= $data['keterangan']; ?></p>
    </div>
  </div>
</div>


</div>

</section>