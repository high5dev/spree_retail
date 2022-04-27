
<?php $__env->startSection('css-files'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/dataTables.bootstrap4.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/buttons.bootstrap4.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/select.bootstrap4.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/fixedHeader.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header bg-primary text-center">
                            <h5 class="card-title text-white mt-2">All Orders</h5>
                        </div>
                        <div class="card-body text-center">
                            <h1 class="text-primary"><?php echo e($total_count); ?></h1>
                            <h5 class="text-primary">Orders</h5>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?php echo e(route('admin.dashboard.ordermanagement.index')); ?>" class="mt-2">View all<i class="ml-2 fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header bg-success text-center">
                            <h5 class="card-title text-white mt-2">Shipped Orders</h5>
                        </div>
                        <div class="card-body text-center">
                            <h1 class=" text-primary"><?php echo e($ship_count); ?></h1>
                            <h5 class="text-primary">Orders</h5>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?php echo e(route('admin.dashboard.ordermanagement.shipped')); ?>" class="mt-2">View all <i class="ml-2 fas fa-arrow-circle-right"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header bg-info text-center">
                            <h5 class="card-title text-white mt-2">Acknowledged Orders</h5>
                        </div>
                        <div class="card-body text-center">
                            <h1 class=" text-primary"><?php echo e($acknwoledge_count); ?></h1>
                            <h5 class="text-primary">Orders</h5>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?php echo e(route('admin.dashboard.ordermanagement.acknowledged')); ?>"> View all <i class="ml-2 fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header bg-danger text-center">
                            <h5 class="card-title text-white mt-2">Canceled Orders</h5>
                        </div>
                        <div class="card-body text-center">
                            <h1 class="text-primary"><?php echo e($cancel_count); ?></h1>
                            <h5 class="text-primary">Orders</h5>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?php echo e(route('admin.dashboard.ordermanagement.canceled')); ?>" class="mt-2">View all <i class="ml-2 fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header"><?php echo e($title); ?></h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product ID</th>
                                        <th>Order Quantity</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($order_products) > 0): ?>
                                        <?php $__currentLoopData = $order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php echo e($loop->iteration); ?>

                                                </td>
                                                <td><?php echo e($order->product_id); ?></td>
                                                <td>
                                                    <?php echo e($order->quantity); ?>

                                                </td>                                           
                                                <?php if($order->status == 0): ?>
                                                    <td class="text-warning">Pending</td>
                                                <?php elseif($order->status == 1): ?>
                                                    <td class="text-info">Acknowledged</td>
                                                <?php elseif($order->status == 2): ?>
                                                    <td class="text-success">Shipped</td>    
                                                <?php else: ?>
                                                    <td class="text-danger">Canceled</td>
                                                <?php endif; ?>                                        
                                                <td>
                                                    <a href="<?php echo e(route('admin.dashboard.ordermanagement.show', $order->id)); ?>" style="color: blue" class="btn">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <td colspan="9" class="text-center mt-3">No order to show</td>
                                    <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js-files'); ?>
    <script src="<?php echo e(asset('dashboard-vendor/multi-select/js/jquery.multi-select.js')); ?>"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('dashboard-vendor/datatables/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo e(asset('dashboard-vendor/datatables/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard-vendor/datatables/js/data-table.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboardAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/admin/dashboard/ordermanagement/index.blade.php ENDPATH**/ ?>