<!DOCTYPE html>
<html  dir="<?php echo e(Config::get('app.dir')); ?>" lang="<?php echo e(Config::get('app.locale')); ?>">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="URL" content="<?php if(config('app.controller')): ?><?php echo e(getCurrentURL('action')); ?><?php else: ?><?php echo e(getCurrentURL('prefix')); ?><?php endif; ?>">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php if(config('app.controller')): ?>
            <?php echo e(trans('public.Administrator')); ?> :: <?php echo e(trans(lcfirst(config('app.controller')).'.'.config('app.title'))); ?>

        <?php elseif(config('app.prefix') == 'Admin'): ?> ::
            <?php if(@Auth::user()->info()['name']): ?><?php echo e(@Auth::user()->info()['name'] .' '.@Auth::user()->info()['family']); ?> <?php else: ?> <?php echo e(@Auth::user()->info()['username']); ?> <?php endif; ?>
        <?php endif; ?>
    </title>
    <?php $__env->startSection('stylesheets'); ?>
        <link href="<?php echo e(asset('assets/tools/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/tools/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/tools/fonts/fonts.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/skins/skin-blue.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/tools/toastr/toastr.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/tools/select2/select2.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/tools/select2/select2-bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/tools/datepicker/css/persianDatepicker-default.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/tools/fancybox/source/jquery.fancybox.css')); ?>" type="text/css" media="screen" />
        <?php if(Config::get('app.dir') == 'rtl'): ?>
            <link href="<?php echo e(asset('assets/tools/bootstrap/css/bootstrap-rtl.min.css')); ?>" rel="stylesheet">
            <link href="<?php echo e(asset('assets/admin/css/rtl/AdminLTE-rtl.css')); ?>" rel="stylesheet">
            <link href="<?php echo e(asset('assets/admin/css/rtl/style-rtl.css')); ?>" rel="stylesheet">
        <?php elseif(Config::get('app.dir') == 'ltr'): ?>
            <link href="<?php echo e(asset('assets/admin/css/ltr/AdminLTE-ltr.css')); ?>" rel="stylesheet">
            <link href="<?php echo e(asset('assets/admin/css/ltr/style-ltr.css')); ?>" rel="stylesheet">
        <?php endif; ?>
        <link href="<?php echo e(asset('assets/admin/css/style.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldSection(); ?>
    <?php $__env->startSection('javascript'); ?>
        <script src="<?php echo e(asset('assets/tools/bootstrap/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/tools/bootstrap/js/bootstrap.min.js')); ?>"></script>
        <!--[if lt IE 9]>
        <script src="<?php echo e(asset('assets/tools/bootstrap/js/html5shiv.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/tools/bootstrap/js/respond.js')); ?>"></script>
        <![endif]-->
        <!-- plugin -->
        <script src="<?php echo e(asset('assets/tools/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/tools/toastr/toastr.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/tools/select2/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/tools/datepicker/js/persianDatepicker.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/tools/fancybox/source/jquery.fancybox.pack.js')); ?>"></script>
        <!-- end plugin -->
        <script src="<?php echo e(asset('assets/admin/js/AdminLTE.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/admin/js/admin.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/admin/js/custom.js')); ?>"></script>
    <?php echo $__env->yieldSection(); ?>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>" />
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php echo $__env->make('admin.zone.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.zone.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('admin.zone.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row"></div>
        <section class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </section>
    </div>
    <?php echo $__env->make('admin.zone.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div id="ajax-result" style="display: none"></div>
<?php if(Config::get('app.dir') == 'rtl'): ?>
    <script>
        $('.sidebar-toggle').click(function () {
            $('.breadcrumb').toggleClass('margin-50');
            if($(document).width() < 940) {
                $('.breadcrumb').toggleClass('margin-50');
            }
            $('.main-sidebar').css({ 'height' : $(document).height() });
        })
    </script>
<?php endif; ?>
<script>
    $(document).ready(function () {
        Admin.init();
    });
</script>
</body>