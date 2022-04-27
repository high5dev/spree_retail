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
                    <div class="card-header">
                        <div class="d-flex">
                            <h5>Customers</h5>
                            <button form="create" class="btn btn-primary ml-auto" >Create</button>
                            <form id="create" action="<?php echo e(route('admin.dashboard.user.create')); ?>" method="GET"></form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Joined Date</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(count($users) > 0): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($user->id); ?></td>
                                            <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->created_at); ?></td>
                                            <td>
                                                <?php if($user->status == config('enums.user_status.active')): ?>
                                                    <span class="badge badge-success w-75 py-2"><?php echo e($user->status); ?></span>
                                                <?php elseif($user->status == config('enums.user_status.inactive')): ?>
                                                    <span class="badge badge-warning w-75 py-2"><?php echo e($user->status); ?></span>
                                                <?php elseif($user->status == config('enums.user_status.banned')): ?>
                                                    <span class="badge badge-danger w-75 py-2"><?php echo e($user->status); ?></span>
                                                <?php elseif($user->status == config('enums.user_status.deleted')): ?>
                                                    <span class="badge badge-danger w-75 py-2"><?php echo e($user->status); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($user->roles[0]->name); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.dashboard.user.edit',$user->id)); ?>" style="color: blue" class="btn">
                                                    Edit
                                                </a>
                                                <a href="" onclick="event.preventDefault();document.getElementById('delete-<?php echo e($user->id); ?>').submit()" style="color: red" class="btn">
                                                    Delete
                                                </a>
                                                <form id="delete-<?php echo e($user->id); ?>" action="<?php echo e(route('admin.dashboard.user.destroy',$user->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
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

<?php echo $__env->make('admin.layouts.dashboardAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nirjhar/PROJECTs/JONES/spree/resources/views/admin/dashboard/user/index.blade.php ENDPATH**/ ?>