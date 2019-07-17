<!-- Begin Page Content -->
<div class="container-fluid mt-5">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <!-- <?php var_dump($vendor); ?> -->

  <a href="javascript:window.print()" class="btn btn-primary text-white btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Vendor</th>
          <th>Kota</th>
          <th>Telpon</th>
          <th>Alamat</th>
          <th>Info Vendor</th>
          <th>Bergabung</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($vendor as $data) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $data['nama_kota']; ?></td>
            <td><?= $data['telpon']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['info_vendor']; ?></td>
            <td><?= $data['createTime']; ?></td>
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