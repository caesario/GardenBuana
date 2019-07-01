<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <?php var_dump($tarik_dana); ?><br><br> -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <button class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></button>
  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>ID Pesanan</th>
          <th>Nama Pemesan</th>
          <!-- <th>Telpon</th> -->
          <th>Alamat</th>
          <th>Tanggal Pengerjaan</th>
          <!-- <th>Harga</th> -->
          <th>Status</th>
          <th>Tanggal Pesanan</th>
          <th class="gb-aksi-width">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tarik_dana as $data) : ?>
          <tr>
            <td>
              <a href="" data-toggle="modal" data-target="#exampleModal" class="text-decoration-none">
                <?= $data['id_pesanan']; ?>
              </a>
            </td>
            <td><?= $data['nama_pemesan']; ?></td>
            <!-- <td><?= $data['telpon']; ?></td> -->
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['tanggal_pengerjaan']; ?></td>
            <!-- <td>Rp.<?= $data['harga']; ?></td> -->
            <td><?= $data['nama_status']; ?></td>
            <td><?= $data['create_date']; ?></td>
            <td>
              <span>
                <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('vendor_admin/detail_pesanan/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                  <i class="fas fa-eye"></i>
                </a>
              </span>
              <span>
                <a class="btn btn-primary btn-sm py-0 gb-btn-width" href="<?= site_url('admin/pesanan_edit/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Ubah">
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
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

  <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?= site_url('.....'); ?>" method="post">
        <div class="modal-content col-8 rounded-0">
          <div class="modal-header">
            <h6 class="text-center font-weight-bold">Konfirmasi Pekerjaan</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="mb-0 text-dark gb-font-small">Nomor Rekening</p>
            <div class="col p-0 form-group">
              <input class="form-control form-control-sm mt-1 mb-3 gb-font-small rounded-0" type="text" value="" name="rekening">
            </div>

            <p class="mb-0 text-dark gb-font-small">Nama Bank</p>
            <div class="col p-0 form-group">
              <input class="form-control form-control-sm mt-1 mb-3 gb-font-small rounded-0" type="text" value="" name="bank">
            </div>

            <p class="mb-0 text-dark gb-font-small">Pemilik Rekening</p>
            <div class="col p-0 form-group">
              <input class="form-control form-control-sm mt-1 mb-3 gb-font-small rounded-0" type="text" value="" name="pemilik">
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary rounded-0">Ajukan Permintaan</button>
            <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Batal</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->