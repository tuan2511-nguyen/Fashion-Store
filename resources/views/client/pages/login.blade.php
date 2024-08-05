@extends('client.layouts.master')

@section('title')
    Login
@endsection

@section('main')
    <div class="container mt-5">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                    aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                    aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content">
            <!-- Login Tab -->
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form method="POST" action="{{ route('customer.login') }}">
                    @csrf
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                    <div class="text-center mb-3">
                        <p>Sign in with:</p>
                        <!-- Social buttons -->
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>

                    <p class="text-center">or:</p>

                    <div class="form-outline mb-4">
                        <input type="email" id="loginName" class="form-control" name="email" value="{{ old('email') }}"
                            required autocomplete="email" autofocus />
                        <label class="form-label" for="loginName">Email</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" class="form-control" name="password" 
                            autocomplete="current-password" />
                        <label class="form-label" for="loginPassword">Password</label>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                            <div class="form-check mb-3 mb-md-0">
                                <input class="form-check-input" type="checkbox" value="" id="loginCheck"
                                    name="remember" {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="loginCheck"> Remember me </label>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center">
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                    <div class="text-center">
                        <p>Not a member? <a href="#pills-register" data-mdb-toggle="pill">Register</a></p>
                    </div>
                </form>
            </div>

            <!-- Register Tab -->
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form method="POST" action="{{ route('customer.register') }}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="text-center mb-3">
                        <p>Sign up with:</p>
                        <!-- Social buttons -->
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>

                    <p class="text-center">or:</p>

                    <div class="form-outline mb-4">
                        <input type="text" id="registerName" class="form-control" name="name"
                            value="{{ old('name') }}"  autocomplete="name" autofocus />
                        <label class="form-label" for="registerName">Name</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="registerUsername" class="form-control" name="username"
                            value="{{ old('username') }}"  autocomplete="username" />
                        <label class="form-label" for="registerUsername">Username</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="email" id="registerEmail" class="form-control" name="email"
                            value="{{ old('email') }}"  autocomplete="email" />
                        <label class="form-label" for="registerEmail">Email</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="registerPassword" class="form-control" name="password" 
                            autocomplete="new-password" />
                        <label class="form-label" for="registerPassword">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="registerRepeatPassword" class="form-control"
                            name="password_confirmation"  autocomplete="new-password" />
                        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                            aria-describedby="registerCheckHelpText" />
                        <label class="form-check-label" for="registerCheck">
                            I have read and agree to the terms
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mb-3">Sign up</button>
                </form>
            </div>
        </div>
        <!-- Pills content -->
    </div>
    <!-- End Cart -->
    <div class="cs_height_110 cs_height_lg_50"></div>
    <hr>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </body>
@endsection
