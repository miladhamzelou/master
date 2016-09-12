<?php $__env->startSection('title'); ?><?php echo e($page['title']); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.zone.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="wrapper">
        <div class="row">
            <div class="col-l-16 mtop mbot pbot0 ptop0 mbot0">
                <h1 class="ui header">
                    <?php echo e($page['title']); ?>

                </h1>
            </div>
        </div>
        <div class="mbot clearfix">
            <section style="min-height: 500px;" class="white-bg col-l-16 ui segment">
                <div class="ptop pbot2 row  pl10 pr20">
                    <article class="col-l-16">
                        <?php echo e(strip_tags($page['content'])); ?>

                    </article>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>