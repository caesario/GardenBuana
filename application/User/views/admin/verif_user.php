<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800"><?= $title; ?></h4>

  <!-- <?php var_dump($pengguna); ?> -->

  <table id="table_id" class="display table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama User</th>
        <th>Email</th>
        <th>Dibuat Pada</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pengguna as $data) : ?>
        <tr>
          <td>1</td>
          <td><?= $data['name']; ?></td>
          <td><?= $data['email']; ?></td>
          <td><?= $data['date_created']; ?></td>
          <td>
            <?php if ($data['is_active'] == 1) : ?>
              Aktif</td>
          <?php else : ?>
            Tidak Aktif
          <?php endif; ?>
          <td>
            <span>
              <a class="p-0" href="" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                <i class="fas fa-eye"></i>
              </a>
            </span>
            <span>
              <a class="pl-2" href="<?= site_url('admin/verif_edit/'); ?><?= $data['id_user']; ?>" data-toggle="tooltip" data-placement="top" title="Ubah">
                <i class=" fas fa-edit"></i>
              </a>
            </span>
            <span>
              <a class="pl-2" href="" data-toggle="tooltip" data-placement="top" title="Hapus">
                <i class=" fas fa-trash"></i>
              </a>
            </span>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->