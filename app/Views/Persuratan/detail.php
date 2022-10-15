<?= $this->extend('templates/index'); ?>
<?= $this->section('PageContent'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat Keluar</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-borderless">
                    <tbody>
                        <tr>
                            <th> Nomor Surat </th>
                            <td> :  </td>
                        </tr>
                        <tr>
                            <th> Pemohon </th>
                            <td> :  </td>
                        </tr>
                    </tbody>
                </table>
                <h5>Lampiran</h5>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Surat</th>
                            <th>Tanggal</th>
                            <th></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td> </td>
                            <td> </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>