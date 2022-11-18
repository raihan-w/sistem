<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<!-- Dashboard -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <?= view('\Myth\Auth\Views\_message_block') ?>

    <!-- Card -->
    <div class="row">
        <!-- Kepala Keluarga-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Kepala Keluarga
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_kk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Penduduk -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Penduduk
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_penduduk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laki-laki -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Laki-laki
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_L; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Perempuan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Perempuan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_P; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-female fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body text-center mb-3">
            <div class="mb-3">
                <img src="<?= base_url('img/' . $desa['logo']); ?>" alt="logo" class="logo">
            </div>
            <h4 class="card-title">Pemerintah Desa <?= $desa['desa']; ?></h4>
            <p class="card-text"><?= $desa['alamat']; ?> Kode Pos <?= $desa['kode_pos']; ?></p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>