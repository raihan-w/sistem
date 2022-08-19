<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kartu Keluarga</h1>
    </div>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body m-2">
            <div class="d-flex flex-row align-item-center justify-content-between">
                <h4 class="m-0 font-weight-bold">No. Kartu Keluarga : <?= $info['nkk']; ?></h4>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>

            <table class="table table-sm table-borderless" style="width: 50%;">
                <tbody>
                    <tr>
                        <th> Alamat </th>
                        <td> : <?= $info['alamat']; ?> </td>
                    </tr>
                    <tr>
                        <th> RT/RW </th>
                        <td> : <?= $info['rt']; ?> / <?= $info['rw']; ?> </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Status Perkawinan</th>
                        <th>Hubungan Keluarga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $row) : ?>
                        <tr>
                            <td> <?= $row['nik']; ?> </td>
                            <td> <?= $row['nama']; ?> </td>
                            <td> <?= $row['jenkel']; ?> </td>
                            <td> <?= $row['tpt_lahir']; ?> </td>
                            <td> <?= $row['tgl_lahir']; ?> </td>
                            <td> <?= $row['pernikahan']; ?> </td>
                            <td> <?= $row['hub_keluarga']; ?> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>