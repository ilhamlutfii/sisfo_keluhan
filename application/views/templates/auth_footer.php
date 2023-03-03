<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
    $(document).on('keyup', '#company_code', function(e) {
        // console.log(e.target.value.toUpperCase())
        $(this).val(e.target.value.toUpperCase())
    })
</script>

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
</body>

</html>