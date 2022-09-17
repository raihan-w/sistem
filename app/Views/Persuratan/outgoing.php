<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Surat Keluar</h1>
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-file-import fa-sm text-white-50"></i>
                <span class="text">Buat Surat</span>
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Surat</th>
                            <th>Tanggal</th>
                            <th>Perihal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Blangko Surat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-2 d-flex">
                
                <div class="wrapper">
                    <a target="_blank" href="<?= base_url('persuratan/beda-nama'); ?>">
                        <img src="<?= base_url('img/thumbnail/beda nama.png'); ?>" alt="Beda Nama" class="img-thumbnail" width="150">
                    </a>
                    <div class="text-center ">
                        <span>Beda Nama</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>