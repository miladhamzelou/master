<div class="panel new-photo-menu" <?php if(count(@$errors) ==  0): ?> style="display: none" <?php endif; ?>>
    <div class="panel-body">
        <form action="<?php echo e(url('UploadPhotoMenu')); ?>" novalidate="novalidate" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="res_id" value="<?php echo e($res['id']); ?>">
            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                <div class="ui segment res-rating-widget mbot" style="">
                    <div class="stars stars-example-bootstrap">
                        <label for="exampleInputEmail1">آپلود تصاویر:</label>
                        <input type="file" name="image[]" class="form-control" multiple>
                        <?php foreach($errors->get('image') as $error): ?>
                            <span style="color: red;display: block;"><?php echo e($error); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default left">آپلود</button>
            </div>
        </form>
    </div>
</div>
<div class=" restab_wrap">
    <div class="tabcontent-wrapper brstd  photos " id="tabtop">
        <div class="ui segment">
            <div class="photosContainer mbot0 parentPhotoBox">
                <div id="thumbsContainer">
                    <h2>
                        <a href="<?php echo e(url('restaurant/'.$res['id'].'/review')); ?>" class="fontsize2" style="position: relative;top: 10px;">
                            منوی تصاویر
                        </a>
                        <a <?php if(Auth::check()): ?> id="user-add-photo-menu" <?php else: ?> href="<?php echo e(url('Auth/login')); ?>" <?php endif; ?> type="button"  class="ui green button left">
                            آپلود منوی جدید
                        </a>
                    </h2>
                    <div  class="photos_container_load_more clearfix" style="margin-top: 20px;">
                        <div  class="row">
                            <?php foreach($res['menu'] as $menu): ?>
                                <?php foreach($menu['gallery'] as $k=>$g): ?>
                                    <div  class="photobox pos-relative right mb15 js-heart-container col-l-1by5 pr5 thumbContainer">
                                        <a class="res-info-thumbs group" data-fancybox-group="menu-gallery" href="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$g['file'])); ?>">
                                            <img src="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$g['file'])); ?>" class="res-photo-thumbnail thumb-load margin0 ui red card image">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>