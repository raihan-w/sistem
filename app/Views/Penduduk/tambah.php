<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Penduduk</h1>
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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Penduduk</h6>
        </div>
        <form class="user" action="<?= base_url('kependudukan/save'); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label"> No Kartu Keluarga </label>
                            <input type="text" class="form-control" name="kk" value="<?= old('kk'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label"> NIK </label>
                            <input type="text" class="form-control" name="nik" value="<?= old('nik'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label"> Nama Lengkap </label>
                            <input type="text" class="form-control" name="nama" value="<?= old('nama'); ?>">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-label"> Tempat Lahir </label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-label"> Tanggal Lahir </label>
                                    <input type="date" class="form-control" name="tanggal_lahir">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label"> Agama </label>
                            <select name="agama" class="form-control form-select">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label"> Jenis Kelamin<span class="tab2"></span></label>
                            <div class="form-check form-check-inline px-2 pl-2">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki">
                                <label class="form-check-label" for=""> Laki-laki </label>
                            </div>
                            <div class="form-check form-check-inline px-2 ">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                                <label class="form-check-label" for=""> Perempuan </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label"> Golongan Darah<span class="tab1"></span> </label>
                            <div class="form-check form-check-inline px-2 pl-2">
                                <input class="form-check-input" type="radio" name="gol_darah" value="A">
                                <label class="form-check-label" for=""> A </label>
                            </div>
                            <div class="form-check form-check-inline px-2 ">
                                <input class="form-check-input" type="radio" name="gol_darah" value="B">
                                <label class="form-check-label" for=""> B </label>
                            </div>
                            <div class="form-check form-check-inline px-2 ">
                                <input class="form-check-input" type="radio" name="gol_darah" value="O">
                                <label class="form-check-label" for=""> O </label>
                            </div>
                            <div class="form-check form-check-inline px-2 ">
                                <input class="form-check-input" type="radio" name="gol_darah" value="AB">
                                <label class="form-check-label" for=""> AB </label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <!-- Join Table -->
                        <div class="form-group">
                            <label for="" class="form-label"> Pendidikan </label>
                            <select name="pendidikan" class="form-control form-select">
                                <?php foreach ($pendidikan as $key) : ?>
                                    <option value="<?= $key['id']; ?>"><?= $key['pendidikan']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label"> Pekerjaan </label>
                            <input type="text" name="pekerjaan" class="form-control" value="<?= old('pekerjaan'); ?>">
                        </div>
                        <!-- Type Enum -->
                        <div class="form-group">
                            <label for="" class="form-label"> Status Perkawinan </label>
                            <select name="pernikahan" class="form-control form-select">
                                <option value="Belum Kawin"> Belum Kawin </option>
                                <option value="Kawin"> Kawin </option>
                                <option value="Cerai Hidup"> Cerai Hidup </option>
                                <option value="Cerai Mati"> Cerai Mati </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label"> Hubungan Keluarga </label>
                            <input type="text" class="form-control" name="hub_keluarga" value="<?= old('hub_keluarga'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label"> Kewarganegaraan </label>
                            <input type="text" class="form-control" name="status" value="<?= old('status'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label"> Alamat </label>
                            <textarea class="form-control" name="alamat" cols="3" rows="3"><?= old('alamat'); ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-label"> RT </label>
                                    <input type="text" class="form-control" name="rt" value="<?= old('rt'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-label"> RW </label>
                                    <input type="text" class="form-control" name="rw" value="<?= old('rw'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="m-2 form-group text-right">
                    <button type="submit" class="btn btn-success"> Simpan </button>
                </div>
        </form>
    </div>
</div>
</div>

<?= $this->endSection(); ?>