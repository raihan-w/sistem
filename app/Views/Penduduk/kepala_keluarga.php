<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kepala Keluarga</h1>
    </div>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
<?php d($keluarga); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Anggota Keluarga</th>
                            <th>Alamat</th>
                            <th>RT/RW</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($keluarga as $row) : ?>
                            <tr>
                                <td> <?= $row['nkk']; ?> </td>
                                <td> <?= $row['nama']; ?> </td>
                                <td> <?= $row['jml']; ?> </td>
                                <td> <?= $row['alamat']; ?> </td>
                                <td> <?= $row['rt']; ?> / <?= $row['rw']; ?> </td>
                                <td>
                                    <a href="<?= base_url('kependudukan/kartu/' . $row['nkk']); ?>" class="btn btn-circle btn-sm btn-info"><i class="fas fa-info"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>