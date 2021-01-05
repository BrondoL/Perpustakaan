<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?= form_error('kode_buku', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('judul', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('penerbit', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('pengarang', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tahun_terbit', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jumlah', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('keterangan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newTambahModal">Tambah Buku</a>
            <div class="row">
                <div class="col-lg-7">
                    <form action="<?= base_url('perpus'); ?>" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari......" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $b) : ?>
                        <tr>
                            <th scope="row" style="vertical-align: middle;"><?= $i++; ?></th>
                            <td><img src="<?= base_url('assets/img/buku/') . $b['sampul']; ?>" alt="" class="img-thumbnail" style="width: 70px;"></td>
                            <td style="vertical-align: middle;"><?= $b['kode_buku']; ?></td>
                            <td style="vertical-align: middle;"><?= $b['judul']; ?></td>
                            <td style="vertical-align: middle;"><?= $b['jumlah']; ?></td>
                            <td style="vertical-align: middle;">
                                <a href="<?= base_url('perpus/detailbuku/') . $b['buku_id']; ?>" class="badge badge-warning">Detail</a>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#editBukuModal<?= $b['buku_id']; ?>">Edit</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteBukuModal<?= $b['buku_id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newTambahModal" tabindex="-1" aria-labelledby="newTambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTambahModalLabel">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('perpus'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Kode Buku">
                    </div>
                    <div class="div-col-sm-9 mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="sampul" name="sampul">
                            <label class="custom-file-label" for="sampul">Sampul Buku</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Tahun terbit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="tambahbuku">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($buku as $b) : ?>
    <div class="modal fade" id="editBukuModal<?= $b['buku_id']; ?>" tabindex="-1" aria-labelledby="editBukuModal<?= $b['buku_id']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBukuModal<?= $b['buku_id']; ?>">Edit Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('perpus/editBuku/') . $b['buku_id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="<?= $b['kode_buku']; ?>">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/buku/') . $b['sampul']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="div-col-sm-9 mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="sampul" name="sampul" value="<?= $b['sampul']; ?>">
                                            <label class="custom-file-label" for="sampul">Sampul Buku</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $b['judul']; ?>">
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $b['penerbit']; ?>">
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $b['pengarang']; ?>">
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $b['th_terbit']; ?>">
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $b['jumlah']; ?>">
                        </div>
                        <div class=" form-group">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $b['ket']; ?>">
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteBukuModal<?= $b['buku_id']; ?>" tabindex="-1" aria-labelledby="deleteBukuModal<?= $b['buku_id']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBukuModal<?= $b['buku_id']; ?>">Delete Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('perpus/deleteBuku/') . $b['buku_id']; ?>" method="POST">
                    <div class="modal-body">Apakah anda yakin ingin menghapus buku <?= $b['judul']; ?> ?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>