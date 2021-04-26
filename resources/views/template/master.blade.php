<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Pendukung Keputusan </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome --> 
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- Icon Style -->
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- icon -->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico">
	<link rel="stylesheet" type="text/css" href="{{asset('table/vendor/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="{{asset('table/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <!-- Font Animasi -->
	<link rel="stylesheet" type="text/css" href="{{asset('table/vendor/animate/animate.css')}}">
  <!-- Font Select -->
	<link rel="stylesheet" type="text/css" href="{{asset('table/vendor/select2/select2.min.css')}}">
  <!-- Theme Scrollbar -->
	<link rel="stylesheet" type="text/css" href="{{asset('table/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
  <!-- Font Style -->
	<link rel="stylesheet" type="text/css" href="{{asset('table/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('table/css/main.css')}}">

</head>

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

<!-- jQuery -->
<script src="{{asset('adminlt/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlt/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlt/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlt/dist/js/demo.js')}}"></script>
</body>
</html>
