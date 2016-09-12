<div class="zimagery" style="background-image: url(https://b.zmtcdn.com/images/foodshots/cover/pizza3.jpg?output-format=webp);; background-size: cover;">
    <div class="zimagery-overlay" style="background: rgba(0,0,0,0.4);"><div id="sticky_header" class="ui sticky">
            <header class="header" id="header">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-l-2 col-s-16  header--logo-container"></div>
                        <div class="col-l-14 header--search-container">
                            <div class="row clearfix">
                                <div class=" col-l-16">
                                    <div class="right hom">
                                        <div class="login-navigation" id="login-navigation">
                                            <?php if(Auth::check()): ?>
                                                <div class="dropdown header-link">
                                                    <a class="signin-link header-login-button ui basic button mr0" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php if(Auth::user()->info()['name']): ?> <?php echo e(Auth::user()->info()['name'] . ' ' . Auth::user()->info()['family']); ?> <?php else: ?> <?php echo e(Auth::user()->info()['username']); ?> <?php endif; ?>
                                                        <span style="margin-right: 10px;" class="fa fa-angle-down"></span>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                                        <li><a href="<?php echo e(url('user/'. Auth::user()->info()['username'])); ?>">پرفایل کاربری</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a href="<?php echo e(url('Auth/logout')); ?>">برون رفت</a></li>
                                                    </ul>
                                                </div>
                                            <?php else: ?>
                                                <div class="header-link pr10">
                                                    <a class="header-hiring-btn header-download-app ui green button" href="<?php echo e(url('Auth/register')); ?>">عضویت</a>
                                                </div>
                                                <div class="header-link">
                                                    <a href="<?php echo e(url('Auth/login')); ?>" class="signin-link header-login-button ui basic button mr0" id="signin-link">ورود به سایت</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div id="resp-search-container" class="search-box-area"></div>
        <div class="h-city-main p-relative">
            <div class="logo--home hide-on-mobile display-flex">
                <a class="logo--header" href="<?php echo e(url('/')); ?>" title="Find the best restaurants, cafés and bars in Doha">
                    118food
                </a>
            </div>
            <h1 class="h-city-home-title">جستجوی بهترین رستوران ها,کافه ها,فست فودها و ...</h1>
            <div class="wrapper">
                <div class="col-md-8 col-md-push-2">
                    <div class="col-md-3 no-padding-left" id="res-city">
                        <select class="form-control" data-select>
                            <?php foreach($cities as $item): ?>
                                <option <?php if(@$city['name']): ?> <?php if($item['name'] == $city['name']): ?> selected  <?php endif; ?> <?php elseif($item['name'] == 'تهران'): ?> selected <?php endif; ?> value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-7 no-padding">
                        <select class="form-control" id="res-type" data-select>
                            <option value="">انتخاب...</option>
                            <?php foreach($RestaurantType as $type): ?>
                                <option value="<?php echo e($type['id']); ?>"><?php echo e($type['title']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2 no-padding-right">
                        <div role="button" tabindex="0" id="search_button" class="left ui red button" style="padding: 5px;">
                            جستجو رستوران
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#res-type').change(function(){
        if ($(this).val() != '') {
            $('#search_button').addClass('loading');
            window.location.href = '/restaurant-list/' + $('#res-city option:selected').val() + '/' + $(this).val();
        }
    });
    $('#search_button').click(function() {
        $('#search_button').addClass('loading');
        window.location.href = '/restaurant-list/' + $('#res-city option:selected').val();
    })
</script>