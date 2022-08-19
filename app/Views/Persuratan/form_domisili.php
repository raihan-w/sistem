<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Surat Domisili</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="font-weight-bold text-primary">Pemohon</h5>
            <form action="" method="POST">
                <div class="m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> NIK </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="keyword" required>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <table class="px-2 table">
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

            <h5 class="font-weight-bold text-primary">Surat</h5>
            <div class="m-2 row">
                <label for="" class="col-sm-3 col-form-label"> Nomor Surat </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="" required>
                </div>
            </div>
            <div class="m-2 row">
                <label for="" class="col-sm-3 col-form-label"> No. Surat Keterangan RT/RW </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="" required>
                </div>
            </div>
            <div class="m-2 row">
                <label for="" class="col-sm-3 col-form-label"> Tanggal Surat Keterangan RT/RW </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="" required>
                </div>
            </div>
            <div class="m-2 row">
                <label for="" class="col-sm-3 col-form-label"> Alamat Domisili </label>
                <div class="col-sm-6">
                    <textarea name="keterangan" class="form-control" cols="3" rows="4"></textarea>
                </div>
            </div>
            <div class="m-2 row">
                <label for="" class="col-sm-3 col-form-label"> Keperluan </label>
                <div class="col-sm-6">
                    <textarea name="keterangan" class="form-control" cols="3" rows="3"></textarea>
                </div>
            </div>

            <div class="form-group px-4 text-right">
                <button type="submit" class="btn btn-success"> <i class="fas fa-print text-white-50"></i> Cetak</button>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>