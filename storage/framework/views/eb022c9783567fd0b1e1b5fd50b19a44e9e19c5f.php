<?php $__env->startSection('title'); ?>
    <?php echo e($collection['title']); ?> در <?php echo e($city['name']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.zone.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="wrapper mtop ">
        <div class="row">
            <div class="collections-page">
                <div class="collections_header col-l-16 " data-collection-id="1">
                    <div class="ui segment plr0i pt0">
                        <div id="progressive_image" class="header-img progressive_img" style="background-image : url( 'data:image/jpg;base64,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' ); background-size: cover; background-position:center; background-repeat:no-repeat; height:  290px; ">
                            <div class="progressive_img_loaded" style="opacity: 1; background-image: url(<?php echo e(asset('images/collection/'.$collection['img'])); ?>); background-size: cover; background-position: center center;">
                                <?php if(Auth::id() == $collection['user']['id']): ?>
                                    <div class="right relative pr15 pt15">
                                        <div class="left mr5">
                                            <a class="ui button user_collections_edit" id="edit-user-collection" data-city="<?php echo e($city['id']); ?>" data-href="<?php echo e(url('/user/'.$collection['user']['username'].'/editCollection/'.$collection['id'])); ?>">
                                                <span class="zblack">ویرایش</span>
                                            </a>
                                        </div>
                                        <div class="left">
                                            <a class="ui button user_collections_delete" href="<?php echo e(url('user/'.$collection['user']['username'].'/removeCollection/'.$collection['id'])); ?>">
                                                <span class="zblack">حذف کالکشن</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="ml15 mr15 mt15">
                            <div class="item">
                                <img class="ui avatar image left" src="<?php echo e(asset('images/users/'.($collection['user']['userInfo']['img'] ? $collection['user']['userInfo']['img'] : 'default'))); ?>">
                                <div class="content" style="position: relative;top: 7px;">
                                    <div class="left creator-name ml5">
                                        <a href="<?php echo e(url('user/'.$collection['user']['username'])); ?>"><?php echo e($collection['user']['username']); ?></a>
                                    </div>
                                </div>
                            </div>
                            <h1 class="hero_title collections_title mb5 mt5 "><?php echo e($collection['title']); ?> در <?php echo e($city['name']); ?></h1>
                            <div class="collection_description mb5 fontsize3"><?php echo e($collection['desc']); ?></div>
                            <div class="grey-text mb5"><?php echo e(count($collection['restaurant']) > 0 ? count($collection['restaurant']) : count($collection['tag'])); ?> مکان</div>
                            <div class="left mb5">
                                <a  <?php if(!Auth::check()): ?> href="<?php echo e(url('Auth/login')); ?>" <?php else: ?>
                                id="save-collection" data-status="<?php echo e(@$collectionStatus ? $check['id'] : 0); ?>" data-collection="<?php echo e($collection['id']); ?>" <?php endif; ?>
                                    class="ui basic large label ui-label-col app-tracker-link bookmark_btn act-wishlist-collections right <?php if(@$collectionStatus): ?> border-red <?php endif; ?>">
                                    <?php if(@$collectionStatus): ?>
                                        کالکشن ذخیره شده
                                    <?php else: ?>
                                        <span class="wishlist-text">ذخیره کالکشن</span>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <section class="section mtop pbot0">
                <div class="bb0 collections-grid col-l-16">
                    <div class="ui segment pb5">
                        <div class="row col-res-list">
                            <?php if(count($collection['restaurant']) > 0): ?>
                                <?php foreach($collection['restaurant'] as $res): ?>
                                    <div class="col-md-4 right">
                                        <div class="relative  top-res-box" style=" height:240px; ">
                                            <a href="<?php echo e(url('restaurant/'.$res['id'])); ?>" data-link-type="restaurant" class="relative top-res-box-bg pl10 ptop0" style="height: 150px; display: block; border-radius: 4px; background-image: url(<?php echo e(asset('images/restaurant/'. ($res['img'] ? $res['id'].'/'.$res['img'] : 'default.png'))); ?>); background-size: cover; background-position: center center;">
                                                <div  class="ads-res-snippet-rating-large  rating-for-6201976 level-6">
                                                    <?php echo e($res['rate']); ?>

                                                </div>
                                            </a>
                                            <div class="ptop0 pbot0">
                                                <a href="<?php echo e(url('restaurant/'.$res['id'])); ?>" class="jumbo_track_collections" data-link-type="restaurant">
                                                    <div class="res_title zblack bold " title="Indian Coffee House">
                                                        <?php echo e($res['title']); ?>

                                                    </div>
                                                </a>
                                                <a class="zone jumbo_track_collections" data-link-type="zone|restaurant" href="<?php echo e(url('restaurant/'.$res['id'])); ?>">
                                                    <div class="nowrap grey-text fontsize4"><?php echo e($res['heading']); ?></div>
                                                </a>
                                                <div class="nowrap grey-text">
                                                    <?php echo e(str_limit($res['content'],15)); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php foreach($collection['tag'] as $tag): ?>
                                    <?php foreach($tag['restaurant'] as $res): ?>
                                        <div class="col-md-4 right">
                                            <div class="relative  top-res-box" style=" height:240px; ">
                                                <a href="<?php echo e(url('restaurant/'.$res['id'])); ?>" data-link-type="restaurant" class="relative top-res-box-bg pl10 ptop0" style="height: 150px; display: block; border-radius: 4px; background-image: url(<?php echo e(asset('images/restaurant/'. ($res['img'] ? $res['id'].'/'.$res['img'] : 'default.png'))); ?>); background-size: cover; background-position: center center;">
                                                    <div  class="ads-res-snippet-rating-large  rating-for-6201976 level-6">
                                                        <?php echo e($res['rate']); ?>

                                                    </div>
                                                </a>
                                                <div class="ptop0 pbot0">
                                                    <a href="<?php echo e(url('restaurant/'.$res['id'])); ?>" class="jumbo_track_collections" data-link-type="restaurant">
                                                        <div class="res_title zblack bold " title="Indian Coffee House">
                                                            <?php echo e($res['title']); ?>

                                                        </div>
                                                    </a>
                                                    <a class="zone jumbo_track_collections" data-link-type="zone|restaurant" href="<?php echo e(url('restaurant/'.$res['id'])); ?>">
                                                        <div class="nowrap grey-text fontsize4"><?php echo e($res['heading']); ?></div>
                                                    </a>
                                                    <div class="nowrap grey-text">
                                                        <?php echo e(str_limit($res['content'],15)); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </section>
        </div>
    </div>
    <div style="display: none" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <a aria-hidden="true" data-dismiss="modal" class="close" type="button">×</a>
                    <h4 class="modal-title">ویرایش کالکشن</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="ajax-result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#edit-user-collection').click(function(e){
            e.preventDefault();
            var url = $(this).attr('data-href');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                data : {city_id : $(this).attr('data-city')},
                success: function(response){
                    $('#ajax-result').html(response);
                    $('#modal').show();
                    $('#modal').modal({
                        backdrop: 'static',
                        keyboard: true,
                    });
                    $('.js-example-basic-multiple').select2();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>