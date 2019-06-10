<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4"><?= $title; ?></h4>
  <hr>

  <?php var_dump($detail_pelanggan); ?>

  <form class=" gb-size-form" action="<?= site_url('Admin/upd_verif/' . $detail_pelanggan['id_pelanggan']); ?>" method="post">
    <input type="hidden" class="form-control form-control-sm col-1" id="name" name="name" placeholder="" value="<?= $detail_pelanggan['id_user']; ?>">
    <div class="form-group row">
      <label for="namaPengguna" class="col-sm-2 col-form-label">Nama Pelanggan</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="" value="<?= $detail_pelanggan['name']; ?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Telpon</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="" value="<?= $detail_pelanggan['telpon']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="kota" class="col-sm-2 col-form-label">Kota</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="kota" name="kota" placeholder="" value="<?= $detail_pelanggan['nama_kota']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" placeholder="" value="<?= $detail_pelanggan['alamat']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="date" class="col-sm-2 col-form-label">Bergabung Pada</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="date" name="date" placeholder="" value="<?= $detail_pelanggan['create_date']; ?>" readonly>
      </div>
    </div>

    <div class="col-sm-6">
      <button type="submit" class="btn btn-sm float-right btn-primary gb-btn-order rounded-0">Ubah Data</button>
      <a href="<?= site_url('report/data_pelanggan'); ?>" class="btn btn-danger rounded-0 mr-2 btn-sm mb-3 float-right">Batal</a>
    </div>
  </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->