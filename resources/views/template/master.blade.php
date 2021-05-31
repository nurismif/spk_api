<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pendukung Keputusan </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Icon Style -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- icon -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('table/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('table/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!-- Font Animasi -->
    <link rel="stylesheet" type="text/css" href="{{ asset('table/vendor/animate/animate.css') }}">
    <!-- Font Select -->
    <link rel="stylesheet" type="text/css" href="{{ asset('table/vendor/select2/select2.min.css') }}">
    <!-- Theme Scrollbar -->
    <link rel="stylesheet" type="text/css" href="{{ asset('table/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!-- Font Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('table/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('table/css/main.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        @include('template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('template.sidebar')
        <!-- Sidebar Menu -->

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content -->
        <!-- /.content-wrapper -->

        <!-- Footer  -->
        @include('template.footer')
        <!-- /.Footer -->


        <!-- ./wrapper -->

        <!--===============================================================================================-->
        <script src="{{ asset('table/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('table/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('table/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('table/vendor/select2/select2.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('table/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script>
            $('.js-pscroll').each(function() {
                var ps = new PerfectScrollbar(this);

                $(window).on('resize', function() {
                    ps.update();
                })
            });

        </script>
        <!--===============================================================================================-->
        <script src="{{ asset('table/js/main.js') }}"></script>

        <!-- jQuery -->
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap 4 -->
        {{-- <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}

        <!-- DataTables  & Plugins -->
        <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('adminlte/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/atatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
        </script>
        <!-- AdminLTE App -->
        <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
        <!-- Page specific script -->
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });

        </script>
        <!-- Append -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".add-row").click(function() {
                    var kriteria = $("#kriteria_ahp_id").val();
                    var perbandingan = $("#perbandingan_id").val();
                    var target_kriteria = $("#target_kriteria_ahp_id").val();
                    var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name +
                        "</td><td>" + email + "</td></tr>";
                    $("table tbody").append(markup);
                });

                // Find and remove selected table rows
                $(".delete-row").click(function() {
                    $("table tbody").find('input[name="record"]').each(function() {
                        if ($(this).is(":checked")) {
                            $(this).parents("tr").remove();
                        }
                    });
                });
            });
        </script>
</body>

</html>
