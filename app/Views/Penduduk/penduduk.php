<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#importModal">
                <i class="fas fa-file-import fa-sm text-white-50"></i>
                <span class="text">Import Excel</span>
            </a>
            <a href="<?= base_url('penduduk/tambah'); ?>" class="btn btn-sm btn-primary shadow-sm">
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
                            <th>NIK</th>
                            <th>No.KK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penduduk as $row) : ?>
                            <tr>
                                <td> <?= $row['nik']; ?> </td>
                                <td> <?= $row['kk']; ?> </td>
                                <td> <?= $row['nama']; ?> </td>
                                <td> <?= $row['tpt_lahir']; ?> </td>
                                <td> <?= $row['tgl_lahir']; ?> </td>
                                <td> <?= $row['jenkel']; ?> </td>
                                <td>
                                    <a href="<?= base_url('kependudukan/detail/' . $row['nik']); ?>" class="btn btn-circle btn-sm btn-info"><i class="fas fa-info"></i></a>
                                    <form action="/penduduk/<?= $row['nik']; ?>" method="POST" class="d-inline">
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

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Penduduk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="<?= base_url('kependudukan/import'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body flex-column border-top-0">
                    <div class="form-group">
                        <label class="form-label" for="">Unggah File Excel</label>
                        <input type="file" class="form-control" id="file-excel" name="file-excel" required>
                    </div>
                    <span class="kd">
                        Ekstensi file yang diperbolehkan: .xml .xls .xlsx
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- nik, kk, nama, alamat, rt, rw, tempat, tgl, jenkel, pernikahan, pendidikan, agama,  -->

<?= $this->endSection(); ?>