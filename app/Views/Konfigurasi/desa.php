<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Desa</h1>
        <a href="#" class="btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#updateModal">
            <i class="fas fa-pen fa-sm text-white-50"></i>
            <span class="text">Edit</span>
        </a>
    </div>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="mb-3">Periksa kembali entrian form</h4>
            <?php echo session()->getFlashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <div class="card shadow mb-3">
        <div class="row m-2">
            <div class="col-md-4">
                <div class="text-center py-5">
                    <img src="<?= base_url('/img/' . $data['logo']); ?>" class="img-fluid rounded-start w-50" alt="logo">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">Pemerintah Desa <?= $data['desa']; ?></h4>
                    <p class="card-text"><?= $data['alamat']; ?> Kode Pos <?= $data['kode_pos']; ?></p>
                    <table class="table table-sm table-borderless w-5">
                        <tbody>
                            <tr>
                                <td>Kecamatan <?= $data['kecamatan']; ?></td>
                            </tr>
                            <tr>
                                <td>Kabupaten <?= $data['kabupaten']; ?></td>
                            </tr>
                            <tr>
                                <td>Provinsi <?= $data['provinsi']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="card-text"><small class="text-muted">Kode Desa <?= $data['kode_desa']; ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Desa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="<?= base_url('desa/update/' . $data['id']); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body flex-column border-top-0 mx-2">
                    <div class="text-center my-4">
                        <img class="img-thumbnail" id="imgPreview" src="<?= base_url(); ?>/img/<?= $data['logo']; ?>" alt="">
                    </div>
                    <input type="hidden" name="oldLogo" value="<?= $data['logo']; ?>">
                    <div class="form-group">
                        <label class="form-label" for="">Logo Desa</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                        <small class="text-muted">
                            Besar file maksimum 2 Mb. Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                        </small>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-label" for="">Kelurahan/Desa</label>
                                <input type="text" id="desa" name="desa" class="form-control" value="<?= $data['desa']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="">Kode Desa</label>
                                <input type="text" id="kode_desa" name="kode_desa" class="form-control" value="<?= $data['kode_desa']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-label" for="">Kecamatan</label>
                                <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="<?= $data['kecamatan']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="">Kode Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos" class="form-control" value="<?= $data['kode_pos']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="">Kabupaten</label>
                                <input type="text" id="kabupaten" name="kabupaten" class="form-control" value="<?= $data['kabupaten']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="">Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi" class="form-control" value="<?= $data['provinsi']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="3" rows="3"><?= $data['alamat']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    logo.onchange = evt => {
        const [file] = logo.files
        if (file) {
            imgPreview.src = URL.createObjectURL(file)
        }
    }
</script>

<?= $this->endSection(); ?>