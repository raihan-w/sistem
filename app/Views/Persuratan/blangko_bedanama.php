<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blangko Surat Beda Nama</h1>
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

            <form action="<?= base_url('bedanama/print'); ?>" method="POST" class="user" target="_blank">
                <?= csrf_field(); ?>
                
                <!-- Progress Bar -->
                <div class="progressbar">
                    <div class="progression" id="progression"></div>
                    <div class="progress-step progress-step-active" data-title="Pemohon"><i class="fas fa-user"></i></div>
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
                        <label for="" class="col-sm-3 col-form-label"> Alamat</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="alamat" id="alamat" cols="3" rows="4" readonly></textarea>
                        </div>
                    </div>

                    <br>
                    <div class="text-right">
                        <a class="btn btn-primary btn-next">Next</a>
                    </div>
                </div>

                <!-- Form step isi surat -->
                <div class="form-step">
                    <div class="form-group">
                        <label class="form-label" for="">Keterangan</label>
                        <textarea class="form-control" name="isi" id="isi" cols="3" rows="5"></textarea>
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

                    <br>
                    <div class="text-right">
                        <a class="btn btn-light btn-prev">Previous</a>
                        <a class="btn btn-info" id="btnPreview" data-toggle="modal" data-target="#previewModal">Preview</a>
                        <button type="submit" class="btn btn-success"> Cetak </button>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview Surat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-2 d-flex">
                <div class="pappersize">
                    <div class="header-srt">
                        <table class="surat srt">
                            <tr>
                                <td>
                                    <img src="<?= base_url('img/logo.png'); ?>" class="logo-srt">
                                </td>
                                <td>
                                    <h5 class="id-srt">pemerintah kabupaten klaten</h5>
                                    <h5 class="id-srt">kecamatan prambanan</h5>
                                    <h4 class="id-srt">desa geneng</h4>
                                    <p class="add-srt">Alamat. Jln.Jogja-Solo Km 21 Ds.Geneng Kode Pos 57454</p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <table class="kd-srt surat">
                        <tr>
                            <td>
                                <p>nomor kode desa :</p>
                            </td>
                        </tr>
                    </table>

                    <table class="opp-srt surat">
                        <tr>
                            <td>
                                <h5 class="name-srt">surat keterangan</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="no-srt">nomor : <span id="srt-no"></span> </p>
                            </td>
                        </tr>
                    </table>

                    <table class="surat">
                        <tr>
                            <td>
                                <span>
                                    Yang bertandatangan dibawah ini Kepala Desa Geneng Kecamatan Prambanan Kabupaten Klaten Provinsi Jawa Tengah, menerangkan bahwa :
                                </span>
                            </td>
                        </tr>
                    </table>

                    <table class="isi-srt">
                        <tr>
                            <td> 1. </td>
                            <td> Nama Lengkap </td>
                            <td> : </td>
                            <td class="isian"> <span id="srt-nama"></span> </td>
                        </tr>
                        <tr>
                            <td> 2. </td>
                            <td> Jenis Kelamin </td>
                            <td> : </td>
                            <td class="isian"> <span id="srt-jk"></span> </td>
                        </tr>
                        <tr>
                            <td> 3. </td>
                            <td> Tampat/Tanggal Lahir </td>
                            <td> : </td>
                            <td class="isian"> <span id="srt-tpt"></span>, <span id="srt-tgl"></span> </td>
                        </tr>
                        <tr>
                            <td> 4. </td>
                            <td> Agama </td>
                            <td> : </td>
                            <td class="isian"> <span id="srt-agama"></span> </td>
                        </tr>
                        <tr>
                            <td> 5. </td>
                            <td> No.KTP/NIK </td>
                            <td> : </td>
                            <td class="isian"> <span id="srt-nik"></span> </td>
                        </tr>
                        <tr>
                            <td> 6. </td>
                            <td> Pekerjaan </td>
                            <td> : </td>
                            <td class="isian"> <span id="srt-pekerjaan"></span> </td>
                        </tr>
                        <tr>
                            <td> 7. </td>
                            <td> Alamat </td>
                            <td> : </td>
                            <td class="isian"> <span id="srt-alamat"></span> </td>
                        </tr>
                    </table>

                    <table class="surat">
                        <tr>
                            <td>
                                Sepanjang pengetahuan kami dan berdasarkan pengakuan warga tersebut, bahwa ;
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span id="srt-isi"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Demikian surat keterangan ini kami buat atas permintaan yang bersangkutan dan dapat dipergunakan sebagaimana mestinya.</p>
                            </td>
                        </tr>
                    </table>

                    <div class="signature">
                        <p>Geneng, . . . . . . . . . . . . . . . .</p>
                        <table class="surat srt">
                            <tr>
                                <td>
                                    <p> Kepala Desa </p>
                                </td>
                            </tr>
                        </table>
                        <table class="sig-name surat">
                            <tr>
                                <td>
                                    <p> Nama </p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="applicant">
                        <table class="surat srt">
                            <tr>
                                <td>
                                    <p> Pemohon </p>
                                </td>
                            </tr>
                        </table>
                        <table class="sig-name surat">
                            <tr>
                                <td>
                                    <p> Nama </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>