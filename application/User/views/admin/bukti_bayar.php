<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800"><?= $title; ?></h4>

  <!-- <?php var_dump($buktibayar); ?>  -->

  <table id="table_id" class="display table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>ID Pesanan</th>
        <th>Bukti Pembayaran</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($buktibayar as $data) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $data['id_pesanan']; ?></td>
          <td><?= $data['upload']; ?></td>
          <td><?= $data['keterangan_bayar']; ?></td>
          <td><?= $data['nama_status']; ?></td>
          <td>
            <span>
              <a class="p-0" href="" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                <i class="fas fa-eye"></i>
              </a>
            </span>
            <span>
              <a class="pl-2" href="<?= site_url('admin/verif_edit/'); ?><?= $data['id_bayar']; ?>" data-toggle="tooltip" data-placement="top" title="Ubah">
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