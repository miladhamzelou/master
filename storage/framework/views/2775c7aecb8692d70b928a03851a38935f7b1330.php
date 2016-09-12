<div class="user-profile-main-cont">
    <div id="tabtop" class="user-tab-content res-reviews-container zs-following-list brstd  pbot" style="min-height: 0px;">
        <div id="photos" class="mbot pbot0 parentPhotoBox zs-load-more-container ui segment">
            <div class="photosContainer mtop0 row zs-following-list" data-entity-id="35517066">
                <?php foreach($photoes as $photo): ?>
                    <div class="col-l-4 mbot thumbContainer">
                        <div class="ui fluid card js-heart-container">
                            <a data-fancybox-group="review-gallery" class="group" href="<?php echo e(asset('images/restaurant/'.$photo['restaurant_id'].'/'.$photo['file'])); ?>">
                                <img height="200" width="200" src="<?php echo e(asset('images/restaurant/'.$photo['restaurant_id'].'/'.$photo['file'])); ?>" class="res-photo-thumbnail" data-type="user" data-photo_id="u_Y5MzI5NDkzMTky" data-index="0" alt=",  photos" style="display: block;">
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="clear"></div>
            <div class="clear"></div>
        </div>
    </div>
</div>