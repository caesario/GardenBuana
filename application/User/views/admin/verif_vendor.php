<!-- Begin Page Content -->
<div class="container-fluid">

  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
      <div class="col-md">
        <div class=" alert alert-success alert-dismissible fade show" role="alert">
          Data <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <!-- <?php var_dump($vendor); ?> -->

  <a href="<?= site_url('CetakReport/verifikasi_vendor'); ?>" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Vendor</th>
          <th>Kota</th>
          <th>KTP</th>
          <th>NPWP</th>
          <th>Status</th>
          <th class="gb-aksi-width">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($vendor as $data) : ?>
          <tr>
            <td> <?= $i; ?></td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $data['nama_kota']; ?></td>
            <td><?= $data['ktp']; ?></td>
            <td><?= $data['npwp']; ?></td>
            <td><?= $data['nama_status_verif']; ?></td>
            <td>
              <span>
                <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('admin/verif_vendor_detail/'); ?><?= $data['id_vendor']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                  <i class="fas fa-eye"></i>
                </a>
              </span>
              <!-- <span>
                            <a class="btn btn-primary btn-sm py-0 gb-btn-width" href="<?= site_url('admin/verif_edit/'); ?><?= $data['id_vendor']; ?>" data-toggle="tooltip" data-placement="top" title="Ubah">
                              <i class="fas fa-edit"></i>
                            </a>
                          </span> -->
              <span>
                <a class="btn btn-danger btn-sm py-0 gb-btn-width" href="<?= site_url('admin/hapus_verif/'); ?><?= $data['id_vendor']; ?>" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Data akan dihapus?');">
                  <i class="fas fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->