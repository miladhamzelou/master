<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(trans('public.create new node')); ?></h3>
        </div>
        <div class="panel-body">
            <a href=""><span class="fa fa-plus-square pull-left"></span></a>
            <a href=""><span class="fa fa-trash  pull-left"></span></a>
                <a href=""><span class="fa fa-pencil pull-left"></span></a>
            <?php echo $tree; ?>

        </div>
    </div>
    <script>
        $('.tree li').click(function(){
            $('.tree li').removeClass('click');
            $(this).addClass('click')
        })
    </script>
    <style>
        .click{
            background-color: blue;
            color: #ffffff;
            width:25%;
        }
    </style>
<?php $__env->stopSection(); ?>