<!-- Begin Page Content -->
<div class="container-fluid mt-5">

  <!-- Page Heading -->
  <!-- <?php var_dump($trx_pesanan); ?><br><br> -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <a href="javascript:window.print()" class="btn btn-primary text-white btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>ID Pesanan</th>
          <th>Nama Vendor</th>
          <th>Tanggal Pengerjaan</th>
          <th>Harga</th>
          <th>Status</th>
          <th>Tanggal Pesanan</th>
        </tr>
      </thead><a href=""></a>
      <tbody>
        <?php foreach ($trx_pesanan as $data) : ?>
          <tr>
            <td>
              <?php if ($data['id_status_trans'] == 1) : ?>
                <a href="<?= site_url('transaksi/pesanan/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                <?php elseif ($data['id_status_trans'] == 2) : ?>
                  <a href="<?= site_url('transaksi/konfirmasi_bukti/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                  <?php elseif ($data['id_status_trans'] == 5) : ?>
                    <a href="<?= site_url('transaksi/invoice/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                    <?php elseif ($data['id_status_trans'] == 7) : ?>
                      <a href="<?= site_url('transaksi/konfirmasi_pekerjaan/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                      <?php endif; ?><?= $data['id_pesanan']; ?>
                    </a>
            </td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $data['tanggal_pengerjaan']; ?></td>
            <td>Rp.<?= number_format($data['harga'], 0, ".", ".") ?>,-</td>
            <td><?= $data['nama_status']; ?></td>
            <td><?= $data['create_date']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->