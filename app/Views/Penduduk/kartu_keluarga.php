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
        <div class="card-body">
            <div class="d-flex flex-row align-item-center justify-content-between">
                <h4 class="m-0 font-weight-bold">No. Kartu Keluarga : <?= $kartu['nkk']; ?></h4>
                <?php if (in_groups('administrator') || in_groups('operator')) : ?>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Pengaturan:</div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateModal">Edit</a>
                            <?php if ($list == null) : ?>
                                <div class="dropdown-divider"></div>
                                <form action="/kartu/<?= $kartu['nkk']; ?>" method="POST" class="dropdown-item">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class=" btn-del " onclick="return confirm('Are you sure?')">
                                        Hapus
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <table class="table table-sm table-borderless" style="width: 50%;">
                <tbody>
                    <tr>
                        <th> Alamat </th>
                        <td> : <?= $kartu['alamat']; ?> </td>
                    </tr>
                    <tr>
                        <th> RT/RW </th>
                        <td> : <?= $kartu['rt']; ?> / <?= $kartu['rw']; ?> </td>
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

<!-- Edit Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Ubah Kartu Keluarga</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="<?= base_url('kependudukan/update_kk/' . $kartu['nkk']); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body flex-column border-top-0">
                    <div class="form-group">
                        <label class="form-label" for="">Alamat</label>
                        <textarea class="form-control" name="alamat" cols="3" rows="3"><?= $kartu['alamat']; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="form-label"> RT </label>
                                <input type="text" class="form-control" name="rt" value="<?= $kartu['rt']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="form-label"> RW </label>
                                <input type="text" class="form-control" name="rw" value="<?= $kartu['rw']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>