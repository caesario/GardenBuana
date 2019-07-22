<!-- Begin Page Content -->
<div class="container-fluid">

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

  <!-- <?php var_dump($tarik_dana); ?> -->
  <a href="<?= site_url('CetakReport/penarikan_dana'); ?>" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>
  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>ID Pesanan</th>
          <th>Nama Vendor</th>
          <th>Rekening</th>
          <th>Nama Rekening</th>
          <th>Bank</th>
          <th>Nominal Transfer</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tarik_dana as $data) : ?>
          <tr>
            <td>
              <a href="<?= site_url('admin/riwayat_pengerjaan/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                <?= $data['id_pesanan']; ?>
              </a>
            </td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $data['rekening']; ?></td>
            <td><?= $data['pemilik']; ?></td>
            <td><?= $data['bank']; ?></td>
            <?php $nominal_transfer = $data['harga'] * 90 / 100 ?>
            <td>Rp.<?= number_format($nominal_transfer, 0, ".", ".") ?>,-</td>
            <td><?= $data['nama_status']; ?></td>
            <td>
              <span>
                <a class="btn btn-success btn-sm py-0 gb-btn-width" data-toggle="modal" data-id="<?= $data['id_pesanan']; ?>" data-target="#exampleModal-<?= $data['id_pesanan'] ?>" href="" data-toggle="tooltip" data-placement="top" title="Transfer">
                  <i class="fas fa-random"></i>
                </a>
              </span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <?php foreach ($tarik_dana as $data) : ?>

    <div class="modal fade" id="exampleModal-<?= $data['id_pesanan'] ?>" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="<?= site_url('admin/update_penarikan_dana/'); ?>" method="post">
          <div class="modal-content col-8 rounded-0">
            <div class="modal-header">
              <h6 class="text-center font-weight-bold">Konfirmasi Pencairan Dana</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="mb-0 text-dark gb-font-small">ID Pesanan</p>
              <h6><?= $data['id_pesanan']; ?></h6>
              <input type="hidden" name="id_pesanan" value="<?= $data['id_pesanan']; ?>">
              <p class="mb-0 text-dark gb-font-small">Pencairan Dana</p>
              <div class="col p-0 form-group">
                <select class="form-control rounded-0" id="konfirmasi" name="konfirmasi">
                  <option value="3">Dana Sudah Dikirimkan</option>
                  <option value="4">Tolak Penarikan Dana</option>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary rounded-0">Konfirmasi</button>
              <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  <?php endforeach; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->