<div role="group" class="col-s-16 col-l-3 search-filter-container pr0 right">
    <div class="additional-options mt0 ui segment">
        <div class="filter-padding search-filter-tab pt0 pb0">
            <div class="ui header small margin0">
                <div class="search-filter-label pb5" tabindex="0" title="Sort by"><?php echo e($currentCity['name']); ?> <?php echo e($region['name']); ?></div>
            </div>
            <?php foreach($cat as $c): ?>
                <a href="<?php echo e(url('Region-Restaurant-List/'.str_replace(' ','-',trim($currentCity['name'])).'/'.str_replace(' ','-',trim($region['name'])).'/'.str_replace(' ','-',$c['title']))); ?>" style="display: block;margin: 7px 0">رستوران <?php echo e($c['title']); ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php foreach($region['neighbourhood'] as $nh): ?>
        <a href="<?php echo e(url('Neighbourhood-Restaurant-List/'.str_replace(' ','-',trim($city['name'])).'/'.str_replace(' ','-',trim($region['name'])).'/'.str_replace(' ','-',trim($nh['name'])))); ?>"><span style="margin-bottom:10px;display:block;background-color: #fff;
    padding: 10px 30px;padding-left: 5px;
    font-weight: bold;"><?php echo e($nh['name']); ?><span style="position: relative;top: 3px;" class="fa fa-chevron-left pull-left"></span> </span>
        </a>
    <?php endforeach; ?>
</div>