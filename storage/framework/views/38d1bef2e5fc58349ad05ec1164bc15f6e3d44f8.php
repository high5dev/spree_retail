<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <link href="<?php echo e(asset('dashboard-vendor/fonts/circular-std/style.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard/new-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/fonts/fontawesome/css/fontawesome-all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/charts/chartist-bundle/chartist.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/harts/morris-bundle/morris.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/charts/c3charts/c3.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/fonts/flag-icon-css/flag-icon.min.css')); ?>">

    <?php echo $__env->yieldContent('css-files'); ?>
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body onload="submit_button()">
    <?php echo $__env->make('vendor.inc.message_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <?php echo $__env->make('vendor.inc.dashboardVendorSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="<?php echo e(asset('dashboard-vendor/jquery/jquery-3.3.1.min.js')); ?>"></script>
<!-- bootstap bundle js -->
<script src="<?php echo e(asset('dashboard-vendor/bootstrap/js/bootstrap.bundle.js')); ?>"></script>
<!-- slimscroll js -->
<script src="<?php echo e(asset('dashboard-vendor/slimscroll/jquery.slimscroll.js')); ?>"></script>
<!-- main js -->
<script src="<?php echo e(asset('js/dashboard/main-js.js')); ?>"></script>
<!-- chart chartist js -->
<script src="<?php echo e(asset('dashboard-vendor/charts/chartist-bundle/chartist.min.js')); ?>"></script>
<!-- sparkline js -->
<script src="<?php echo e(asset('dashboard-vendor/charts/sparkline/jquery.sparkline.js')); ?>"></script>
<!-- morris js -->
<script src="<?php echo e(asset('dashboard-vendor/charts/morris-bundle/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard-vendor/charts/morris-bundle/morris.js')); ?>"></script>
<!-- chart c3 js -->
<script src="<?php echo e(asset('dashboard-vendor/charts/c3charts/c3.min.j')); ?>"></script>
<script src="<?php echo e(asset('dashboard-vendor/charts/c3charts/d3-5.4.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard-vendor/charts/c3charts/C3chartjs.js')); ?>"></script>
<script src="<?php echo e(asset('js/dashboard/dashboard-ecommerce.js')); ?>"></script>

<?php echo $__env->yieldContent('js-files'); ?>
</body>

</html>




<?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/vendor/layouts/dashboardVendor.blade.php ENDPATH**/ ?>