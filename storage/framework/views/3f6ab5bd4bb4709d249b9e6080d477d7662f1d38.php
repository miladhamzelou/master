<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-zone">
                <div class="panel">
                    <div class="panel-body">
                        <div class="text-center">
                            <div class="col-md-6 text-left">
                                <h2><?php if($info['userInfo']['name']): ?> <?php echo e($info['userInfo']['name'] . ' ' . $info['userInfo']['family']); ?> <?php else: ?> <?php echo e($info['username']); ?> <?php endif; ?></h2>
                                <?php if($info['userInfo']['shortIntroduce']): ?><p style="position: relative;top: 9px;"><?php echo e($info['userInfo']['shortIntroduce']); ?></p><?php endif; ?>
                                <p style="font-family: Tahoma;font-size: 10px;color: grey">Follower <b class="follower-<?php echo e($info['id']); ?>"><?php echo e($info['userExtra']['follower'] ? $info['userExtra']['follower'] : 0); ?></b>, Following <b class="following-<?php echo e($info['id']); ?>"><?php echo e($info['userExtra']['following'] ? $info['userExtra']['following'] : 0); ?></b></b></p>
                                <?php if($info['id'] != Auth::id()): ?>
                                    <div class="zs-follow-btn-container usr-page-follow-btn clear mt2">
                                    <a  <?php if(Auth::check()): ?> data-follow="data-follow" <?php if(in_array($info['id'], Auth::user()->following())): ?> data-status="following" <?php else: ?> data-status="follow" <?php endif; ?> data-following="<?php echo e($info['id']); ?>" data-user="<?php echo e(Auth::id()); ?>" <?php else: ?> href="<?php echo e(url('Auth/login')); ?>" <?php endif; ?> class="social-button follow-social  ui basic large label ui-label-bb zs-follow-user-button <?php if(Auth::check()): ?> <?php if(in_array($info['id'], @Auth::user()->following())): ?> border-green <?php endif; ?> <?php endif; ?>">
                                        <?php if(Auth::check() && in_array($info['id'], Auth::user()->following())): ?>
                                            دنبال شده
                                        <?php else: ?>
                                            دنبال کردن
                                        <?php endif; ?>
                                    </a>
                                        </div>
                                    <?php else: ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 text-right">
                                <img src="<?php echo e(asset('images/users/'. ($info['userInfo']['img'] ? $info['userInfo']['img'] : 'default.png'))); ?>" class="img-circle img-bordered">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>