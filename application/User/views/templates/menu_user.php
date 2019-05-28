  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="<?= site_url(); ?>" class="scrollto"><img src="<?= base_url('assets/img/logobaru.jpeg'); ?>" alt="" class="img-fluid"></a>
      </div>


      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?= site_url(); ?>">Home</a></li>
          <li><a href="<?= base_url('vendor'); ?>">Cari Vendor</a></li>
          <li><a href="<?= site_url('Testimoni'); ?>">Testimoni</a></li>
          <li><a href="<?= site_url('About'); ?>">Tentang Kami</a></li>
          <li class="drop-down"><a href="<?= base_url('Auth/logout'); ?>">Profil</a>
            <ul>
              <li><a href="#">Edit Profil</a></li>
              <li><a href="#">Transaksi</a></li>
              <hr>
              <li><a href="<?= base_url('Auth/logout'); ?>">Keluar</a></li>
              <!-- <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
              <!-- <li><a href="#">Drop Down 5</a></li> -->
            </ul>
          </li>
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->