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
        <div class="card-body">
            <form action="<?= base_url('kependudukan/save'); ?>" class="user" method="POST">
                <?= csrf_field(); ?>

                <!-- Nomor Kartu Keluarga -->
                <div class="form-group px-3 mb-3 row">
                    <label for="kk" class="col-sm-3 col-form-label"> Nomor Kartu Keluarga </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="kk" value="<?= old('kk'); ?>">
                    </div>
                </div>

                <!-- NIK -->
                <div class="form-group px-3 mb-3 row">
                    <label for="nik" class="col-sm-3 col-form-label"> Nomor Induk Kependudukan (NIK) </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nik" value="<?= old('nik'); ?>">
                    </div>
                </div>

                <!-- Nama Lengkap -->
                <div class="form-group px-3 mb-3 row">
                    <label for="nik" class="col-sm-3 col-form-label"> Nama Lengkap </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama" value="<?= old('nama'); ?>">
                    </div>
                </div>

                <!-- Tempat & Tanggal Lahir -->
                <div class="form-group px-3 mb-3 row">
                    <div class="col-sm-6">
                        <div class="row">
                            <label for="tempat_lahir" class="col-sm-6 col-form-label"> Tempat Lahir </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label"> Tanggal Lahir </label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="tanggal_lahir">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Agama -->
                <div class="form-group px-3 mb-3 row">
                    <label for="agama" class="col-sm-3 col-form-label"> Agama </label>
                    <div class="col-sm-6">
                        <select name="agama" class="form-control form-select">
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>

                <!-- Jenis Kelamin -->
                <div class="form-group px-3 mb-3 row">
                    <label for="jenis_kelamin" class="col-sm-3 col-form-label"> Jenis Kelamin </label>
                    <div class="col-sm-6">
                        <div class="form-check form-check-inline px-2 pl-2">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki">
                            <label class="form-check-label" for=""> Laki-laki </label>
                        </div>
                        <div class="form-check form-check-inline px-2 ">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                            <label class="form-check-label" for=""> Perempuan </label>
                        </div>
                    </div>
                </div>

                <!-- Golongan Darah -->
                <div class="form-group px-3 mb-3 row">
                    <label for="gol_darah" class="col-sm-3 col-form-label"> Golongan Darah </label>
                    <div class="col-sm-6">
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

                <!-- Pendidikan -->
                <div class="form-group px-3 mb-3 row">
                    <label for="pendidikan" class="col-sm-3 col-form-label"> Pendidikan </label>
                    <div class="col-sm-6">
                        <select name="pendidikan" class="form-control form-select">
                            <?php foreach ($pendidikan as $key) : ?>
                                <option value="<?= $key['id']; ?>"><?= $key['pendidikan']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <!-- Pekerjaan -->
                <div class="form-group px-3 mb-3 row">
                    <label for="pekerjaan" class="col-sm-3 col-form-label"> Pekerjaan </label>
                    <div class="col-sm-6">
                        <input type="text" name="pekerjaan" class="form-control" value="<?= old('pekerjaan'); ?>">
                    </div>
                </div>

                <!-- Pernikahan -->
                <div class="form-group px-3 mb-3 row">
                    <label for="pernikahan" class="col-sm-3 col-form-label"> Status Pernikahan </label>
                    <div class="col-sm-6">
                        <select name="pernikahan" class="form-control form-select">
                            <option value="Belum Kawin"> Belum Kawin </option>
                            <option value="Kawin"> Kawin </option>
                            <option value="Cerai Hidup"> Cerai Hidup </option>
                            <option value="Cerai Mati"> Cerai Mati </option>
                        </select>
                    </div>
                </div>

                <!-- Hubungan Keluarga -->
                <div class="form-group px-3 mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"> Hubungan Keluarga </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="hub_keluarga" value="<?= old('hub_keluarga'); ?>">
                    </div>
                </div>

                <!-- Alamat -->
                <div class="form-group px-3 mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"> Alamat </label>
                    <div class="col-sm-6">
                        <textarea class="form-control mb-3" name="alamat" cols="3" rows="3"><?= old('alamat'); ?></textarea>
                        <div class="row">
                            <label for="tempat_lahir" class="col-sm-3 col-form-label"> RT </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="rt" value="<?= old('rt'); ?>">
                            </div>
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label"> RW </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="rw" value="<?= old('rw'); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kewarganegaraan -->
                <div class="form-group px-3 mb-4 row">
                    <label for="" class="col-sm-3 col-form-label"> Kewarganegaraan </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="status" value="<?= old('status'); ?>">
                    </div>
                </div>

                <hr>
                <div class="form-group px-3 mb-1 row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success"> Tambah Data </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>