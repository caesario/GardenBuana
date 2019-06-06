<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="h4 mb-4 text-gray-800"><?= $title; ?></h4>

  <!-- <?php var_dump($p_admin); ?> -->


  <form class="gb-size-form" action="" method="post">
    <div class="row">
      <div class="col-6">
        <div class="form-group row">
          <label for="namaWeb" class="col-sm-3 col-form-label">Nama Web</label>
          <div class="col">
            <input type="text" class="form-control form-control-sm" id="namaWeb" name="namaWeb" placeholder="" value="<?= $p_admin['nama_web']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-3 col-form-label">Email</label>
          <div class="col">
            <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="" value="<?= $p_admin['email']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="noTelpon" class="col-sm-3 col-form-label">Nomor Telpon</label>
          <div class="col">
            <input type="text" class="form-control form-control-sm" id="noTelpon" name="noTelpon" placeholder="" value="<?= $p_admin['telpon']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col">
            <textarea rows="3" type="textatextrea" class="form-control form-control-sm" id="alamat" nama="alamat" placeholder=""><?= $p_admin['alamat']; ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="aboutFooter" class="col-sm-3 col-form-label">About Footer</label>
          <div class="col">
            <textarea rows="7" type="textatextrea" class="form-control form-control-sm" id="aboutFooter" nama="aboutFooter" placeholder=""><?= $p_admin['about_footer']; ?></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label for="logo" class="col-sm-3 col-form-label">Upload Logo</label>
          <div class="col-sm-4">
            <input type="file" class="form-control-file" id="logo" name="logo">
          </div>
        </div>

      </div>
      <div class="col-6">
        <div class="form-group row">
          <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
          <div class="col">
            <input type="text" class="form-control form-control-sm" id="twitter" name="twitter" placeholder="" value="<?= $p_admin['twitter']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="facebook" class="col-sm-3 col-form-label">facebook</label>
          <div class="col">
            <input type="text" class="form-control form-control-sm" id="facebook" name="facebook" placeholder="" value="<?= $p_admin['facebook']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="instagram" class="col-sm-3 col-form-label">instagram</label>
          <div class="col">
            <input type="text" class="form-control form-control-sm" id="instagram" name="instagram" placeholder="" value="<?= $p_admin['instagram']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="linkedin" class="col-sm-3 col-form-label">linkedin</label>
          <div class="col">
            <input type="text" class="form-control form-control-sm" id="linkedin" name="linkedin" placeholder="" value="<?= $p_admin['linkedin']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="aboutUs" class="col-sm-3 col-form-label">About Footer</label>
          <div class="col">
            <textarea rows="11" type="textatextrea" class="form-control form-control-sm" id="aboutUs" nama="aboutUs" placeholder=""><?= $p_admin['about_us']; ?></textarea>
          </div>
        </div>
      </div>

      <div class="col">
        <button class="btn btn-sm float-right btn-primary gb-btn-order rounded-0">Simpan</button>
      </div>
    </div>
  </form>






</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->