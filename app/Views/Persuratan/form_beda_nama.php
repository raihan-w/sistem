<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Surat Beda Nama</h1>
    </div>

    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="mb-3">Periksa kembali entrian form</h4>
            <?php echo session()->getFlashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="font-weight-bold text-primary">Surat Keterangan Beda Nama</h5>
            <hr>

            <!-- Cari Pemohon -->
            <form action="" method="GET">
                <div class="m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> NIK Pemohon</label>
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
            
            <?php if ($pemohon == null) : ?>
                <div class="m-3 text-center">Data Pemohon Tidak Ditemukan</div>
            <?php else : ?>
                <table class="px-2 table table-sm">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td> : </td>
                            <td class="isian"> <?= $pemohon['nama']; ?> </td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl Lahir</td>
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
            <?php endif ?>

            <!-- Form Surat -->
            <form action="<?= base_url('persuratan/beda_nama'); ?>" method="POST" class="user" <?php if (empty(session()->getFlashdata('error'))) {
                                                                                                    echo "target='_blank'";
                                                                                                } ?>>
                <?= csrf_field(); ?>

                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> Nomor Surat </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_surat">
                    </div>
                </div>

                <div class="form-group m-2 row">
                    <label for="" class="col-sm-3 col-form-label"> Keterangan </label>
                    <div class="col-sm-6">
                        <textarea name="isi_surat" class="form-control" cols="3" rows="4"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" name="perihal" value="Beda Nama">
                </div>

                <div class="form-group">
                    <input type="hidden" name="nik_pemohon" value="<?= $pemohon['nik']; ?>">
                </div>

                <div class="form-group">
                    <input type="hidden" name="nama_pemohon" value="<?= $pemohon['nama']; ?>">
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