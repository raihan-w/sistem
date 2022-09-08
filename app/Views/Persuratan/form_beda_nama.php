<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Surat Beda Nama</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="font-weight-bold text-primary">Surat Keterangan Beda Nama</h5>
            <hr>

            <!-- Cari Pemohon -->
            <form action="" method="POST">
                <div class="m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> NIK </label>
                    <div class="col-sm-6">
                        <?php $request = \Config\Services::request(); ?>
                        <input type="text" class="form-control" name="keyword" value="<?= $request->getVar('keyword'); ?>" required>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Form Surat -->
            <form action="<?= base_url('persuratan/save_beda_nama'); ?>" class="user" method="POST">
                <?= csrf_field(); ?>

                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> Nomor Surat </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_surat" required>
                    </div>
                </div>

                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> Keterangan </label>
                    <div class="col-sm-6">
                        <textarea name="isi_surat" class="form-control" cols="3" rows="4" required></textarea>
                    </div>
                </div>

                <hr>
                <div class="form-group px-3 mb-1 row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success" onclick="window.open('<?php echo site_url('cetak/print_beda_nama') ?>','blank')">
                            <i class="fas fa-print "></i> Cetak
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <?php if ($pemohon != null) : ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="px-2 table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td> : </td>
                            <td class="isian"> <?= $pemohon['nama']; ?> </td>
                        </tr>
                        <tr>
                            <td>Tempat/Tanggal Lahir</td>
                            <td> : </td>
                            <td class="isian"> <?= $pemohon['tpt_lahir']; ?> , <?= $pemohon['tgl_lahir']; ?> </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td> : </td>
                            <td class="isian"> <?= $pemohon['jenkel']; ?> </td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td> : </td>
                            <td class="isian"> <?= $pemohon['pekerjaan']; ?> </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td> : </td>
                            <td class="isian"> <?= $pemohon['alamat']; ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection(); ?>