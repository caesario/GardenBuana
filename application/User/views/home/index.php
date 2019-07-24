  <!--==========================
    Intro Section
  ============================-->


  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="<?= base_url('assets/img/flowers.png'); ?>" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>Kami menyediakan<br><span>Solusi untuk</span><br>taman anda!</h2>
        <div>
          <?php if (@$session['role_id'] == 2) : ?>
            <a href="<?= site_url('vendor'); ?>" class="btn-services scrollto">Cari Vendor</a>
          <?php else : ?>
            <a href="<?= site_url('Auth/regist'); ?>" class="btn-get-started scrollto">Bergabung</a>
            <a href="<?= site_url('vendor'); ?>" class="btn-services scrollto">Cari Vendor</a>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </section><!-- #intro -->


  <!--==========================
      Why Us Section
    ============================-->
  <section id="why-us" class="wow fadeIn">
    <div class="container">
      <header class="section-header">
        <h3>Mengapa Memilih Kami?</h3>
        <p>Kami berpengalaman dalam hal pembuatan dan renovasi taman, kami akan memberikan sentuhan terbaik dalam membuat taman impian Anda</p>
      </header>

      <div class="row row-eq-height justify-content-center">

        <div class="col-lg-4 mb-4">
          <div class="card wow bounceInUp">
            <i class="fa fa-diamond"></i>
            <div class="card-body">
              <h5 class="card-title">Negosiasi Harga</h5>
              <p class="card-text">Vendor kami akan memberikan harga terbaik untuk Anda untuk mewujudkan dan menciptakan taman <br>impian Anda.</p>
              <hr class="bg-hr">
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card wow bounceInUp">
            <i class="fa fa-language"></i>
            <div class="card-body">
              <h5 class="card-title">Vendor Berpengalaman</h5>
              <p class="card-text">Sudah ratusan pelanggan yang vendor kami tangani dan hasilnya semua pelanggan kami sangat puas dengan hasil kerja vendor kami.</p>
              <hr class="bg-hr">
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card wow bounceInUp">
            <i class="fa fa-object-group"></i>
            <div class="card-body">
              <h5 class="card-title">Banyak Pilihan Vendor</h5>
              <p class="card-text">Vendor akan mengerjakan Taman Anda sesuai dengan yang Anda mau, dan Anda dapat memilih vendor <br>kesukaan Anda.</p>
              <hr class="bg-hr">
            </div>
          </div>
        </div>

      </div>

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">274</span>
          <p>Pelanggan</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">421</span>
          <p>Transaksi Pesanan</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">1,364</span>
          <p>Jam Dukungan Kami</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">18</span>
          <p>Vendor</p>
        </div>

      </div>

    </div>
  </section>



  <!--==========================
      Clients Section
    ============================-->
  <section id="clients" class="section-bg">

    <div class="container">

      <div class="section-header">
        <h3>Temukan Vendor</h3>
        <?php
        ?>
        <p>Vendor terbaik yang ada di Garden Buana telah kami verifikasi dan terpercaya</p>
      </div>

      <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
        <?php foreach ($vendor as $data) : ?>
          <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="<?= site_url('Vendor/detail_vendor/'); ?><?= $data['id_vendor']; ?>">
              <div class="client-logo bg-container">
                <img src="<?= base_url('assets/img/'); ?><?= $data['logo']; ?>" class="img-fluid bg-image" alt="">
                <div class="bg-overlay">
                  <div class="bg-text font-weight-bold"><?= $data['nama_vendor']; ?></div>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>

      </div>

      <div class="Button wow fadeInUp" align="center">
        <a href="<?= site_url('Vendor'); ?>" class="btn btn-new center-block align-center rounded-0" align="center" title="">Lihat lebih banyak</a>
      </div>

    </div>

  </section> <!-- #Client -->


  <!--==========================
        About Us Section
      ============================-->
  <section id="about">
    <div class="container">

      <div class="bg-list-1">
        <img src="<?= base_url('assets/img/bg-1.png'); ?>" class="img-daun" alt="images">
      </div>

      <header class="section-header">
        <h3>Tentang Kami</h3>
        <p class="position-relative">Kami selalu berusaha memberikan yang terbaik, jangan ragu untuk menggunakan jasa Vendor kami, karena kepuasan Anda merupakan konsistensi usaha kami</p>
      </header>

      <div class="row about-container">

        <div class="col-lg-6 content order-lg-1 order-2 wow fadeInUp">
          <p>
            Kami memiliki Vendor taman yang trampil dan kreatif. Anda bisa mendiskusikan apa saja kebutuhan Anda yang berhubungan dengan taman yang ingin Anda buat. Mulai dari konsultasi tanaman hias yang ingin Anda gunakan, bahkan sampai dengan hal-hal lain yang lebih detil.
          </p>

          <div class="icon-box wow fadeInUp">
            <div class="icon"><i class="fa fa-shopping-bag new-color"></i></div>
            <h4 class="title"><a href="">Mengapa Kami</a></h4>
            <p class="description">Terampil, Profesional, Rapih, Tepat waktu dalam pekerjaan yang Vendor kami kerjakan</p>
          </div>

          <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-photo new-color"></i></div>
            <h4 class="title"><a href="">Misi Kami</a></h4>
            <p class="description">Memberikan Jasa yang berkualitas secara berkesinambungan sesuai dengan kebutuhan anda</p>
          </div>

          <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
            <div class="icon"><i class="fa fa-bar-chart new-color"></i></div>
            <h4 class="title"><a href="">Visi Kami</a></h4>
            <p class="description">Kepuasan pelanggan merupakan kunci sukses kami dalam usaha yang kami jalani</p>
          </div>

        </div>

        <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
          <img src="<?= base_url('assets/img/12.jpg'); ?>" class="img-fluid" alt="">
        </div>
      </div>

      <div class="row about-extra">
        <div class="col-lg-6 wow fadeInUp">
          <img src="<?= base_url('assets/img/1.png'); ?>" class="img-fluid width-70" alt="">
        </div>
        <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
          <h4>Bergabunglah bersama kami untuk meningkatkan bisnis anda</h4>
          <p>
            Untuk Pertama Kalinya Kami hadir untuk memberi kemudahan untuk anda para pencari Vendor dekor taman hias
            daftar kan jasa anda untuk meningkatkan peliang bisnis anda. <br><br>
            Hanya dengan satu aplikasi ada mencari pelanggan, bagaimana memasarkan jasa dan mendapat keuntungan
            Kami memberikan desain baru dan lengkap untuk transaksi pemesanan hingga pembayaran.
          </p>
          <!-- <p>
            Ad vitae recusandae odit possimus. Quaerat cum ipsum corrupti. Odit qui asperiores ea corporis deserunt veritatis quidem expedita perferendis. Qui rerum eligendi ex doloribus quia sit. Porro rerum eum eum.
          </p> -->
        </div>
      </div>

    </div>
  </section><!-- #about -->


  <!--==========================
        Clients Section
      ============================-->
  <section id="testimonials" class="section-bg">

    <div class="container">
      <div class="bg-list-2">
        <img src="<?= base_url('assets/img/bg-2.png'); ?>" alt="images">
      </div>
      <header class="section-header">
        <h3>Testimonials</h3>
      </header>

      <div class="row justify-content-center">
        <div class="col-lg-8">

          <div class="owl-carousel testimonials-carousel wow fadeInUp">

            <?php foreach ($testimoni as $data) : ?>
              <div class="testimonial-item">
                <img src="<?= base_url('assets/img/default.png'); ?>" class="testimonial-img" alt="">
                <h3><?= $data['name']; ?></h3>
                <h4><?= $data['nama_kota']; ?></h4>
                <p>
                  <?= $data['testimoni']; ?>
                </p>
              </div>
            <?php endforeach; ?>

          </div>

        </div>
      </div>


    </div>
  </section><!-- #testimonials -->