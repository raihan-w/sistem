<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Surat Bidik Misi</h1>
    </div>

    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <h5 class="font-weight-bold text-primary">Pemohon</h5>
            <form action="" method="POST">
                <div class="m-2 row">
                    <label for="" class="col-sm-2 col-form-label"> NIK Orang Tua </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="key1" required>
                    </div>
                </div>
                <div class="m-2 row">
                    <label for="" class="col-sm-2 col-form-label"> NIK Anak </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="key2" required>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <br>
            <div class="row">
                <div class="col-xl-6">
                    <h5 class="font-weight-bold text-primary">Orang Tua</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td> : </td>
                                <td class="isian"> </td>
                            </tr>
                            <tr>
                                <td>Tampat/Tanggal Lahir</td>
                                <td> : </td>
                                <td class="isian"> </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td> : </td>
                                <td class="isian"> </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td> : </td>
                                <td class="isian"> </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td> : </td>
                                <td class="isian"> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-6">
                    <h5 class="font-weight-bold text-primary">Anak</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td> : </td>
                                <td class="isian"> </td>
                            </tr>
                            <tr>
                                <td>Tampat/Tanggal Lahir</td>
                                <td> : </td>
                                <td class="isian"> </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td> : </td>
                                <td class="isian"> </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td> : </td>
                                <td class="isian"> </td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td> : </td>
                                <td class="isian"> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group px-4 text-right">
                <button type="submit" class="btn btn-success"> <i class="fas fa-print text-white-50"></i> Cetak</button>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>