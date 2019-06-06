<!--==========================
    Footer
  ============================-->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6 footer-info">
          <?php foreach ($info_web as $data) : ?>
            <h3><?= $data['nama_web']; ?></h3>

            <p><?= $data['about_footer']; ?></p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Link Menu</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak Kami</h4>
            <p>
              <?= $data['alamat']; ?><br>
              <strong>Phone:</strong> <?= $data['telpon']; ?><br>
              <strong>Email:</strong> <?= $data['email']; ?><br>
            </p>

            <div class="social-links">
              <a href="<?= $data['twitter']; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="<?= $data['facebook']; ?>" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="<?= $data['instagram']; ?>" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="<?= $data['linkedin']; ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Berlangganan</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>Garden Buana</strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
            -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> & <a href="">GardenBuana</a>
    </div>
  </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- JavaScript Libraries -->
<script src="<?= base_url('assets/lib/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/jquery/jquery-migrate.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/easing/easing.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/mobile-nav/mobile-nav.js'); ?>"></script>
<script src="<?= base_url('assets/lib/wow/wow.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/waypoints/waypoints.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/counterup/counterup.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/isotope/isotope.pkgd.min.js'); ?>"></script>
<script src="<?= base_url('assets/lib/lightbox/js/lightbox.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="<?= base_url('assets/js/temp-main.js'); ?>"></script>

</body>

</html>