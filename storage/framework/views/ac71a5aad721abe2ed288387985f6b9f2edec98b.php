<div role="group" class="col-s-16 col-l-3 search-filter-container pr0 right">
    <div class="additional-options mt0 ui segment">
        <div class="filter-padding search-filter-tab pt0 pb0">
            <div class="ui header small margin0">
                <div class="search-filter-label pb5" tabindex="0" title="Sort by">انواع رستوران</div>
            </div>
            <?php foreach($cat as $c): ?>
                <?php if($c['id'] == $currentType['id']): ?> <?php continue; ?> <?php endif; ?>
                <a href="<?php echo e(url('restaurant-list/'.$c['id'])); ?>" style="display: block;margin: 7px 0">رستوران <?php echo e($c['title']); ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php foreach($province as $p): ?>
        <a <?php foreach($p['city'] as $c): ?> <?php if(trim($c['name']) === trim($p['name'])): ?>  href="<?php echo e(url('restaurant-list/'.$c['id'])); ?>" <?php endif; ?> <?php endforeach; ?>><span style="margin-bottom:10px;display:block;background-color: #fff;
    padding: 10px 30px;padding-left: 5px;
    font-weight: bold;"><?php echo e($p['name']); ?><span style="position: relative;top: 3px;" class="fa fa-chevron-left pull-left"></span> </span>
        </a>
    <?php endforeach; ?>
</div>