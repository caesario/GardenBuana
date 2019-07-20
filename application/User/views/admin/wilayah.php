<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <!-- <?php var_dump($jakpus); ?> -->

  <a href="<?= site_url('CetakReport/wilayah'); ?>" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="tablewilayah" class="display table table-bordered">
      <thead>
        <tr>
          <th class="gb-no-width">No</th>
          <th>Nama Kota</th>
          <th>Jumlah Pengguna</th>
          <th>Jumlah Vendor</th>
        </tr>
      </thead>

    </table>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->