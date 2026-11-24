<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/font-awesome/css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/toastr/toastr.min.css">
    <script src="{{ asset('backend') }}/assets/vendor/toastr/toastr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/jquery-validation/cmxform.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/jquery-validation/cmxformTemplate.css') }}">
    <style>
        .auth-main:after {
            background: url({{ asset('logs-2.jpg') }}) no-repeat top left fixed;
            background-size: cover;
        }

        .auth-main::before {
            content: none;
        }

        .auth-box {
            margin-left: 40%;
        }
    </style>
</head>

<body data-theme="light" class="font-nunito">
    <!-- WRAPPER -->
    <div id="wrapper" class="theme-cyan">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top w-100 d-flex justify-content-center">
                        <img src="{{ asset(\App\Models\Configuration::first()->logo) }}"
                            alt="{{ asset(\App\Models\Configuration::first()->name) }}">
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Login to your account supplier</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" action="{{ url('_login_supplier') }}" id="_loginForm"
                                method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-username" class="control-label sr-only">Username</label>
                                    <input type="text" name="username" class="form-control" id="signin-username"
                                        value="" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="signin-password"
                                        value="" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                        </div>
                        <div class="footer">
                            <a class="px-4" href="{{ url('login-company') }}">Login Sebagai Perusahaan
                                ?</a><br>
                            <a class="px-4" href="{{ url('register-supplier') }}">Belum Punya Akun?
                                Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="{{ asset('backend/system/signin.js') }}"></script>
</body>

</html>
