<!--==========================
      Clients Section
    ============================-->

<div class="row container pr-0">
  <div class="col">
    <a href="<?= site_url('admin/konfirmasi_bukti_bayar'); ?>" class="btn btn-primary btn-sm rounded-0"><i class="mr-2 fas fa-arrow-left"></i>Kembali</a>
  </div>
  <div class="col">
    <a href="<?= site_url('admin/cetak_detail_pembayaran/'); ?><?= $trx_pesanan['id_pesanan']; ?>" class="btn btn-primary btn-sm float-right ml-1 rounded-0">Cetak Pesanan<i class="ml-2 fas fa-print"></i></a>
  </div>
</div>

<section id="clients" class="section-bg">

  <div class="container wow fadeInUp mt-5 mb-5">
    <section class="bg-white px-5 py-4 rounded-0">
      <div class="section-header">
        <h5 class="text-center font-weight-bold">Konfirmasi Bukti Bayar</h5>
        <!-- <?php var_dump($bukti_bayar); ?> -->
      </div>

      <div class="card rounded-0">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h6 class="font-weight-bold my-0">ID Pesanan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['id_pesanan']; ?></p>
            </div>
            <div class="col-6">
              <h6 class="font-weight-bold my-0 text-right">Nama Vendor</h6>
              <p class="my-0 gb-font-small text-right"><?= $trx_pesanan['nama_vendor']; ?></p>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="row text-center">
            <div class="col-12 col-md-4 mt-5">
              <h6 class="font-weight-bold my-0">Nama Pesanan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['nama_pemesan']; ?></p>
            </div>
            <div class="col-12 col-md-4 mt-5">
              <h6 class="font-weight-bold my-0">Tanggal Pengerjaan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['tanggal_pengerjaan']; ?></p>
            </div>
            <div class="col-12 col-md-4 mt-5">
              <h6 class="font-weight-bold my-0">Nomor Telpon</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['telpon']; ?></p>
            </div>
            <div class="col-12 col-md-4 mt-5">
              <h6 class="font-weight-bold my-0">Email</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['email']; ?></p>
            </div>
            <div class="col-12 col-md-4 mt-5">
              <h6 class="font-weight-bold my-0">Alamat</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['alamat']; ?></p>
            </div>
            <div class="col-12 col-md-4 mt-5">
              <h6 class="font-weight-bold my-0">Harga</h6>
              <p class="my-0 gb-font-small">Rp. <?= number_format($trx_pesanan['harga'], 0, ".", ".") ?>,-</p>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col mt-5">
              <h6 class="font-weight-bold my-0 text-center">Status</h6>
              <p class="my-0 gb-font-small px-5 text-center"><?= $trx_pesanan['nama_status']; ?></p>
            </div>
            <div class="col mt-5">
              <h6 class="font-weight-bold my-0 text-center">Keterangan</h6>
              <p class="my-0 gb-font-small px-0 text-center"><?= $trx_pesanan['keterangan']; ?></p>
            </div>
            <div class="col mt-5">
              <h6 class="font-weight-bold my-0 text-center">Tanggal Pesanan</h6>
              <p class="my-0 gb-font-small px-5 text-center"><?= $trx_pesanan['createTime']; ?></p>
            </div>
          </div>
        </div>
      </div>

      <form action="<?= site_url('admin/upd_konfirmasi_pembayaran'); ?>" method="post">
        <div class="mt-4">
          <h6 class="font-weight-bold mb-2">Bukti Pembayaran</h6>
          <img class="card-img-top col-3 p-3 gb-img-size mb-3 border rounded-0" data-toggle="modal" data-target="#exampleModal2" src="<?= base_url('assets/img/'); ?><?= $bukti_bayar['upload']; ?>" alt="">
          <p class="gb-font-small col-6 p-0 mb-3"><?= $bukti_bayar['keterangan_bayar']; ?></p>
          <input type="hidden" name="id_pesanan" value="<?= $trx_pesanan['id_pesanan']; ?>">
          <button class="btn btn-sm btn-primary gb-btn-order rounded-0" type="submit">Konfirmasi Pembayaran</button>
        </div>
      </form>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content col-12 rounded-0">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col p-0 form-group">
            <img class="card-img-top p-3 mb-4 border rounded-0" src="<?= base_url('assets/img/'); ?><?= $bukti_bayar['upload']; ?>" alt="Card image cap">
          </div>
        </div>
      </div>
    </div>
  </div>

</section>