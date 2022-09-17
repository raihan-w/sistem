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
            <h5 class="font-weight-bold text-primary">Surat Keterangan Bidik Misi</h5>
            <hr>
            <!-- Form Pencarian -->
            <form action="" method="GET">
                <?php $request = \Config\Services::request(); ?>
                <div class="m-2 row">
                    <div class="col-md-6">
                        <label for="" class="form-label"> NIK Orang Tua </label>
                        <input type="text" class="form-control" name="key1" value="<?= $request->getVar('key1'); ?>" required>
                    </div>
                    <div class="col-sm-6 row">
                        <div class="col-md-10">
                            <label for="" class="form-label"> NIK Anak </label>
                            <input type="text" class="form-control" name="key2" value="<?= $request->getVar('key2'); ?>" required>
                        </div>
                        <div class="col-sm-2 mt-4 pt-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <div class="m-2 row">
                <?php if ($ortu != null) : ?>
                    <div class="col-xl-6">
                        <table class="px-2 table table-sm">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td> : </td>
                                    <td class="isian"> <?= $ortu['nama']; ?> </td>
                                </tr>
                                <tr>
                                    <td>Tempat/Tgl Lahir</td>
                                    <td> : </td>
                                    <td class="isian"> <?= $ortu['tpt_lahir']; ?> , <?= $ortu['tgl_lahir']; ?> </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td> : </td>
                                    <td class="isian"> <?= $ortu['jenkel']; ?> </td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td> : </td>
                                    <td class="isian"> <?= $ortu['pekerjaan']; ?> </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td> : </td>
                                    <td class="isian"> <?= $ortu['alamat']; ?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>
                <?php if ($anak != null) : ?>
                    <div class="col-xl-6">
                        <table class="px-2 table table-sm">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td> : </td>
                                    <td class="isian"> <?= $anak['nama']; ?> </td>
                                </tr>
                                <tr>
                                    <td>Tempat/Tgl Lahir</td>
                                    <td> : </td>
                                    <td class="isian"> <?= $anak['tpt_lahir']; ?> , <?= $anak['tgl_lahir']; ?> </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td> : </td>
                                    <td class="isian"> <?= $anak['jenkel']; ?> </td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td> : </td>
                                    <td class="isian"> <?= $anak['pekerjaan']; ?> </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td> : </td>
                                    <td class="isian"> <?= $anak['alamat']; ?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>
            </div>
            <hr>
            <!-- Form Surat -->
            <form action="" method="" class="user">
                <?= csrf_field(); ?>
                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> Nomor Surat </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="" required>
                    </div>
                </div>
                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> Penghasilan Orang Tua </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="" required>
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