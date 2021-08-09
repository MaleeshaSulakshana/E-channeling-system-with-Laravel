<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (isset($title))
        <title>{{ $title }}</title>
    @else
       <title>FINDOCTOR - Find easily a doctor and book online an appointment</title>
    @endif

    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('admin/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('admin/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('admin/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('admin/img/apple-touch-icon-144x144-precomposed.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/jquery.timepicker.css') }}" rel="stylesheet">

    @yield('css')


</head>

<body class="fixed-nav sticky-footer" id="page-top">

    @include('layouts.admin.inc.nav_bar')

    @yield('content')
    
    @include('layouts.admin.inc.footer')
  
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
  
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery.selectbox-0.2.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/vendor/retina-replace.min.js') }}"></script>
    <script src="{{ asset('admin/js/admin.js') }}"></script>
    <script src="{{ asset('admin/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('admin/js/admin-datatables.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.timepicker.js') }}"></script>

    @yield('js')

    @include('sweetalert::alert')

</body>
</html>

