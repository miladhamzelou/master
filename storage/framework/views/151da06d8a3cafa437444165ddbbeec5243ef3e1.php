<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?php if(config('app.action') == 'edit'): ?>
                    <?php echo e(trans('public.Edit Record')); ?>

                <?php elseif(strtolower(config('app.action')) == 'create'): ?>
                    <?php echo e(trans('public.Create New Record')); ?>

                <?php endif; ?>
            </h3>
            <div class="box-tools pull-right">
                <a href="<?php echo e(url(getCurrentURL('controller')).'/create'); ?>" title="<?php echo e(trans('public.create new entity')); ?>" class="btn-box-tool pull-left"><i class="fa fa-plus"></i></a>
                <a href="<?php echo e(url(getCurrentURL('controller')).'/Index'); ?>" title="<?php echo e(trans('public.return to list')); ?>" class="btn-box-tool pull-left"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="box-body">
            <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
                <?php if(Session::has('alert-' . $msg)): ?>
                    <div class="col-md-12">
                        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
             <div class="col-md-12" style="margin-bottom: 20px;">
                 <?php foreach($errors->all() as $error): ?>
                     <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                 <?php endforeach; ?>
             </div>
            <?php echo form($form); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>