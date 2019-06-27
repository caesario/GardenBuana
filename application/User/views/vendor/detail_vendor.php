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
        <div class="col-9">
          <h4 class="mb-0">Portfolio Vendor</h4>
          <hr>
          <div class="row">
            <?php foreach ($portfolio as $data) : ?>
              <div class="col-4 bg-container">
                <img class="card-img-top gb-img-port mb-4 border rounded-0 " src="<?= base_url('assets/img/'); ?><?= $data['gambar']; ?>">
                <div class="bg-overlay-2">
                  <div class="bg-text-2"><?= $data['keterangan']; ?></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
  </div>
</section>


</div>

</section>