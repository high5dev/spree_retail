<?php $__env->startSection('css-files'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/profile.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main>
        <section class="profile">
            <?php echo $__env->make('inc.profileSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="pCol2">
                <div class="heading">
                    <h2>Hi <?php echo e($user->first_name); ?></h2>
                </div>
                <div class="">
                    <div class="left">
                        <h3 class="information">Account Information</h3>
                        <div class="row mt-4">
                            <div class="col-2 pr-0">
                                <p>Account No:</p>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <p class="ml-auto"><?php echo e($user->id); ?></p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2 pr-0">
                                <p>Full Name:</p>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <p class="ml-auto"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></p>
                            </div>
                            <div class="col-3 pl-0">
                                <a href="" style=" text-decoration: underline;" class="btn btn-primary-link p-0 pb-2">Edit</a>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2 pr-0">
                                <p>Password:</p>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <p class="ml-auto">********</p>
                            </div>
                            <div class="col-3 pl-0">
                                <a href="" style=" text-decoration: underline;" class="btn btn-primary-link p-0 pb-2">Edit</a>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2 pr-0">
                                <p>Email Address:</p>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <p class="ml-auto"><?php echo e($user->email); ?></p>
                            </div>
                            <div class="col-3 pl-0">
                                <a href="" style=" text-decoration: underline;" class="btn btn-primary-link p-0 pb-2">Edit</a>
                            </div>
                        </div>

















                    </div>
                </div>
            </div>
        </section>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nirjhar/PROJECTs/JONES/spree/resources/views/profile/index.blade.php ENDPATH**/ ?>