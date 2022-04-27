<?php $__env->startSection('content'); ?>
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">

                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- sales  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Number of Revenue & Profit</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Profit: $<?php echo e($t_profit); ?></h5>
                                        <h5 class="mb-1">Weekly Profit: $<?php echo e($w_profit); ?></h5>
                                        <h5 class="mb-1">Monthly Profit: $<?php echo e($m_profit); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Number of Orders</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Orders: <?php echo e(count($t_orders)); ?></h5>
                                        <h5 class="mb-1">Weekly Orders: <?php echo e(count($w_orders)); ?></h5>
                                        <h5 class="mb-1">Monthly Orders: <?php echo e(count($m_orders)); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Products Sold</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Sold: <?php echo e($t_p_sold); ?></h5>
                                        <h5 class="mb-1">Weekly Sold: <?php echo e($w_p_sold); ?></h5>
                                        <h5 class="mb-1">Monthly Sold: <?php echo e($m_p_sold); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end visitor  -->
                        <!-- ============================================================== -->
                    </div>
                    <div class="row">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->

                    </div>

                    <div class="row mt-3">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Best Selling Products Weekly<a href="<?php echo e(route('admin.dashboard.order.index')); ?>" class="btn btn-outline-dark float-right">View Details</a></h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">Image</th>
                                                <th class="border-0">Product Name</th>
                                                <th class="border-0">Product Id</th>
                                                <th class="border-0">Sold</th>
                                                <th class="border-0">Category</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $w_b_sell_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td>
                                                        <div class="m-r-10"><img src="<?php echo e(asset('storage/product/'.$product->thumbnail)); ?>" alt="user" class="rounded" width="45"></div>
                                                    </td>
                                                    <td><?php echo e($product->name); ?></td>
                                                    <td><?php echo e($product->id); ?></td>
                                                    <td><?php echo e($product->total); ?></td>
                                                    <td><?php echo e($product->main); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Best Selling Products Monthly<a href="<?php echo e(route('admin.dashboard.order.index')); ?>" class="btn btn-outline-dark float-right">View Details</a></h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">Image</th>
                                                <th class="border-0">Product Name</th>
                                                <th class="border-0">Product Id</th>
                                                <th class="border-0">Sold</th>
                                                <th class="border-0">Category</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $m_b_sell_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td>
                                                        <div class="m-r-10"><img src="<?php echo e(asset('storage/product/'.$product->thumbnail)); ?>" alt="user" class="rounded" width="45"></div>
                                                    </td>
                                                    <td><?php echo e($product->name); ?></td>
                                                    <td><?php echo e($product->id); ?></td>
                                                    <td><?php echo e($product->total); ?></td>
                                                    <td><?php echo e($product->main); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.layouts.dashboardVendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/vendor/dashboard/index.blade.php ENDPATH**/ ?>