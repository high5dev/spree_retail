<div class="dashboard-header  navbar-dark">
    <div class="menu-list">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004dd9; z-index:2;">
                <div class="navbar-brand2 ">
                    <a href="<?php echo e(route('home')); ?>" style="text-transform: capitalize;">Spree</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav2">
                    <ul class="navbar-nav ml-auto mr-5 ">
                        <?php ($user = \Illuminate\Support\Facades\Auth::user()); ?>
                        <!-- <li class="nav-item ">
                        <a href="#" class="nav-link "><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a>
                    </li> -->
                        <li class=" nav-item logout ">
                            <a class="nav-link " onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    </div>
</div>
<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
</form>
<br><br><br>

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
                        &nbsp;&nbsp; <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin')); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.product.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.product.index')); ?>">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.user.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.user.index')); ?>">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.ordermanagement.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.ordermanagement.index')); ?>">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.order.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.order.index')); ?>">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.admin.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.admin.index')); ?>">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.vendor.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.vendor.index')); ?>">Vendor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.category.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.category.index')); ?>">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.banner.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.banner.index')); ?>">Banner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.career.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.career.index')); ?>">Career</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(\Request::route()->getName() == 'admin.dashboard.dispatch.index'): ?>active <?php else: ?> <?php endif; ?>" href="<?php echo e(route('admin.dashboard.dispatch.index')); ?>">Dispatchs</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>
<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
</form><?php /**PATH C:\Users\Game\Downloads\SPREE-master\resources\views/admin/inc/dashboardAdminSidebar.blade.php ENDPATH**/ ?>