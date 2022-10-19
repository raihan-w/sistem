<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blangko Surat Bidik Misi</h1>
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

            <form action="<?= base_url('bidikmisi/print'); ?>" class="user" method="POST" target="_blank">
                <?= csrf_field(); ?>

                <!-- Progress Bar -->
                <div class="progressbar">
                    <div class="progression" id="progression"></div>
                    <div class="progress-step progress-step-active" data-title="Orang Tua"><i class="fas fa-user"></i></div>
                    <div class="progress-step" data-title="Anak"><i class="fas fa-user"></i></div>
                    <div class="progress-step" data-title="Paraf/Penomoran"><i class="fas fa-bookmark"></i></div>
                </div>

                <!-- Form step orang tua -->
                <div class="form-step form-step-active">
                    <div class="m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> NIK </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nik" id="nik">
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Nama Lengkap </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama" id="nama" readonly>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Jenis Kelamin </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="jenkel" id="jenkel" disabled>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <div class="col-sm-6">
                            <div class="row">
                                <label for="tempat_lahir" class="col-sm-6 col-form-label"> Tempat/Tanggal Lahir </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tpt_lahir" id="tpt_lahir" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Pekerjaan </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" disabled>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Alamat</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="alamat" id="alamat" cols="3" rows="4" disabled></textarea>
                        </div>
                    </div>

                    <div class="m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Penghasilan </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="penghasilan" id="penghasilan">
                        </div>
                    </div>

                    <br>
                    <div class="text-right">
                        <a class="btn btn-primary btn-next">Next</a>
                    </div>
                </div>

                <!-- From step anak -->
                <div class="form-step">
                    <div class="m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> NIK </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nik_ank" id="nik_ank">
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Nama Lengkap </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama_ank" id="nama_ank" disabled>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Jenis Kelamin </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="jenkel_ank" id="jenkel_ank" disabled>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <div class="col-sm-6">
                            <div class="row">
                                <label for="tempat_lahir" class="col-sm-6 col-form-label"> Tempat/Tanggal Lahir </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tpt_lahir_ank" id="tpt_lahir_ank" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" name="tgl_lahir_ank" id="tgl_lahir_ank" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Pekerjaan </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="pekerjaan_ank" id="pekerjaan_ank" disabled>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Alamat</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="alamat_ank" id="alamat_ank" cols="3" rows="4" disabled></textarea>
                        </div>
                    </div>

                    <br>
                    <div class="text-right">
                        <a class="btn btn-light btn-prev">Previous</a>
                        <a class="btn btn-primary btn-next">Next</a>
                    </div>
                </div>

                <!-- Form step paraf/penomoran -->
                <div class="form-step">
                    <div class="m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Nomor Surat </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nomor" id="nomor">
                        </div>
                    </div>

                    <div class="m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Penandatangan </label>
                        <div class="col-sm-6">
                            <select name="penandatangan" id="penandatangan" class="form-control form-select">
                                <?php foreach ($perangkat as $key) : ?>
                                    <option value="<?= $key['nip']; ?>"><?= $key['nama']; ?> - <?= $key['jabatan']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" name="perihal" id="perihal" value="Bidik Misi">

                    <br>
                    <div class="text-right">
                        <a class="btn btn-light btn-prev">Previous</a>
                        <button type="submit" class="btn btn-success"> Cetak </button>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>




<?= $this->endSection(); ?>