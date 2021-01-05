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
                <div class="container">
                    <center>
                        <div class="card mb-3 col-lg">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <img src="<?= base_url('assets/img/buku/') . $buku['sampul']; ?>" class="card-img" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5"><?= $buku['judul']; ?></h4>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Penulis</th>
                                                    <td>: <?= $buku['pengarang']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tahun Terbit</th>
                                                    <td>: <?= $buku['th_terbit']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">ISBN</th>
                                                    <td>: <?= $buku['kode_buku']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Penerbit</th>
                                                    <td>: <?= $buku['penerbit']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p class="card-text"><?= $buku['ket']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>