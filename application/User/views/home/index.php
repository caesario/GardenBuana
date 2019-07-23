  <!--==========================
    Intro Section
  ============================-->


  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="<?= base_url('assets/img/intro-img.svg'); ?>" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>Kami menyediakan<br><span>Solusi untuk</span><br>tanaman anda!</h2>
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

        <!-- <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="<?= base_url('assets/img/clients/client-2.png'); ?>" class="img-fluid" alt="">
            </div>
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
          </div> -->

      </div>

      <div class="Button wow fadeInUp" align="center">
        <a href="<?= site_url('Vendor'); ?>" class="btn btn-primary center-block align-center rounded-0" align="center" title="">Lihat lebih banyak</a>
      </div>

    </div>

  </section> <!-- #Client -->


  <!--==========================
        About Us Section
      ============================-->
  <section id="about">
    <div class="container">

      <header class="section-header">
        <h3>Tentang Kami</h3>
        <p>Kami selalu berusaha memberikan yang terbaik, jangan ragu untuk menggunakan jasa Vendor kami, karena kepuasan Anda merupakan konsistensi usaha kami</p>
      </header>

      <div class="row about-container">

        <div class="col-lg-6 content order-lg-1 order-2 wow fadeInUp">
          <p>
            Kami memiliki Vendor taman yang trampil dan kreatif. Anda bisa mendiskusikan apa saja kebutuhan Anda yang berhubungan dengan taman yang ingin Anda buat. Mulai dari konsultasi tanaman hias yang ingin Anda gunakan, bahkan sampai dengan hal-hal lain yang lebih detil.
          </p>

          <div class="icon-box wow fadeInUp">
            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
            <h4 class="title"><a href="">Mengapa Kami</a></h4>
            <p class="description">Terampil, Profesional, Rapih, Tepat waktu dalam pekerjaan yang Vendor kami kerjakan</p>
          </div>

          <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-photo"></i></div>
            <h4 class="title"><a href="">Misi Kami</a></h4>
            <p class="description">Memberikan Jasa yang berkualitas secara berkesinambungan sesuai dengan kebutuhan anda</p>
          </div>

          <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
            <div class="icon"><i class="fa fa-bar-chart"></i></div>
            <h4 class="title"><a href="">Visi Kami</a></h4>
            <p class="description">Kepuasan pelanggan merupakan kunci sukses kami dalam usaha yang kami jalani</p>
          </div>

        </div>

        <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
          <img src="<?= base_url('assets/img/about-img.svg'); ?>" class="img-fluid" alt="">
        </div>
      </div>

      <div class="row about-extra">
        <div class="col-lg-6 wow fadeInUp">
          <img src="<?= base_url('assets/img/about-extra-1.svg'); ?>" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
          <h4>Bergabunglah bersama kami untuk meningkatkan bisnis anda</h4>
          <p>
            Untuk Pertama Kalinya Kami hadir untuk memberi kemudahan untuk anda para pencari Vendor dekor taman hias
            daftar kan jasa anda untuk meningkatkan peliang bisnis anda. <br><br>
            Hanya dengan satu aplikasi ada mencari pelanggan, bagaimana memasarkan jasa dan mendapat keuntungan
            Kami memberikan desain baru dan lengkap untuk transaksi pemesanan hingga pembayaran.
          </p>
          <p>
            Ad vitae recusandae odit possimus. Quaerat cum ipsum corrupti. Odit qui asperiores ea corporis deserunt veritatis quidem expedita perferendis. Qui rerum eligendi ex doloribus quia sit. Porro rerum eum eum.
          </p>
        </div>
      </div>

      <!-- <div class="row about-extra">
        <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
          <img src="<?= base_url('assets/img/about-extra-2.svg'); ?>" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
          <h4>Neque saepe temporibus repellat ea ipsum et. Id vel et quia tempora facere reprehenderit.</h4>
          <p>
            Delectus alias ut incidunt delectus nam placeat in consequatur. Sed cupiditate quia ea quis. Voluptas nemo qui aut distinctio. Cumque fugit earum est quam officiis numquam. Ducimus corporis autem at blanditiis beatae incidunt sunt.
          </p>
          <p>
            Voluptas saepe natus quidem blanditiis. Non sunt impedit voluptas mollitia beatae. Qui esse molestias. Laudantium libero nisi vitae debitis. Dolorem cupiditate est perferendis iusto.
          </p>
          <p>
            Eum quia in. Magni quas ipsum a. Quis ex voluptatem inventore sint quia modi. Numquam est aut fuga mollitia exercitationem nam accusantium provident quia.
          </p>
        </div>

      </div> -->

    </div>
  </section><!-- #about -->


  <!--==========================
        Clients Section
      ============================-->
  <section id="testimonials" class="section-bg">
    <div class="container">

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