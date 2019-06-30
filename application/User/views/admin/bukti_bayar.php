<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <!-- <?php var_dump($buktibayar); ?> -->

  <button class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></button>
  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Pesanan</th>
          <th>Nama Pengguna</th>
          <th>Nama Vendor</th>
          <th>Bukti Bayar</th>
          <th>Keterangan</th>
          <th>Tanggal Bayar</th>
          <th class="gb-aksi-width">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($buktibayar as $data) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td>TRX-0<?= $data['id_pesanan']; ?></td>
            <td><?= $data['nama_pemesan']; ?></td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $data['upload']; ?></td>
            <td><?= $data['keterangan_bayar']; ?></td>
            <!-- <td><?= $data['nama_status']; ?></td> -->
            <td><?= $data['create_date_bayar']; ?></td>
            <td>
              <span>
                <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('report/buktibayar_detail/'); ?><?= $data['id_bayar']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                  <i class="fas fa-eye"></i>
                </a>
              </span>
              <span>
                <a class="btn btn-warning btn-sm py-0 gb-btn-width" href="" data-toggle="tooltip" data-placement="top" title="Cetak">
                  <i class="fas fa-print"></i>
                </a>
              </span>
            </td>
            </td>
          </tr>
          <?php $i++ ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->