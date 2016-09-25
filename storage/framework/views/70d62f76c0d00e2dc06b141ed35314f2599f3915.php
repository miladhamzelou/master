<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(trans('public.create new node')); ?></h3>
        </div>
        <div class="panel-body">
            <div class="node-action">
                <a href=""><span class="fa fa-plus-square pull-left"></span></a>
                <div class="action-hidden" style="display: none">
                    <a class="delete-node" href=""><span class="fa fa-trash  pull-left"></span></a>
                    <a href=""><span class="fa fa-pencil pull-left"></span></a>
                </div>
            </div>
            <?php echo $__env->make('generalBundle.universityTree.admin.node-ajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <style>
        .tree-li-click{
            background-color: blue;
            color: #ffffff;
            width:25%;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('.tree li').click(function(){
                $('.tree li').removeClass('tree-li-click');
                $(this).addClass('tree-li-click');
                var node_id = $(this).attr('data-id');
                $('.action-hidden').show();
                $('.node-action a').each(function(key){
                    if (key == 0)
                        $(this).attr('href',"<?php echo e(url(getCurrentURL('controller').'/add/')); ?>" + node_id);
                    else if(key == 1)
                        $(this).attr('href',"<?php echo e(url(getCurrentURL('controller').'/Remove/')); ?>" + node_id);
                    else
                        $(this).attr('href',"<?php echo e(url(getCurrentURL('controller').'/edit/')); ?>" + node_id);
                })
            });
            // delete node
            $('.delete-node').click(function(event){
                event.preventDefault();
                var obj = $(this);
                var url = obj.attr("href");
                $('.ajax-loader').show('slow');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: url,
                    success: function(){
                        $('.ajax-loader').hide('slow');
                        obj.fadeOut('5000', function () {
                        })
                    }
                });
            })
        })
    </script>
<?php $__env->stopSection(); ?>