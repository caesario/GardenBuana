<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <?php var_dump($trx_pesanan); ?><br><br> -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <a href="<?= site_url('CetakReport/riwayat_pembayaran_pelanggan'); ?>" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>ID Pesanan</th>
          <th>Nama Vendor</th>
          <th>Tanggal Pengerjaan</th>
          <th>Harga</th>
          <th>Tanggal Pesanan</th>
          <th class="gb-aksi-width">Aksi</th>
        </tr>
      </thead><a href=""></a>
      <tbody>
        <?php foreach ($trx_bukti as $data) : ?>
          <tr>
            <td>
              <a href="<?= site_url('user_admin/invoice/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                <?= $data['id_pesanan']; ?>
              </a>
            </td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $data['tanggal_pengerjaan']; ?></td>
            <td>Rp.<?= number_format($data['harga'], 0, ".", ".") ?>,-</td>
            <td><?= $data['create_date']; ?></td>
            <td>
              <span>
                <a class="btn btn-warning btn-sm py-0 gb-btn-width" href="<?= site_url('user_admin/invoice/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Cetak">
                  <i class="fas fa-print"></i>
                </a>
              </span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->