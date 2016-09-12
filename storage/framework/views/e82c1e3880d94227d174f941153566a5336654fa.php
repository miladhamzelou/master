<section class="content-header">
    <div class="col-xs-12">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(url(getCurrentURL('prefix'))); ?>"><i class="fa fa-home"></i> <?php echo e(trans('public.Home')); ?></a></li>
                <?php if(config('app.controller')): ?>
                    <li><a href="<?php echo e(url(getCurrentURL('controller').'/Index')); ?>"><?php echo e(trans(lcfirst(config('app.controller')) . '.' . config('app.title'))); ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>
