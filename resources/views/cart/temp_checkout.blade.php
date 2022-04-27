@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <style media="screen">
        .carousel-item,
        .container_link img,
        .col-sm-12 img {
            height: unset !important;
        }

        article .row .col-lg-3 img {
            height: 193px !important;
        }

        html,
        body {
            height: 100%;
        }

        .global-container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            /* background-color: #f5f5f5; */
        }

        form {
            padding-top: 10px;
            font-size: 14px;
            margin-top: 30px;
        }

        .card-title {
            font-weight: 300;
        }

        .btn {
            font-size: 14px;
            margin-top: 20px;
        }


        .login-form {
            width: 400px;
            margin: 20px;
        }

        .sign-up {
            text-align: center;
            padding: 20px 0 0;
        }

        .alert {
            margin-bottom: -30px;
            font-size: 13px;
            margin-top: 20px;
        }

        .form-control {
            padding: 8px 16px !important;
        }

        .btn-primary {
            border-radius: 50px;

        }

        .btn-create {
            background-color: transparent;
            color: black;
            border: 1px solid black;
            border-radius: 50px;
        }

        .card {
            border: none;
        }

        *:focus {
            outline: none;
        }

        input:focus {
            outline: none;
        }

        .check_out_btn {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
            width: 100%;
            padding: 8px;
            border: none;
        }

        .form-group {
            margin-top: 6px;
        }

        .num_1 {
            border-radius: 50px;
            color: black;
            padding: 1px 8px;
            border: 1px solid black;
            margin-right: 10px;

        }

        .card-header {
            background-color: transparent;

        }

        a {
            color: black;

        }

        .delivery:after {
            content: "";
            position: absolute;
            top: 111px;
            left: 101px;
            z-index: 999999;
            border-top: 6px solid #333;
            border-right: 6px solid transparent;
            border-bottom: 6px solid transparent;
            border-left: 6px solid transparent;
        }

        .delivery {
            border: 1px solid black;
            padding: 8px;
            width: 180px;
            text-align: center;
            margin-right: 8px;
        }

        .pickup_free {
            border: 1px solid #ccc;
            padding: 8px;
            width: 180px;
            text-align: center;
        }

        .btn_continue {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
            border-radius: 50px;
            padding: 6px 35px;
            margin-right: 80px;
        }

        .boder_div {
            background: white;
            box-shadow: 0px 2px 6px lightgrey;
            padding: 10px;
            max-width: 250px;
            border-radius: 5px;
            max-height: 330px;
        }

        .card-link {
            font-weight: bold;
        }

        input {
            padding: 0px 20px;
        }

        label {
            margin-bottom: 3px;
            margin-top: 10px;
            font-weight: 600;
        }

        .form .col-sm-6,
        .form .col-sm-4 {
            padding: 0px !important;
        }

        .heading h2 {
            font-size: 30px;
            font-weight: 700;
            margin: 40px 0px;
            text-align: center;
            margin-top: 100px;
        }

        .col-sm-12 img {
            height: unset;
        }
    </style>
    <style>
        .funkyradio div {
            clear: both;
            overflow: hidden;
        }

        .funkyradio label {
            width: 100%;
            border-radius: 3px;
            border: 1px solid #D1D3D4;
            font-weight: normal;
        }

        .funkyradio input[type="radio"]:empty,
        .funkyradio input[type="checkbox"]:empty {
            display: none;
        }

        .funkyradio input[type="radio"]:empty ~ label,
        .funkyradio input[type="checkbox"]:empty ~ label {
            position: relative;
            line-height: 2.5em;
            text-indent: 3.25em;
            margin-top: 2em;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .funkyradio input[type="radio"]:empty ~ label:before,
        .funkyradio input[type="checkbox"]:empty ~ label:before {
            position: absolute;
            display: block;
            top: 0;
            bottom: 0;
            left: 0;
            content: '';
            width: 2.5em;
            background: #D1D3D4;
            border-radius: 3px 0 0 3px;
        }

        .funkyradio input[type="radio"]:hover:not(:checked) ~ label,
        .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
            color: #888;
        }

        .funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
        .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
            content: '\2714';
            text-indent: .9em;
            color: #C2C2C2;
        }

        .funkyradio input[type="radio"]:checked ~ label,
        .funkyradio input[type="checkbox"]:checked ~ label {
            color: #777;
        }

        .funkyradio input[type="radio"]:checked ~ label:before,
        .funkyradio input[type="checkbox"]:checked ~ label:before {
            content: '\2714';
            text-indent: .9em;
            color: #333;
            background-color: #ccc;
        }

        .funkyradio input[type="radio"]:focus ~ label:before,
        .funkyradio input[type="checkbox"]:focus ~ label:before {
            box-shadow: 0 0 0 3px #999;
        }

        .funkyradio-default input[type="radio"]:checked ~ label:before,
        .funkyradio-default input[type="checkbox"]:checked ~ label:before {
            color: #333;
            background-color: #ccc;
        }

        .funkyradio-primary input[type="radio"]:checked ~ label:before,
        .funkyradio-primary input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #337ab7;
        }

        .funkyradio-success input[type="radio"]:checked ~ label:before,
        .funkyradio-success input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #5cb85c;
        }

        .funkyradio-danger input[type="radio"]:checked ~ label:before,
        .funkyradio-danger input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #d9534f;
        }

        .funkyradio-warning input[type="radio"]:checked ~ label:before,
        .funkyradio-warning input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #f0ad4e;
        }

        .funkyradio-info input[type="radio"]:checked ~ label:before,
        .funkyradio-info input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #5bc0de;
        }
    </style>
    <style>
        /**
* The CSS shown here will not be introduced in the Quickstart guide, but shows
* how you can use CSS to style your Element's container.
*/
        .StripeElement {
            background-color: white;
            padding: 16px 16px;
            border: 1px solid #ccc;

        }

        .StripeElement--focus {
        // box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #card-errors {
            color: #fa755a;
        }
    </style>
    <script src="https://js.stripe.com/v3/"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endsection
