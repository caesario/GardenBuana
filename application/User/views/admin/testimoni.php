<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <!-- <?php var_dump($testimoni); ?> -->

  <button class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></button>
  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Pesanan</th>
          <th>Nama Pelanggan</th>
          <th>Vendor</th>
          <th>Testimoni</th>
          <th class="gb-aksi-width">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($testimoni as $data) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td>TRX-0<?= $data['id_pesanan']; ?></td>
            <td><?= $data['nama_pemesan']; ?></td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $data['testimoni']; ?></td>
            <td>
              <span>
                <a class="btn btn-success btn-sm py-0 gb-btn-width" href="" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                  <i class="fas fa-eye"></i>
                </a>
              </span>
              <span>
                <a class="btn btn-primary btn-sm py-0 gb-btn-width" href="<?= site_url('admin/../'); ?><?= $data['id_testimoni']; ?>" data-toggle="tooltip" data-placement="top" title="Ubah">
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
          <?php $i++ ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->