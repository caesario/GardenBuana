<!--==========================
      Clients Section
    ============================-->
<section id="clients" class="section-bg">

  <div class="container wow fadeInUp">

    <div class="section-header mt-5">
    </div>

    <section class="bg-white p-5 rounded-0">
      <div class="row">
        <div class="col-3">
          <img class="card-img-top p-3 gb-img-size mb-3 border rounded-0" src="<?= base_url('assets/img/clients/client-3.png'); ?>" alt="Card image cap">
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
            <div class="col-4">
              <a href="">
                <img class="card-img-top p-3 gb-img-port mb-4 border rounded-0" src="<?= base_url('assets/img/clients/client-1.png'); ?>" alt="Card image cap">
              </a>
            </div>
            <div class="col-4">
              <img class="card-img-top p-3 gb-img-port mb-3 border" src="<?= base_url('assets/img/clients/client-4.png'); ?>" alt="Card image cap">
            </div>
            <div class="col-4">
              <img class="card-img-top p-3 gb-img-port mb-3 border" src="<?= base_url('assets/img/clients/client-2.png'); ?>" alt="Card image cap">
            </div>
            <div class="col-4">
              <img class="card-img-top p-3 gb-img-port mb-3 border" src="<?= base_url('assets/img/clients/client-5.png'); ?>" alt="Card image cap">
            </div>
          </div>
        </div>
      </div>
  </div>
</section>


</div>

</section>