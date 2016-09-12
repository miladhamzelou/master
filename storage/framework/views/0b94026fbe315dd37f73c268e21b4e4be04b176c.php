<div id="sticky_header" class="ui sticky">
    <header class="header" id="header">
        <div class="mini-header">
            <div class="wrapper">
                <div class="row mini-header__breadcrumb">
                    <div class="col-l-16 col-m-10">
                        <ol class="pull-right">
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="ui mini breadcrumb" style="padding-right: 0">
                        <span>
                            <a href="<?php echo e(url('/page/ارتباط-با-ما')); ?>" itemprop="item" class="tduh section home">
                                <span itemprop="name" class="grey-text">ارتباط با ما</span>
                            </a>
                        </span>
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="ui mini breadcrumb" style="padding-right: 0">
                        <span>
                            <a href="<?php echo e(url('/page/درباره-ما')); ?>" itemprop="item" class="tduh section home">
                                <span itemprop="name" class="grey-text">درباره ما</span>
                            </a>
                        </span>
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="ui mini breadcrumb" style="padding-right: 0">
                        <span>
                            <a href="<?php echo e(url('/page/ثبت-رستوران')); ?>" itemprop="item" class="tduh section home">
                                <span itemprop="name" class="grey-text">ثبت رستوران</span>
                            </a>
                        </span>
                            </li>
                        </ol>
                    </div>
                    <div class="col-l-6 col-m-6 ta-right mini-header__sublinks">
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <div class="row display-flex">
                <div class="col-md-1">
                    <div class="header--logo-container">
                        <a style="font-family: Tahoma;color: #ffffff;font-weight: bold" class="logo--header" href="<?php echo e(url('/'.str_replace(' ','-',@$city['name']))); ?>">
                            118food
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
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
                <div class="col-md-3">
                    <div class="hom">
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
    </header>
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