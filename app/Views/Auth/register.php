<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
    </div>

    <?= view('\Myth\Auth\Views\_message_block') ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('users/save'); ?>" class="user" method="POST">
                <?= csrf_field() ?>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" id="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" id="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" id="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>