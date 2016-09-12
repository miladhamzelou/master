<?php if(count($collection) > 0): ?>
    <?php echo $__env->make('home.handpick_collection', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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