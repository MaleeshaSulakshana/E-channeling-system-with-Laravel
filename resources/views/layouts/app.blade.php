<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (isset($title))
        <title>{{ $title }}</title>
    @else
   	    <title>FINDOCTOR - Find easily a doctor and book online an appointment</title>
    @endif

	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type=" image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/img/apple-touch-icon-57x57-precomposed.png') }}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('assets/img/apple-touch-icon-72x72-precomposed.png') }}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('assets/img/apple-touch-icon-114x114-precomposed.png') }}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('assets/img/apple-touch-icon-144x144-precomposed.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/vendors.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/icon_fonts/css/all_icons_min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>

	<div class="layer"></div>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
    
	<!-- header -->
    @include('layouts.home.inc.nav_bar')
	<!-- /header -->
	
	<main>
        @yield('content')
	</main>

	
    <!--footer-->
    @include('layouts.home.inc.footer')
	<!--/footer-->

	<div id="toTop"></div>
	<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}""></script>
	<script src="{{ asset('assets/js/common_scripts.min.js') }}""></script>
	<script src="{{ asset('assets/js/functions.js') }}""></script>

</body>
</html>