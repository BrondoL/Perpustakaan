    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?= $title; ?></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg">
                        <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= form_error('password1', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= form_error('password2', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>

                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMemberModal">Tambah Member</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope=" col">No.</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($member as $m) : ?>
                                    <tr>
                                        <th scope="row" style="vertical-align: middle;"><?= $i++; ?></th>
                                        <td style="vertical-align: middle;"><img src="<?= base_url('assets/img/profile/') . $m['image']; ?>" alt="" class="img-thumbnail" style="width: 70px;"></td>
                                        <td style="vertical-align: middle;"><?= $m['name']; ?></td>
                                        <td style="vertical-align: middle;"><?= $m['email']; ?></td>
                                        <td style="vertical-align: middle;"><?= date('d F Y', $m['date_created']); ?></td>
                                        <td style="vertical-align: middle;">
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editMemberModal<?= $m['id']; ?>">Edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteMemberModal<?= $m['id']; ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="newMemberModal" tabindex="-1" aria-labelledby="newTambahMemberModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newTambahMemberModalLabel">Tambah Member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('perpus/datamember'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="div-col-sm-9 mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Foto Profile</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="tambahmember">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php foreach ($member as $m) : ?>
                    <div class="modal fade" id="editMemberModal<?= $m['id']; ?>" tabindex="-1" aria-labelledby="editMemberModal<?= $m['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMemberModal<?= $m['id']; ?>">Edit Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?php echo base_url('perpus/editMember/') . $m['id']; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" value="<?= $m['name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" value="<?= $m['email']; ?>">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img src="<?= base_url('assets/img/profile/') . $m['image']; ?>" class="img-thumbnail">
                                                    </div>
                                                    <div class="div-col-sm-9 mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="image" name="image" value="<?= $m['image']; ?>">
                                                            <label class="custom-file-label" for="image">Foto Profile</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password1" name="password1" placeholder="New Password">
                                        </div>
                                        <div class=" form-group">
                                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
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

                    <div class="modal fade" id="deleteMemberModal<?= $m['id']; ?>" tabindex="-1" aria-labelledby="deleteMemberModal<?= $m['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteMemberModal<?= $m['id']; ?>">Delete Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?php echo base_url('perpus/deleteMember/') . $m['id']; ?>" method="POST">
                                    <div class="modal-body">Apakah anda yakin ingin menghapus member <?= $m['name']; ?> ?</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>