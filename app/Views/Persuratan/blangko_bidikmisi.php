<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blangko Surat Bidik Misi</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="" class="user">

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
                            <input type="text" class="form-control" name="nama" id="nama" disabled>
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
                            <input type="text" class="form-control" name="" id="">
                        </div>
                    </div>

                    <br>
                    <div class="text-right">
                        <a href="#" class="btn btn-primary btn-next">Next</a>
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
                        <a href="#" class="btn btn-light btn-prev">Previous</a>
                        <a href="#" class="btn btn-primary btn-next">Next</a>
                    </div>
                </div>

                <!-- Form step paraf/penomoran -->
                <div class="form-step">
                    <div class="m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Nomor Surat </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="no.surat" id="no.surat">
                        </div>
                    </div>

                    <div class="m-2 row">
                        <label for="" class="col-sm-3 col-form-label"> Penandatangan </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="" id="">
                        </div>
                    </div>

                    <br>
                    <div class="text-right">
                        <a href="#" class="btn btn-light btn-prev">Previous</a>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#previewModal">Preview</a>
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
                        <table class="surat">
                            <tr>
                                <td>
                                    <img class="logo-srt" src="<?= base_url('img/logo.png'); ?>" alt="">
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
                                <span>nomor kode desa :</span>
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
                                <p class="no-srt">nomor :</p>
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
                            <td> Nama </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 2. </td>
                            <td> Tempat & tanggal lahir </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 3. </td>
                            <td> Pekerjaan </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 4. </td>
                            <td> Status </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 5. </td>
                            <td> Alamat </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 6. </td>
                            <td> NIK </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 7. </td>
                            <td> Penghasilan Orang Tua </td>
                            <td> : </td>
                            <td class="isian"> Rp. N/A </td>
                        </tr>
                    </table>

                    <table class="surat">
                        <tr>
                            <td>
                                <span>
                                    Adalah orang tua dari:
                                </span>
                            </td>
                        </tr>
                    </table>

                    <table class="isi-srt">
                        <tr>
                            <td> 1. </td>
                            <td> Nama </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 2. </td>
                            <td> Tempat & tanggal lahir </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 3. </td>
                            <td> Pekerjaan </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 4. </td>
                            <td> Alamat </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 5. </td>
                            <td> NIK </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                    </table>

                    <table class="surat">
                        <tr>
                            <td>
                                <span>
                                    Sehubungan dengan warga tersebut termasuk warga yang tidak mampu, mohon diberikan bantuan dari program <b>BEASISWA/JPS/BSM/BOS/BIDIK MISI/PIP/KIP.</b>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Demikian harap menjadikan maklum bagi yang berkepentingan.</span>
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
                                    <p> Pemegang </p>
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