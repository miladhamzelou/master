<div class="res-info-left col-l-11">
    <?php echo $__env->make('restaurantBundle.restaurant.home.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
    <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
        <?php if(Session::has('alert-' . $msg)): ?>
                <div class="col-md-12" style="margin-bottom: 10px;">
                    <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
                </div>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
    <?php echo $__env->make('restaurantBundle.restaurant.home.tab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('restaurantBundle.restaurant.home.'.@$tpl, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>