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
    .b-name{
        font-weight: 600;
        font-size: 14px;
        white-space: nowrap;
        padding: 0;
        /* margin-top: 5px; */
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
</style>
<div class="container">
    <div class="row mt-5">
        <div class="col-7 b-right">
            <h1 class="pl-0">Spree</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('cart.index')); ?>">Cart</a></li>
                    <li class="breadcrumb-item active"><a href="#">Shipping</a></li>
                    <li class="breadcrumb-item"><a href="#">Payment</a></li>
                </ol>
            </nav>









            <h2 class="shipping-head">Shipping Address</h2>
            <form class="" id="address-form" action="<?php echo e(route('checkout.index')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group" >
                    <?php if(count($addresses) > 0): ?>
                        <select onchange="set_address()" onselect="set_address()" id="address-select" name="u_address" class="form-control">
                            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($address->id); ?>"><?php echo e($address->address); ?>, <?php echo e($address->city); ?>, <?php echo e($address->region); ?>, <?php echo e($address->country); ?> <?php echo e($address->zipcode); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <option value="0">Use A New Address</option>
                        </select>
                    <?php endif; ?>
                </div>
                <div class="form-group form-inline">
                    <input class="form-control input-name" name="first_name" id="first_name" placeholder="First Name">
                    <input class="form-control ml-auto input-name" name="last_name" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <input class="form-control input-address" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <input class="form-control input-address" name="app_address" placeholder="Apartment, suite, etc. (optional)">
                </div>
                <div class="form-group">
                    <input class="form-control input-address" name="city" placeholder="City">
                </div>
                <div class="form-group form-inline">
                    <select name="country" class="form-control select">
                        <option value="1">United States</option>
                    </select>

                    <input class="form-control select ml-auto" name="region" placeholder="State">

                    <input class="form-control ml-auto select" name="zipcode" placeholder="Zip Code">
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
                    <div class="row ml-2 mb-3">
                        <div class="col-2 p-0">
                            <img class="img-thumbnail pl-2" src="<?php echo e(asset('storage/storage/product/'.$item->model->thumbnail)); ?>">
                        </div>
                        <div class="col-10 p-0 mt-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-7 d-flex">                                            
                                            <h5 class="ml-1 b-name"><?php echo e(\Illuminate\Support\Str::limit($item->model->user->vendor_profile->brand_name ?? '', 6, $end="..")); ?></h5>                                            
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
                    <h5 class="price-summary ml-auto">$0.00</h5>
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
            <div class="row ml-2 mb-3">
                <div class="col-8">
                    <h5 class="bold">Total</h5>
                </div>
                <div class="col-2">
                    <h5 class="price-total ml-auto">$<?php echo e(Cart::instance('default')->total()-Cart::instance('default')->tax()); ?>.00</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                </div>
                <div class="col-9 p-0">
                    <button form="address-form" class="btn btn-primary mr-auto mt-1" style="width: 100%"><span style="font-weight: 600">Continue To Payment</span></button>
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
    <?php if(count($addresses) > 0): ?>
        <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            var arr_<?php echo e($address->id); ?> = <?php echo json_encode($address, 15, 512) ?>;
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
        $(document).ready(function() {
            document.getElementById('address-select').value = 0;



        });
    function set_address(){
        var temp = document.getElementById('address-select').value;
        if (temp != 0)
        {
            var address = eval('arr_'+temp);
            inputs = document.getElementById("address-form").getElementsByTagName("input");

            inputs.first_name.value = address.first_name;
            inputs.last_name.value = address.last_name;
            inputs.address.value = address.address;
            inputs.app_address.value = address.app_address;
            inputs.city.value = address.city;
            inputs.region.value = address.region;
            inputs.zipcode.value = address.zipcode;
        }else {
            document.getElementById("address-form").reset();
            document.getElementById('address-select').value = 0;
        }
    }
</script>

<!-- Other JS files -->
<?php echo $__env->yieldContent('js-files'); ?>
</body>
</html>
<?php /**PATH C:\Users\Game\Downloads\SPREE-master\resources\views/cart/shipping.blade.php ENDPATH**/ ?>