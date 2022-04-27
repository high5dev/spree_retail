<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Spree @yield('title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Jquery -->
    <script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body{
            font-family: "acumin-pro", Helvetica, Avenir, sans-serif;
        }
    </style>
</head>

<body onload="submit_button()">
<!-- Session Messages -->
@include('inc.message_popup')

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
<style>

    .b-right{
        border-right: 1px solid rgba(0,0,0,.1);
        height: 600px;
    }
    .breadcrumb{
        background: none;
        font-weight: 300;
        font-size: 11px;
        letter-spacing: 0.04rem;
    }
    .breadcrumb a{
        color: #737373;
    }
    .breadcrumb-item.active a{
        color: #333333;
        font-weight: 500;
    }
    .shipping-head{
        font-weight: 200;
        font-size: 25px;
        letter-spacing: 0.06rem;
    }
    .input-name{
        width: 47% !important;
    }
    .input-address{
        width: 100% !important;
    }
    .form-control{
        border-radius: 0;
        height: 45px !important;
        font-size: 13px;
    }
    .select{
        width: 30% !important;
    }
    .img-thumbnail{
        padding: .25rem;
        background-color: #fff;
        border: none;
        border-radius: 0;
        max-width: 75%;
        height: auto;
    }
    .p-name{
        font-weight: 600;
        font-size: 14px;
        white-space: nowrap;
        padding: 0;
        margin-top: 5px;
    }
    .b-name{
        font-weight: 100;
        font-size: 12px;
        color: #737373;
    }
    .price{
        font-weight: 800;
        font-size: 12px;
    }
    .sub-total{
        font-weight: 400;
        font-size: 15px;
    }
    .price-total{
        font-weight: 700;
        font-size: 17px;
    }
    .price-summary{
        font-weight: 400;
        font-size: 13px;

    }
</style>
    <div class="container">
        <div class="row mt-5">
            <div class="col-7 b-right">
                <h1 class="pl-0">Spree</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item"><a href="#">Information</a></li>
                        <li class="breadcrumb-item"><a href="#">Shipping</a></li>
                        <li class="breadcrumb-item active"><a href="#">Payment</a></li>
                    </ol>
                </nav>
                <form class="">

                    <h2 class="shipping-head">Payment</h2>

                    <div class="form-group">
                        <input type="text" placeholder="Name On Card"class="form-control" id="name_on_card" name="name_on_card" value="">
                    </div>

                    <div class="form-group">
                        <div id="card-element">
                            <!-- a Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <span id="error"></span>
                    <div class="spacer"></div>

                    <input hidden id="address-input" name="address">

                    <h2 class="shipping-head">Billing Address</h2>
                    <div class="form-group form-inline">
                        <input class="form-control input-name" name="first_name" placeholder="First Name">
                        <input class="form-control ml-auto input-name" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-address" name="last_name" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-address" name="address" placeholder="Apartment, suite, etc. (optional)">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-address" name="city" placeholder="City">
                    </div>
                    <div class="form-group form-inline">
                        <select name="country" class="form-control select">
                            <option value="1">United States</option>
                        </select>
                        <select name="country" class="form-control select ml-auto">
                            <option value="">State</option>
                            <option value="">Alabama</option>
                            <option value="">Alaska</option>
                        </select>
                        <input class="form-control ml-auto select" placeholder="Zip Code">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-address" name="phone" placeholder="Phone">
                    </div>

                </form>
            </div>
            <div class="col-5">
                <div class="row ml-2 mb-2">
                    <div class="col-2 p-0">
                        <img class="img-thumbnail pl-2" src="{{asset('storage/product/n2.jpg')}}">
                    </div>
                    <div class="col-10 p-0 mt-2">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="p-name">Bron C Cosmos Short Sleeve</h5>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="b-name">Brand Name</h5>
                                    </div>
                                    <div class="col-3 mr-auto">
                                        <h5 class="price pl-1">$150.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ml-2 mb-2">
                    <div class="col-2 p-0">
                        <img class="img-thumbnail pl-2" src="{{asset('storage/product/n2.jpg')}}">
                    </div>
                    <div class="col-10 p-0 mt-2">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="p-name">Bron C Cosmos Short Sleeve</h5>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="b-name">Brand Name</h5>
                                    </div>
                                    <div class="col-3 mr-auto">
                                        <h5 class="price pl-1">$150.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ml-2 mb-2">
                    <div class="col-2 p-0">
                        <img class="img-thumbnail pl-2" src="{{asset('storage/product/n2.jpg')}}">
                    </div>
                    <div class="col-10 p-0 mt-2">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="p-name">Bron C Cosmos Short Sleeve</h5>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="b-name">Brand Name</h5>
                                    </div>
                                    <div class="col-3 mr-auto">
                                        <h5 class="price pl-1">$150.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row ml-2 mt-3">
                    <div class="col-8">
                        <h5 class="sub-total">Subtotal</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="price-summary ml-auto">$125.00</h5>
                    </div>
                </div>
                <div class="row ml-2 mt-1">
                    <div class="col-8">
                        <h5 class="sub-total">Shipping Fee</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="price-summary ml-auto">$25.00</h5>
                    </div>
                </div>
                <div class="row ml-2 mt-1">
                    <div class="col-8">
                        <h5 class="sub-total">Taxes</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="price-summary ml-auto" style="white-space: nowrap;">$25.00</h5>
                    </div>
                </div>
                <hr>
                <div class="row ml-2">
                    <div class="col-8">
                        <h5 class="bold">Total</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="price-total ml-auto">$175.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">

                    </div>
                    <div class="col-9 p-0">
                        <button class="btn btn-primary mr-auto mt-1" style="width: 100%"><span style="font-weight: 600">Checkout</span></button>
                    </div>
                    <div class="col-1">

                    </div>
                </div>
            </div>
        </div>
    </div>


<!--- End Footer -->


<!--- Script Js Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/15ce08dfb5.js" crossorigin="anonymous"></script>

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

<!-- Other JS files -->
@yield('js-files')
</body>
</html>
