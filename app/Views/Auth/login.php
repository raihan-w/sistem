<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h3 class="text-gray-900 mb-3">Sistem Desa</h3>
                                    <h4 class="text-gray-600 mb-4"><?= lang('Auth.loginTitle') ?></h4>
                                </div>

                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <form class="user" action="<?= route_to('login') ?>" method="POST">
                                    <?= csrf_field() ?>

                                    <!-- Username -->
                                    <div class="form-group">
                                        <input type="text" name="login" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" aria-describedby="emailHelp" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>

                                    <!-- Remember -->
                                    <div class="form-group">
                                        <?php if ($config->allowRemembering) : ?>
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="remember" class="custom-control-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                <label class="custom-control-label" for="customCheck">
                                                    <?= lang('Auth.rememberMe') ?>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <?= lang('Auth.loginAction') ?>
                                    </button>

                                </form>
                                <hr>

                                <?php if ($config->activeResetter) : ?>
                                    <div class="text-center">
                                        <a class="small" href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                                    </div>
                                <?php endif; ?>



                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>