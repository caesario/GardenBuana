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
        <div class="col-12 col-lg-3">
          <img class="card-img-top p-3 gb-img-size mb-3 border rounded-0" src="<?= base_url('assets/img/'); ?><?= $vendor['logo']; ?>" alt="Card image cap">
          <h5 class="mb-0"><?= $vendor['nama_vendor']; ?></h5>
          <!-- <hr class="my-1"> -->
          <p class="gb-p-detail mb-3"><?= $vendor['alamat']; ?>, <?= $vendor['nama_kota']; ?></p>
          <p class="gb-p-detail mb-3 text-justify"><?= $vendor['info_vendor']; ?></p>
          <a href="<?= site_url('vendor/pesan_vendor/'); ?><?= $vendor['id_vendor']; ?>" class="btn btn-sm btn-block btn-new gb-btn-order rounded-0">
            Buat Pesanan
          </a>
          <a href="<?= site_url('vendor/hubungi_vendor/'); ?><?= $vendor['id_vendor']; ?>" class="btn btn-sm btn-block btn-new rounded-0">
            Hubungi Vendor
          </a>
          <a href="<?= base_url('Vendor'); ?>" class="btn btn-sm btn-block btn-danger rounded-0">
            Kembali
          </a>

        </div>
        <div class="col-12 col-lg-9 pl-5">
          <h4 class="mb-0 mt-4">Portfolio Vendor</h4>
          <?php @$hasil_rating = $rating / $row; ?>
          <?php if ($row == 0) : ?>
            <span class="gb-p-detail mr-1"> 0.00 / 5.00</span><span class="gb-p-detail mb-3 mr-1">( <?= $row; ?> Transaksi Pekerjaan )</span>
          <?php else : ?>
            <span class="gb-p-detail mr-1">Rating Vendor : <?= number_format($hasil_rating, 2) ?> / 5.00 |</span><span class="gb-p-detail mb-3 mr-1">( <?= $row; ?> Transaksi Pekerjaan )</span>
          <?php endif; ?>
          <i class="fa fa-star new-color float-right"></i>
          <i class="fa fa-star new-color float-right"></i>
          <i class="fa fa-star new-color float-right"></i>
          <i class="fa fa-star new-color float-right"></i>
          <i class="fa fa-star new-color float-right"></i>
          <hr>
          <div class="row">
            <?php foreach ($portfolio as $data) : ?>
              <div class="col-12 col-md-4 bg-container">
                <img class="card-img-top gb-img-port mb-4 border rounded-0" data-toggle="modal" data-target="#exampleModal-<?= $data['id_portfolio']; ?>" src="<?= base_url('assets/img/'); ?><?= $data['gambar']; ?>">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
  </div>
</section>

<!-- Modal -->
<?php foreach ($portfolio as $data) : ?>
  <div class="modal fade" id="exampleModal-<?= $data['id_portfolio']; ?>" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<?php endforeach; ?>


</div>

</section>