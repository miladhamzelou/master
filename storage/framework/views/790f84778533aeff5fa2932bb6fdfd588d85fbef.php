<div class="col-l-5 col-s-16 right-column-container pl0 left">
    <div role="group" class="zbans container left" style="width:100%">
        <div class="clearfix ui segment sidebar-app-banner ">
            <div id="mobile-banner-module">
                <div id="mobile-banner">
                    <div class="mobile-banner-intro tac col-l-16 clearfix">
                        <div class="fontsize2 bold">
                            اپلیکیشن سایت 118 فود
                        </div>
                        <div class="grey-text pb5 fontsize5 mt5 mobile-banner-desc" tabindex="0">
                            با دانلود این اپلیکیشن میتوانید رستوران های مورد علاقه خود را به آسانی در تلفن همراه خود پیدا کنید...
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="image-container p-relative tac clearfix pbot0">
                        <img class="app-image" width="139" src="<?php echo e(asset('assets/home/img/app-phone.jpg')); ?>">
                    </div>
                    <div class="store-links mtop tac clearfix">
                        <a class="pr15" target="_blank" href="https://bnc.lt/download-zomato-ios">
                            <img src="<?php echo e(asset('assets/home/img/apple.png')); ?>" alt="Download Zomato for iOS" height="32">
                        </a>
                        <a target="_blank" href="https://bnc.lt/download-z-android">
                            <img src="<?php echo e(asset('assets/home/img/googleplay.png')); ?>" height="32">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="group" class="zbans container left" style="width:100%;margin-top: 15px;">
        <div id="cat-banner-ads">
            <?php foreach($types as $cat): ?>
                <?php if($cat['id'] == $currentType['id']): ?> <?php continue; ?> <?php endif; ?>
            <div class="white-bg sub-cat-container  mbot" data-category-id="6" style="border-radius: 4px; border:1px solid #e7e7e7;">
                <div class="pr15 pl15 ptop0">
                    <div class="right floated">
                        <div class="fontsize1 semi-bold mt2" style="line-height:24px;">
                            <a href="<?php echo e(url('restaurant-type/'.$cat['id'])); ?>"><?php echo e($cat['title']); ?></a>
                        </div>
                        <div class="grey-text">بهترین رستوران ها</div>
                    </div>
                    <div class="left floated">
                        <img src="<?php echo e(asset('images/restaurant-type/'.$cat['img'])); ?>" style="height: 44px; display: inline;" class="">
                    </div>
                </div>
                <div class="clear"></div>
                <div class="cat-subzone-res ptop0 ml15 mr20">
                    <div class="row">
                        <?php foreach($cat['restaurant'] as $res): ?>
                            <div class="col-l-1by3 col-s-1by3  pr5 pl5 right">
                            <div class=" pbot0 res_ad_banner">
                                <a href="<?php echo e(url('restaurant/'.$res['id'])); ?>">
                                    <div class="relative res_image" style="height: 90px; display: block; background-image: url(<?php echo e(asset('images/restaurant/'. ($res['img'] ? $res['id'].'/'.$res['img'] : 'restaurant.jpg'))); ?>);">
                                        <div class=" ads-res-snippet-rating  level-8 ">
                                            <?php echo e($res['rate']); ?>

                                        </div>
                                    </div>
                                </a>
                                <div class="pt5 pbot0 ad_info">
                                    <div style="">
                                        <a class="res_name" href="<?php echo e(url('restaurant/'.$res['id'])); ?>">
                                            <?php echo e(str_limit($res['title'],12)); ?>

                                        </a>
                                    </div>
                                        <div class="nowrap grey-text subzone_text"><?php echo e($res['heading']); ?></div>
                                    <div class="grey-text cuisine_str">
                                        <?php echo e(str_limit($res['content'], 15)); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>