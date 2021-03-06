<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <?php var_dump($trx_pesanan[0]['nama_pemesan']); ?><br><br> -->

  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>



  <?php if (@$trx_pesanan[0]['id_status_trans'] == 1) : ?>
    <a href="<?= site_url('CetakReport/pesanan_vendor'); ?>" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>
  <?php elseif (@$trx_pesanan[0]['id_status_trans'] == 3) : ?>
    <a href="<?= site_url('CetakReport/konfirmasi_pembayaran_vendor'); ?>" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>
  <?php elseif (@$trx_pesanan[0]['id_status_trans'] == 6 || 7) : ?>
    <a href="<?= site_url('CetakReport/konfirmasi_pekerjaan_vendor'); ?>" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>
  <?php else : ?>
    <a href="" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>
  <?php endif; ?>


  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>ID Pesanan</th>
          <th>Nama Pemesan</th>
          <!-- <th>Telpon</th> -->
          <th>Alamat</th>
          <th>Tanggal Pengerjaan</th>
          <!-- <th>Harga</th> -->
          <th>Status</th>
          <th>Tanggal Pesanan</th>
          <th class="gb-aksi-width">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($trx_pesanan as $data) : ?>
          <tr>
            <td>
              <?php if ($data['id_status_trans'] == 1) : ?>
                <a href="<?= site_url('vendor_admin/detail_pesanan/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                <?php elseif ($data['id_status_trans'] == 2) : ?>
                  <a href="<?= site_url('vendor_admin/detail_pesanan/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                  <?php elseif ($data['id_status_trans'] == 6) : ?>
                    <a href="<?= site_url('vendor_admin/detail_konfirmasi_pengerjaan/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                    <?php endif; ?><?= $data['id_pesanan']; ?>
                  </a>
            </td>
            <td><?= $data['nama_pemesan']; ?></td>
            <!-- <td><?= $data['telpon']; ?></td> -->
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['tanggal_pengerjaan']; ?></td>
            <!-- <td>Rp.<?= $data['harga']; ?></td> -->
            <td><?= $data['nama_status']; ?></td>
            <td><?= $data['create_date']; ?></td>
            <td>
              <span>
                <?php if ($data['id_status_trans'] <= 2) : ?>
                  <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('vendor_admin/detail_pesanan/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                    <i class="fas fa-eye"></i>
                  </a>
                <?php elseif ($data['id_status_trans'] == 3) : ?>
                  <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('vendor_admin/pesanan_detail/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                    <i class="fas fa-eye"></i>
                  </a>
                <?php elseif ($data['id_status_trans'] == 6) : ?>
                  <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('vendor_admin/detail_konfirmasi_pengerjaan/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                    <i class="fas fa-eye"></i>
                  </a>
                <?php endif; ?>
              </span>
              <span>
                <a class="btn btn-warning btn-sm py-0 gb-btn-width" href="<?= site_url('vendor_admin/cetak_pesanan/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Cetak">
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