<!--==========================
      Clients Section
    ============================-->
<section id="clients" class="section-bg">

  <div class="container wow fadeInUp">

    <div class="section-header mt-5">
    </div>

    <!-- <?php var_dump($pelanggan); ?> -->

    <section class="bg-white p-5">
      <div class="row">
        <div class="col-3">
          <img class="card-img-top p-3 gb-img-size mb-3 border" src="<?= base_url('assets/img/clients/client-3.png'); ?>" alt="Card image cap">
          <h5 class="mb-0"><?= $vendor['nama_vendor']; ?></h5>
          <!-- <hr class="my-1"> -->
          <p class="gb-p-detail mb-3"><?= $vendor['alamat']; ?>, <?= $vendor['nama_kota']; ?></p>
          <p class="gb-p-detail mb-3 text-justify"><?= $vendor['info_vendor']; ?></p>
          <!-- <a href="<?= site_url('vendor/pesan_vendor/'); ?><?= $vendor['id_vendor']; ?>" class="btn btn-sm btn-block btn-primary gb-btn-order">
            Buat Pesanan
          </a> -->
          <a href="<?= site_url('vendor/hubungi_vendor/'); ?><?= $vendor['id_vendor']; ?>" class="btn btn-sm btn-block btn-primary gb-btn-order rounded-0">
            Hubungi Vendor
          </a>
          <a href="<?= base_url('Vendor/detail_vendor/'); ?><?= $vendor['id_vendor']; ?>" class="btn btn-sm btn-block btn-danger rounded-0">
            Kembali
          </a>

        </div>
        <div class="col-9">
          <h4 class="mb-0">Form Pesanan</h4>
          <hr>
          <form class="gb-size-form" action="<?= site_url('vendor/create_pesanan'); ?>" method="post">
            <div class="form-group row">

              <input type="hidden" value="<?= $vendor['id_vendor'] ?>" name="id_vendor">
              <label for="namaPemesan" class="col-sm-3 col-form-label">Nama Pemesan</label>
              <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" id="namaPemesan" name="namaPemesan" placeholder="" value="<?= $user['name'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="emailPesanan" class="col-sm-3 col-form-label">Alamat Email</label>
              <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" id="emailPesanan" name="emailPesanan" placeholder="" value="<?= $user['email'] ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="telponPesanan" class="col-sm-3 col-form-label">Telpon</label>
              <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" id="telponPesanan" name="telponPesanan" placeholder="">
              </div>
            </div>
            <div class="form-group row">
              <label for="tanggalPengerjaan" class="col-sm-3 col-form-label">Tanggal Pengerjaan</label>
              <div class="col-sm-4">
                <input type="date" class="form-control form-control-sm" id="tanggalPengerjaan" name="tanggalPengerjaan" placeholder="">
              </div>
            </div>
            <div class="form-group row">
              <label for="alamatPesanan" class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-4">
                <textarea rows="3" type="textarea" class="form-control form-control-sm" id="alamatPesanan" name="alamatPesanan" placeholder=""></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="keteranganPesanan" class="col-sm-3 col-form-label">Keterangan</label>
              <div class="col-sm-4">
                <textarea rows="3" type="textarea" class="form-control form-control-sm" id="keteranganPesanan" name="keteranganPesanan" placeholder=""></textarea>
              </div>
            </div>
            <!-- <div class="form-group row">
              <label for="gambarPesanan" class="col-sm-3 col-form-label">Upload Gambar</label>
              <div class="col-sm-4">
                <input type="file" class="form-control-file" id="gambarPesanan" name="gambarPesanan">
              </div>
            </div> -->
            <div class="col-sm-7">
              <button type="submit" class="btn btn-sm float-right btn-primary gb-btn-order rounded-0">Buat Pesanan</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</section>

</div>

</section>