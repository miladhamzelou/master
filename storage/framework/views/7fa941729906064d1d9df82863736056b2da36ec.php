<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans(lcfirst(config('app.controller')) . '.' . ucwords(str_replace('_',' ',snake_case(config('app.controller')))))); ?></h3>
            <div class="box-tools pull-right">
                <a href="<?php echo e(url(getCurrentURL('controller')).'/create'); ?>" title="<?php echo e(trans('public.Create New Entity')); ?>" class="btn-box-tool pull-left"><i class="fa fa-plus"></i></a>
                <a href="<?php echo e(url(getCurrentURL('controller').'/index')); ?>" title="<?php echo e(trans('public.Reload List')); ?>" class="btn-box-tool pull-left" onclick="Admin.reload(event)"><i class="fa fa-refresh"></i></a>
<?php /*                <a href="<?php echo e(url(getCurrentURL('controller').'/searchForm')); ?>" class="btn btn-box-tool pull-left" data-status="close" onclick="Admin.search(this, event)" title="<?php echo e(trans('public.Search Entity')); ?>"><i class="fa fa-search"></i></a>*/ ?>
                <img src="<?php echo e(asset('assets/admin/img/loader.gif')); ?>" class="ajax-loader display-none"/>
            </div>
        </div>
        <div class="box-body">
            <div class="search-box" style="display: none"></div>
            <div class="ajax-content">
            <?php echo $__env->make(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) . '.ajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>