<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <!-- <?php var_dump($vendorPenilaian[0][0]['penilaian']); ?> -->
  <!-- <?php var_dump($vendorTransaksi); ?> -->

  <a href="<?= site_url('CetakReport/penilaian_vendor'); ?>" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th class="gb-no-width">No</th>
          <th>Nama Vendor</th>
          <th>Jumlah Transaksi</th>
          <th>Penilaian</th>
          <!-- <th>Keterangan</th> -->
          <!-- <th class="gb-aksi-width-long">Aksi</th> -->
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;
        $a = 0; ?>
        <?php foreach ($penilaian as $data) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $vendorTransaksi[$a]; ?></td>
            <?php @$total = $vendorPenilaian[$a][0]['penilaian'] / $vendorTransaksi[$a]; ?>
            <td><?php if ($total != NAN) : ?>
                <?= $total; ?>
              <?php else : ?>
                0
              <?php endif; ?>
            </td>
            <!-- <td><?= $data['keterangan']; ?></td> -->
            </td>
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