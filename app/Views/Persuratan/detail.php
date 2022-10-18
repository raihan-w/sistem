<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat Keluar</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-borderless w-75">
                    <tbody>
                        <tr>
                            <th> Nomor Surat </th>
                            <td> : <?= $outgoing['nomor_surat']; ?> </td>
                            <th> Tanggal </th>
                            <td> : <?= date('d-M-Y', strtotime($outgoing['created_at'])); ?> </td>
                        </tr>
                        <tr>
                            <th> Pemohon </th>
                            <td> : <?= $outgoing['pemohon']; ?> </td>
                        </tr>
                        <tr>
                            <th> Perihal </th>
                            <td> : <?= $outgoing['perihal']; ?> </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h5 class="mb-0">Lampiran</h5>
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#uploadModal">
                            <i class="fas fa-plus fa-sm text-white-50"></i>
                            <span class="text">Tambah</span>
                        </a>
                    </div>
                </div>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Dokumen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td> </td>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Lampiran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="#" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body flex-column border-top-0">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="form-label" for="">Lampiran</label>
                            <input type="file" class="form-control" id="user_img" name="user_img">
                        </div>
                        <small class="text-muted">
                            Besar file maksimum 2 Mb. <br> Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>