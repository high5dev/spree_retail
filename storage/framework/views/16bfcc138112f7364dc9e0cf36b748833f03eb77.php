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

                    <div class="row p-3">
                        <!-- ============================================================== -->
                        <!-- sales  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-1 border-secondary">
                                <div class="card-body">
                                    <h5 class="text-secondary">Number of Revenue</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Profit: $<?php echo e($t_profit); ?></h5>
                                        <h5 class="mb-1">Weekly Profit: $<?php echo e($w_profit); ?></h5>
                                        <h5 class="mb-1">Monthly Profit: $<?php echo e($m_profit); ?></h5>
                                        <h5 class="mb-1">Gross Revenue: $<?php echo e($g_profit); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body border-1 border-primary p-1">
                                    <h5 class="text-primary">Number of Orders</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Orders: <?php echo e(count($t_orders)); ?></h5>
                                        <h5 class="mb-1">Weekly Orders: <?php echo e(count($w_orders)); ?></h5>
                                        <h5 class="mb-1">Monthly Orders: <?php echo e(count($m_orders)); ?></h5>
                                        <h5 class="mb-1">&nbsp;</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-2 border-info">
                                <div class="card-body">
                                    <h5 class="text-info">New Customers</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Customers: <?php echo e($t_c_count); ?></h5>
                                        <h5 class="mb-1">Weekly Customers: <?php echo e($w_c_count); ?></h5>
                                        <h5 class="mb-1">Monthly Customers: <?php echo e($m_c_count); ?></h5>
                                        <h5 class="mb-1">&nbsp;</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-2 border-success">
                                <div class="card-body">
                                    <h5 class="text-success">Products Sold</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Sold: <?php echo e($t_p_sold); ?></h5>
                                        <h5 class="mb-1">Weekly Sold: <?php echo e($w_p_sold); ?></h5>
                                        <h5 class="mb-1">Monthly Sold: <?php echo e($m_p_sold); ?></h5>
                                        <h5 class="mb-1">&nbsp;</h5>
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
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Recent Orders <a href="<?php echo e(route('admin.dashboard.order.index')); ?>" class="btn btn-outline-dark float-right">View Details</a></h5>
                                <div class="card-body pt-1">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                            <tr class="">
                                                <th class="">#</th>
                                                <th class="">Image</th>
                                                <th class="">Product Name</th>
                                                <th class="">Product Id</th>
                                                <th class="">Quantity</th>
                                                <th class="">Price</th>
                                                <th class="">Order Time</th>
                                                <th class="">Customer</th>
                                                <th class="">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $t_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td>
                                                        <div class="m-r-10"><img src="<?php echo e(asset('storage/product/'.$order->product->thumbnail)); ?>" alt="user" class="rounded" width="45"></div>
                                                    </td>
                                                    <td><?php echo e($order->product->name); ?></td>
                                                    <td><?php echo e($order->product->id); ?></td>
                                                    <td><?php echo e($order->quantity); ?></td>
                                                    <td>$<?php echo e($order->price); ?>.00</td>
                                                    <td><?php echo e($order->created_at); ?></td>
                                                    <td><?php echo e($order->order->user->first_name); ?></td>
                                                    <td>
                                                        <?php if($order->status == config('enums.order_status.processing')): ?>
                                                            <span class="badge-dot badge-brand mr-1"></span><?php echo e($order->status); ?>

                                                        <?php elseif($order->status == config('enums.order_status.shipped')): ?>
                                                            <span class="badge-dot badge-brand mr-1"></span><?php echo e($order->status); ?>

                                                        <?php elseif($order->status == config('enums.order_status.delivered')): ?>
                                                            <span class="badge-dot badge-danger mr-1">{</span>{$order->status}}
                                                        <?php elseif($order->status == config('enums.order_status.canceled')): ?>
                                                            <span class="badge-dot badge-danger mr-1"></span><?php echo e($order->status); ?>

                                                        <?php elseif($order->status == config('enums.order_status.refunded')): ?>
                                                            <span class="badge-dot badge-secondary mr-1"></span><?php echo e($order->status); ?>

                                                        <?php elseif($order->status == config('enums.order_status.payment_error')): ?>
                                                            <span class="badge-dot badge-danger mr-1"></span><?php echo e($order->status); ?>

                                                        <?php elseif($order->status == config('enums.order_status.canceled_by_vendor')): ?>
                                                            <span class="badge-dot badge-danger mr-1"></span><?php echo e($order->status); ?>

                                                        <?php elseif($order->status == config('enums.order_status.canceled_by_customer')): ?>
                                                            <span class="badge-dot badge-danger mr-1"></span><?php echo e($order->status); ?>

                                                        <?php elseif($order->status == config('enums.order_status.request_refunded')): ?>
                                                            <span class="badge-dot badge-danger mr-1"></span><?php echo e($order->status); ?>

                                                        <?php endif; ?>
                                                    </td>
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

                    </div>

                    <div class="row">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 mt-5 mb-3">
                            <div class="card ">
                                <h5 class="card-header">Best Selling Products Weekly<a href="<?php echo e(route('admin.dashboard.order.index')); ?>" class="btn btn-outline-dark float-right">View Details</a></h5>
                                <div class="card-body pt-1">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                            <tr class="">
                                                <th class="">#</th>
                                                <th class="">Image</th>
                                                <th class="">Product Name</th>
                                                <th class="">Product Id</th>
                                                <th class="">Sold</th>
                                                <th class="">Category</th>
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
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 mt-5">
                            <div class="card">
                                <h5 class="card-header">Best Selling Products Monthly<a href="<?php echo e(route('admin.dashboard.order.index')); ?>" class="btn btn-outline-dark float-right">View Details</a></h5>
                                <div class="card-body pt-1">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                            <tr class="">
                                                <th class="">#</th>
                                                <th class="">Image</th>
                                                <th class="">Product Name</th>
                                                <th class="">Product Id</th>
                                                <th class="">Sold</th>
                                                <th class="">Category</th>
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

<?php echo $__env->make('admin.layouts.dashboardAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Game\Downloads\SPREE-master\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>