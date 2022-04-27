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
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-notifications.min.css">
    <?php echo $__env->yieldContent('css-files'); ?>
    <title>SPREE Admin Panel</title>
</head>

<body onload="submit_button()">
    <?php echo $__env->make('admin.inc.message_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <?php echo $__env->make('admin.inc.dashboardAdminSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <script type="text/javascript">
        var notificationsWrapper   = $('.dropdown-notifications');
        var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('i[data-count]');
        var notificationsCount     = parseInt(notificationsCountElem.data('count'));
        var notifications          = notificationsWrapper.find('span.list-group');

        if (notificationsCount <= 0) {
            notificationsWrapper.hide();
        }

        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        var pusher = new Pusher('ff18742d6b6717953b07', {
            cluster: 'ap2'
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('order');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\OrderMade', function(data) {
            var existingNotifications = notifications.html();
            var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
            var newNotificationHtml = `
              <a href="`+data.url+`" class="list-group-item list-group-item-action active">
                    <div class="notification-info">

                        <div class="notification-list-user-block"><span class="notification-list-user-name">`+data.username+`</span>Just made an order
                            <div class="notification-date">0 min ago</div>
                        </div>
                    </div>
              </a>
            `;
            notifications.html(newNotificationHtml + existingNotifications);

            notificationsCount += 1;
            notificationsCountElem.attr('data-count', notificationsCount);
            notificationsWrapper.find('.notif-count').text(notificationsCount);
            notificationsWrapper.show();
        });
    </script>
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




<?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/admin/layouts/dashboardAdmin.blade.php ENDPATH**/ ?>