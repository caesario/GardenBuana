<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <?php var_dump($vendorPendapatan); ?>

  <button class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></button>
  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th class="gb-no-width">No</th>
          <th>Nama Vendor</th>
          <!-- <th>Jumlah Transaksi</th> -->
          <th>Pendapatan Vendor</th>
          <th>Biaya Dikenakan</th>
          <!-- <th>Keterangan</th> -->

        </tr>
      </thead>
      <tbody>
        <?php $i = 1;
        $a = 0; ?>
        <?php foreach ($pendapatan as $data) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $data['nama_vendor']; ?></td>
            <!-- <td><?= $vendorTransaksi[$a]; ?></td> -->
            <td>Rp. <?= number_format($vendorPendapatan[$a][0]['harga'], 0, ".", "."); ?>,-</td>
            <?= $total = $vendorPendapatan[$a][0]['harga'] * 10 / 100 ?>
            <td>Rp. <?= number_format($total, 0, ".", "."); ?>,-</td>
            <!-- <td></td> -->

          </tr>
          <?php $i++;
          $a++ ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->