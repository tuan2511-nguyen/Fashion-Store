<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/Client/img/FAVICON.svg') }}">
    <!-- Plugins css -->
    <link rel="stylesheet" href="{{ asset('assets/Client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Client/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Client/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Client/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Client/css/animated-headline.css') }}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('assets/Client/css/style.css') }}">
   
</head>

<body>
    <!-- Start Preloader -->
    @include('client.components.pre-loader')
    <!-- End Preloader -->
    <!-- Start header -->
    @include('client.layouts.header')
    <!-- End header -->

    @yield('main')

    <!-- Start footer -->
    @include('client.layouts.footer')
    <!-- End footer -->
    <!-- Start scroll up button -->
    <div class="cs_scrollup_btn" id="cs_scroll_btn">
        <i class="fa-solid fa-arrow-up"></i>
    </div>
    <!-- End scroll up button -->
    <!-- All script files -->
    
    <script src="{{ asset('assets/Client/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/Client/js/jquery.slick.min.js') }}"></script>
    <script src="{{ asset('assets/Client/js/isotope.pkg.min.js') }}"></script>
    <script src="{{ asset('assets/Client/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/Client/js/animated-headline.js') }}"></script>
    <script src="{{ asset('assets/Client/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
