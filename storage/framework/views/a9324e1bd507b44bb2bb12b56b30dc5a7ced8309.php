<div class="right-column-container col-l-5" style="min-height: 818px;">
    <div class="resbox__sidebar display-similar-nearby-res ui segment">
        <div class="res-info-group hom">
            <div class="mb15 bb pbot0">
                <h2  class="fontsize2 semi-bold">سایر رستوران ها</h2>
            </div>
            <div id="nearby-container" class="section ui cards pbot0">
                <?php 
                    $var = 1;
                 ?>
                <?php foreach($other_res as $ko=>$other): ?>
                    <div class="col-l-16">
                        <div class="w100 <?php if($var < 7): ?> bb <?php endif; ?>">
                            <div class="mtop0 mbot0">
                                <div class="ui list">
                                    <div class="item">
                                        <div class="left floated top-res-box-rating-small level-1">
                                            <?php echo e($other['restaurantExtra']['rate'] ? $other['restaurantExtra']['rate'] : 0.0); ?>

                                        </div>
                                        <a href="<?php echo e(url('restaurant/'.$other['id'])); ?>" class="right mr10">
                                            <img class="brstd ui mini image" src="<?php echo e(asset('images/restaurant/'. ($other['img'] ? $other['id'].'/'.$other['img'] : 'restaurant.jpg'))); ?>"  style="height: 32px; display: block;margin-left: 25px;">
                                        </a>
                                        <div class="content">
                                            <div class="header nowrap">
                                                <a href="<?php echo e(url('restaurant/'.$other['id'])); ?>"><?php echo e($other['title']); ?></a>
                                            </div>
                                            <div class="grey-text nowrap fontsize5">
                                                <?php echo e($other['heading']); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $var += 1;
                     ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
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
    <div class="resbox__sidebar display-similar-nearby-res ui segment">
        <div class="res-info-group hom">
            <div class="mb15 bb pbot0">
                <h2  class="fontsize2 semi-bold">بهترین رستوران ها</h2>
            </div>
            <div id="nearby-container" class="section ui cards pbot0">
                <?php 
                $var = 1;
                 ?>
                <?php foreach($top as $t): ?>
                    <div class="col-l-16">
                        <div class="w100 <?php if($var < 7): ?> bb <?php endif; ?>">
                            <div class="mtop0 mbot0">
                                <div class="ui list">
                                    <div class="item">
                                        <div class="left floated top-res-box-rating-small level-1">
                                            <?php echo e($t['rate']); ?>

                                        </div>
                                        <a href="<?php echo e(url('restaurant/'.$t['id'])); ?>" class="right mr10">
                                            <img class="brstd ui mini image" src="<?php echo e(asset('images/restaurant/'. ($t['img'] ? $t['id'].'/'.$t['img'] : 'restaurant.jpg'))); ?>"  style="height: 32px; display: block;margin-left: 25px;">
                                        </a>
                                        <div class="content">
                                            <div class="header nowrap">
                                                <a href="<?php echo e(url('restaurant/'.$t['id'])); ?>"><?php echo e($t['title']); ?></a>
                                            </div>
                                            <div class="grey-text nowrap fontsize5">
                                                <?php echo e($t['heading']); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $var += 1;
                     ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>