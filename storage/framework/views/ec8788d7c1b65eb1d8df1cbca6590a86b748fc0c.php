<div class=" mbot">
    <div class="row ui segment">
        <div class="col-l-1by3  pl0 pr20 right">
            <div class="mbot">
                <div class="res-main-phone p-relative phone-details clearfix" title="Casa Paco, Pearl Qatar phone number" id="resinfo-phone">
                    <div id="phoneNoString" class="phone">
                        <h2 aria-label="Phone number" role="heading" tabindex="0" class="mb5 ">شماره تلفن</h2>
                        <span class="tel right res-tel">
                            <span class="fontsize2 bold zgreen">
                                <span itemprop="telephone" class="tel" aria-label="44774109" tabindex="0"><?php echo e($res['tel']); ?></span>
                            </span><br>
                        </span>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="mbot">
                <div class="res-main-phone p-relative phone-details clearfix" title="Casa Paco, Pearl Qatar phone number" id="resinfo-phone">
                    <div id="phoneNoString" class="phone">
                        <h2 aria-label="Phone number" role="heading" tabindex="0" class="mb5 ">پیامک</h2>
                        <span class="tel right res-tel">
                            <span class="fontsize2 bold zgreen">
                                <span itemprop="telephone" class="tel" aria-label="44774109" tabindex="0"><?php echo e($res['sms']); ?></span>
                            </span><br>
                        </span>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="pbot0 res-info-group ">
                <div class="res-info-highlights">
                    <h2 class="mbot0 " tabindex="0">وضعیت</h2>
                    <div style="margin-top: 10px;" tabindex="0" aria-labelledby="labelledby_takeaway" class="clearfix mb5">
                        <div class="res-info-feature-text" id="labelledby_takeaway"><b><?php echo e($res['is_closed'] == 0 ? 'باز' : 'بسته'); ?></b></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="pbot0 res-info-group ">
                <div class="res-info-highlights">
                    <h2 class="mbot0 " tabindex="0">وبسایت</h2>
                    <div tabindex="0" aria-labelledby="labelledby_takeaway" class="clearfix mb5">
                        <div class="res-info-feature-text" id="labelledby_takeaway" style="font-family: Tahoma;font-size: 12px;"><a style="color: #00A6C7" href="<?php echo e($res['website']); ?>"><?php echo e($res['website']); ?></a></div>
                    </div>
                </div>
            </div>
            <div class="pbot0 res-info-group ">
                <div class="res-info-highlights">
                    <h2 class="mbot0 " tabindex="0">نوع رستوران</h2>
                    <div style="margin-top: 10px;" tabindex="0" aria-labelledby="labelledby_takeaway" class="clearfix mb5">
                        <div class="res-info-feature-text" id="labelledby_takeaway">
                            <a style="color: #00A6C7;" href="<?php echo e(url('restaurant-type/'.$res['type_id'])); ?>"><?php echo e($res['type']['title']); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="pbot0 res-info-group ">
                <div class="res-info-highlights">
                    <h2 class="mbot0 " tabindex="0">ساعت کاری</h2>
                    <div tabindex="0" aria-labelledby="labelledby_takeaway" class="clearfix mb5">
                        <div class="res-info-feature-text" id="labelledby_takeaway"><?php echo e($res['working_hour']); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-l-1by3  pl20 pr20 right">
            <div class="mbot0 ptop0 ">
                <div class="res-info-group clearfix">
                    <h2 class="mb5" tabindex="0">توضیحات</h2>
                    <div tabindex="0" class="res-info-known-for-text mr5">
                        <?php echo e($res['content']); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-l-1by3 pl20 pr20 left">
            <div class="mbot">
                <div class="res-info-group clearfix">
                    <h2 tabindex="0" class="mt0 mb5">موقعیت</h2>
                    <div class="res-info-cuisines clearfix">
                        <?php echo e($res['city']['province']['name']); ?> <?php echo e($res['city']['name']); ?> <?php echo e($res['region']['name']); ?> <?php echo e($res['neighbourhood']['name']); ?>

                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="mb5">
                <h2 tabindex="0" aria-label="Address">آدرس</h2>
            </div>
            <div class="mbot0">
                <div class="borderless res-main-address">
                    <div class="resinfo-icon">
                        <?php echo e($res['address']); ?>

                    </div>
                </div>
            </div>
            <div class="mbot0">
                <div class="resbox__main--row">
                    <div class="resmap pos-relative mt5 mb5">
                        <a href="<?php echo e(url('restaurant/'.$res['id'].'/map')); ?>">
                            <div id="res-map-canvas">
                                <div class="resmap-text-container">
                                    Get Directions
                                </div>
                                <div style="width: 100%; height: 100%; background: url(<?php echo e(asset('assets/home/img/map.png')); ?>) center center / cover no-repeat rgb(244, 244, 244);" class="resmap-img"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mbot">
    <?php echo $__env->make('restaurantBundle.restaurant.home.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="res-info-headline mbot">
    <div class="ui segment">
        <a href="<?php echo e(getCurrentURL('localization').'/restaurant/'.$res['id'].'/photo'); ?>" class="cursor-pointer">
            <h2 class="clearfix pr5 mb0">تصاویر</h2>
        </a>
        <div class="photosContainer ui images margin0 clearfix  small">
            <?php foreach($res['gallery'] as $k=>$rg): ?>
                <?php if($k < 5): ?>
                    <div class="pos-relative right js-heart-container mtop  mr10">
                        <?php if($k != 4): ?>
                            <a data-fancybox-group="show-gallery" class="group" href="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$rg['file'])); ?>">
                                <img src="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$rg['file'])); ?>" class="margin0 ui card  see-more-res-header res-photo-thumbnail" style="display: inline-block;">
                            </a>
                        <?php else: ?>
                            <a  href="<?php echo e(url('restaurant/'.$res['id'].'/photo')); ?>">
                                <img src="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$rg['file'])); ?>" class="margin0 ui card  see-more-res-header res-photo-thumbnail" style="display: inline-block;">
                                <div class="pos-absolute resinfo-photo-overlay full-height">
                                    <span class="white col-s-16 tac fontsize4">+ <?php echo e(count($res['gallery']) - 5); ?></span>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <?php break; ?>;
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php echo $__env->make('restaurantBundle.restaurant.home.review', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
