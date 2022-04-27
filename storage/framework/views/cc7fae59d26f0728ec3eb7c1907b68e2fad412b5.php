<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/fonts/circular-std/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/fonts/fontawesome/css/fontawesome-all.css')); ?>">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center"><a><h1 class="logo-img" style="color: blue">Spree</h1></a><span class="splash-description">Please enter your user information.</span></div>
        <div class="card-body">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger" role="alert">
                <strong><?php echo e($message); ?></strong>
            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-primary" role="alert">
                <strong><?php echo e($message); ?></strong>
            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <form action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="email" id="email" type="email" placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="remember" type="checkbox"><span class="custom-control-label">Remember Me</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </form>
        </div>
        <div class="card-footer bg-white p-0   text-center">


            <div class="card-footer-item card-footer-item-bordered text-center">
                <a href="#" class="footer-link">Forgot Password</a>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="<?php echo e(asset('dashboard-vendor/jquery/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard-vendor/bootstrap/js/bootstrap.bundle.js')); ?>"></script>

</body>

</html>
<?php /**PATH /home/nirjhar/PROJECTs/JONES/spree/resources/views/admin/dashboard/auth/login.blade.php ENDPATH**/ ?>