<div class="panel panel-default">
    <div class="list-group">
        <a class="list-group-item" href="<?php echo e(url('user/'.$info['username'].'/review')); ?>"> نقدها<span class="label label-danger pull-left"><?php echo e(@$extra['review'] ? @$extra['review'] : 0); ?></span></a>
        <a class="list-group-item" href="<?php echo e(url('user/'.$info['username'].'/follower')); ?>">Follower<span class="label label-danger pull-left follower-<?php echo e($info['id']); ?>"><?php echo e(@$extra['follower'] ? @$extra['follower'] : 0); ?></span></a>
        <a class="list-group-item" href="<?php echo e(url('user/'.$info['username'].'/following')); ?>"> Following<span class="label label-danger pull-left following-<?php echo e($info['id']); ?>"><?php echo e(@$extra['following'] ? @$extra['following'] : 0); ?></span></a>
        <a class="list-group-item" href="<?php echo e(url('user/'.$info['username'].'/photoes')); ?>">عکس ها<span class="label label-danger pull-left"><?php echo e(@$extra['photoes'] ? @$extra['photoes'] : 0); ?></span></a>
        <a class="list-group-item" href="<?php echo e(url('user/'.$info['username'].'/saveCollection')); ?>">کاکشن ها ذخیره شده<span class="label label-danger pull-left"><?php echo e(@$extra['collection'] ? @$extra['collection'] : 0); ?></span></a>
        <?php if(@$access): ?>
            <a class="list-group-item" href="<?php echo e(url('user/'.$info['username'].'/myCollection')); ?>">کالکشن های من<span class="label label-danger pull-left"><?php echo e(@$extra['my_collection'] ? @$extra['my_collection'] : 0); ?></span></a>
            <a href="<?php echo e(url('user/'.$info['username'].'/addRestaurant')); ?>" class="list-group-item">افزودن رستوران<span class="label label-danger pull-left"><?php echo e(@$extra['restaurant'] ? @$extra['restaurant'] : 0); ?></span></a>
            <a href="<?php echo e(url('user/'.$info['username'].'/ChangePassword')); ?>" class="list-group-item">تغییر رمز عبور</a>
            <a href="<?php echo e(url('user/'.$info['username'].'/ChangeUsername')); ?>" class="list-group-item">تغییر نام کاربری</a>
            <a href="<?php echo e(url('user/'.$info['username'].'/Setting')); ?>" class="list-group-item">ویرایش پروفایل</a>
        <?php endif; ?>
    </div>
</div>