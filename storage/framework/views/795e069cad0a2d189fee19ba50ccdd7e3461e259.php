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
                        <a class="nav-link" href="<?php echo e(route('vendor')); ?>" ><i class="fa fa-fw fa-rocket"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('vendor.dashboard.product.index')); ?>" ><i class="fa fa-fw fa-rocket"></i>Product</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('vendor.dashboard.ordermanagement.index')); ?>" ><i class="fa fa-fw fa-rocket"></i>Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('vendor.dashboard.order.index.dispatch')); ?>" ><i class="fa fa-fw fa-rocket"></i>Dispatchs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('vendor.dashboard.bank.index')); ?>" ><i class="fa fa-fw fa-rocket"></i>Bank Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('vendor.dashboard.bank.transfer')); ?>" ><i class="fa fa-fw fa-rocket"></i>Transfers</a>
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
<?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/vendor/inc/dashboardVendorSidebar.blade.php ENDPATH**/ ?>