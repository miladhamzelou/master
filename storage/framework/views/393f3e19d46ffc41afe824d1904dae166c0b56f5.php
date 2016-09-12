<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i><span><?php echo e(trans('public.Counter')); ?></span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo e(getCurrentURL('locale').'/Admin'); ?>"><i class="fa fa-home"></i><?php echo e(trans('public.Home')); ?></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-question-circle"></i>
                    <span><?php echo e(trans('public.General')); ?></span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/GeneralBundle/Tag/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('public.Tags')); ?></a></li>
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/GeneralBundle/Province/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('public.Province')); ?></a></li>
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/GeneralBundle/City/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('public.City')); ?></a></li>
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/GeneralBundle/Region/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('public.Region')); ?></a></li>
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/GeneralBundle/Neighbourhood/Index'); ?>"><i class="fa fa-bars"></i>محله</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bitbucket-square"></i>
                    <span><?php echo e(trans('restaurant.Restaurant')); ?></span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/RestaurantBundle/Restaurant/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('restaurant.Restaurant Administrator')); ?></a></li>
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/RestaurantBundle/RestaurantMenu/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('restaurant.Restaurant Menu')); ?></a></li>
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/RestaurantBundle/RestaurantType/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('restaurant.Restaurant Type')); ?></a></li>
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/RestaurantBundle/Collection/Index'); ?>"><i class="fa fa-bars"></i>کالکشن ها</a></li>
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/RestaurantBundle/Option/Index'); ?>"><i class="fa fa-bars"></i>اپشن ها</a></li>
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/RestaurantBundle/RestaurantFilter/Index'); ?>"><i class="fa fa-bars"></i>فیلترهای رستوران</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comments"></i>
                    <span><?php echo e(trans('review.Review')); ?></span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/ReviewBundle/Review/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('review.Review Administrator')); ?></a></li>
<?php /*                    <li><a href="<?php echo e(getCurrentURL('prefix').'/ReviewBundle/Meal/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('review.Meal')); ?></a></li>*/ ?>
<?php /*                    <li><a href="<?php echo e(getCurrentURL('prefix').'/ReviewBundle/ReviewMeeting/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('review.Review Meeting')); ?></a></li>*/ ?>
<?php /*                    <li><a href="<?php echo e(getCurrentURL('prefix').'/ReviewBundle/Rate/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('review.Rate Item')); ?></a></li>*/ ?>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-powerpoint-o"></i>
                    <span><?php echo e(trans('page.Page')); ?></span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/PageBundle/Page/Index'); ?>"><i class="fa fa-bars"></i><?php echo e(trans('page.Page Administrator')); ?></a></li>
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/PageBundle/Page/Create'); ?>"><i class="fa fa-plus"></i><?php echo e(trans('page.Add Page')); ?></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span><?php echo e(trans('public.Users')); ?></span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(getCurrentURL('prefix').'/Auth/User/Index'); ?>"><i class="fa fa-user"></i><?php echo e(trans('user.User Administrator')); ?></a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>