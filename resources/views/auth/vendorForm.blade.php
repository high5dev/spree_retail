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
    </style>


</head>
<body onload="">
<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
            <h2 class="text-center">Spree</h2>
            <h3 class="card-title text-center">Become a spree vendor</h3>
            <div class="card-text">
                <form action="{{ route('sellOnSpree.form.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="Contact Name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact Email <span style="color: red">*</span></label>
                        <input type="text" placeholder="Contact Email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" aria-describedby="emailHelp">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="Brand Name" class="form-control form-control-sm @error('brand_name') is-invalid @enderror" name="brand_name" value="{{ old('brand_name') }}">
                        @error('brand_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Website Link</label>
                        <input type="text" placeholder="Link" class="form-control form-control-sm @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}">
                        @error('link')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">What business structure are you using? <span style="color: red">*</span></label>
                        <input type="text" placeholder="Structure" class="form-control form-control-sm @error('structure') is-invalid @enderror" name="structure" value="{{ old('structure') }}">
                        @error('structure')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tell us your brand story <span style="color: red">*</span></label>
                        <textarea name="about" class="form-control @error('about') is-invalid @enderror">{{old('about')}}</textarea>
                        @error('about')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="" style="margin-top: 20px;">
                        We will contact you soon using your email address.
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" >Submit Your Application</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
