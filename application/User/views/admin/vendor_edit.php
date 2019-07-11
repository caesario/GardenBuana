<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4"><?= $title; ?></h4>
  <hr>

  <!-- <?php var_dump($detail_vendor); ?> -->

  <form class=" gb-size-form" action="<?= site_url('report/vendor_edit/' . $detail_vendor['id_vendor']); ?>" method="post">
    <input type="hidden" class="form-control form-control-sm col-1" id="name" name="name" placeholder="" value="<?= $detail_vendor['id_vendor']; ?>">
    <div class="form-group row">
      <label for="namaPengguna" class="col-sm-2 col-form-label">Nama Vendor</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="" value="<?= $detail_vendor['nama_vendor']; ?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Telpon</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="telpon" name="telpon" placeholder="" value="<?= $detail_vendor['telpon']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="kota" class="col-sm-2 col-form-label">Kota</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="kota" name="kota" placeholder="" value="<?= $detail_vendor['nama_kota']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
      <div class="col-sm-4">
        <textarea type="text" class="form-control form-control-sm" id="alamat" rows="3" name="alamat" placeholder="" value=""><?= $detail_vendor['alamat']; ?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="alamat" class="col-sm-2 col-form-label">Info Vendor</label>
      <div class="col-sm-4">
        <textarea type="text" class="form-control form-control-sm" rows="6" id="infoVendor" name="infoVendor" placeholder="" value=""><?= $detail_vendor['info_vendor']; ?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="date" class="col-sm-2 col-form-label">Bergabung Pada</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="date" name="date" placeholder="" value="<?= $detail_vendor['createTime']; ?>" readonly>
      </div>
    </div>

    <div class="col-sm-6">
      <button type="submit" class="btn btn-sm float-right btn-primary gb-btn-order rounded-0">Ubah Data</button>
      <a href="<?= site_url('report/data_vendor'); ?>" class="btn btn-danger rounded-0 mr-2 btn-sm mb-3 float-right">Batal</a>
    </div>
  </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->