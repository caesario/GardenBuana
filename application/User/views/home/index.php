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
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque dere santome nida.</p>
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
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </header>

      <div class="row about-container">

        <div class="col-lg-6 content order-lg-1 order-2 wow fadeInUp">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>

          <div class="icon-box wow fadeInUp">
            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>

          <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-photo"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>

          <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
            <div class="icon"><i class="fa fa-bar-chart"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
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
          <h4>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h4>
          <p>
            Ipsum in aspernatur ut possimus sint. Quia omnis est occaecati possimus ea. Quas molestiae perspiciatis occaecati qui rerum. Deleniti quod porro sed quisquam saepe. Numquam mollitia recusandae non ad at et a.
          </p>
          <p>
            Ad vitae recusandae odit possimus. Quaerat cum ipsum corrupti. Odit qui asperiores ea corporis deserunt veritatis quidem expedita perferendis. Qui rerum eligendi ex doloribus quia sit. Porro rerum eum eum.
          </p>
        </div>
      </div>

      <div class="row about-extra">
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

      </div>

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

            <div class="testimonial-item">
              <img src="<?= base_url('assets/img/testimonial-1.jpg'); ?>" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
              <p>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              </p>
            </div>

            <div class="testimonial-item">
              <img src="<?= base_url('assets/img/testimonial-2.jpg'); ?>" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
              <p>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              </p>
            </div>

            <div class="testimonial-item">
              <img src="<?= base_url('assets/img/testimonial-3.jpg'); ?>" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
              <p>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              </p>
            </div>

            <div class="testimonial-item">
              <img src="<?= base_url('assets/img/testimonial-4.jpg'); ?>" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
              <p>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              </p>
            </div>

            <div class="testimonial-item">
              <img src="<?= base_url('assets/img/testimonial-5.jpg'); ?>" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
              <p>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              </p>
            </div>

          </div>

        </div>
      </div>


    </div>
  </section><!-- #testimonials -->