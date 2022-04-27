<?php $__env->startSection('css-files'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/dataTables.bootstrap4.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/buttons.bootstrap4.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/select.bootstrap4.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/fixedHeader.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->















            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Transaction Info</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Transaction ID</th>
                                    <th>Product ID</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(count($orders) > 0): ?>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($loop->iteration); ?>

                                            </td>
                                            <td>
                                                <?php echo e($order->order_id); ?>

                                            </td>
                                            <td>
                                                <?php echo e($order->product_id); ?>

                                            </td>
                                            <td>
                                                $<?php echo e(\App\Helpers\Helper::presentPrice($order->price)); ?>

                                            </td>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                <?php if($order->status == config('enums.order_status.processing')): ?>
                                                    <span class="badge badge-warning w-75 py-2"><?php echo e($order->status); ?></span>
                                                <?php elseif($order->status == config('enums.order_status.shipped')): ?>
                                                    <span class="badge badge-warning w-75 py-2"><?php echo e($order->status); ?></span>
                                                <?php elseif($order->status == config('enums.order_status.delivered')): ?>
                                                    <span class="badge badge-success w-75 py-2"><?php echo e($order->status); ?></span>
                                                <?php elseif($order->status == config('enums.order_status.canceled')): ?>
                                                    <span class="badge badge-warning w-75 py-2"><?php echo e($order->status); ?></span>
                                                <?php elseif($order->status == config('enums.order_status.refunded')): ?>
                                                    <span class="badge badge-success w-75 py-2"><?php echo e($order->status); ?></span>
                                                <?php elseif($order->status == config('enums.order_status.payment_error')): ?>
                                                    <span class="badge badge-danger w-75 py-2"><?php echo e($order->status); ?></span>
                                                <?php elseif($order->status == config('enums.order_status.canceled_by_vendor')): ?>
                                                    <span class="badge badge-danger w-75 py-2"><?php echo e($order->status); ?></span>
                                                <?php elseif($order->status == config('enums.order_status.canceled_by_customer')): ?>
                                                    <span class="badge badge-danger w-75 py-2"><?php echo e($order->status); ?></span>
                                                <?php elseif($order->status == config('enums.order_status.request_refunded')): ?>
                                                    <span class="badge badge-warning w-75 py-2"><?php echo e($order->status); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo e(\Carbon\Carbon::parse($order->created_at)->toDayDateTimeString()); ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('admin.dashboard.order.show',$order->order_id)); ?>" style="color: blue" class="btn">
                                                    View
                                                </a>
                                                <?php if($order->status == config('enums.order_status.request_refunded') or $order->status == config('enums.order_status.canceled') or $order->status == config('enums.order_status.canceled_by_customer')): ?>
                                                    <a href="<?php echo e(route('admin.dashboard.order.refund',$order->id)); ?>" style="color: orange" class="btn">
                                                        Refund
                                                    </a>
                                                <?php endif; ?>
                                                <?php if($order->status == config('enums.order_status.processing') or $order->status == config('enums.order_status.shipped') or $order->status == config('enums.order_status.delivered')): ?>
                                                    <a href="<?php echo e(route('admin.dashboard.order.cancel',$order->id)); ?>" style="color: red" class="btn">
                                                        Cancel
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('admin.layouts.dashboardAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/admin/dashboard/order/index.blade.php ENDPATH**/ ?>