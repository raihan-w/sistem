<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
    </div>

    <?= view('\Myth\Auth\Views\_message_block') ?>

    <div class="card shadow mb-3">
        <div class="row m-2">
            <div class="col-md-4">
                <div class="text-center py-2">
                    <img src="<?= base_url('/img/user_img/' . $user->user_img); ?>" class="img-profile rounded-circle w-75" alt="...">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><?= $user->username; ?></h4>
                    <p class="card-text"><?= $user->email; ?></p>
                    <div class="badge badge-success"><?= $user->role; ?></div>
                    <div class="d-grid gap-2 d-md-block mt-5">
                        <a class="btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#changePasswordModal">
                            <i class="fas fa-key text-white-50"></i>
                            <span class="text">Password</span>
                        </a>
                        <a class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#changeGroupModal">
                            <i class="fas fa-list text-white-50"></i>
                            <span class="text">Group</span>
                        </a>
                        <?php if ($user->role != 'administrator') : ?>
                            <form action="<?= base_url('/users/' . $user->user_id); ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash-alt text-white-50"></i>
                                    <span class="text">Hapus</span>
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Change Group Modal -->
<div class="modal fade" id="changeGroupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('users/setGroup/' . $user->user_id); ?>" class="user" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Role</label>
                        <select name="group" class="form-control form-select" <?= ($user->user_id == user()->id) ? 'disabled' : ''; ?>>
                            <?php foreach ($groups as $key) : ?>
                                <option value="<?= $key->id; ?>" <?= $key->id == $user->group_id ? "selected" : null ?>><?= $key->name; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
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
            <form action="<?= base_url('users/setPassword/' . $user->user_id); ?>" class="user" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    Ganti password untuk <?= $user->username; ?>
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



<?= $this->endSection(); ?>