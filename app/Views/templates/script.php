<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<script>
    // Auto refresh page
    // $(document).ready(function() {
    //     setTimeout(function() {
    //         location.reload();
    //     }, 10000) //interval 10 detik
    // })
</script>

<script>
    logo.onchange = evt => {
        const[file] = logo.files
        if (file) {
            imgPreview.src = URL.createObjectURL(file)
        }
    }
</script>