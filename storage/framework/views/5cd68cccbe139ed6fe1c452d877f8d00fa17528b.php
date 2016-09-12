<?php if(count($collection) > 0): ?>
    <div class="collections-grid clearfix">
        <div class="row">
            <?php foreach($collection as $col): ?>
                <div class="col-md-4 mbot right">
                    <div class="ui fluid card">
                        <a href="<?php echo e(url('/collection/'.$city['id'].'/'.$col['id'])); ?>">
                            <div class="row">
                                <div class="col-s-7">
                                    <div  class="collection-box-bg"
                                         style="display: block; background-image: url(<?php echo e(asset('images/collection/'.($col['img'] ? $col['img'] : 'default.png'))); ?>); background-position: center center;">
                                    </div>
                                </div>
                                <div class="col-s-9">
                                    <div class="row">
                                        <div class="ptop0 mr20 ml5 coll_detail">
                                            <div class="heading bold ln20">
                                                <?php echo e($col['title']); ?>

                                            </div>
                                            <div class="zblack fontsize4 description mt5  hp "><?php echo e($col['desc']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <div class="pt10">
        <div class="clear"></div>
        <div class="col-l-16 collections-tab-content mbot">
            <div class="tac ptop2 pbot mbot2">
                <img src="https://b.zmtcdn.com/images/emptystates/bookmark_collection.png" width="400" height="auto">
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php endif; ?>