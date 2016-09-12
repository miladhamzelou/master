<?php $__env->startSection('title'); ?> عضویت در سایت <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.zone.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="wrapper" style="margin-top: 20px;">
        <div class="mbot clearfix">
            <section style="min-height: 500px;" class="white-bg col-l-16 ui segment">
                <h1 class="ui header">
                    عضویت در سایت
                </h1>
                <div class="ptop pbot2 row  pl10 pr20">
                    <article class="col-l-16">
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('Auth/register')); ?>" novalidate>
                            <?php echo csrf_field(); ?>

                            <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                <label class=" col-md-3 control-label">نام کاربری:</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control text-left" name="username" value="<?php echo e(old('username')); ?>">
                                    <?php foreach($errors->get('username') as $error): ?>
                                        <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">پست الکترونیک:</label>
                                <div class="col-md-5">
                                    <input type="email" class="form-control text-left" name="email" value="<?php echo e(old('email')); ?>">
                                    <?php foreach($errors->get('email') as $error): ?>
                                        <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label class="col-md-3  control-label">پسورد:</label>
                                <div class="col-md-5">
                                    <input type="password" class="form-control text-left" name="password">
                                    <?php foreach($errors->get('password') as $error): ?>
                                        <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">تایید پسورد</label>
                                <div class="col-md-5">
                                    <input type="password" class="form-control text-left" name="password_confirmation">
                                    <?php foreach($errors->get('password_confirmation') as $error): ?>
                                        <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-push-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> عضویت در سایت
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