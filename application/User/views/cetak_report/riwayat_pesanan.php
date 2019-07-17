<!-- Begin Page Content -->
<div class="container-fluid mt-5">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <!-- <?php var_dump($riwayat); ?> -->

  <a href="javascript:window.print()" class="btn btn-primary text-white btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Pesanan</th>
          <th>Nama Pelanggan</th>
          <th>Vendor</th>
          <th>Tanggal Pengerjaan</th>
          <th>Harga</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($riwayat as $data) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $data['id_pesanan']; ?></td>
            <td><?= $data['nama_pemesan']; ?></td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $data['tanggal_pengerjaan']; ?></td>
            <td><?= $data['harga']; ?></td>
            <td><?= $data['nama_status']; ?></td>
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