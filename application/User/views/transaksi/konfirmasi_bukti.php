<!--==========================
      Clients Section
    ============================-->
<section id="clients" class="section-bg">
  <div class="container wow fadeInUp mt-5">
    <section class="bg-white px-5 py-4 rounded-0">
      <div class="section-header">
        <h5 class="text-center font-weight-bold">Konfirmasi Bukti Bayar</h5>
      </div>

      <div class="card rounded-0">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h6 class="font-weight-bold my-0">ID Pesanan</h6>
              <p class="my-0 gb-font-small"><?= $trx_pesanan['id_pesanan']; ?></p>
            </div>
            <div class="col-6">
              <button class="btn btn-sm btn-primary gb-btn-order float-right rounded-0 ml-1">Rp <?= number_format($trx_pesanan['harga'], 0, ".", ".") ?></button>
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

      <form action="<?= site_url('transaksi/update_bukti_bayar'); ?>" method="post" enctype="multipart/form-data">
        <div class="mt-4 mb-5">
          <h6 class="font-weight-bold mb-2">Tagihan Anda Sebesar</h6>
          <h3 class="display-6 mb-3">Rp. <?= number_format($trx_pesanan['harga'], 0, ".", ".") ?>,-</h3>
          <p class="gb-font-small col-6 p-0 mb-2">Harap melakukan pembayaran hanya ke rekening dibawah ini :</p>
          <p class="gb-font-small col-6 p-0 mb-1">BCA a/n Garden Buana 788278178</p>
          <p class="gb-font-small col-6 p-0">Mandiri a/n Garden Buana 988281992849</p>
        </div>


        <div class="mt-4 pt-1">
          <h6 class="font-weight-bold mb-2">Bukti Pembayaran</h6>
          <input type="file" class="form-control-file btn-sm gb-font-small mb-3" id="buktiBayar" name="buktiBayar" value="HARDCODE">
          <input type="hidden" name="id_pesanan" value="<?= $trx_pesanan['id_pesanan']; ?>">
          <input type="hidden" name="id_pelanggan" value="<?= $trx_pesanan['id_pelanggan']; ?>">
          <input type="hidden" name="id_vendor" value="<?= $trx_pesanan['id_vendor']; ?>">
          <p class="gb-font-small mb-2">Keterangan</p>
          <textarea name="keterangan" id="" cols="40" rows="3" class="gb-font-small mb-1"></textarea>
          <br>
          <button class="btn btn-sm btn-primary gb-btn-order rounded-0">Kirim Bukti</button>
        </div>
      </form>



  </div>


</section>