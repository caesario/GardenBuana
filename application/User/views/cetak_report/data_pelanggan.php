<!-- Begin Page Content -->
<div class="container-fluid mt-5">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <!-- <?php var_dump($pelanggan); ?> -->

  <a href="javascript:window.print()" class="btn btn-primary text-white btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pelanggan</th>
          <th>Telpon</th>
          <th>Kota</th>
          <th>Alamat</th>
          <th>Bergabung</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($pelanggan as $data) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $data['name']; ?></td>
            <td><?= $data['telpon']; ?></td>
            <td><?= $data['nama_kota']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['date_created']; ?></td>
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