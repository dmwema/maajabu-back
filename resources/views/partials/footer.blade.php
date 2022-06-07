<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>

<script>
    $('document').ready(function() {
        $('#client_type').change(function(e) {
            e.preventDefault();
            if (e.target.value == 1) {
                $("#client_group").fadeIn(500)
                $("#client_user").fadeOut(500)
            } else if (e.target.value == 2) {
                $("#client_user").fadeIn(500)
                $("#client_group").fadeOut(500)
            }
        });
    })

</script>

<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.js') }}"></script>
</body>

</html>
