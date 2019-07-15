<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md">
                <div class=" alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <h4 class="h4 mb-4 text-gray-800 float-left"><?= $title; ?></h4>

    <a href="javascript:window.print()" class="btn btn-primary text-white btn-sm float-right">Cetak Report<i class="ml-2 fas fa-print"></i></a>

    <div class="table-responsive">
        <table id="table_id" class="display table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Bergabung</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pengguna as $data) : ?>
                    <tr>
                        <td> <?= $i; ?></td>
                        <td><?= $data['name']; ?></td>
                        <td><?= $data['email']; ?></td>
                        <td><?= $data['nama_role']; ?></td>
                        <td>
                            <?php if ($data['is_active'] == 1) : ?>
                                Aktif
                            <?php else : ?>
                                Tidak Aktif
                            <?php endif; ?>
                        </td>
                        <td><?= $data['date_created']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->