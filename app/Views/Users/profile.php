<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <?= view('\Myth\Auth\Views\_message_block') ?>

    <div class="card shadow mb-3">
        <div class="row m-2">
            <div class="col-md-4">
                <div class="text-center py-2">
                    <img src="<?= base_url('/img/user_img/' . user()->user_img); ?>" class="img-profile rounded-circle w-75" alt="...">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><?= user()->username; ?></h4>
                    <p class="card-text"><?= user()->email; ?></p>
                    <div class="d-grid gap-2 d-md-block mt-5">
                        <a class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#updateModal">
                            <i class="fas fa-pen fa-sm text-white-50"></i>
                            <span class="text">Update Profile</span>
                        </a>
                        <a class="btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#changePasswordModal">
                            <i class="fas fa-key text-white-50"></i>
                            <span class="text">Change Password</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="<?= base_url('users/update/' . user()->id); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body flex-column border-top-0">
                    <div class="form-group">
                        <div class="text-center my-4">
                            <img class="img-thumbnail rounded-circle w-50" id="imgPreview" src="<?= base_url('/img/user_img/' . user()->user_img); ?>" alt="User Image">
                        </div>
                        <input type="hidden" name="oldImg" value="<?= user()->user_img; ?>">
                        <div class="form-group">
                            <label class="form-label" for="">User Image</label>
                            <input type="file" class="form-control" id="user_img" name="user_img">
                        </div>
                        <small class="text-muted">
                            Besar file maksimum 2 Mb. Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                        </small>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= user()->email; ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?= user()->username; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('users/setPassword/' . user()->id); ?>" class="user" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    Ganti password untuk <?= user()->username; ?>
                    <div class="modal-body flex-column border-top-0">
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Repeat New Password</label>
                            <input type="password" class="form-control" name="pass_confirm" id="pass_confirm" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    user_img.onchange = evt => {
        const [file] = user_img.files
        if (file) {
            imgPreview.src = URL.createObjectURL(file)
        }
    }
</script>

<?= $this->endSection(); ?>