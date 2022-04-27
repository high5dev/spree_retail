<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->
    <style media="screen">
        html,body {
            height: 100%;
        }

        .global-container{
            height:100%;
            display: flex;
            align-items: center;
            justify-content: center;
            /* background-color: #f5f5f5; */
        }

        form{
            padding-top: 10px;
            font-size: 14px;
            margin-top: 30px;
        }

        .card-title{ font-weight:300; }

        .btn{
            font-size: 14px;
            margin-top:20px;
        }


        .login-form{
            width:400px;
            margin:20px;
        }

        .sign-up{
            text-align:center;
            padding:20px 0 0;
        }

        .alert{
            margin-bottom:-30px;
            font-size: 13px;
            margin-top:20px;
        }
        .form-control {
            padding: 8px 16px !important;
        }
        .btn-primary{
            border-radius: 5px;

        }
        .btn-create{
            background-color: transparent;
            color: black;
            border: 1px solid black;
            border-radius: 5px;
        }
        .card{
            border: none;
        }
        *:focus{
            outline: none;
        }
    </style>


</head>
<body>
<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
            <h2 class="text-center">Spree</h2>
            <h3 class="card-title text-center">Forgot your password? <br>We can help.
            </h3>
            <p>Enter the email address for your Spree account. We'll send a verification code for you to enter before signing in.

            </p>
            <div class="card-text">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif
                <!--
                <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <!-- to error: add class "has-danger" -->
                    <div class="form-group">
                        <!-- <label for="exampleInputEmail1">Email address</label> -->
                        <input type="email" name="email" placeholder="Email address" {{ old('email') }} class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror

                    <button type="submit" class="btn btn-primary btn-block" >Submit</button>
                </form>
                    <div class="sign-up">
                        Remember your password?
                        <a href="{{ route('login') }}">Sign in</a>

                    </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
