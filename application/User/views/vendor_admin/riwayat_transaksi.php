<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <!-- <?php var_dump($trx_pesanan); ?> -->
  <button class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></button>
  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>ID Pesanan</th>
          <th>Nama Pemesan</th>
          <!-- <th>Telpon</th> -->
          <th>Alamat</th>
          <th>Tanggal Pengerjaan</th>
          <th>Status</th>
          <th>Harga</th>
          <!-- <th>Tanggal Pesanan</th> -->
          <th class="gb-aksi-width">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($trx_pesanan as $data) : ?>
          <tr>
            <td>
              <?php if ($data['id_status_trans'] == 7) : ?>
                <a href="<?= site_url('vendor_admin/invoice/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                  <?= $data['id_pesanan']; ?></td>
            <?php endif; ?>
            <td><?= $data['nama_pemesan']; ?></td>
            <!-- <td><?= $data['telpon']; ?></td> -->
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['tanggal_pengerjaan']; ?></td>
            <td><?= $data['nama_status']; ?></td>
            <td>Rp.<?= $data['harga']; ?></td>
            <!-- <td><?= $data['nama_status']; ?></td> -->
            <!-- <td><?= $data['create_date']; ?></td> -->
            <td>
              <span>
                <a class="btn btn-success btn-sm py-0 gb-btn-width" href="" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                  <i class="fas fa-eye"></i>
                </a>
              </span>
              <span>
                <a class="btn btn-primary btn-sm py-0 gb-btn-width" href="<?= site_url('admin/pesanan_edit/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Ubah">
                  <i class="fas fa-edit"></i>
                </a>
              </span>
              <span>
                <a class="btn btn-danger btn-sm py-0 gb-btn-width" href="" data-toggle="tooltip" data-placement="top" title="Hapus">
                  <i class="fas fa-trash"></i>
                </a>
              </span>
              <span>
                <a class="btn btn-warning btn-sm py-0 gb-btn-width" href="" data-toggle="tooltip" data-placement="top" title="Cetak">
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