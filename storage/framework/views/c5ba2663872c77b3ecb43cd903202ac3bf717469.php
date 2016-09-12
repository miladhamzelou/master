<div class="ui res-tabs-o clearfix sticky">
    <div class="respageMenuContainer">
        <div class="ui removeMenuBorder respageMenu large menu res-tabs-inner mb0 brstd">
            <a href="<?php echo e(getCurrentURL('localization').'/restaurant/'.$res['id']); ?>" <?php if(@$tpl == 'overview'): ?> class="item respageMenu-item active" <?php else: ?> class="item respageMenu-item" <?php endif; ?>>
                <span class="fontsize2">اطلاعات رستوران</span>
            </a>
            <a href="<?php echo e(getCurrentURL('localization').'/restaurant/'.$res['id'].'/menu'); ?>"  <?php if(@$tpl == 'menu'): ?> class="item respageMenu-item active" <?php else: ?> class="item respageMenu-item" <?php endif; ?>>
                <span class="fontsize2">منوها</span>
            </a>
            <a href="<?php echo e(getCurrentURL('localization').'/restaurant/'.$res['id'].'/review'); ?>" <?php if(@$tpl == 'review'): ?> class="item respageMenu-item active" <?php else: ?> class="item respageMenu-item" <?php endif; ?>>
                <span class="fontsize2">نقد کاربران</span>
            </a>
            <a href="<?php echo e(getCurrentURL('localization').'/restaurant/'.$res['id'].'/photo'); ?>" <?php if(@$tpl == 'photo'): ?> class="item respageMenu-item active" <?php else: ?> class="item respageMenu-item" <?php endif; ?>>
                <span  class="fontsize2">تصاویر </span>
            </a>
            <a href="<?php echo e(getCurrentURL('localization').'/restaurant/'.$res['id'].'/map'); ?>" <?php if(@$tpl == 'map'): ?> class="item respageMenu-item active" <?php else: ?> class="item respageMenu-item" <?php endif; ?>>
                <span  class="fontsize2">نقشه رستوران</span>
            </a>
        </div>
    </div>
    <div class="clear"></div>
</div>