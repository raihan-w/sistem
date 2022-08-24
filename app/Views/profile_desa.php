<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Penduduk</h1>
    </div>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Profile -->
    <div class="card shadow mb-4">
        <div class="card-body mx-3">
            <form class="user" action="<?= base_url('konfigurasi/update'); ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center my-4">
                            <img class="img-thumbnail" id="imgPreview" src="<?= base_url(); ?>/img/<?= $desa['logo']; ?>" alt="">
                        </div>
                        <input type="hidden" name="oldLogo" value="<?= $desa['logo']; ?>">
                        <div class="form-group">
                            <label class="form-label" for="">Upload Logo Desa</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>
                        <span class="kd">
                            Besar file: maksimum 2 Mb. Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                        </span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label class="form-label" for="">Kelurahan/Desa</label>
                                <input type="text" id="desa" name="desa" class="form-control" value="<?= $desa['desa']; ?>">
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label" for="">Kode Desa</label>
                                <input type="text" id="id_desa" name="id_desa" class="form-control" value="<?= $desa['id_desa']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="3" rows="3"><?= $desa['alamat']; ?></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label class="form-label" for="">Kecamatan</label>
                                <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="<?= $desa['kecamatan']; ?>">
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label" for="">Kode Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos" class="form-control" value="<?= $desa['kode_pos']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Kabupaten</label>
                                <input type="text" id="kabupaten" name="kabupaten" class="form-control" value="<?= $desa['kabupaten']; ?>">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi" class="form-control" value="<?= $desa['provinsi']; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label class="form-label" for="">Kepala Desa</label>
                                <input type="text" id="kades" name="kades" class="form-control" value="<?= $desa['kades']; ?>">
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label" for="">NIP</label>
                                <input type="text" id="nip" name="nip" class="form-control" value="<?= $desa['nip']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success"> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>