<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4"><?= $title; ?></h4>
  <hr>

  <!-- <?php var_dump($pengguna); ?> -->

  <form class=" gb-size-form" action="<?= site_url('Admin/upd_verif/'.$pengguna['id_user']); ?>" method="post">
    <input type="hidden" class="form-control form-control-sm col-1" id="name" name="name" placeholder="" value="<?= $pengguna['id_user']; ?>">
    <div class="form-group row">
      <label for="namaPengguna" class="col-sm-2 col-form-label">Nama Pengguna</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="namaPengguna" name="namaPengguna" placeholder="" value="<?= $pengguna['name']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="emailPengguna" class="col-sm-2 col-form-label">Alamat Email</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="emailPengguna" name="emailPengguna" placeholder="" value="<?= $pengguna['email']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="statusPengguna" class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-4">
        <select class="form-control form-control-sm" name="status">
          <option value="1">Aktif</option>
          <option value="0">Tidak Aktif</option>
        </select>
        <!-- <input type="text" class="form-control form-control-sm" id="statusPengguna" name="statusPengguna" placeholder="" value="<?= $pengguna['is_active']; ?>"> -->
      </div>
    </div>
    <div class="col-sm-6">
      <button type="submit" class="btn btn-sm float-right btn-primary gb-btn-order rounded-0">Ubah Data</button>
    </div>
  </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->