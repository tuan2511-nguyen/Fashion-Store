<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="{{ asset('assets/Admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Admin/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Admin/plugins/pace/pace.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Admin/plugins/highlight/styles/github-gist.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Admin/plugins/datatables/datatables.min.css') }}S" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="{{ asset('assets/Admin/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Admin/css/custom.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/Admin/images/neptune.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/Admin/images/neptune.png') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        @include('admin.components.sidebar')
        <div class="app-container">
            @include('admin.components.navbar')
            <div class="app-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('assets/Admin/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/js/custom.js') }}"></script>
    <script src="{{ asset('assets/Admin/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/Admin/plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('assets/Admin/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/js/pages/datatables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
</body>

</html>
