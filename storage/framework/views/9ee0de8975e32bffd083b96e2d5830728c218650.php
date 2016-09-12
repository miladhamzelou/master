<?php $__env->startSection('content'); ?>
    <div class="wrapper" style="margin-top: 20px;">
        <div class="mbot clearfix">
            <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
                <?php if(Session::has('alert-' . $msg)): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <section style="min-height: 500px;" class="white-bg col-l-16 ui segment">
                <h1 class="ui header">
                    ورود به سایت
                </h1>
                <div class="ptop pbot2 row  pl10 pr20">
                    <article class="col-l-16">
                        <form class="form-horizontal" novalidate role="form" method="POST" action="<?php echo e(url(getLocale().'/Auth/login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">پست الکترونیک:</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control text-left" name="field" value="<?php echo e(old('field')); ?>">
                                    <?php foreach($errors->get('field') as $error): ?>
                                        <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">پسورد</label>
                                <div class="col-md-5">
                                    <input type="password" class="form-control text-left" name="password">
                                    <?php foreach($errors->get('password') as $error): ?>
                                        <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-push-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> مرا به خاطر بسپار
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-push-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> ورود به سایت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </article>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>