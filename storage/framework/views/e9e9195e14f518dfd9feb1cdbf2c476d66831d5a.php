<div class="col-md-8 no-padding">
    <?php if(count($userreview) > 0): ?>
        <?php foreach($userreview as $review): ?>
            <div class="user-profile-main-cont" style="margin-bottom: 20px;">
                <div id="tabtop" class="user-tab-content res-reviews-container zs-following-list brstd  pbot" style="min-height: 0px;">
                    <div id="reviews" class="p-relative">
                        <div class="user-prof-rev ">
                            <div id="reviews-container"><div class="zs-load-more-container">
                                    <div id="reviewFeed" class="zs-following-list">
                                        <div class="res-review-body res-review clearfix item-to-hide-parent js-activity-root stupendousact feedroot res-review" data-review_id="24540293" data-snippet="user-review">
                                            <div class="ui segment brtop">
                                                <div class="res-review-header">
                                                    <div class="mb5">
                                                        <div class="ui list  snippet-restaurant " data-res-id="18029707">
                                                            <div class="item" style="right: 0">
                                                                <a href="<?php echo e(url('restaurant/'.$review['restaurant']['id'])); ?>" class="right mr10" style="margin-left: 10px;">
                                                                    <img alt="The Big Catch Seafood" class="brstd ui mini image" src="https://b.zmtcdn.com/images/res_avatar_476_320_1x_new.png?fit=around%7C50%3A50&amp;crop=50%3A50%3B%2A%2C%2A"  style="display: block;">
                                                                </a>
                                                                <div class="content">
                                                                    <div class="">
                                                                        <div class="header nowrap">
                                                                            <a href="<?php echo e(url('restaurant/'.$review['restaurant']['id'])); ?>" data-entity_id="18029707" data-entity_type="RESTAURANT"><?php echo e($review['restaurant']['title']); ?></a>
                                                                        </div>
                                                                        <a href="<?php echo e(url('restaurant/'.$review['restaurant']['id'])); ?>" title="Koreatown">
                                                                            <span class="grey-text fontsize5"><?php echo e($review['restaurant']['region']['city']['name'] .  ' ' .$review['restaurant']['region']['name']); ?></span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb5 clearfix">
                                                        <a href="https://www.zomato.com/review/QemmZw" class="res-review-date fontsize5">
                                                            <time itemprop="datePublished" datetime="2015-08-06 23:46:30"><?php echo e(FarsiLib::g2jdate($review['created_at'])); ?></time>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="res-review-body">
                                                    <div class="res-review-body res-review-small clearfix" style="word-wrap:break-word;">
                                                        <div class="rev-text-sm">
                                                            <div tabindex="0" class="rev-text-expand" style="line-height:20px;">
                                                                <b>امتیاز<span style="border-radius: 5px;padding: 0 6px;font-size: 10px;margin-right: 3px;" class="label label-danger"><?php echo e($review['rate']); ?></span></b> <?php echo e($review['content']); ?>

                                                                <div class="clear"></div>
                                                            </div>
                                                        </div>
                                                        <div class="photosContainer parentPhotoBox bb0 pb5 mtop clearfix">
                                                            <div class="ui tiny images">
                                                                <?php if($review['gallery']): ?>
                                                                    <div  style="padding-bottom: 0;margin-bottom: 0" class="photosContainer parentPhotoBox mtop0 mbot0 thumbsContainer">
                                                                        <div class="ui tiny images">
                                                                            <?php foreach($review['gallery'] as $gal): ?>
                                                                                <div  class="ui image js-heart-container">
                                                                                    <a data-fancybox-group="review-gallery-<?php echo e($review['id']); ?>"  class="group res-photo-thumbnail" href="<?php echo e(asset('images/restaurant/'.$review['restaurant_id'].'/'.$gal['file'])); ?>">
                                                                                        <img  src="<?php echo e(asset('images/restaurant/'.$review['restaurant_id'].'/'.$gal['file'])); ?>" style="display: inline-block;">
                                                                                    </a>
                                                                                </div>
                                                                            <?php endforeach; ?>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="user-profile-main-cont">
            <div id="tabtop" class="user-tab-content res-reviews-container zs-following-list brstd  pbot">
                <div id="foodjourney" class="clearfix">
                    <div id="nFeed" data-active="1" data-data_type="food_journey" data-user_id="35517066" style="border: none;" class="pbot0 feed-is-empty">
                        <div class="user-food-journey-container">
                            <div class="empty-message-container ui segment">
                                <div class="message">
                                    <div class=" user-feed-empty-state pbot">
                                        <div class="ta-center  empty-state-image">
                                            <p class="empty-state-data-icon" data-icon="π"></p>
                                        </div>
                                        <!-- header message -->
                                        <p class="empty-state-text ta-center" style="margin-top: 100px;margin-bottom: 100px;">خوش آمدید</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="col-md-4 no-padding-right"><?php echo $__env->make('auth.dashboard.zone.sidebar-left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>