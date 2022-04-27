<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <!--- Script Js Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/15ce08dfb5.js" crossorigin="anonymous"></script>
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
        input:focus{
            outline: none;
        }
    </style>


</head>
<body onload="submit_button()">
<script>
    //for message.blade.php
    function submit_button() {
        if(document.getElementById("popup"))
            document.getElementById("popup").click();
    }
</script>

@if(count($errors)>0)
    <div>
        <button style="display: none" type="button" id="popup" data-toggle="modal" data-target="#myModal"></button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Errors</h4>
                    </div>
                    <div class="modal-body">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endif

@if(session('popup_success'))
    <div>
        <button style="display: none" type="button" id="popup" data-toggle="modal" data-target="#myModal"></button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Message</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success">
                            {{session('popup_success')}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endif

@if(session('popup_error'))
    <div>
        <button style="display: none" type="button" id="popup" data-toggle="modal" data-target="#myModal"></button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Errors</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            {{session('popup_error')}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endif



<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
            <h2 class="text-center">Spree</h2>
            <h3 class="card-title text-center">Reset Password</h3>
            <div class="card-text">
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
                <!--
                <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                <form method="POST" action="{{ route('password.update') }}">
                     @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <!-- to error: add class "has-danger" -->
                    <div class="form-group">
                        <!-- <label for="exampleInputEmail1">Email address</label> -->
                        <input type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Email Address" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control form-control-sm" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control form-control-sm" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" > {{ __('Reset Password') }}</button>

                    <div class="sign-up">
                        Don't have an account?
                        <button type="submit" class="btn btn-create btn-block">
                            <a href="{{ route('register') }}">Create Account</a>
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

