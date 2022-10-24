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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($outgoing as $row) : ?>
                            <tr>
                                <td> <?= $row['nomor_surat']; ?></td>
                                <td> <?= $row['perihal']; ?> </td>
                                <td> <?= date('d-M-Y', strtotime($row['created_at'])); ?> </td>
                                <td>
                                    <a href="<?= base_url('outgoing/detail/' . $row['id']); ?>" class="btn btn-circle btn-sm btn-info"><i class="fas fa-list"></i></a>
                                    <form action="/outgoing/<?= $row['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-circle btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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
                        <a target="_blank" href="<?= base_url('persuratan/bedanama'); ?>">
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
                        <a target="_blank" href="<?= base_url('persuratan/domisili'); ?>">
                            <img src="<?= base_url('img/thumbnail/domisili.png'); ?>" alt="Domisili" class="img-thumbnail" width="150">
                        </a>
                        <div class="text-center ">
                            <span>Domisili</span>
                        </div>
                    </div>

                    <div class="col-auto m-2 wrapper">
                        <a target="_blank" href="<?= base_url('persuratan/keterangan'); ?>">
                            <img src="<?= base_url('img/thumbnail/keterangan.png'); ?>" alt="Keterangan" class="img-thumbnail" width="150">
                        </a>
                        <div class="text-center ">
                            <span>Keterangan</span>
                        </div>
                    </div>

                    <div class="col-auto m-2 wrapper">
                        <a target="_blank" href="<?= base_url('persuratan/kematian'); ?>">
                            <img src="<?= base_url('img/thumbnail/kematian.png'); ?>" alt="Kematian" class="img-thumbnail" width="150">
                        </a>
                        <div class="text-center ">
                            <span>Kematian</span>
                        </div>
                    </div>

                    <div class="col-auto m-2 wrapper">
                        <a target="_blank" href="<?= base_url('persuratan/pengantar'); ?>">
                            <img src="<?= base_url('img/thumbnail/pengantar.png'); ?>" alt="Pengantar" class="img-thumbnail" width="150">
                        </a>
                        <div class="text-center ">
                            <span>Pengantar</span>
                        </div>
                    </div>

                    <div class="col-auto m-2 wrapper">
                        <a target="_blank" href="<?= base_url('persuratan/sktm'); ?>">
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

<?= $this->endSection(); ?>