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
                        <li class="breadcrumb-item active"><a href="#">Shipping</a></li>
                        <li class="breadcrumb-item"><a href="#">Payment</a></li>
                    </ol>
                </nav>
                <h2 class="shipping-head">Shipping Address</h2>
                <form class="">
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
                        <img class="img-thumbnail pl-2" src="<?php echo e(asset('storage/product/n2.jpg')); ?>">
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
                        <img class="img-thumbnail pl-2" src="<?php echo e(asset('storage/product/n2.jpg')); ?>">
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
                        <img class="img-thumbnail pl-2" src="<?php echo e(asset('storage/product/n2.jpg')); ?>">
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
                        <h5 class="price-summary ml-auto" style="white-space: nowrap;">Calculated in checkout</h5>
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
                        <button class="btn btn-primary mr-auto mt-1" style="width: 100%"><span style="font-weight: 600">Continue To Payment</span></button>
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
<?php echo $__env->yieldContent('js-files'); ?>
</body>
</html>
<?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/temp.blade.php ENDPATH**/ ?>