<?php $__env->startComponent('mail::message'); ?>
    # Order Details

    Thank you for your order.

    **Order ID:** <?php echo e($order->id); ?>


    **Order Email:** <?php echo e($order->billing_email); ?>


    **Order Total:** $<?php echo e($order->billing_total); ?>


    **Items Ordered**
    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        Name: <?php echo e($product->name); ?>

        Price: $<?php echo e($product->price); ?>

        Quantity: <?php echo e($product->pivot->quantity); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    You can get further details about your order by logging into our website.

    <?php $__env->startComponent('mail::button', ['url' => config('app.url'), 'color' => 'green']); ?>
        Go to Website
    <?php echo $__env->renderComponent(); ?>

    Thank you again for choosing us.

    Regards,
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\Game\Downloads\SPREE-master\resources\views/email/order_placed.blade.php ENDPATH**/ ?>