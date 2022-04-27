<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/fonts/circular-std/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/fonts/fontawesome/css/fontawesome-all.css')}}">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center"><a><img class="logo-img" src="{{asset('images/dashboard/logo.png')}}" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
        <div class="card-body">
            @error('email')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            @error('password')
            <div class="alert alert-primary" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-lg" name="email" id="email" type="email" placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="remember" type="checkbox"><span class="custom-control-label">Remember Me</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </form>
        </div>
        <div class="card-footer bg-white p-0   text-center">
            {{--<div class="card-footer-item card-footer-item-bordered">
                <a href="#" class="footer-link">Create An Account</a></div>--}}
            <div class="card-footer-item card-footer-item-bordered">
                <a href="#" class="footer-link">Forgot Password</a>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="{{asset('dashboard-vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('dashboard-vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

</body>

</html>
