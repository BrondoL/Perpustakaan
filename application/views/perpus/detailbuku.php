<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
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
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->