<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ url('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for table template -->
    <link href="{{ url('/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ url('/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Login</title>



</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-5">
                                        <h1>Sorry you have no access to this page !!</h1>
                                        <a href="{{ url('/') }}">&larr; Back to Dashboard</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
<!-- Bootstrap core JavaScript-->
<script src="{{ url('/admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('/admin/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
{{-- <script src="{{ url('/admin/vendor/chart.js/Chart.min.js') }}"></script> --}}
<script src="{{ url('/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
{{-- <script src="{{ url('/admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('/admin/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ url('/admin/js/demo/chart-bar-demo.js') }}"></script>
<script src="{{ url('/admin/js/demo/datatables-demo.js') }}"></script> --}}
@if (session()->has('message'))
    <script>
        alert('{{ session('message') }}');
    </script>
@endif
