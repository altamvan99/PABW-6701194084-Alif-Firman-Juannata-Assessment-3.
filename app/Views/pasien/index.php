<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Berhasil <?php session()->getFlashdata('message'); ?></strong>
        </div>
    <?php endif; ?>



    <div class="card">
        <div class="card-header">

        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modaltambah">
            <i class="fa fa-plus"> Tambah Data </i>
        </button>  
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id </th>
                        <th>nisn</th>
                        <th>Nama Lengkap</th>


                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pasien as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nisn'] ?></td>
                            <td><?= $row['nama'] ?></td>





                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalubah" class="btn btn-sm btn-warning" id="btn-edit" data-id="<?= $row['id']; ?>" data-nisn="<?= $row['nisn']; ?>" data-nama="<?= $row['nama']; ?>"><i class=" fa fa-edit"></i></button>
                                <button type="button" data-toggle="modal" data-target="#modalhapus" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>

            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="modalhapus">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/pasien/hapus/<?= $row['id']; ?>" class="btn btn-primary"> Yakin</a>
            </div>
        </div>
    </div>
</div>








<div class="modal fade" id="modaltambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
            </div>
                <div class="modal-body">
                    <form action="<?= base_url('pasien/tambah');?>" method="post">
                        <div class="form-group mb-0">
                        <label for="nisn"></label>
                        <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukan NISN">
                        </div>
                        <div class="form-group mb-0">
                        <label for="nama"></label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama ">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalubah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
            </div>
                <div class="modal-body">
                    <form action="<?= base_url('pasien/ubah');?>" method="post">
                    <input type="text" name="id" id="id-siswa">
                        <div class="form-group mb-0">
                        <label for="nisn"></label>
                        <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukan NISN" value="<?= $row ['nisn']?>">
                        </div>
                        <div class="form-group mb-0">
                        <label for="nama"></label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" value="<?= $row ['nama']?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button type="submit" name="ubah" class="btn btn-primary">ubah Data</button>
                </div>
                </form>
        </div>
    </div>
</div>
