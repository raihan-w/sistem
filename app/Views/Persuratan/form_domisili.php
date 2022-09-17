<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Surat Domisili</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">

            <h5 class="font-weight-bold text-primary">Surat Keterangan Domisili</h5>
            <hr>

            <!-- Cari Pemohon -->
            <form action="" method="GET">
                <?php $request = \Config\Services::request(); ?>
                <div class="m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> NIK Pemohon </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="keyword" value="<?= $request->getVar('keyword'); ?>" required>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <br>
            <?php if ($pemohon != null) : ?>
                <table class="px-2 table table-sm">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td> : </td>
                            <td class="isian"> </td>
                        </tr>
                        <tr>
                            <td>Tempat/Tanggal Lahir</td>
                            <td> : </td>
                            <td class="isian"> </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td> : </td>
                            <td class="isian"> </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td> : </td>
                            <td class="isian"> </td>
                        </tr>
                        <tr>
                            <td>Bin/Binti</td>
                            <td> : </td>
                            <td class="isian"> </td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td> : </td>
                            <td class="isian"> </td>
                        </tr>
                        <tr>
                            <td>Alamat KTP</td>
                            <td> : </td>
                            <td class="isian"> </td>
                        </tr>
                        <tr>
                            <td>Warganegara</td>
                            <td> : </td>
                            <td class="isian"> </td>
                        </tr>
                    </tbody>
                </table>
            <?php endif ?>

            <form action="" method="" class="user">
                <?= csrf_field(); ?>
                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> Nomor Surat </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="" required>
                    </div>
                </div>
                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> No. Surat RT/RW </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="" required>
                    </div>
                </div>
                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> Tanggal Surat RT/RW </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="" required>
                    </div>
                </div>
                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> Alamat Domisili </label>
                    <div class="col-sm-6">
                        <textarea name="keterangan" class="form-control" cols="3" rows="4"></textarea>
                    </div>
                </div>
                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> Keperluan </label>
                    <div class="col-sm-6">
                        <textarea name="keterangan" class="form-control" cols="3" rows="3"></textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group px-3 mb-1 row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-print "></i> Cetak
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>