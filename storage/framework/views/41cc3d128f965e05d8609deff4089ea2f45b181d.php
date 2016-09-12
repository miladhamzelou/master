<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>118food :: <?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->yieldContent('description'); ?>
    <?php echo $__env->yieldContent('keywords'); ?>
    <?php $__env->startSection('stylesheets'); ?>
        <link href="<?php echo e(asset('assets/tools/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/tools/bootstrap/css/bootstrap-rtl.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/tools/fonts/fonts.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/tools/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('assets/tools/fancybox/source/jquery.fancybox.css')); ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo e(asset('assets/tools/rating/dist/themes/bootstrap-stars.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/tools/select2/select2.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/tools/select2/select2-bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/tools/toastr/toastr.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/home/css/z1.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/home/css/z2.css')); ?>" />
        <link href="<?php echo e(asset('assets/home/css/style.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldSection(); ?>
    <?php $__env->startSection('javascript'); ?>
        <script src="<?php echo e(asset('assets/tools/bootstrap/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/tools/bootstrap/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/tools/select2/select2.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/tools/fancybox/source/jquery.fancybox.pack.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/tools/rating/jquery.barrating.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/tools/custombox-master/dist/custombox.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('assets/tools/toastr/toastr.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/home/js/home.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/home/js/custom.js')); ?>"></script>
    <?php echo $__env->yieldSection(); ?>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>" />
</head>
<body class="start ct-present is-responsive en">
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('home.zone.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPNmj_sp-6Pho65Tveca7mOcttBBbr-OU&callback=initMap"></script>
</body>
</html>
