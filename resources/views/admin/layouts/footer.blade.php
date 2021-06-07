<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>


<script type="text/javascript" src="{{asset('layouts/toastr/toastr.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('layouts/toastr/toastr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('layouts/toastr/toastr.css')}}">


<script>
    $('.select2').select2({
        placeholder: 'Select an option'
    });

</script>

<script type="text/javascript">
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'success') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}", {
                timeOut: 2000
            });
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif

    @if(Session::has('error'))
    var type = "{{ Session::get('alert-type', 'warning') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('error') }}", {
                timeOut: 2000
            });
            break;

        case 'warning':
            toastr.warning("{{ Session::get('error') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('error') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('error') }}");
            break;
    }
    @endif

</script>

</body>

</html>
