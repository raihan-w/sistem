<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <?php d(user()); ?>
    <div class="card shadow mb-3" >
        <div class="row m-2">
            <div class="col-md-4">
                <div class="text-center py-2">
                    <img src="<?= base_url('/img/'.user()->user_img); ?>" class="img-fluid rounded-start w-75" alt="...">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><?= user()->username; ?></h4>
                    <p class="card-text"><?= user()->email; ?></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>