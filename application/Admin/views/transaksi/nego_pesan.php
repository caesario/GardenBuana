<!--==========================
      Clients Section
    ============================-->
<section id="clients" class="section-bg">

  <div class="container wow fadeInUp mt-5">
    <section class="bg-white px-5 py-4 rounded-0">
      <div class="section-header">
        <h5 class="text-center font-weight-bold">Pesanan Anda</h5>
      </div>

      <!-- <?php var_dump($trx_pesanan); ?> -->

      <div class="card rounded-0">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h6 class="font-weight-bold my-0">ID Pesanan</h6>
              <p class="my-0 gb-font-small">TRX-2JK82</p>
            </div>
            <div class="col-6">
              <button class="btn btn-sm btn-danger float-right rounded-0 ml-1">Batalkan Pesanan</button>
              <button class="btn btn-sm btn-success float-right rounded-0" data-toggle="modal" data-target="#exampleModal">Konfirmasi Pesanan</button>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="row text-center">
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Nama Pesanan</h6>
              <p class="my-0 gb-font-small">Jhon Does Rat</p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Tanggal Pesanan</h6>
              <p class="my-0 gb-font-small">24 - May - 2019</p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Nomor Telpon</h6>
              <p class="my-0 gb-font-small">0877 8284 8921</p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Email</h6>
              <p class="my-0 gb-font-small">Jhon.doe@mail.com</p>
            </div>
            <div class="col-4 mt-5">
              <h6 class="font-weight-bold my-0">Alamat</h6>
              <p class="my-0 gb-font-small">Jl. Meruya Selatan No.17 RT.02/RW.01, Jakarta Selatan</p>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col mt-5">
              <h6 class="font-weight-bold my-0 text-center">Keterangan</h6>
              <p class="my-0 gb-font-small px-5 text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae temporibus laboriosam ducimus, perspiciatis asperiores obcaecati error, consequatur quae debitis saepe quasi, impedit mollitia magni facilis. Qui placeat quo tenetur quibusdam Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-4">
        <h6 class="font-weight-bold">Nego Disini</h6>

        <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-1">
              <!-- <img src="..." class="card-img" alt="..."> -->
            </div>
            <div class="col">
              <div class="card-body p-3">
                <h6 class="card-title font-weight-bold m-0">Jhon</h6>
                <p class="card-text gb-font-small m-0">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <form>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Tulis Pesan Disini</label>
          <textarea class="form-control gb-font-small" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-sm btn-primary rounded-0 ">Kirim Pesan</button>
      </form>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content col-8 rounded-0">
          <div class="modal-header">
            <h6 class="text-center font-weight-bold">Konfirmasi Pesanan</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="mb-0 text-dark gb-font-small">Masukan Harga</p>
            <div class="col p-0 form-group">
              <input class="form-control form-control-sm mt-1 mb-3 gb-font-small rounded-0" type="text" value="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-primary rounded-0">Konfirmasi</button>
            <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Batal</button>
          </div>
        </div>
      </div>
    </div>


  </div>

</section>