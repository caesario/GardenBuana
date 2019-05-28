  <!--==========================
    Intro Section
  ============================-->
  <!-- <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="<?= base_url('assets/img/intro-img.svg'); ?>" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>Kami menyediakan<br><span>Solusi untuk</span><br>tanaman anda!</h2>
        <div>
          <a href="<?= site_url('Auth/bridgeDaftar'); ?>" class="btn-get-started scrollto">Bergabung</a>
          <a href="#services" class="btn-services scrollto">Cari Vendor</a>
        </div>
      </div>

    </div>
  </section>


    <--==========================
      Clients Section
    ============================-->
  <section id="clients" class="section-bg">

    <div class="container wow fadeInUp">

      <div class="section-header mt-5">
        <h4 class="text-left">Temukan Vendor</h4>
      </div>

      <section class="search-sec mb-4">
        <div class="container">
          <form action="#" method="post" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <select class="form-control search-slt" id="exampleFormControlSelect1">
                      <option>Pilih Kota</option>
                      <?php foreach ($kota as $data) : ?>
                        <option><?= $data['nama_kota']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 p-0">
                    <input type="text" class="form-control search-slt" placeholder="Ketik Nama Vendor">
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <button type="button" class="btn btn-primary wrn-btn">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>


      <div class="clearfix wow fadeInUp">
        <div class="row card-deck">
          <?php foreach ($vendor as $data) : ?>
            <div class="col-3 p-0">
              <a href="<?= site_url('Vendor/detail_vendor/'); ?><?= $data['id_vendor']; ?>">
                <div class="card rounded-0 mb-4">
                  <img class="card-img-top p-3 pb-0 gb-img-size" src="<?= base_url('assets/img/clients/client-3.png'); ?>" alt="Card image cap">
                  <div class="card-footer">
                    <h6 class="text-muted m-0"><?= $data['nama_vendor']; ?></h6>
                    <p class="gb-p-list"><?= $data['nama_kota']; ?></p>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>


        <!-- <div class="col-lg-3 col-md-4 col-xs-6">
          <a href="<?= site_url('Vendor/detailVendor'); ?>" title="">
            <div class="client-logo">
              <img src="<?= base_url('assets/img/clients/client-1.png'); ?>" class="img-fluid" alt="">
            </div>
            <h6>Vendor Name</h6>
            <p>Meruya</p>
          </a>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <a href="" title="">
            <div class="client-logo">
              <img src="<?= base_url('assets/img/clients/client-2.png'); ?>" class="img-fluid" alt="">
            </div>
          </a>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="<?= base_url('assets/img/clients/client-3.png'); ?>" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="<?= base_url('assets/img/clients/client-4.png'); ?>" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="<?= base_url('assets/img/clients/client-5.png'); ?>" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="<?= base_url('assets/img/clients/client-6.png'); ?>" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="<?= base_url('assets/img/clients/client-7.png'); ?>" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="<?= base_url('assets/img/clients/client-8.png'); ?>" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="<?= base_url('assets/img/clients/client-6.png'); ?>" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="<?= base_url('assets/img/clients/client-7.png'); ?>" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="<?= base_url('assets/img/clients/client-8.png'); ?>" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="<?= base_url('assets/img/clients/client-8.png'); ?>" class="img-fluid" alt="">
          </div>
        </div> -->

      </div>

    </div>

  </section> <!-- #Client -->