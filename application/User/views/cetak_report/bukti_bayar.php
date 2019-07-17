<!-- Begin Page Content -->
<div class="container-fluid mb-5 mt-5">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <!-- <?php var_dump($buktibayar); ?> -->

  <a href="javascript:window.print()" class="btn btn-primary text-white btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Pesanan</th>
          <th>Nama Pengguna</th>
          <th>Nama Vendor</th>
          <th>Bukti Bayar</th>
          <th>Keterangan</th>
          <th>Tanggal Bayar</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($buktibayar as $data) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $data['id_pesanan']; ?></td>
            <td><?= $data['nama_pemesan']; ?></td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><img src="<?= base_url('assets/img/'); ?><?= $data['upload']; ?>" style="width:100px;" alt="" data-toggle="modal" data-target="#exampleModal"></td>
            <td><?= $data['keterangan_bayar']; ?></td>
            <!-- <td><?= $data['nama_status']; ?></td> -->
            <td><?= $data['create_date_bayar']; ?></td>
          </tr>
          <?php $i++ ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content col-8 rounded-0">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="<?= base_url('assets/img/'); ?><?= $data['upload']; ?>" style="width: 100%;" alt="">
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->