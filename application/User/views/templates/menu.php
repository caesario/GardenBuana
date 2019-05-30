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

      <?php if(@$session['role_id'] != 2) : ?>

        <nav class="main-nav float-right d-none d-lg-block">
          <ul>
            <!-- <a href="<?= site_url('Auth/logout'); ?>">Logout</a> -->
            <li class="active"><a href="<?= site_url(); ?>">Home</a></li>
            <li><a href="<?= base_url('Vendor'); ?>">Cari Vendor</a></li>
            <li><a href="<?= site_url('Testimoni'); ?>">Testimoni</a></li>
            <li><a href="<?= site_url('About'); ?>">Tentang Kami</a></li>
            <!-- <?php if ($_SESSION['id_user'] == 2) : ?> -->
              <li><a href="<?= site_url('Auth/logout'); ?>">Logout</a></li>
              <!-- <?php else : ?> -->
              <li><a href="<?= site_url('Auth'); ?>">Masuk</a></li>
              <!-- <?php endif; ?> -->
          </ul>
        </nav><!-- .main-nav -->

      <?php else : ?>

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
            </ul>
          </li>
        </ul>
      </nav><!-- .main-nav -->

    <?php endif ?>

    </div>
  </header><!-- #header -->