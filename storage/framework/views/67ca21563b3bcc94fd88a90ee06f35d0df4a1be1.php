<?php $__env->startSection('title'); ?>
    <?php echo e($info['username']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.zone.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('auth.dashboard.zone.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <div class="row">
            <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
                <?php if(Session::has('alert-' . $msg)): ?>
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="col-md-3 no-padding-left"><?php echo $__env->make('auth.dashboard.zone.sidebar-right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
            <div class="col-md-9 no-padding">
                <?php echo $__env->make('auth.dashboard.'.@$tpl, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>