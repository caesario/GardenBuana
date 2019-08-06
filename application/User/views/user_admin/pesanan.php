<!-- Begin Page Content -->
<div class="container-fluid">

  <?php if ($this->session->flashdata('berhasil')) : ?>
    <div class="row mt-3">
      <div class="col">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $this->session->flashdata('berhasil'); ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Page Heading -->
  <!-- <?php var_dump($trx_pesanan); ?><br><br> -->
  <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

  <a href="<?= site_url('CetakReport/pesanan_pelanggan'); ?>" class="btn btn-primary btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

  <div class="table-responsive">
    <table id="table_id" class="display table table-bordered">
      <thead>
        <tr>
          <th>ID Pesanan</th>
          <th>Nama Vendor</th>
          <th>Tanggal Pengerjaan</th>
          <th>Harga</th>
          <th>Status</th>
          <th>Tanggal Pesanan</th>
          <th class="gb-aksi-width">Aksi</th>
        </tr>
      </thead><a href=""></a>
      <tbody>
        <?php foreach ($trx_pesanan as $data) : ?>
          <tr>
            <td>
              <?php if ($data['id_status_trans'] == 1) : ?>
                <a href="<?= site_url('transaksi/pesanan/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                <?php elseif ($data['id_status_trans'] == 2) : ?>
                  <a href="<?= site_url('transaksi/konfirmasi_bukti/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                  <?php elseif ($data['id_status_trans'] == 5) : ?>
                    <a href="<?= site_url('transaksi/invoice/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                    <?php elseif ($data['id_status_trans'] == 7) : ?>
                      <a href="<?= site_url('transaksi/konfirmasi_pekerjaan/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                      <?php elseif ($data['id_status_trans'] == 4) : ?>
                        <a href="<?= site_url('transaksi/konfirmasi_pekerjaan/'); ?><?= $data['id_pesanan']; ?>" class="text-decoration-none">
                        <?php endif; ?><?= $data['id_pesanan']; ?>
                      </a>
            </td>
            <td><?= $data['nama_vendor']; ?></td>
            <td><?= $data['tanggal_pengerjaan']; ?></td>
            <td>Rp.<?= number_format($data['harga'], 0, ".", ".") ?>,-</td>
            <td><?= $data['nama_status']; ?></td>
            <td><?= $data['create_date']; ?></td>
            <td>
              <span>
                <?php if ($data['id_status_trans'] == 1) : ?>
                  <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('transaksi/pesanan/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                    <i class="fas fa-eye"></i>
                  </a>
                <?php elseif ($data['id_status_trans'] == 2) : ?>
                  <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('transaksi/konfirmasi_bukti/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                    <i class="fas fa-eye"></i>
                  </a>
                <?php elseif ($data['id_status_trans'] == 5) : ?>
                  <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('transaksi/invoice/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                    <i class="fas fa-eye"></i>
                  </a>
                <?php elseif ($data['id_status_trans'] == 7) : ?>
                  <a class="btn btn-success btn-sm py-0 gb-btn-width" href="<?= site_url('transaksi/konfirmasi_pekerjaan/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                    <i class="fas fa-eye"></i>
                  </a>
                <?php endif; ?>
              </span>
              <span>
                <?php if ($data['id_status_trans'] < 3 || $data['id_status_trans'] >= 11) : ?>
                  <a class="btn btn-danger btn-sm py-0 gb-btn-width" href="<?= site_url('user_admin/hapus_pesanan/'); ?><?= $data['id_pesanan']; ?>" data-toggle="modal" data-target="#deleteModal" data-placement="top" title="Hapus">
                    <i class="fas fa-trash"></i>
                  </a>
                <?php else : ?>
                <?php endif; ?>
              </span>
              <span>
                <a class="btn btn-warning btn-sm py-0 gb-btn-width" href="<?= site_url('user_admin/cetak_pesanan/'); ?><?= $data['id_pesanan']; ?>" data-toggle="tooltip" data-placement="top" title="Cetak">
                  <i class="fas fa-print"></i>
                </a>
              </span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Logout Delete-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" jika anda ingin menggapus pesanan ini.</div>
        <div class="modal-footer">
          <button class="btn btn-new" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" href="<?= site_url('user_admin/hapus_pesanan/'); ?><?= $data['id_pesanan']; ?>">Hapus</a>
        </div>
      </div>
    </div>
  </div>

  <!-- </div> -->
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->