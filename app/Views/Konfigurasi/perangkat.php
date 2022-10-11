<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perangkat Desa</h1>
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#insertModal">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                <span class="text">Tambah</span>
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
            <h4 class="mb-3">Periksa kembali entrian form</h4>
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
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($perangkat as $row) : ?>
                            <tr>
                                <td> <?= $row['nip']; ?> </td>
                                <td> <?= $row['nama']; ?> </td>
                                <td> <?= $row['jabatan']; ?> </td>
                                <td>
                                    <a class="btn btn-circle btn-sm btn-warning" data-toggle="modal" data-target="#updateModal<?= $row['nip']; ?>"><i class="fas fa-pen"></i></a>
                                    <form action="/perangkat/<?= $row['nip']; ?>" method="POST" class="d-inline">
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

<!-- Insert Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Perangkat Desa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="<?= base_url('perangkat'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="modal-body flex-column border-top-0">
                        <div class="form-group">
                            <label class="form-label" for="">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Modal -->
<?php foreach ($perangkat as $row) : ?>
    <div class="modal fade" id="updateModal<?= $row['nip']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Perangkat Desa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="user" action="<?= base_url('konfigurasi/update_perangkat/' . $row['nip']) ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="modal-body flex-column border-top-0">
                            <div class="form-group">
                                <label class="form-label" for="">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="<?= $row['nip']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $row['jabatan']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>