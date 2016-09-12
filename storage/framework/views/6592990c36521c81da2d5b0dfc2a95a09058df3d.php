<section class="wrapper">
    <div class="collections-grid row">
        <?php foreach($collection as $collection): ?>
            <?php foreach($collection['collection']['place'] as $item): ?>
            <div class="col-l-1by3 col-s-16 mbot right">
            <div class="ui fluid card">
                <a href="<?php echo e(url('collection/'.$item['id'].'/'.$collection['collection_id'])); ?>">
                    <div class="row">
                        <div class="col-s-7">
                            <div  class="collection-box-bg"
                                 style="display: block; background-image: url(<?php echo e(asset('images/collection/'.($collection['collection']['img'] ? $collection['collection']['img'] : 'default.png'))); ?>); background-position: center center;">
                            </div>
                        </div>
                        <div class="col-s-9">
                            <div class="row">
                                <div class="ptop0 mr20 ml5 coll_detail">
                                    <div class="heading bold ln20">
                                        <?php echo e($collection['collection']['title']); ?>

                                    </div>
                                    <div class="zblack fontsize4 description mt5  hp "><?php echo e($collection['collection']['desc']); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endforeach; ?>
        </div>
</section>