@section('content')
    <main>
        <article>
            <div class="row check_out">
                <div class="col-lg-8 col-sm-8 col-md-8">

                    <div class="container">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapseOne" class="sub-head">
                                        <span class="num_1">1</span> Delivery and pickup options
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="delivery">
                                                Delivery
                                            </div>
                                        </div>
                                        <div class="d-flex" style="align-items: center;     margin-top: 36px;">
                                            <div class="" style="margin-right: 6px;">
                                                <img width="50px"
                                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKnSk0n05uOfS0HOuZXSCOV5qGoitJ_g4Eww&usqp=CAU"
                                                     alt="">
                                            </div>
                                            <div class="" style="margin-right: 6px;">
                                                <b>Arrives by</b>
                                            </div>
                                            <div class="" style="border: 1px solid #ccc;
						border-radius: 5px;
						padding: 6px 30px;
						width: 65%;">
                                                <div class="d-flex" style="justify-content:space-between;">
                                                    <div class="">
                                                        <input type="radio" name="" value="" checked>
                                                        Tue, Dec 1
                                                    </div>
                                                    <div class="">
                                                        <span> <b>Free</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mr-5" style="float: right;">
                                            <a class="collapsed btn btn_continue" data-toggle="collapse" href="#collapseTwo">
                                                Confirm
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link lite" data-toggle="collapse" href="#collapseTwo">
                                        <span class="num_1">2</span> Confirm delivery address
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="">

                                            <div class="row form">
                                                <div class="col-lg-12 col-sm-12 col-md-12">
                                                    <div class="">
                                                        <div class="sub-head">
                                                            <h4>
                                                                Billing address
                                                            </h4>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            @if(count($addresses) > 0)
                                                                @foreach($addresses as $address)
                                                                    <div class="col-sm-6">
                                                                        <div class="card" onclick="set_address('{{$address->id}}')">
                                                                            <div class="card-body">
                                                                                <div class="funkyradio">
                                                                                    <div class="funkyradio-default">
                                                                                        <input type="radio" onselect="" name="radio" value="true{{$loop->iteration}}" id="radio{{$loop->iteration}}">
                                                                                        <label for="radio{{$loop->iteration}}">Address {{$loop->iteration}}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="card-text">{{$address->address}}, {{$address->city}}</p>
                                                                                <p class="card-text">{{$address->region}}, {{$address->country}}, {{$address->zipcode}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <div class="">
                                                            <button formtarget="_blank" type="submit" form="new-address" name="button"
                                                                    class="check_out_btn">Add/Edit Address
                                                            </button>
                                                            <form hidden id="new-address" action="{{route('profile.address')}}" method="GET">

                                                            </form>
                                                        </div>
                                                        <hr>
{{--                                                        <div class="">--}}
{{--                                                            <input type="checkbox" name="" value=""> Shipping address is--}}
{{--                                                            the same--}}
{{--                                                            as my billing address--}}
{{--                                                        </div>--}}

                                                    </div>
                                                </div>
                                                <!-- <div class="col-lg-4 col-sm-4 col-md-4">

                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link lite" data-toggle="collapse" href="#collapseThree">
                                        <span class="num_1">3</span> Enter payment method
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
{{--                                        <div class="">--}}
{{--                                            <h5>Payment</h5>--}}
{{--                                            <input type="radio" name="" value=""> Credit card <br>--}}
{{--                                            <input type="radio" name="" value=""> Debit card <br>--}}
{{--                                            <input type="radio" name="" value=""> Default radio--}}
{{--                                        </div>--}}
                                        <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="name_on_card">Name on Card</label>
                                                <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                                            </div>

                                            <div class="form-group">
                                                <label for="card-element">
                                                    Credit or debit card
                                                </label>
                                                <div id="card-element">
                                                    <!-- a Stripe Element will be inserted here. -->
                                                </div>

                                                <!-- Used to display form errors -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>
                                            <span id="error"></span>
                                            <div class="spacer"></div>
                                            <div class="col-sm-12 mt-4">
                                                <button id="complete-order" type="submit" form="payment-form" name="button" class="check_out_btn">Confirm
                                                    Order</button>
                                            </div>

                                            <input hidden id="address-input" name="address">
                                        </form>
{{--                                        <form id="checkout" action="{{route('checkout.store')}}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <div class="mr-2">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="exampleInputEmail1"> Name on card</label>--}}
{{--                                                            <input type="text" placeholder="Name on card"--}}
{{--                                                                   class="form-control form-control-sm" id=""--}}
{{--                                                                   aria-describedby="emailHelp">--}}
{{--                                                            <span>Full name as displayedon card</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <div class="ml-2">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="exampleInputEmail1">Credit card number</label>--}}
{{--                                                            <input type="number" placeholder=""--}}
{{--                                                                   class="form-control form-control-sm" id=""--}}
{{--                                                                   aria-describedby="emailHelp">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <div class="mr-2">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="exampleInputEmail1"> Expiration</label>--}}
{{--                                                            <input type="email" placeholder=""--}}
{{--                                                                   class="form-control form-control-sm" id=""--}}
{{--                                                                   aria-describedby="emailHelp">--}}
{{--                                                            <!-- <span>Full name as displayedon card</span> -->--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <div class="ml-2">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="exampleInputEmail1">CVV</label>--}}
{{--                                                            <input type="email" placeholder=""--}}
{{--                                                                   class="form-control form-control-sm" id=""--}}
{{--                                                                   aria-describedby="emailHelp">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-12 mt-4">--}}
{{--                                                    <button type="submit" form="checkout" name="button" class="check_out_btn">Confirm--}}
{{--                                                        Order</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-sm-4 col-md-4">
                    <!-- <div class="">
                        <h6>Your cart</h6>
                        <div class="" style="    border: 1px solid #ccc;">
                            <div class="d-flex"
                                style="    border-bottom: 1px solid #ccc;padding: 8px 19px; justify-content: space-between;">
                                <div class="">
                                    <span> <b>Product name</b> </span> <br>
                                    <span>Brief description</span>
                                </div>
                                <div class="">
                                    $12
                                </div>
                            </div>
                            <div class="d-flex"
                                style="    border-bottom: 1px solid #ccc;padding: 8px 19px; justify-content: space-between;">
                                <div class="">
                                    <span> <b>Second Product</b> </span> <br>
                                    <span>Brief description</span>
                                </div>
                                <div class="">
                                    $12
                                </div>
                            </div>
                            <div class="d-flex"
                                style="    border-bottom: 1px solid #ccc;padding: 8px 19px; justify-content: space-between;">
                                <div class="">
                                    <span> <b>Third item</b> </span> <br>
                                    <span>Brief description</span>
                                </div>
                                <div class="">
                                    $12
                                </div>
                            </div>
                            <div class="d-flex"
                                style="color: #11c60f;  border-bottom: 1px solid #ccc;padding: 8px 19px; justify-content: space-between;">
                                <div class="">
                                    <span> <b>Promo code</b> </span> <br>
                                    <span>SPREE</span>
                                </div>
                                <div class="">
                                    $12
                                </div>
                            </div>
                            <div class="d-flex"
                                style="    border-bottom: 1px solid #ccc;padding: 8px 19px; justify-content: space-between;">
                                <div class="">
                                    <span> <b>Total (USD)</b> </span> <br>
                                    <span>SPREE</span>
                                </div>
                                <div class="">
                                    <b>$12</b>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex" style="    border: 1px solid #ccc;    padding: 8px;
                        margin-top: 13px;">
                            <input type="text" style="width: 100%" placeholder="Promo code" name="" value="">
                            <button type="button" style="    background: gray; border: none;
                                color: white;
                                padding: 7px;" name="button" class="redeem">Redeem</button>
                        </div>

                    </div> -->

                    <div class="boder_div">

                        <div class="d-flex" style="justify-content: space-between;">
                            <div class="">
                                <p class="text-bold">
                                    Subtotal ({{Cart::count()}} item)
                                </p>

                            </div>
                            <div class="">
                                <p class="text-bold">

                                    ${{Cart::instance('default')->subtotal()}}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex" style="justify-content: space-between;">
                            <div class="">
                                <p class="text-bold">
                                    Delivery
                                </p>

                            </div>
                            <div class="">
                                <p class="text-bold">
                                    Free
                                </p>
                            </div>
                        </div>
                        <div class="d-flex" style="justify-content: space-between;">
                            <div class="">
                                <p class="text-bold" style="margin-bottom: 0px;">
                                    Taxes & fees
                                </p>
                            </div>
                            <div class="">
                                <p class="text-bold">
                                    ${{Cart::instance('default')->tax()}}
                                </p>

                            </div>

                        </div>
                        <span class="text-bold" style="font-size: 12px;">(calculated onces address is confirmed)</span>

                        <hr>
                        <div class="d-flex" style="justify-content: space-between;">
                            <div class="">
                                <p class="extra-bold">
                                    Est. Total
                                </p>
                            </div>
                            <div class="">
                                <p class="extra-bold">
                                    ${{Cart::instance('default')->total()}}
                                </p>
                            </div>
                        </div>

                        <div id="accordion2">
                            <div class="card">
                                <div class="card-header">
                                    <a class="text-bold" data-toggle="collapse" href="#collapseItem">
                                        item details +
                                    </a>
                                </div>
                                <div id="collapseItem" class="collapse" data-parent="#accordion2">
                                    <div class="card-body">
                                        <div class="" style="justify-content: space-between;">
                                            @if(Cart::instance('default')->count() > 0)
                                                @foreach(Cart::instance('default')->content() as $item)
                                                    <div class="itemDetails row pt-2">
                                                        <div class="itemImg col-sm-4">
                                                            <img src="{{asset('storage/product/'.$item->model->thumbnail)}}" alt="cart products">
                                                        </div>
                                                        <div class="itemDetails col-sm-8">
                                                            <p class="itemName">
                                                                {{$item->model->name}}
                                                            </p>
                                                            <div class="qtyPrice row space-between">
                                                                <p class="text-bold">
                                                                    Qty : 1
                                                                </p>
                                                                <p class="text-bold ">
                                                                    ${{\App\Helpers\Helper::presentPrice($item->model->price)}}
                                                                </p>
                                                            </div>

                                                            <hr style="margin: 5px;" />

                                                        </div>

                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header">
                                    <a class="text-bold" data-toggle="collapse" href="#collapseCode">
                                        Apply Promo Code +
                                    </a>
                                </div>
                                <div id="collapseCode" class="collapse" data-parent="#accordion2">
                                    <div class="card-body">
                                        <div class="d-flex" style="padding: 8px 3px;">
                                            <input type="text" style="width: 100%" placeholder="Promo code" name=""
                                                   value="">
                                            <button type="button" style="    background: gray; border: none;
							color: white;
							padding: 7px;" name="button" class="redeem">Redeem</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </article>
    </main>

@endsection
@section('js-files')
    <script>
        function set_address(value){
            document.getElementById('address-input').value = value;
        }
    </script>
    <script type="text/javascript">
        (function ($) { // Begin jQuery
            $(function () { // DOM ready
                // If a link has a dropdown, add sub menu toggle.
                $('nav ul li a:not(:only-child)').click(function (e) {
                    $(this).siblings('.nav-dropdown').toggle();
                    // Close one dropdown when selecting another
                    $('.nav-dropdown').not($(this).siblings()).hide();
                    e.stopPropagation();
                });
                // Clicking away from dropdown will remove the dropdown class
                $('html').click(function () {
                    $('.nav-dropdown').hide();
                });
                // Toggle open and close nav styles on click
                $('#nav-toggle').click(function () {
                    $('nav ul').slideToggle();
                });
                // Hamburger to X toggle
                $('#nav-toggle').on('click', function () {
                    this.classList.toggle('active');
                });
            }); // end DOM ready
        })(jQuery); // end jQuery
    </script>

    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('{{config('stripe.public_key')}}');
            // Create an instance of Elements
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                //check if address field is not empty
                if (document.getElementById('address-input').value == ''){
                    var error = document.getElementById("error");
                    error.textContent = "Please select a delivery address first or add a new one.";
                    error.style.color = "red";
                    console.log(error);
                    return;
                }
                // Disable the submit button to prevent repeated clicks
                document.getElementById('complete-order').disabled = true;
                var options = {
                    name: document.getElementById('name_on_card').value,
                }
                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        // Enable the submit button
                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server
                        stripeTokenHandler(result.token);
                    }
                });
            });
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
            // PayPal Stuff
        })();
    </script>
@endsection
