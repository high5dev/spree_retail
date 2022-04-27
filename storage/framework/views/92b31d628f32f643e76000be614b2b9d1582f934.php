<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Spree <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Jquery -->
    <script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body{
            font-family: "acumin-pro", Helvetica, Avenir, sans-serif;
        }
    </style>
</head>

<body onload="submit_button()">
<!-- Session Messages -->
<?php echo $__env->make('inc.message_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<style>

    .b-right{
        border-right: 1px solid rgba(0,0,0,.1);
        height: 150%;
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
    .b-name{
        font-weight: 600;
        font-size: 14px;
        white-space: nowrap;
        padding: 0;        
    }
    .p-name{
        font-weight: 100;
        font-size: 14px;
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



    label {
        width: 100%;
        font-size: 1rem;
    }

    .card-input-element+.card {
        height: calc(36px + 2*1rem);
        color: var(--primary);
        -webkit-box-shadow: none;
        box-shadow: none;
        border: 2px solid transparent;
        border-radius: 4px;
    }

    .card-input-element+.card:hover {
        cursor: pointer;
    }

    .card-input-element:checked+.card {
        border: 2px solid var(--primary);
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }

    .card-input-element:checked+.card::after {
        content: '\e5ca';
        color: #AFB8EA;
        font-family: 'Material Icons';
        font-size: 24px;
        -webkit-animation-name: fadeInCheckbox;
        animation-name: fadeInCheckbox;
        -webkit-animation-duration: .5s;
        animation-duration: .5s;
        -webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    @-webkit-keyframes fadeInCheckbox {
        from {
            opacity: 0;
            -webkit-transform: rotateZ(-20deg);
        }
        to {
            opacity: 1;
            -webkit-transform: rotateZ(0deg);
        }
    }

    @keyframes  fadeInCheckbox {
        from {
            opacity: 0;
            transform: rotateZ(-20deg);
        }
        to {
            opacity: 1;
            transform: rotateZ(0deg);
        }
    }

    .email-card{
        font-weight: 400;
        font-size: 15px;
    }
    .contact-card{
        font-weight: 400;
        font-size: 15px;
        color: #737373;
    }
</style>
<div class="container">
    <div class="row mt-5">
        <div class="col-7 b-right">
            <h1 class="pl-0">Spree</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('cart.index')); ?>">Information</a></li>
                    <li class="breadcrumb-item"><a>Shipping</a></li>
                    <li class="breadcrumb-item active"><a>Payment</a></li>
                </ol>
            </nav>
            <div class="card mb-2">
                <div class="col-12">
                    <div class="row mb-1 mt-1">
                        <h5 class="contact-card mb-0 mt-2 ml-3">Contact</h5>
                        <h5 class="email-card mb-0 mt-2 ml-3">bilalaijaz.88@gmail.com</h5>
                        <a class="btn btn-sm btn-primary-link ml-auto mr-2" href="<?php echo e(route('profile')); ?>">Change</a>
                    </div>
                    <hr class="m-0">
                    <div class="row mb-1 mt-1">
                        <h5 class="contact-card mb-0 mt-2 ml-3">Ship To</h5>
                        <h5 class="email-card mb-0 mt-2 ml-3"><?php echo e($address->address); ?>, <?php echo e($address->city); ?>, <?php echo e($address->country); ?> <?php echo e($address->zipcode); ?></h5>
                        <a class="btn btn-sm btn-primary-link ml-auto mr-2" href="<?php echo e(route('cart.shipping')); ?>">Change</a>
                    </div>
                </div>
            </div>
            <form action="<?php echo e(route('checkout.store')); ?>" method="POST" id="payment-form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>










                <h2 class="shipping-head mt-5 mb-3">Payment</h2>
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


                <input hidden value="<?php echo e($address->id); ?>" id="address-input" name="address">

                
                <?php if($not_arr == 0): ?>
                    <?php if(count($quotes) > 0): ?>
                        <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($quote->ServiceType == "FEDEX_GROUND"): ?>
                                <label onclick="update_price(<?php echo e($quote->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount); ?>)">
                                    <input required type="radio"  name="quote" class="card-input-element d-none" value="<?php echo e($loop->iteration); ?>" id="demo<?php echo e($loop->iteration); ?>">
                                    <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center" style="color: black">
                                        <span style="font-weight: bold">Standard Shipping</span>
                                        $<?php echo e($quote->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount); ?> at <?php echo e(\Carbon\Carbon::parse($quote->DeliveryTimestamp)->toDayDateTimeString()); ?>

                                    </div>
                                </label>
                            <?php endif; ?>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php endif; ?>
                <?php else: ?>
                    <label onclick="update_price(<?php echo e($quotes->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount); ?>)">
                        <input required type="radio"  name="quote" class="card-input-element d-none" value="1" id="demo1">
                        <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center" style="color: black">
                            <span style="font-weight: bold">Standard Shipping</span>
                            $<?php echo e($quotes->RatedShipmentDetails->ShipmentRateDetail->TotalNetChargeWithDutiesAndTaxes->Amount); ?> at <?php echo e(\Carbon\Carbon::parse($quotes->DeliveryTimestamp)->toDayDateTimeString()); ?>

                        </div>
                    </label>
                <?php endif; ?>
                <h2 class="shipping-head mt-5 mb-3">Billing Address</h2>
                <div class="card mb-2">
                    <div class="col-12">
                        <a style="text-decoration: none" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="collapse_old()">
                            <div class="row ml-2 mt-3 mb-2">
                                <input checked type="radio" style="margin-top: 2px;" name="shipping_address_form" value="shipping" id="same-shipping">
                                <h5 style="font-size: 16px;font-weight: 700;color: black;" class="mb-1 ml-2">Same as shipping address</h5>
                            </div>

                        </a>
                        <hr class="m-0">
                        <a  style="text-decoration: none" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="collapse_new()">
                            <div class="row ml-2 mt-3 mb-2">
                                <input type="radio" style="margin-top: 2px;" name="shipping_address_form" value="new" id="new-shipping">
                                <h5 style="font-size: 16px;font-weight: 700;color: black" class="mb-1 ml-2">Add new billing address</h5>
                            </div>

                        </a>
                    </div>
                </div>
                <div class="collapse" style="margin-bottom: 10rem" id="collapseExample">
                    <h2 class="shipping-head mt-5 mb-3">Add New Billing Address</h2>
                    <div class="form-group form-inline">
                        <input class="form-control input-name" name="ship_name" placeholder="First Name">
                        <input class="form-control ml-auto input-name" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-address" name="ship_address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-address" name="ship_app_address" placeholder="Apartment, suite, etc. (optional)">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-address" name="ship_city" placeholder="City">
                    </div>
                    <div class="form-group form-inline">
                        <select name="ship_country" class="form-control select">
                            <option value="1">United States</option>
                        </select>
                        <select name="ship_region" class="form-control select ml-auto">
                            <option value="">State</option>
                            <option value="">Alabama</option>
                            <option value="">Alaska</option>
                        </select>
                        <input class="form-control ml-auto select" name="ship_zipcode" placeholder="Zip Code">
                    </div>



                </div>
            </form>
        </div>
        <div class="col-5">
            <?php if(Cart::count() > 0): ?>
                <div class="row ml-2 mb-3">
                    <div class="col p-0">
                        <h6 class="ml-2 text-primary" style="font-size: 15px; font-weight:600;">Estimated Arrival <?php echo e($date_estimated); ?> </h6>
                    </div>
                </div>
                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row ml-2 mb-2">
                        <div class="col-2 p-0">
                            <img class="img-thumbnail pl-2" src="<?php echo e(asset('storage/product/'.$item->model->thumbnail)); ?>">
                        </div>
                        <div class="col-10 p-0 mt-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-7 d-flex">                                            
                                            <h5 class="ml-1 b-name"><?php echo e(\Illuminate\Support\Str::limit($item->model->user->vendor_profile->brand_name, 6, $end="..")); ?></h5>                                            
                                            <h5 class="ml-1 p-name"><?php echo e($item->model->name); ?></h5>
                                        </div>
                                        <div class="col-3">
                                            <h5 class="price pl-1">$<?php echo e($item->model->price); ?>.00</h5>
                                        </div>
                                    </div>                                    
                                </div>  
                                
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <hr>
            <div class="row ml-2 mt-3">
                <div class="col-8">
                    <h5 class="sub-total">Subtotal</h5>
                </div>
                <div class="col-2">
                    <h5 class="price-summary ml-auto">$<?php echo e(Cart::instance('default')->subtotal()); ?></h5>
                </div>
            </div>
            <div class="row ml-2 mt-1">
                <div class="col-8">
                    <h5 class="sub-total">Shipping Fee</h5>
                </div>
                <div class="col-2">
                    <h5 class="price-summary ml-auto" id="ship_fee">$0.00</h5>
                </div>
            </div>
            <div class="row ml-2 mt-1">
                <div class="col-8">
                    <h5 class="sub-total">Taxes</h5>
                </div>
                <div class="col-2">
                    <h5 class="price-summary ml-auto" style="white-space: nowrap;">$<?php echo e(Cart::instance('default')->tax()); ?></h5>
                </div>
            </div>
            <hr>
            <div class="row ml-2">
                <div class="col-8">
                    <h5 class="bold">Total</h5>
                </div>
                <div class="col-2">
                    <h5 class="price-total ml-auto" id="cart_total">$<?php echo e(Cart::instance('default')->total()); ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-1">

                </div>
                <div class="col-9 p-0">
                    <button form="payment-form" id="complete-order" class="btn btn-primary mr-auto mt-1" style="width: 100%"><span style="font-weight: 600">Checkout</span></button>
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
    function set_address(value){
        document.getElementById('address-input').value = value;
    }
    function update_price(price){
        var total = <?php echo e(Cart::instance('default')->total()); ?>;
        document.getElementById('ship_fee').innerText = '$'+price;
        document.getElementById('cart_total').innerText = '$'+(total+price);
    }
    function collapse_old(){
        console.log(1);
        $(".collapse").collapse('hide');
        document.getElementById('same-shipping').checked = true;
    }
    function collapse_new(){
        document.getElementById('new-shipping').checked = true;
    }
</script>

<script>

    (function(){
        // Create a Stripe client
        var stripe = Stripe('<?php echo e(config('stripe.public_key')); ?>');
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

</body>
</html>
<?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/cart/checkout.blade.php ENDPATH**/ ?>