<div class="panel">
    <div class="panel-body" style="min-height: 500px;">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th><a> ردیف </a></th>
                <th><a> عنوان </a></th>
                <th><a> نوع رستوران </a></th>
                <th><a> تاریخ ایجاد </a></th>
                <th><a> فیلتر تایید </a></th>
                <th class="last-left">اکشن</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($res as $res): ?>
            <tr>
                <td><?php echo e($res['id']); ?></td>
                <td><?php echo e($res['title']); ?></td>
                <td><?php echo e($res['type']['title']); ?></td>
                <td><?php echo e(FarsiLib::g2jdate($res['created_at'])); ?></td>
                <td><?php if($res['approve'] == 1): ?><span class="fa  fa-check-circle text-success "></span><?php else: ?><span class="fa  fa-minus-circle text-danger "></span><?php endif; ?></td>
                <td class="table-action">
                    <a href="<?php echo e(url('/restaurant/'.$res['id'])); ?>"><span class="fa fa-tv"></span></a>
                    <a href="<?php echo e(url(getCurrentURL('localization').'/user/'.$info['username'].'/editRestaurant/'.$res['id'])); ?>"><span class="fa fa-edit"></span></a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
            <a href="<?php echo e(url(getCurrentURL('localization').'/user/'.$info['username'].'/createRestaurant')); ?>" class="btn btn-primary">افزودن رستوران</a>
    </div>
</div>
