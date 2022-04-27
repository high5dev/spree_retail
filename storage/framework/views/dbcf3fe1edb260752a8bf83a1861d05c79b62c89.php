
<?php $__env->startSection('css-files'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/multi-select/css/multi-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/select2/css/select2.css')); ?>">
    <style>
        .card{
            border: none;
        }
        .card-img-top{
            height: 100%;
            width: 115% !important;
        }
    </style>
    <style>
        .b-right{
            border-right: 1px solid rgba(0,0,0,.1);
            height: 300px;
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
            max-width: 90%;
            height: auto;
        }
        .p-name{
            font-weight: bold;
            font-size: 14px;
            white-space: nowrap;
            padding: 0;
        }
        .b-name{
            font-weight: 100;
            font-size: 10px;
            color: #737373;
        }
        .price{
            font-weight: bold;
            font-size: 13px;
        }
        .sub-total{
            font-weight: 400;
            font-size: 15px;
        }
        .price-total{
            font-weight: 700;
            font-size: 17px;
        }
        .cart-head{
            font-weight: 500;
            font-size: 25px;
        }
        .cart-info{
            font-weight: 400;
            font-size: 12px;
            color: #737373;
        }
        .cat-name{
            font-weight: 300;
            font-size: 14px;
            white-space: nowrap;
            padding: 0;
        }
        .save-for-later{
            font-weight: 300;
            font-size: 14px;
        }
        .options a{
            color: #333333;
        }
        .price-summary{
            font-weight: 400;
            font-size: 13px;

        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Order Detail</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Order</li>
                                        <li class="breadcrumb-item" aria-current="page">Product</li>
                                        <li class="breadcrumb-item active" aria-current="page"></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Start Form  -->
        <!-- ============================================================== -->

        <div class="container mt-0">
            <div class="row">
                <div class="col-md-5 b-right m-0">
                    <div class="text-center">
                        <h5 class="pl-0 bold">Product Summery</h5>
                    </div>
                    <hr>
                    <div class="row ml-2 mt-0">
                        <div class="col-8">
                            <h5 class="sub-total">Product Id/SUK</h5>
                        </div>
                        
                        <div class="col-2">
                            <h5 class="price-summary ml-auto"><?php echo e($order_product->product()->first()->id); ?></h5>
                        </div>
                    </div>
                    <div class="row ml-2 mt-0">
                        <div class="col-8">
                            <h5 class="sub-total">Product name</h5>
                        </div>
                        
                        <div class="col-3">
                            <h5 class="price-summary ml-auto"><?php echo e($order_product->product()->first()->name); ?></h5>
                        </div>
                    </div>
                    <div class="row ml-2 mt-0">
                        <div class="col-8">
                            <h5 class="sub-total">Order Quantity</h5>
                        </div>                        
                        <div class="col-3">
                            <h5 class="price-summary ml-auto"><?php echo e($order_product->quantity); ?></h5>
                        </div>
                    </div>
                    <div class="row ml-2 mt-0">
                        <div class="col-8">
                            <h5 class="sub-total">Total Price</h5>
                        </div>                        
                        <div class="col-3">
                            <h5 class="price-summary ml-auto">$<?php echo e($order_product->price); ?></h5>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="text-center">
                        <h5 class="bold">Customer Detail</h5>
                    </div>
                    <hr>
                    <div class="row ml-2 mt-3">
                        <div class="col-8">
                            <h5 class="sub-total">Name</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="price-summary ml-auto"><?php echo e($order_product->order()->first()->user()->first()->first_name); ?> <?php echo e($order_product->order()->first()->user()->first()->last_name); ?></h5>
                        </div>
                    </div>
                    <div class="row ml-2 mt-1">
                        <div class="col-8">
                            <h5 class="sub-total">Email</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="price-summary ml-auto"><?php echo e($order_product->order()->first()->user()->first()->email); ?></h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row ml-2">
                        <h5 class="pl-0 text-primary">Customer Address:</h5>
                    </div>
                    <div class="row ml-2">
                        <div style="background-color: white">
                            <p class="m-0">House no. 95, Lahore</p>
                            <p>Punjab, Pakistan, 54000</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card">
                <h5 class="card-header ml-2">Action</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('vendor.dashboard.ordermanagement.store', $order_product->id )); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="col-form-label " for="status">Status *</label>
                            <select name="status" id="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="" disabled selected>Select Status</option>
                                <?php if($order_product->status != 1): ?>
                                    <option value="1">Acknowledge</option>
                                <?php endif; ?>
                                <option value="2">Ship</option>
                                <option value="3">Cancel- Out of stock</option>
                                <option value="4">Cancel- Pricing Error</option>
                                <option value="5">Cancel- Customer Cancel Order</option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="tracking_number">Tracking Number</label>
                            <input type="text" name="tracking_number" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="shipped_quantity">Quantity</label>
                            <input type="number" name="shipped_quantity" class="form-control form-control-sm" value="<?php echo e($order_product->quantity); ?>" disabled>
                            <input type="number" name="shipped_quantity" class="form-control form-control-sm" value="<?php echo e($order_product->quantity); ?>" hidden>
                            
                        </div>
                        <button class="btn btn-primary">Update Status</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- end From  -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
    <?php echo $__env->make('admin.inc.dashboardAdminFooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js-files'); ?>
    <script src="<?php echo e(asset('dashboard-vendor/multi-select/js/jquery.multi-select.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard-vendor/select2/js/select2.min.js')); ?>"></script>
    <script>
        // $('#status').select2({
        //     placeholder: "Select a status"
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.layouts.dashboardVendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/vendor/dashboard/ordermanagement/show.blade.php ENDPATH**/ ?>