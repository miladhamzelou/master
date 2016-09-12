<div class="panel new-review" <?php if(count($errors) ==  0): ?> style="display: none" <?php endif; ?>>
    <div class="panel-body">
        <h2>نقد رستوران</h2>
        <form action="<?php echo e(url('createReview')); ?>" novalidate="novalidate" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="res_id" value="<?php echo e($res['id']); ?>">
            <div class="form-group<?php echo e($errors->has('content') ? ' has-error' : ''); ?>">
                <label for="exampleInputEmail1">نقد:</label>
                <textarea name="content" type="text" class="form-control text-right" value="<?php echo e(old('content')); ?>" rows="10"></textarea>
                <span id="helpBlock" class="help-block">حداقل میبایست 140 کلمه تایپ کنید</span>
                <?php foreach($errors->get('content') as $error): ?>
                    <span style="color: red;display: block;"><?php echo e($error); ?></span>
                <?php endforeach; ?>
            </div>
            <div class="form-group">
                <div class="ui segment res-rating-widget mbot" style="">
                    <div class="stars stars-example-bootstrap">
                        <label for="exampleInputEmail1">امتیاز شما:</label>
                        <select id="example-bootstrap" name="rate">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                <div class="ui segment res-rating-widget mbot" style="">
                    <div class="stars stars-example-bootstrap">
                        <label for="exampleInputEmail1">آپلود تصاویر:</label>
                        <input type="file" name="image[]" class="form-control" multiple>
                        <?php foreach($errors->get('image') as $error): ?>
                            <span style="color: red;display: block;"><?php echo e($error); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-default left">ارسال نقد</button>
                </div>
        </form>
    </div>
</div>
<div id="tabtop" class="res-middle-area" style="margin-bottom: 20px;">
    <div id="reviews-preview" class="res-detail-review-container">
        <div class="res-review-tab-content-container">
            <div class="res-review-tab-content activity-tab active">
                <div class="activity-feed-container">
                    <div class=" ipadding p-relative reviews res-review-form-container review_message_container" id="ipadding-reviews-box">
                        <div data-filter="reviews-top" id="reviews-container" class="zs-load-more-container">
                            <div class="notifications-content">
                                <div class="clearfix reviews-subhead  pt15 ui segments white-bg mbi">
                                    <div class="clearfix reviews-subhead-sort">
                                        <h2 class="mb0 pl15" id="quick-review-form">
                                            <a href="<?php echo e(url('restaurant/'.$res['id'].'/review')); ?>" class="fontsize2" style="position: relative;top: 10px;">
                                                نقد کاربران
                                            </a>
                                            <a <?php if(Auth::check()): ?> id="user-add-review" <?php else: ?> href="<?php echo e(url('Auth/login')); ?>" <?php endif; ?> type="button"  class="ui green button left">
                                                نوشتن نقد جدید
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                                <?php foreach($res['review'] as $review): ?>
                                    <div class="res-reviews-container res-reviews-area">
                                        <div itemtype="http://schema.org/Review" itemscope="" itemprop="review">
                                             <span itemtype="http://schema.org/Restaurant" itemscope="" itemprop="itemReviewed" style="display:none">
                                                 <span itemprop="name"></span>
                                             </span>
                                            <div class="ui segments res-review-body res-review clearfix js-activity-root item-to-hide-parent stupendousact">
                                                <div class="ui segment clearfix  br0 ">
                                                    <div class="ui warning message error-message-highlight review-message hidden mbot"></div>
                                                    <div class="ui item clearfix ">
                                                        <div class="item">
                                                            <div class="clearfix  mb10 ">
                                                                <div itemtype="http://schema.org/Person" itemscope="" itemprop="author" class="res-large-snippet ui horizontal list col-s-16">
                                                                    <div class="item col-s-16">
                                                                        <a href="<?php echo e(getCurrentURL('localization').'/user/'.$review['user']['username']); ?>">
                                                                            <img src="<?php echo e(asset('images/users/'.$review['user']['id'].'.jpg')); ?>" class="ui avatar image right tiny" style="display: block;">
                                                                        </a>
                                                                        <div class="content col-l-11 large-snippet ml5 mt5" style="width:88%;">
                                                                            <div class="header nowrap ui right">
                                                                                <a itemprop="name" href="<?php echo e(url(getCurrentURL('localization').'/user/'.$review['user']['username'])); ?>">
                                                                                    <?php if($review['user']['userInfo']['family'] && $review['user']['userInfo']['name']): ?>
                                                                                        <?php echo e($review['user']['userInfo']['name']. ' ' . $review['user']['userInfo']['family']); ?>

                                                                                    <?php else: ?>
                                                                                        <?php echo e($review['user']['username']); ?>

                                                                                    <?php endif; ?>
                                                                                </a>
                                                                            </div>
                                                                            <div class="clear"></div>
                                                                            <span class="grey-text fontsize5 nowrap"><?php echo e($review['user']['userInfo']['shortIntroduce']); ?></span>
                                                                            <div class="clear"></div>
                                                                            <div class="zs-follow-btn-container usr-page-follow-btn clear mt2">
                                                                                <?php if($review['user']['id'] != Auth::id()): ?>
                                                                                    <a  data-follow="data-follow" <?php if(Auth::check()): ?> <?php if(in_array($review['user']['id'], Auth::user()->following())): ?> data-status="following" <?php else: ?> data-status="follow" <?php endif; ?> data-following="<?php echo e($review['user']['id']); ?>" data-user="<?php echo e(Auth::id()); ?>" <?php else: ?> href="<?php echo e(url('Auth/login')); ?>" <?php endif; ?> class="social-button follow-social  ui basic large label ui-label-bb zs-follow-user-button <?php if(Auth::check()): ?> <?php if(in_array($review['user']['id'], @Auth::user()->following())): ?> border-green <?php endif; ?> <?php endif; ?>" >
                                                                                        <?php if(Auth::check() && in_array($review['user']['id'], Auth::user()->following())): ?>
                                                                                            دنبال شده
                                                                                        <?php else: ?>
                                                                                            دنبال کردن
                                                                                        <?php endif; ?>

                                                                                    </a>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="fs12px pbot0 clearfix">
                                                            <time><?php echo e(FarsiLib::g2jdate($review['created_at'])); ?></time>
                                                        </div>
                                                    </div>
                                                    <div style="line-height: 20px;text-align: justify;font-size: 12px;" class="rev-text mbot0 " itemprop="description" tabindex="0">
                                                        <b>امتیاز<span style="border-radius: 5px;padding: 0 6px;font-size: 10px;margin-right: 3px;" class="label label-danger"><?php echo e($review['rate']); ?></span></b> <?php echo e($review['content']); ?>

                                                        <div class="clear"></div>
                                                    </div>
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
                                <?php endforeach; ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>