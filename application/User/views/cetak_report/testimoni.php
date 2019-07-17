<!-- Begin Page Content -->
<div class="container-fluid mt-5">

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

  <!-- <?php var_dump($testimoni); ?> -->

  <a href="javascript:window.print()" class="btn btn-primary text-white btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Pesanan</th>
          <th>Nama Pelanggan</th>
          <th>Vendor</th>
          <th>Testimoni</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($testimoni as $data) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $data['id_pesanan']; ?></td>
            <td><?= $data['nama_pemesan']; ?></td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $data['testimoni']; ?></td>
          </tr>
          <?php $i++ ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?= site_url('Vendor_admin/update_testimoni'); ?>" method="post">
        <!-- <input type="text" id="id_pesanan" name="id_pesanan" velue="<?= $testimoni['id_pesanan']; ?>"> -->
        <div class="modal-content col-8 rounded-0">
          <div class="modal-header">
            <h6 class="text-center font-weight-bold">Tampilkan Testimoni</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="mb-0 text-dark gb-font-small">Status Testimoni</p>
            <div class="col p-0 form-group">
              <select class="form-control" id="status" name="status">
                <option value="1">Tampilkan</option>
                <option value="2">Sembunyikan</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary rounded-0">Konfirmasi</button>
            <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Batal</button>
          </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->