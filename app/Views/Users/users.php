<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <div class="d-grid gap-2 d-md-block">
            <a href="<?= base_url('users/add'); ?>" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                <span class="text">Tambah</span>
            </a>
        </div>
    </div>

    <?= view('\Myth\Auth\Views\_message_block') ?>

    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $row) : ?>
                            <tr>
                                <td><?= $row->username; ?></td>
                                <td><?= $row->role; ?></td>
                                <td><?= $row->email; ?></td>
                                <td>
                                    <a class="btn btn-circle btn-sm btn-warning" data-toggle="modal" data-target="#updateModal<?= $row->user_id; ?>"><i class="fas fa-pen"></i></a>
                                    <a href="<?= base_url('/users/user/'.$row->user_id); ?>" class="btn btn-circle btn-sm btn-info"><i class="fas fa-list"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal -->
<?php foreach ($users as $row) : ?>
<div class="modal fade" id="updateModal<?= $row->user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update <?= $row->username; ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="<?= base_url('users/update/' . $row->user_id); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body flex-column border-top-0">
                    <div class="form-group">
                        <div class="text-center my-4">
                            <img class="img-thumbnail rounded-circle w-50" id="imgPreview" src="<?= base_url('/img/user_img/' . $row->user_img); ?>" alt="User Image">
                        </div>
                        <input type="hidden" name="oldImg" value="<?= $row->user_img; ?>">
                        <div class="form-group">
                            <label class="form-label" for="">User Image</label>
                            <input type="file" class="form-control" id="user_img" name="user_img">
                        </div>
                        <small class="text-muted">
                            Besar file maksimum 2 Mb. <br> Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                        </small>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $row->email; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?= $row->username; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
    user_img.onchange = evt => {
        const [file] = user_img.files
        if (file) {
            imgPreview.src = URL.createObjectURL(file)
        }
    }
</script>

<?= $this->endSection(); ?>