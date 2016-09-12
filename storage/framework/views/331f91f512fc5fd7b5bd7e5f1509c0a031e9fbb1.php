<div role="group" class="col-s-16 col-l-3 search-filter-container pr0 right">
    <div class="additional-options mt0 ui segment">
        <div class="filter-padding search-filter-tab pt0 pb0">
            <div class="ui header small margin0">
                <div class="search-filter-label pb5" tabindex="0" title="Sort by"><?php echo e($currentCity['name']); ?> <?php echo e($region['name']); ?> <?php echo e($neighbourhood['name']); ?></div>
            </div>
            <?php foreach($cat as $c): ?>
                <a href="<?php echo e(url('Neighbourhood-Restaurant-List/'.str_replace(' ','-',trim($currentCity['name'])).'/'.str_replace(' ','-',trim($region['name'])).'/'.str_replace(' ','-',trim($neighbourhood['name'])).'/'.str_replace(' ','-',$c['title']))); ?>" style="display: block;margin: 7px 0">رستوران <?php echo e($c['title']); ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>