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
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an
                account? <a href="sign-up.html">Sign Up</a></p>

            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="signInEmail" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="signInEmail" aria-describedby="signInEmail"
                        name="email" placeholder="example@neptune.com">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <br>
                    <label for="signInPassword" class="form-label mt-2">Password</label>
                    <input type="password" class="form-control" id="signInPassword" aria-describedby="signInPassword"
                        name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <a href="#" class="auth-forgot-password float-end">Forgot password?</a>
                </div>
            </form>

            <div class="divider"></div>
            <div class="auth-alts">
                <a href="#" class="auth-alts-google"></a>
                <a href="#" class="auth-alts-facebook"></a>
                <a href="#" class="auth-alts-twitter"></a>
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

</body>

</html>
