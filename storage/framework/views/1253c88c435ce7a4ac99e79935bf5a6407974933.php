<div class="pCol1" style="margin-left: 2.4rem;margin-top: 2.6rem">
    <a href="<?php echo e(route('profile')); ?>">
        <h3 class="<?php if(\Request::route()->getName() == 'profile'): ?>pActive <?php else: ?> <?php endif; ?>">Account Manage</h3>
    </a>
    <a href="<?php echo e(route('profile.payment')); ?>">
        <h3 style="font-weight: 400" class="<?php if(\Request::route()->getName() == 'profile.payment'): ?>pActive <?php else: ?> <?php endif; ?>">Payment Methods</h3>
    </a>
    <a href="<?php echo e(route('profile.address')); ?>">
        <h3 style="font-weight: 400" class="<?php if(\Request::route()->getName() == 'profile.address'): ?>pActive <?php else: ?> <?php endif; ?>">Shipping Addresses</h3>
    </a>
    <a href="<?php echo e(route('profile.saveForLater')); ?>">
        <h3 style="font-weight: 400" class="<?php if(\Request::route()->getName() == 'profile.saveForLater'): ?>pActive <?php else: ?> <?php endif; ?>">Saved Products</h3>
    </a>
    <a href="<?php echo e(route('profile.order')); ?>">
        <h3 style="font-weight: 400" class="<?php if(\Request::route()->getName() == 'profile.order'): ?>pActive <?php else: ?> <?php endif; ?>">Purchase History</h3>
    </a>
    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <h3 style="font-weight: 400">Sign Out</h3>
    </a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
</div>
<?php /**PATH /home/nirjhar/PROJECTs/JONES/spree/resources/views/inc/profileSidebar.blade.php ENDPATH**/ ?>