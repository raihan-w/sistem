<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat Keluar</h1>
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
            <?php echo session()->getFlashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

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
                            <th> Perihal </th>
                            <td> : <?= $outgoing['perihal']; ?> </td>
                        </tr>
                        <tr>
                            <th> Pemohon </th>
                            <td> : <?= $outgoing['pemohon']; ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5>Lampiran</h5>
            <?php if ($outgoing['lampiran'] == null) : ?>
                <form action="<?= base_url('outgoing/upload/' . $outgoing['id']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group m-3">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="lampiran" id="lampiran" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary"> Submit </button>
                            </div>
                        </div>
                        <small class="text-muted">
                            Besar file maksimum 2 Mb. Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                        </small>
                    </div>
                </form>
            <?php endif ?>
            <?php if ($outgoing['lampiran'] != null) : ?>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="w-75"> Dokumen </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <?= $outgoing['lampiran']; ?> </td>
                            <td>
                                <a href="<?= base_url('Outgoing/unlink/' . $outgoing['id']); ?>" class="btn btn-circle btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <iframe src="<?= base_url('lampiran/' . $outgoing['lampiran']); ?>" width="100%" height="500px">
                <?php endif ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>