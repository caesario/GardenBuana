<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800"><?= $title; ?></h4>

  <!-- <?php var_dump($vendor); ?> -->

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
        <th>Aksi</th>
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
          <td>
            <span>
              <a class="p-0" href="" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                <i class="fas fa-eye"></i>
              </a>
            </span>
            <span>
              <a class="pl-2" href="<?= site_url('admin/verif_edit/'); ?><?= $data['id_vendor']; ?>" data-toggle="tooltip" data-placement="top" title="Ubah">
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
        <?php $i++ ?>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->