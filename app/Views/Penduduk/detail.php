<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Penduduk</h1>
        <?php if (in_groups('administrator') || in_groups('operator')) : ?>
            <a class="btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#editModal">
                <i class="fas fa-pen fa-sm text-white-50"></i>
                <span class="text">Edit</span>
            </a>
        <?php endif ?>
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

    <div class="card shadow mb-4">
        <div class="card-body m-2">
            <div class="px-2 py-2 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold">Nama Lengkap : <?= $penduduk['nama']; ?></h4>
                <span>
                    NIK : <?= $penduduk['nik']; ?>
                </span>
            </div>
            <hr>
            <table class="table table-sm table-borderless w-75">
                <tbody>
                    <tr>
                        <th> No. Kartu Keluarga </th>
                        <td> : <?= $penduduk['kk']; ?> </td>
                    </tr>
                    <tr>
                        <th> Tempat/Tanggal Lahir </th>
                        <td> : <?= $penduduk['tpt_lahir']; ?>, <?= date('d F Y', strtotime($penduduk['tgl_lahir'])); ?> </td>
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
                    <tr>
                        <th> Alamat Domisili </th>
                        <td> : <?= $penduduk['domisili']; ?> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dokumen</h1>
        <?php if (in_groups('administrator') || in_groups('operator')) : ?>
            <a href="" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#docModal">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                <span class="text">tambah</span>
            </a>
        <?php endif ?>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if ($dokumen == null) : ?>
                <p class="text-center m-3">Tidak ada dokumen yang diunggah</p>
            <?php endif ?>
            <div class="d-flex flex-row">
                <?php foreach ($dokumen as $row) : ?>

                    <div class="card mx-3" style="width: 20rem;">
                        <div class="text-center">
                            <img src="<?= base_url('document/' . $row['file']); ?>" class="card-img-top" style="height: 200px;" onerror="this.onerror=null;this.className='py-3 w-50';this.src='<?= base_url('document/pdf-logo.png'); ?>';">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['dokumen']; ?></h5>
                            <div class="text-right">
                                <a href="<?= base_url('Dokumen/download/' . $row['id']); ?>" class="btn btn-circle btn-sm btn-success"><i class="fas fa-download"></i></a>
                                <form action="<?= base_url('Dokumen/unlink/' . $row['id']); ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-circle btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Penduduk </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
            <form class="user" action="<?= base_url('kependudukan/update/' . $penduduk['nik']) ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body flex-column border-top-0">
                    <div class="m-2 px-4">
                        <!-- Nomor Kartu Keluarga -->
                        <div class="form-group px-3 mb-3 row">
                            <label for="kk" class="col-sm-3 col-form-label"> Nomor Kartu Keluarga </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="kk" value="<?= $penduduk['kk']; ?>">
                            </div>
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="form-group px-3 mb-3 row">
                            <label for="nik" class="col-sm-3 col-form-label"> Nama Lengkap </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama" value="<?= $penduduk['nama']; ?>">
                            </div>
                        </div>

                        <!-- Tempat & Tanggal Lahir -->
                        <div class="form-group px-3 mb-3 row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label for="tempat_lahir" class="col-sm-6 col-form-label"> Tempat Lahir </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $penduduk['tpt_lahir']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label"> Tanggal Lahir </label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $penduduk['tgl_lahir']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Agama -->
                        <div class="form-group px-3 mb-3 row">
                            <label for="agama" class="col-sm-3 col-form-label"> Agama </label>
                            <div class="col-sm-6">
                                <select name="agama" class="form-control form-select">
                                    <option value="Islam" <?= $penduduk['agama'] == "Islam" ? "selected" : ""; ?>>Islam</option>
                                    <option value="Kristen" <?= $penduduk['agama'] == "Kristen" ? "selected" : ""; ?>>Kristen</option>
                                    <option value="Katolik" <?= $penduduk['agama'] == "Katolik" ? "selected" : ""; ?>>Katolik</option>
                                    <option value="Hindu" <?= $penduduk['agama'] == "Hindu" ? "selected" : ""; ?>>Hindu</option>
                                    <option value="Buddha" <?= $penduduk['agama'] == "Buddha" ? "selected" : ""; ?>>Buddha</option>
                                    <option value="Konghucu" <?= $penduduk['agama'] == "Konghucu" ? "selected" : ""; ?>>Konghucu</option>
                                </select>
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group px-3 mb-3 row">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label"> Jenis Kelamin </label>
                            <div class="col-sm-6">
                                <div class="form-check form-check-inline px-2 pl-2">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" <?= $penduduk['jenkel'] == "Laki-laki" ? "checked" : "" ?>>
                                    <label class="form-check-label" for=""> Laki-laki </label>
                                </div>
                                <div class="form-check form-check-inline px-2 ">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" <?= $penduduk['jenkel'] == "Perempuan" ? "checked" : "" ?>>
                                    <label class="form-check-label" for=""> Perempuan </label>
                                </div>
                            </div>
                        </div>

                        <!-- Golongan Darah -->
                        <div class="form-group px-3 mb-3 row">
                            <label for="gol_darah" class="col-sm-3 col-form-label"> Golongan Darah </label>
                            <div class="col-sm-6">
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

                        <!-- Pendidikan -->
                        <div class="form-group px-3 mb-3 row">
                            <label for="pendidikan" class="col-sm-3 col-form-label"> Pendidikan </label>
                            <div class="col-sm-6">
                                <select name="pendidikan" class="form-control form-select">
                                    <?php foreach ($pendidikan as $key) : ?>
                                        <option value="<?= $key['id']; ?>" <?= $key['id'] == $penduduk['id'] ? "selected" : null ?>><?= $key['pendidikan']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <!-- Pekerjaan -->
                        <div class="form-group px-3 mb-3 row">
                            <label for="pekerjaan" class="col-sm-3 col-form-label"> Pekerjaan </label>
                            <div class="col-sm-6">
                                <input type="text" name="pekerjaan" class="form-control" value="<?= $penduduk['pekerjaan']; ?>">
                            </div>
                        </div>

                        <!-- Pernikahan -->
                        <div class="form-group px-3 mb-3 row">
                            <label for="pernikahan" class="col-sm-3 col-form-label"> Status Pernikahan </label>
                            <div class="col-sm-6">
                                <select name="pernikahan" class="form-control form-select">
                                    <option value="Belum Kawin" <?= $penduduk['pernikahan'] == "Belum Kawin" ? "selected" : ""; ?>> Belum Kawin </option>
                                    <option value="Kawin" <?= $penduduk['pernikahan'] == "Kawin" ? "selected" : ""; ?>> Kawin </option>
                                    <option value="Cerai Hidup" <?= $penduduk['pernikahan'] == "Cerai Hidup" ? "selected" : ""; ?>> Cerai Hidup </option>
                                    <option value="Cerai Mati" <?= $penduduk['pernikahan'] == "Cerai Mati" ? "selected" : ""; ?>> Cerai Mati </option>
                                </select>
                            </div>
                        </div>

                        <!-- Hubungan Keluarga -->
                        <div class="form-group px-3 mb-3 row">
                            <label for="" class="col-sm-3 col-form-label"> Hubungan Keluarga </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="hub_keluarga" value="<?= $penduduk['hub_keluarga']; ?>">
                            </div>
                        </div>

                        <!-- Kewarganegaraan -->
                        <div class="form-group px-3 mb-4 row">
                            <label for="" class="col-sm-3 col-form-label"> Kewarganegaraan </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="status" value="<?= $penduduk['status']; ?>">
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group px-3 mb-4 row">
                            <label for="" class="col-sm-3 col-form-label"> Alamat Domisili </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="domisili" value="<?= $penduduk['domisili']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> Simpan </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Doc Modal -->
<div class="modal fade" id="docModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Dokumen Penduduk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
            <form class="user" action="<?= base_url('dokumen/upload/' . $penduduk['nik']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body flex-column border-top-0">
                    <div class="form-group">
                        <label for="" class="form-label">File</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Nama Dokumen</label>
                        <input class="form-control" id="dokumen" name="dokumen"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>