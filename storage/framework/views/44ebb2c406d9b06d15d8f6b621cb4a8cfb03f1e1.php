<div class="user-profile-main-cont">
    <div id="tabtop" class="user-tab-content res-reviews-container zs-following-list brstd  pbot" style="min-height: 0px;">
        <div id="network" class="row">
            <div class="col-l-16 clearfix ">
                <div class="zs-load-more-container mbot ptop0 clearfix">
                    <div class="zs-following-list clearfix user-profile-network-tab ui cards">
                        <?php foreach($follow as $follow): ?>
                            <div class="mbot col-l-1by3 col-s-16">
                                <div class=" ui card">
                                    <div class="content">
                                        <div class="ui horizontal list col-s-16">
                                            <div class="item col-s-16">
                                                <img class="ui avatar image left" alt="Aljon" src="<?php echo e(asset('images/users/'. ($follow['following']['userInfo']['img'] ? $follow['following']['userInfo']['img'] : 'default.png' ) )); ?>" style="display: block;">
                                                <div class="content col-l-11 nowrap">
                                                    <div class="header nowrap">
                                                        <a href="<?php echo e(url('/user/'. $follow['following']['username'])); ?>">
                                                            <?php if($follow['following']['userInfo']['name']): ?> <?php echo e($follow['following']['userInfo']['name'] . ' ' . $follow['following']['userInfo']['family']); ?> <?php else: ?> <?php echo e($follow['following']['username']); ?> <?php endif; ?>
                                                        </a>
                                                    </div>
                                                    <span class="grey-text fontsize5" style="font-family: Tahoma;font-size: 9px;">Follower <b class="following-<?php echo e($follow['following']['id']); ?>"><?php echo e($follow['following']['userExtra']['following'] ? $follow['following']['userExtra']['following'] : 0); ?></b>,Following <b class="following-<?php echo e($follow['following']['id']); ?>"><?php echo e($follow['following']['userExtra']['following'] ? $follow['following']['userExtra']['following'] : 0); ?></b></span>
                                                </div>
                                                <div class="right">
                                                    <?php if($follow['following']['id'] != Auth::id()): ?>
                                                        <a  <?php if(Auth::check()): ?> data-follow="data-follow" <?php if(in_array($follow['following']['id'], Auth::user()->following())): ?> data-status="following" <?php else: ?> data-status="follow" <?php endif; ?> data-following="<?php echo e($follow['following']['id']); ?>" data-user="<?php echo e(Auth::id()); ?>" <?php else: ?> href="<?php echo e(url('Auth/login')); ?>" <?php endif; ?> style="border: 1px solid #CCCCCC" class="btn btn-default <?php if(Auth::check()): ?> <?php if(in_array($follow['following']['id'], @Auth::user()->following())): ?> border-green <?php endif; ?> <?php endif; ?>">
                                                            <?php if(Auth::check() && in_array($follow['following']['id'], Auth::user()->following())): ?>
                                                                <span class="fa fa-check"></span>
                                                            <?php else: ?>
                                                                <span class="fa fa-user-plus"></span>
                                                            <?php endif; ?>
                                                        </a>
                                                    <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="clear"></div>
                <?php /*<div class="ui segment col-l-16 tac zs-load-more mbot" data-entity_id="33197611" data-profile_action="followedby" data-limit="9" data-page="1">*/ ?>
                <?php /*<div class="load-more"><span class="zred">Load More&nbsp;</span><span class="zs-load-more-count">86</span></div>*/ ?>
                <?php /*</div>*/ ?>
            </div>
        </div>
    </div>
</div>
</div>
