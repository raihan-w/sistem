<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>/js/jquery-3.6.1.min.js"></script>

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
    logo.onchange = evt => {
        const [file] = logo.files
        if (file) {
            imgPreview.src = URL.createObjectURL(file)
        }
    }
</script>

<!-- multistep progress bar -->
<script type="text/javascript">
    const prevBtns = document.querySelectorAll(".btn-prev");
    const nextBtns = document.querySelectorAll(".btn-next");
    const progress = document.getElementById("progression");
    const formSteps = document.querySelectorAll(".form-step");
    const progressSteps = document.querySelectorAll(".progress-step");

    let formStepsNum = 0;

    nextBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        });
    });

    prevBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            formStepsNum--;
            updateFormSteps();
            updateProgressbar();
        });
    });

    function updateFormSteps() {

        formSteps.forEach((formStep) => {
            formStep.classList.contains("form-step-active") &&
                formStep.classList.remove("form-step-active");
        })

        formSteps[formStepsNum].classList.add("form-step-active")
    }

    function updateProgressbar() {
        progressSteps.forEach((progressStep, idx) => {
            if (idx < formStepsNum + 1) {
                progressStep.classList.add("progress-step-active");
            } else {
                progressStep.classList.remove("progress-step-active");
            }
        });

        const progressActive = document.querySelectorAll(".progress-step-active");

        progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
    }
</script>

<script type="text/javascript">
    $('#nik').on('change', (event) => {
        // console.log(event)
        search(event.target.value).then(data => {
            $('#nama').val(data.nama);
            $('#jenkel').val(data.jenkel);
            $('#tpt_lahir').val(data.tpt_lahir);
            $('#tgl_lahir').val(data.tgl_lahir);
            $('#agama').val(data.agama);
            $('#status').val(data.status);
            $('#pekerjaan').val(data.pekerjaan);
            $('#alamat').val(data.alamat);
        });
    });
    async function search(id) {
        let response = await fetch('/api/autofill/' + id)
        let data = await response.json();
        return data;
    };
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $('#btnPreview').click(function(){
            var nomor = $('#nomor').val();
            $('#srt-no').html(nomor);
        });
    });
</script>