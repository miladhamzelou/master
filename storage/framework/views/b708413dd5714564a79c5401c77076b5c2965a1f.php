<div style="padding:0; " class="ui segment res-header-overlay vr">
    <div class="">
        <div class="">
            <div class="row pos-relative">
                <div class=" full_obp  col-s-16 clearfix">
                    <div style="background-size: cover!important;background-position: center center;background-repeat: no-repeat; overflow:visible;border: none;box-shadow:none; height: 299px;" class="mb0 ui segment  hero wrapper progressive_img hero--restaurant " id="progressive_image">
                        <div class="progressive_img_loaded" style="background-image: url(<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$res['img'])); ?>); opacity: 1;background-size: cover"></div>
                        <div style="z-index: 1;" class="col-l-10">
                            <div class="row">
                                <div class="clearfix">
                                    <div class="resbox__header">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pos-absolute pl0 res-images-stack mb15 mr15">
                            <div class="photosContainer margin0 header-photo-grid">
                                <?php foreach($res['gallery'] as $k=>$rg): ?>
                                    <?php if($k < 5): ?>
                                        <div class="pos-relative right js-heart-container mtop0" style="margin-left: 3px">
                                            <?php if($k == 4): ?>
                                                <a  href="<?php echo e(url('/restaurant/'.$res['id'].'/photo')); ?>">
                                                    <img  src="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$rg['file'])); ?>" class="margin0 ui card image see-more-res-header res-photo-thumbnail" style="display: block;">
                                                    <div class="pos-absolute resinfo-photo-overlay">
                                                        <span class="white col-s-16 tac fontsize5">+ <?php echo e(count($res['gallery']) - 5); ?></span>
                                                    </div>
                                                </a>
                                            <?php else: ?>
                                                <a class="group" data-fancybox-group="slide-gallery" href="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$rg['file'])); ?>">
                                                    <img  src="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$rg['file'])); ?>" class="margin0 ui card image see-more-res-header res-photo-thumbnail" style="display: block;">
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
                </div>
            </div>
        </div>
        <div class="res-header-overlay brbot">
            <div class="row ">
                <div class="col-l-4 tac left">
                    <div class="left">
                        <div itemtype="https://schema.org/AggregateRating" itemscope="" itemprop="aggregateRating" class="right rating-info rrw-container rrw-container-18295492 ">
                            <div class="res-rating pos-relative clearfix mb5">
                                <div class="rating-for-18295492 rating-div rrw-aggregate level-1" data-res-id="18295492" itemprop="ratingValue" aria-label="Rated" tabindex="0">
                                    <?php echo e($res['rate']); ?><span>/10</span>
                                </div>
                            </div>
                            <span class="mt2 mb0 rating-votes-div rrw-votes grey-text fontsize5 ta-right">
                                  <span class="tooltip_formatted fbold"><span itemprop="ratingCount"><?php echo e($res['restaurantExtra']['review'] ? $res['restaurantExtra']['review'] : 'بدون'); ?></span> نقد</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-l-12">
                    <h1 style="" class="res-name left mb0">
                        <a class="ui large header left" style="font-size: 120%"  href="<?php echo e(getCurrentURL('localization').'/restaurant/'.$res['id']); ?>">
                            <?php echo e($res['title']); ?>

                        </a>
                    </h1>
                    <div class="mb5 pt5 clear">
                       <span class="res-info-estabs grey-text fontsize3">
                           <a href="<?php echo e(getCurrentURL('localization').'/restaurant/'.$res['id']); ?>" class="grey-text fontsize3">
                               <?php echo e($res['heading']); ?>

                           </a>
                       </span>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>