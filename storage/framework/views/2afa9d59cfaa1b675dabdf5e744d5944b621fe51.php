<?php $__env->startSection('css-files'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<style>
    .card {
        border: none;
    }

    .card-img-top {
        height: 100%;
        width: 115% !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .b-right {
        border-right: 1px solid rgba(0, 0, 0, .1);
        height: 400px;
    }

    .breadcrumb {
        background: none;
        font-weight: 300;
        font-size: 11px;
        letter-spacing: 0.04rem;
    }

    .breadcrumb a {
        color: #737373;
    }

    .breadcrumb-item.active a {
        color: #333333;
        font-weight: 500;
    }

    .shipping-head {
        font-weight: 200;
        font-size: 25px;
        letter-spacing: 0.06rem;
    }

    .input-name {
        width: 47% !important;
    }

    .input-address {
        width: 100% !important;
    }

    .form-control {
        border-radius: 0;
        height: 45px !important;
        font-size: 13px;
    }

    .select {
        width: 30% !important;
    }

    .img-thumbnail {
        padding: .25rem;
        background-color: #fff;
        border: none;
        border-radius: 0;
        max-width: 90%;
        height: auto;
    }

    .p-name {
        font-weight: bold;
        font-size: 14px;
        white-space: nowrap;
        padding: 0;
    }

    .b-name {
        font-weight: 100;
        font-size: 10px;
        color: #737373;
    }

    .price {
        font-weight: bold;
        font-size: 13px;
    }

    .sub-total {
        font-weight: 400;
        font-size: 15px;
    }

    .price-total {
        font-weight: 700;
        font-size: 17px;
    }

    .cart-head {
        font-weight: 500;
        font-size: 25px;
    }

    .cart-info {
        font-weight: 400;
        font-size: 12px;
        color: #737373;
    }

    .cat-name {
        font-weight: 300;
        font-size: 14px;
        white-space: nowrap;
        padding: 0;
    }

    .save-for-later {
        font-weight: 300;
        font-size: 14px;
    }

    .options a {
        color: #333333;
    }

    .price-summary {
        font-weight: 400;
        font-size: 13px;

    }
</style>
<article>
    <div class="container ml-4">
        <div class="row" style="margin-top: 3rem !important;">
            <div class="col-7 b-right">
                <h1 class="pl-0">Spree</h1>
                <nav aria-label="breadcrumb" style="float: none">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('cart.index')); ?>">Cart</a></li>
                        <li class="breadcrumb-item"><a href="#">Shipping</a></li>
                        <li class="breadcrumb-item"><a href="#">Payment</a></li>
                    </ol>
                </nav>
                <h2 class="cart-head"><?php echo e(Cart::count()); ?> items in your cart</h2>
                <h2 class="cart-info">Items will be shipped from Spree</h2>

                <?php if(Cart::count() > 0): ?>
                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row mt-3">
                    <div class="col-2">
                        <img class="img-thumbnail pl-0" src="<?php echo e(asset('storage/storage/product/'.$item->model->thumbnail)); ?>">
                        
                    </div>
                    <div class="col-8 p-0 mt-2">
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="d-inline-flex">
                                    <h5 class="p-name p-1"><?php echo e($item->name); ?><span class="cat-name"> Fashion</span></h5>
                                    
                                </div>
                            </div>
                            <div class="col-12 mt-2 p-0 options">
                                <span>Size: <strong><?php echo e($item->options->size); ?></strong></span><span class="ml-5">Color: <strong><?php echo e($item->options->color); ?></strong></span>
                            </div>
                            <div class="col-12 mt-2 options">
                                <div class="row">
                                    <a href="<?php echo e(route('cart.saveForLater', $item->rowId)); ?>">
                                        <div class="d-inline-flex ml-1">
                                            <i class="far fa-bookmark"></i>
                                            <h5 class="save-for-later ml-1">Save For Later</h5>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('cart.destroy',$item->rowId)); ?>">
                                        <div class="d-inline-flex ml-4">
                                            <i class="far fa-trash-alt"></i>
                                            <h5 class="save-for-later ml-1">Remove</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mt-2">
                        <div class="row">
                            <select class="form-control mr-4">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <div class="mt-3 ml-auto p-0 mr-4">
                                <h5 class="price">$<?php echo e(\App\Helpers\Helper::presentPrice($item->price)); ?></h5>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="col-5">
                <div class="text-center">
                    <h5 class="bold">Order Summary</h5>
                </div>
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
                <div class="row ml-2">
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
                        <button form="checkout" class="btn btn-primary mr-auto mt-1" style="width: 100%"><span style="font-weight: 600">Checkout</span></button>
                    </div>
                    <form id="checkout" hidden action="<?php echo e(route('cart.shipping')); ?>" method="GET">

                    </form>
                    <div class="col-1">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(count($customerAlsoBought) > 0): ?>
    <div class="mt-2 mb-2">
        <div class="container-fluid">
            <div class="d-flex space-between fs-15 mt-3" style="    margin-top: 44px !important;">
                <div>
                    <h4 class="fs-15 mb-3" style="margin-left: 28px;margin-bottom: 20px"> <b>Customers Also Considered This</b> </h4>
                </div>
                <div class="shopAll">
                    <a href="" style="font-weight: 600;margin-right: 120px">Shop All <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" style="margin-left: -2px;">
                <?php $__currentLoopData = $customerAlsoBought; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-12 col-md-10 col-lg-6 col-xl-2 ml-3">
                    <div class="card" style="margin-bottom: 1rem">
                        <a href="<?php echo e(route('product.show',$product->slug)); ?>"><img class="card-img-top" src="<?php echo e(asset('storage/storage/product/'. $product->thumbnail)); ?>"></a>
                    </div>
                    <div class="mt-2">
                        <p class="text-bold mb-1"><?php echo e($product->user->vendor_profile->brand_name ?? ''); ?></p>
                        <p title="Source Title" style="font-size: 13px" class="mb-1"><?php echo e($product->name); ?></p>
                        <p class="text-bold">$<?php echo e($product->price); ?>.00</p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</article>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js-files'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Game\Downloads\SPREE-master\resources\views/cart/index.blade.php ENDPATH**/ ?>