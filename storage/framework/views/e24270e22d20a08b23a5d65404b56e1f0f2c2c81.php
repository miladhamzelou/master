<?php $__env->startSection('title'); ?><?php echo e($res['title'] . ' - ' . $res['heading']); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.zone.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div id="mainframe" class="container">
        <div class="wrapper mtop">
            <div class="row">
                <?php echo $__env->make('restaurantBundle.restaurant.home.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('restaurantBundle.restaurant.home.sidebar-right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>