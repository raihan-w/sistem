<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Surat Keluar</h1>
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                <span class="text">Buat Surat</span>
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Surat</th>
                            <th>Tanggal</th>
                            <th>Perihal</th>
                            <th>Isi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td>
                                <a href="" class="btn btn-circle btn-sm btn-info" data-toggle="modal" data-target="#previewModal">
                                    <i class="fas fa-info"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Blangko Surat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-2 d-flex">
                <div class="row">

                    <div class="col-auto m-2 wrapper">
                        <a href="<?= base_url('persuratan/bedanama'); ?>">
                            <img src="<?= base_url('img/thumbnail/bedanama.png'); ?>" alt="Beda Nama" class="img-thumbnail" width="150">
                        </a>
                        <div class="text-center ">
                            <span>Beda Nama</span>
                        </div>
                    </div>

                    <div class="col-auto m-2 wrapper">
                        <a target="_blank" href="<?= base_url('persuratan/bidikmisi'); ?>">
                            <img src="<?= base_url('img/thumbnail/bidikmisi.png'); ?>" alt="Bidik Misi" class="img-thumbnail" width="150">
                        </a>
                        <div class="text-center ">
                            <span>Bidik Misi</span>
                        </div>
                    </div>

                    <div class="col-auto m-2 wrapper">
                        <a href="<?= base_url('persuratan/domisili'); ?>">
                            <img src="<?= base_url('img/thumbnail/domisili.png'); ?>" alt="Domisili" class="img-thumbnail" width="150">
                        </a>
                        <div class="text-center ">
                            <span>Domisili</span>
                        </div>
                    </div>

                    <div class="col-auto m-2 wrapper">
                        <a href="<?= base_url('persuratan/keterangan'); ?>">
                            <img src="<?= base_url('img/thumbnail/keterangan.png'); ?>" alt="Keterangan" class="img-thumbnail" width="150">
                        </a>
                        <div class="text-center ">
                            <span>Keterangan</span>
                        </div>
                    </div>

                    <div class="col-auto m-2 wrapper">
                        <a href="<?= base_url('persuratan/pengantar'); ?>">
                            <img src="<?= base_url('img/thumbnail/pengantar.png'); ?>" alt="Pengantar" class="img-thumbnail" width="150">
                        </a>
                        <div class="text-center ">
                            <span>Pengantar</span>
                        </div>
                    </div>

                    <div class="col-auto m-2 wrapper">
                        <a href="<?= base_url('persuratan/sktm'); ?>">
                            <img src="<?= base_url('img/thumbnail/sktm.png'); ?>" alt="Ket.Tidak Mampu" class="img-thumbnail" width="150">
                        </a>
                        <div class="text-center ">
                            <span>SKTM</span>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <img src="img/logo.png" class="logo-srt">
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
                                <p class="no-srt">nomor : </p>
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
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 2. </td>
                            <td> Jenis Kelamin </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 3. </td>
                            <td> Tampat/Tanggal Lahir </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 4. </td>
                            <td> Agama </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 5. </td>
                            <td> No.KTP/NIK </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 6. </td>
                            <td> Pekerjaan </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
                        </tr>
                        <tr>
                            <td> 7. </td>
                            <td> Alamat </td>
                            <td> : </td>
                            <td class="isian"> N/A </td>
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
                                keterangan
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