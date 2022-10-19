<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blangko Surat Domisili</h1>
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

            <form action="<?= base_url('domisili/print'); ?>" method="POST" class="user" target="_blank">
                <?= csrf_field(); ?>

                <!-- Progress Bar -->
                <div class="progressbar">
                    <div class="progression" id="progression"></div>
                    <div class="progress-step progress-step-active" data-title="Pemohon"><i class="fas fa-user"></i></div>
                    <div class="progress-step" data-title="Pengantar"><i class="fas fa-keyboard"></i></i></div>
                    <div class="progress-step" data-title="Isi Surat"><i class="fas fa-keyboard"></i></i></div>
                    <div class="progress-step" data-title="Paraf/Penomoran"><i class="fas fa-bookmark"></i></div>
                </div>

                <!-- Form step pemohon -->
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
                            <input type="text" class="form-control" name="jenkel" id="jenkel" readonly>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <div class="col-sm-6">
                            <div class="row">
                                <label for="tempat_lahir" class="col-sm-6 col-form-label"> Tempat/Tanggal Lahir </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tpt_lahir" id="tpt_lahir" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Agama </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="agama" id="agama" readonly>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Warganegara </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="status" id="status" readonly>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Pekerjaan </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" readonly>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Alamat KTP </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="alamat" id="alamat" cols="3" rows="4" readonly></textarea>
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Alamat Domisili </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="domisili" id="domisili" cols="3" rows="4"></textarea>
                        </div>
                    </div>

                    <br>
                    <div class="text-right">
                        <a class="btn btn-primary btn-next">Next</a>
                    </div>
                </div>

                <!-- Form step pengantar -->
                <div class="form-step">
                    <div class="m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Nomor Surat Pengantar </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="no_pengantar" id="no_pengantar">
                        </div>
                    </div>

                    <div class="m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Tanggal </label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="tgl_pengantar" id="tgl_pengantar">
                        </div>
                    </div>

                    <br>
                    <div class="text-right">
                        <a class="btn btn-light btn-prev">Previous</a>
                        <a class="btn btn-primary btn-next">Next</a>
                    </div>
                </div>

                <!-- Form step isi surat -->
                <div class="form-step">
                    <div class="form-group">
                        <label class="form-label" for="">Keperluan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="3" rows="6"></textarea>
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

                    <input type="hidden" class="form-control" name="perihal" id="perihal" value="Domisili">
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