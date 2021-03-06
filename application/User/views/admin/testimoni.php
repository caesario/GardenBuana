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

  <!-- <?php var_dump($testimoni); ?> -->

  <a href="<?= site_url('CetakReport/testimoni'); ?>" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Pesanan</th>
          <th>Nama Pelanggan</th>
          <th>Vendor</th>
          <th>Testimoni</th>
          <th>Status</th>
          <th class="gb-aksi-width">Aksi</th>
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
            <?php if ($data['status_tampil'] == 0) : ?>
              <td>Tidak Ditampilkan</td>
            <?php else : ?>
              <td>Ditampilkan</td>
            <?php endif; ?>
            <td>
              <span>
                <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('report/testimoni_detail/'); ?><?= $data['id_testimoni']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                  <i class="fas fa-eye"></i>
                </a>
              </span>
              <span>
                <a class="btn btn-primary btn-sm py-0 gb-btn-width" href="" data-toggle="modal" data-target="#exampleModal_<?= $data['id_testimoni']; ?>" data-toggle="tooltip" data-placement="top" title="Tampilkan">
                  <i class="fas fa-check"></i>
                </a>
              </span>
            </td>
          </tr>
          <?php $i++ ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <?php foreach ($testimoni as $data) : ?>
    <div class="modal fade" id="exampleModal_<?= $data['id_testimoni']; ?>" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="<?= site_url('report/update_testimoni'); ?>" method="post">
          <div class="modal-content col-8 rounded-0">
            <div class="modal-header">
              <h6 class="text-center font-weight-bold">Tampilkan Testimoni</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="mb-0 text-dark gb-font-small">ID Pesanan</p>
              <h6><?= $data['id_pesanan']; ?></h6>
              <p class="mb-0 text-dark gb-font-small">Status Testimoni</p>
              <div class="col p-0 form-group">
                <input type="hidden" name="id_pesanan" value="<?= $data['id_pesanan']; ?>">
                <select class="form-control rounded-0" id="status" name="status">
                  <option value="1">Tampilkan</option>
                  <option value="0">Sembunyikan</option>
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