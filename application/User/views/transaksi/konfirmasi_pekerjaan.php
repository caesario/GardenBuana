<!--==========================
      Clients Section
    ============================-->
<section id="clients" class="section-bg">
  <div class="container wow fadeInUp mt-5">
    <section class="bg-white px-5 py-4 rounded-0">
      <div class="section-header">
        <h5 class="text-center font-weight-bold">Konfirmasi Pekerjaan</h5>
      </div>

      <!-- <?php var_dump($trx_pesanan); ?> -->

      <div class="card rounded-0">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h6 class="font-weight-bold my-0">ID Pesanan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['id_pesanan']; ?></p>
            </div>
            <div class="col-6">
              <button class="btn btn-sm btn-primary gb-btn-order float-right rounded-0 ml-1" data-toggle="modal" data-target="#exampleModal">Konfirmasi Pekerjaan</button>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="row text-center">
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Nama Pesanan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['nama_pemesan']; ?></p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Tanggal Pesanan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['tanggal_pengerjaan']; ?></p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Nomor Telpon</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['telpon']; ?></p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Email</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['email']; ?></p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Alamat</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['alamat']; ?></p>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col mt-5">
              <h6 class="font-weight-bold my-0 text-center">Keterangan</h6>
              <p class="my-0 gb-font-small px-5 text-center"><?= $trx_pesanan['keterangan']; ?></p>
            </div>
          </div>
        </div>
      </div>


      <div class="mt-4 mb-3">
        <h5 class="font-weight-bold mb-0">Selamat, pekerjaan taman anda telah diselesaikan oleh Vendor kami</h5>
        <!-- <h3 class="display-6 mb-3">Rp. <?= number_format($trx_pesanan['harga'], 0, ".", ".") ?>,-</h3> -->
      </div>

      <div class="row">
        <div class="col-6 col-lg-9 mb-2">
          <h6 class="mb-0 text-dark">Nama Vendor</h6>
          <p class="text-dark font-weight-bold mb-3"><?= $trx_pesanan['nama_vendor']; ?></p>

          <h6 class="mb-0 text-dark">Tanggal Pengerjaan</h6>
          <p class="text-dark font-weight-bold mb-3"><?= $trx_pesanan['tanggal_pengerjaan']; ?></p>

          <h6 class="mb-0 text-dark">Keterangan Vendor</h6>
          <p class="text-dark"><?= $trx_pesanan['keterangan']; ?></p>
        </div>

        <div class="col-12">
          <h6 class="mb-3 text-dark font-weight-bold">Dokumentasi Pekerjaan</h6>
          <div class="row card-deck" id="demo">
            <div class="row">
              <div class="col-3">
                <a href="">
                  <img class="card-img-top p-3 gb-img-port mb-4 border rounded-0" src="<?= base_url('assets/img/clients/client-1.png'); ?>" alt="Card image cap">
                </a>
              </div>
              <div class="col-3">
                <img class="card-img-top p-3 gb-img-port mb-3 border" src="<?= base_url('assets/img/clients/client-4.png'); ?>" alt="Card image cap">
              </div>
              <div class="col-3">
                <img class="card-img-top p-3 gb-img-port mb-3 border" src="<?= base_url('assets/img/clients/client-2.png'); ?>" alt="Card image cap">
              </div>
              <div class="col-3">
                <img class="card-img-top p-3 gb-img-port mb-3 border" src="<?= base_url('assets/img/clients/client-5.png'); ?>" alt="Card image cap">
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- <div class="mt-4 pt-1">
          <h6 class="font-weight-bold mb-2">Konfirmasi Pekerjaan</h6>
          <input type="file" class="form-control-file btn-sm gb-font-small mb-3" id="gambarPesanan" name="gambarPesanan" value="HARDCODE">
          <input type="hidden" name="id_pesanan" value="<?= $trx_pesanan['id_pesanan']; ?>">
          <input type="hidden" name="gambar" value="GAMBAR">
          <p class="gb-font-small mb-2">Keterangan</p>
          <textarea name="keterangan" id="" cols="40" rows="3" class="gb-font-small mb-1"></textarea>
          <br>
          <button class="btn btn-sm btn-primary gb-btn-order rounded-0">Kirim Bukti</button>
        </div> -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?= site_url('Vendor_admin/update_pesanan'); ?>" method="post">
            <div class="modal-content col-8 rounded-0">
              <div class="modal-header">
                <h6 class="text-center font-weight-bold">Konfirmasi Pekerjaan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="mb-0 text-dark gb-font-small">Testimoni Vendor</p>
                <div class="col p-0 form-group">
                  <textarea class="form-control form-control-sm mt-1 mb-3 gb-font-small rounded-0" type="text" value="" name="testimoni"></textarea>
                </div>
                <p class="mb-0 text-dark gb-font-small">Penilaian Vendor</p>
                <div class="col p-0 form-group">
                  <select class="form-control" id="penilaian" name="penilaian">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                  </select>
                </div>
                <p class="mb-0 text-dark gb-font-small font-italic mb-2">*Masukan penilaian dan testimoni</p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary rounded-0">Konfirmasi</button>
                <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </form>
        </div>
      </div>

  </div>


</section>