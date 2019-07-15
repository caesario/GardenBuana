<!-- Begin Page Content -->
<div class="container-fluid mt-5">

  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
      <div class="col-md">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
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

  <!-- <?php var_dump($trx_pesanan); ?> -->
  <a href="javascript:window.print()" class="btn btn-primary text-white btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>ID Pesanan</th>
          <th>Nama Pemesan</th>
          <th>Vendor</th>
          <!-- <th>Telpon</th> -->
          <th>Tanggal Pengerjaan</th>
          <th>Harga</th>
          <th>Status</th>
          <th>Dibuat Pada</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($trx_pesanan as $data) : ?>
          <tr>
            <td><?= $data['id_pesanan']; ?></td>
            <td><?= $data['nama_pemesan']; ?></td>
            <td><?= $data['nama_vendor']; ?></td>
            <!-- <td><?= $data['telpon']; ?></td> -->
            <td><?= $data['tanggal_pengerjaan']; ?></td>
            <td><?= number_format($data['harga'], 0, ".", ".") ?>,-</td>
            <td><?= $data['nama_status']; ?></td>
            <td><?= $data['create_date']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->