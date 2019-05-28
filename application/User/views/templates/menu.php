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
          <a href="<?= site_url('Auth/logout'); ?>">Logout</a>
          <li class="active"><a href="<?= site_url(); ?>">Home</a></li>
          <li><a href="<?= base_url('Vendor'); ?>">Cari Vendor</a></li>
          <li><a href="<?= site_url('Testimoni'); ?>">Testimoni</a></li>
          <li><a href="<?= site_url('About'); ?>">Tentang Kami</a></li>
          <!--  <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <!-- <?php if ($_SESSION['id_user'] == 2) : ?> -->
            <li><a href="<?= site_url('Auth/logout'); ?>">Logout</a></li>
            <!-- <?php else : ?> -->
            <li><a href="<?= site_url('Auth'); ?>">Masuk</a></li>
            <!-- <?php endif; ?> -->
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->