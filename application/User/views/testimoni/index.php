    <!--==========================
      Clients Section
    ============================-->
    <br><br>
    <section id="testimonials" class="section-bg">
        <div class="container">

            <!-- <?php var_dump($testimoni); ?> -->

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