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
<div class="global-container mt-5">
    <div class="card login-form">
        <div class="card-body">
            <h2 class="text-center mb-3">Spree</h2>
            <h3 class="card-title text-center">Become a kitchen partner</h3>
            <div class="card-text">
                <form action="{{ route('kitchen.partner.form.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="First Name" class="form-control form-control-sm @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="Last Name" class="form-control form-control-sm @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Business Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="Contact Name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Business Email <span style="color: red">*</span></label>
                        <input type="text" placeholder="Contact Email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" aria-describedby="emailHelp">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label> <span style="color: red">*</span></label>
                        <input type="number" placeholder="Phone Number" class="form-control form-control-sm @error('link') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address <span style="color: red">*</span></label>
                        <input type="text" placeholder="Address" class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">City <span style="color: red">*</span></label>
                        <input type="text" placeholder="City" class="form-control form-control-sm @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}">
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Country <span style="color: red">*</span></label>
                        <input type="text" placeholder="Country" class="form-control form-control-sm @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}">
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Zip Code <span style="color: red">*</span></label>
                        <input type="text" placeholder="Zip Code" class="form-control form-control-sm @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') }}">
                        @error('zipcode')
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
