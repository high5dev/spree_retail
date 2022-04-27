<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <?php ($user = \Illuminate\Support\Facades\Auth::user()); ?>
                    <li class="nav-item pb-3">
                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user-circle"></i>&nbsp;&nbsp; <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin')); ?>" ><i class="fa fa-fw fa-rocket"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.product.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.product.index')); ?>" ><i class="fa fa-fw fa-rocket"></i>Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.user.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.user.index')); ?>" ><i class="fa fa-fw fa-user"></i>Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.ordermanagement.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.ordermanagement.index')); ?>"><i class="fa fa-fw fa-rocket"></i>Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.order.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.order.index')); ?>"><i class="fa fa-fw fa-rocket"></i>Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.admin.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.admin.index')); ?>"><i class="fa fa-user"></i>Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.vendor.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.vendor.index')); ?>"><i class="fa fa-user"></i>Vendor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.category.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.category.index')); ?>" ><i class="fa fa-fw fa-rocket"></i>Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.banner.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.banner.index')); ?>" ><i class="fa fa-fw fa-rocket"></i>Banner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.career.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.career.index')); ?>" ><i class="fa fa-fw fa-rocket"></i>Career</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.dispatch.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.dispatch.index')); ?>"><i class="fa fa-fw fa-rocket"></i>Dispatchs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#"><i class="fas fa-power-off mr-2 text-danger"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
</form>
<?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/admin/inc/dashboardAdminSidebar.blade.php ENDPATH**/ ?>