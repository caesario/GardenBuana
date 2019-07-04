<!--==========================
      Clients Section
    ============================-->
<section id="clients" class="section-bg">

    <div class="container wow fadeInUp mt-5">
        <section class="bg-white px-5 py-4 rounded-0">
            <a href="<?= base_url('vendor_admin/riwayat'); ?>" class="btn btn-sm btn-danger rounded-0"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
            <div class="section-header">
                <h5 class="text-center font-weight-bold">Riwayat Pesanan Anda</h5>
            </div>

            <!-- <?php var_dump($riwayat); ?> -->

            <div class="card rounded-0">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="font-weight-bold my-0">ID Pesanan</h6>
                            <p class="my-0 gb-font-small"><?= $riwayat['id_pesanan']; ?></p>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-sm btn-primary float-right rounded-0 ml-1"><?= $riwayat['nama_status']; ?></button>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4 mt-5">
                            <h6 class="font-weight-bold my-0">Nama Pesanan</h6>
                            <p class="my-0 gb-font-small"><?= $riwayat['nama_pemesan']; ?></p>
                        </div>
                        <div class="col-4 mt-5">
                            <h6 class="font-weight-bold my-0">Tanggal Pesanan</h6>
                            <p class="my-0 gb-font-small"><?= $riwayat['tanggal_pengerjaan']; ?></p>
                        </div>
                        <div class="col-4 mt-5">
                            <h6 class="font-weight-bold my-0">Nomor Telpon</h6>
                            <p class="my-0 gb-font-small"><?= $riwayat['telpon']; ?></p>
                        </div>
                        <div class="col-4 mt-5">
                            <h6 class="font-weight-bold my-0">Email</h6>
                            <p class="my-0 gb-font-small"><?= $riwayat['email']; ?></p>
                        </div>
                        <div class="col-4 mt-5">
                            <h6 class="font-weight-bold my-0">Alamat</h6>
                            <p class="my-0 gb-font-small"><?= $riwayat['alamat']; ?></p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col mt-5">
                            <h6 class="font-weight-bold my-0 text-center">Keterangan</h6>
                            <p class="my-0 gb-font-small px-5 text-center"><?= $riwayat['keterangan']; ?></p>
                        </div>
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="col-6 col-lg-9 mb-2">
                    <h6 class="mb-0 text-dark">Nama Vendor</h6>
                    <p class="text-dark font-weight-bold mb-3"><?= $riwayat['nama_vendor']; ?></p>

                    <h6 class="mb-0 text-dark">Tanggal Pengerjaan</h6>
                    <p class="text-dark font-weight-bold mb-3"><?= $data_pengerjaan['tanggal_pengerjaan']; ?></p>

                    <h6 class="mb-0 text-dark">Biaya Pengerjaan</h6>
                    <p class="text-dark font-weight-bold mb-3">Rp. <?= number_format($riwayat['harga'], 0, ".", ".") ?>,-</p>

                    <h6 class="mb-0 text-dark">Keterangan Vendor</h6>
                    <p class="text-dark font-italic"><?= $data_pengerjaan['keterangan']; ?></p>
                </div>

                <div class="col-12">
                    <h6 class="mb-3 text-dark font-weight-bold">Dokumentasi Pekerjaan</h6>
                    <div class="row card-deck" id="demo">
                        <div class="row">
                            <div class="col-3">
                                <img class="card-img-top p-3 gb-img-port mb-4 border rounded-0" src="<?= base_url('assets/img/'); ?><?= $data_pengerjaan['gambar_pengerjaan']; ?>" alt="Card image cap">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>


    </div>

</section>