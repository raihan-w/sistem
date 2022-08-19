<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Penduduk</h1>
        <a href="" class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#editModal">
            <i class="fas fa-edit fa-sm text-white-50"></i>
            <span class="text">Edit Data</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body m-2">
            <div class="px-2 py-2 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold">Nama Lengkap : <?= $penduduk['nama']; ?></h4>
                <span>
                    NIK : <?= $penduduk['nik']; ?>
                </span>
            </div>
            <hr>
            <table class="table table-sm table-borderless">
                <tbody>
                    <tr>
                        <th> Tempat/Tanggal Lahir </th>
                        <td> : <?= $penduduk['tpt_lahir']; ?>, <?= $penduduk['tgl_lahir']; ?> </td>
                    </tr>
                    <tr>
                        <th> Jenis Kelamin </th>
                        <td> : <?= $penduduk['jenkel']; ?> </td>
                        <th> Golongan Darah </th>
                        <td> : <?= $penduduk['goldar']; ?> </td>
                    </tr>
                    <tr>
                        <th> Agama </th>
                        <td> : <?= $penduduk['agama']; ?> </td>
                    </tr>
                    <tr>
                        <th> Pendidikan </th>
                        <td> : <?= $penduduk['pendidikan']; ?> </td>
                    </tr>
                    <tr>
                        <th> Pekerjaan </th>
                        <td> : <?= $penduduk['pekerjaan']; ?> </td>
                    </tr>
                    <tr>
                        <th> Status Pernikahan </th>
                        <td> : <?= $penduduk['pernikahan']; ?> </td>
                    </tr>
                    <tr>
                        <th> Hubungan Keluarga </th>
                        <td> : <?= $penduduk['hub_keluarga']; ?> </td>
                    </tr>
                    <tr>
                        <th> Kewarganegaraan </th>
                        <td> : <?= $penduduk['status']; ?> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Penduduk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="<?= base_url('kependudukan/update'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body flex-column border-top-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label"> NIK </label>
                                <input type="text" class="form-control" name="nik" value="<?= $penduduk['nik']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label"> Nama Lengkap </label>
                                <input type="text" class="form-control" name="nama" value="<?= $penduduk['nama']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label"> Tempat Lahir </label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $penduduk['tpt_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label"> Tanggal Lahir </label>
                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $penduduk['tgl_lahir']; ?>">
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
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" <?= $penduduk['jenkel'] == "Laki-laki" ? "checked" : "" ?>>
                                    <label class="form-check-label" for=""> Laki-laki </label>
                                </div>
                                <div class="form-check form-check-inline px-2 ">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" <?= $penduduk['jenkel'] == "Perempuan" ? "checked" : "" ?>>
                                    <label class="form-check-label" for=""> Perempuan </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label"> Golongan Darah<span class="tab1"></span> </label>
                                <div class="form-check form-check-inline px-2 pl-2">
                                    <input class="form-check-input" type="radio" name="gol_darah" value="A" <?= $penduduk['goldar'] == "A" ? "checked" : ""; ?>>
                                    <label class="form-check-label" for=""> A </label>
                                </div>
                                <div class="form-check form-check-inline px-2 ">
                                    <input class="form-check-input" type="radio" name="gol_darah" value="B" <?= $penduduk['goldar'] == "B" ? "checked" : ""; ?>>
                                    <label class="form-check-label" for=""> B </label>
                                </div>
                                <div class="form-check form-check-inline px-2 ">
                                    <input class="form-check-input" type="radio" name="gol_darah" value="O" <?= $penduduk['goldar'] == "O" ? "checked" : ""; ?>>
                                    <label class="form-check-label" for=""> O </label>
                                </div>
                                <div class="form-check form-check-inline px-2 ">
                                    <input class="form-check-input" type="radio" name="gol_darah" value="AB" <?= $penduduk['goldar'] == "AB" ? "checked" : ""; ?>>
                                    <label class="form-check-label" for=""> AB </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label"> Pendidikan </label>
                                <select name="pendidikan" class="form-control form-select">
                                    <?php foreach ($pendidikan as $key) : ?>
                                        <option value="<?= $key['id']; ?>" <?= $key['id'] == $penduduk['id'] ? "selected" : null ?>><?= $key['pendidikan']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label"> Pekerjaan </label>
                                <input type="text" name="pekerjaan" class="form-control" value="<?= $penduduk['pekerjaan']; ?>">
                            </div>
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
                                <input type="text" class="form-control" name="hub_keluarga" value="<?= $penduduk['hub_keluarga']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label"> Kewarganegaraan </label>
                                <input type="text" class="form-control" name="status" value="<?= $penduduk['status']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-save text-white-50"></i> Simpan </button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>