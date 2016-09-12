<div class=" restab_wrap">
    <div class="tabcontent-wrapper brstd  photos " id="tabtop">
        <div class="ui segment">
            <div class="photosContainer mbot0 parentPhotoBox">
                <div id="thumbsContainer">
                    <h2>تصاویر</h2>
                    <div  class="photos_container_load_more clearfix">
                        <div  class="row">
                            <?php foreach($res['gallery'] as $g): ?>
                                <div class="photobox pos-relative right mb15 js-heart-container col-l-1by5 pr5 thumbContainer">
                                    <a  data-fancybox-group="gallery" class="group res-info-thumbs" href="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$g['file'])); ?>">
                                        <img  src="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$g['file'])); ?>" class="res-photo-thumbnail thumb-load margin0 ui red card image img-thumbnail">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>