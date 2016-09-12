<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i><span>{{ trans('public.Counter') }}</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ getCurrentURL('locale').'/Admin' }}"><i class="fa fa-home"></i>{{ trans('public.Home') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-question-circle"></i>
                    <span>{{ trans('public.General') }}</span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ getCurrentURL('prefix').'/GeneralBundle/Tag/Index' }}"><i class="fa fa-bars"></i>{{ trans('public.Tags') }}</a></li>
                    <li><a href="{{ getCurrentURL('prefix').'/GeneralBundle/Province/Index' }}"><i class="fa fa-bars"></i>{{ trans('public.Province') }}</a></li>
                    <li><a href="{{ getCurrentURL('prefix').'/GeneralBundle/City/Index' }}"><i class="fa fa-bars"></i>{{ trans('public.City') }}</a></li>
                    <li><a href="{{ getCurrentURL('prefix').'/GeneralBundle/Region/Index' }}"><i class="fa fa-bars"></i>{{ trans('public.Region') }}</a></li>
                    <li><a href="{{ getCurrentURL('prefix').'/GeneralBundle/Neighbourhood/Index' }}"><i class="fa fa-bars"></i>محله</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bitbucket-square"></i>
                    <span>{{ trans('restaurant.Restaurant') }}</span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ getCurrentURL('prefix').'/RestaurantBundle/Restaurant/Index' }}"><i class="fa fa-bars"></i>{{ trans('restaurant.Restaurant Administrator') }}</a></li>
                    <li><a href="{{ getCurrentURL('prefix').'/RestaurantBundle/RestaurantMenu/Index' }}"><i class="fa fa-bars"></i>{{ trans('restaurant.Restaurant Menu') }}</a></li>
                    <li><a href="{{ getCurrentURL('prefix').'/RestaurantBundle/RestaurantType/Index' }}"><i class="fa fa-bars"></i>{{ trans('restaurant.Restaurant Type') }}</a></li>
                    <li><a href="{{ getCurrentURL('prefix').'/RestaurantBundle/Collection/Index' }}"><i class="fa fa-bars"></i>کالکشن ها</a></li>
                    <li><a href="{{ getCurrentURL('prefix').'/RestaurantBundle/Option/Index' }}"><i class="fa fa-bars"></i>اپشن ها</a></li>
                    <li><a href="{{ getCurrentURL('prefix').'/RestaurantBundle/RestaurantFilter/Index' }}"><i class="fa fa-bars"></i>فیلترهای رستوران</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comments"></i>
                    <span>{{ trans('review.Review') }}</span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ getCurrentURL('prefix').'/ReviewBundle/Review/Index' }}"><i class="fa fa-bars"></i>{{ trans('review.Review Administrator') }}</a></li>
{{--                    <li><a href="{{ getCurrentURL('prefix').'/ReviewBundle/Meal/Index' }}"><i class="fa fa-bars"></i>{{ trans('review.Meal') }}</a></li>--}}
{{--                    <li><a href="{{ getCurrentURL('prefix').'/ReviewBundle/ReviewMeeting/Index' }}"><i class="fa fa-bars"></i>{{ trans('review.Review Meeting') }}</a></li>--}}
{{--                    <li><a href="{{ getCurrentURL('prefix').'/ReviewBundle/Rate/Index' }}"><i class="fa fa-bars"></i>{{ trans('review.Rate Item') }}</a></li>--}}
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-powerpoint-o"></i>
                    <span>{{ trans('page.Page') }}</span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ getCurrentURL('prefix').'/PageBundle/Page/Index' }}"><i class="fa fa-bars"></i>{{ trans('page.Page Administrator') }}</a></li>
                    <li><a href="{{ getCurrentURL('prefix').'/PageBundle/Page/Create' }}"><i class="fa fa-plus"></i>{{ trans('page.Add Page') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>{{ trans('public.Users') }}</span><i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ getCurrentURL('prefix').'/Auth/User/Index' }}"><i class="fa fa-user"></i>{{ trans('user.User Administrator') }}</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>