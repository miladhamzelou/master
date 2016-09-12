<?php $__env->startSection('title'); ?>
    کاکشن های شهر <?php echo e($city['name']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.zone.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="wrapper mtop" style="min-height: 600px;">
        <div class="row">
            <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
                <?php if(Session::has('alert-' . $msg)): ?>
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="collections-page">
                <div class="mtop mbot0 clearfix col-l-16 right">
                    <div class="right">
                        <h1 class="mb5">کالکشن ها - <?php echo e($city['name']); ?></h1>
                        <p class="subtitle">لیستی از بهترین رستوران ها</p>
                    </div>
                    <div class="left mt15">
                        <a <?php if(Auth::check()): ?> href="<?php echo e(url('user/'.Auth::user()->info()['username'].'/newCollection')); ?>" data-city="<?php echo e($city['id']); ?>" id="user-add-collection" <?php else: ?> href="<?php echo e(url('Auth/login')); ?>" <?php endif; ?> type="button"  class="ui green button">
                            کالکشن جدید
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel create-collection" <?php if(count($errors) ==  0): ?> style="display: none" <?php endif; ?>>
                            <div class="panel-body">
                                <form action="<?php echo e(url('createCollection')); ?>" novalidate="novalidate" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="hidden" name="city_id" value="<?php echo e($city['id']); ?>">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان کالکشن:</label>
                                        <input name="title" type="text" class="form-control text-right" value="<?php echo e(old('title')); ?>">
                                        <?php foreach($errors->get('title') as $error): ?>
                                            <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">توضیحات:</label>
                                        <input name="desc" type="text" class="form-control text-right" value="<?php echo e(old('desc')); ?>">
                                        <?php foreach($errors->get('desc') as $error): ?>
                                            <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">تگ ها:</label>
                                        <select name="tags[]" class="js-example-basic-multiple form-control" multiple="multiple">
                                            <?php foreach($tag as $tag): ?>
                                                <option value="<?php echo e($tag['id']); ?>"><?php echo e($tag['title']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php foreach($errors->get('tags') as $error): ?>
                                            <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">آپلود عکس:</label>
                                        <input class="form-control" type="file" name="image">
                                        <?php foreach($errors->get('image') as $error): ?>
                                            <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <button type="submit" class="btn btn-default left">ایجاد کالکشن</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="pt10">
                <div class="col-l-16 mbot">
                    <div class="collections-menu ui menu large">
                        <a href="<?php echo e(url('collections/'.str_replace(' ','-',$city['name'].'/HandPick'))); ?>" class="collections-menu-item collections-tab item <?php if($tab == 'cityCollectionHandPick'): ?> active <?php endif; ?>" data-tab="featured"><span class="fontsize2">دستچین</span></a>
                        <a href="<?php echo e(url('collections/'.str_replace(' ','-',$city['name'].'/Suggest'))); ?>" class="collections-menu-item collections-tab item <?php if($tpl == 'cityCollectionSuggest'): ?> active <?php endif; ?>" data-tab="featured"><span class="fontsize2">پیشنهادی</span></a>
                        <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('collections/'.str_replace(' ','-',$city['name']).'/SaveCollection')); ?>" class="collections-menu-item collections-tab item <?php if($tab == 'cityCollectionSaveCollection'): ?> active <?php endif; ?>" data-tab="featured"><span class="fontsize2">کالکشن های ذخیره</span></a>
                        <a href="<?php echo e(url('collections/'.str_replace(' ','-',$city['name']).'/MyCollection')); ?>" class="collections-menu-item collections-tab item <?php if($tab == 'cityCollectionMyCollection'): ?> active <?php endif; ?>" data-tab="featured"><span class="fontsize2">کالکشن های من</span></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-l-16 collections-tab-content mbot">
                    <?php echo $__env->make('home.'.$tpl, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
    <?php if(Auth::check()): ?>
        <?php echo $__env->make('public.modal',['modal_title' => 'ایجاد کالکشن جدید'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>