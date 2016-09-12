<div class="col-s-16 search-start plr15 col-l-8 left" id="search-start" style="padding-left: 0">
    <div class="row">
        <?php if(count($list) > 0): ?>
        <div class="col-s-16s search_results mbot">
            <section id="search-results-container" class="clearfix">
                <div class="orig-search-list-container">
                    <div id="orig-search-list" class="ui cards">
                        <?php foreach($list as $res): ?>
                                <div class="card search-snippet-card search-card ">
                                    <div class="content">
                                        <div class="js-search-result-li even  status 1" >
                                            <article class="search-result  first">
                                                <div class="pos-relative clearfix">
                                                    <div class="row">
                                                        <div class="col-s-6 col-m-4 right">
                                                            <div class="search_left_featured clearfix">
                                                                <a href="<?php echo e(url('restaurant/'.$res['id'])); ?>" class="feat-img" style="display: block; background-image: url(<?php echo e(asset('images/restaurant/'. ($res['img'] ? $res['id'].'/'.$res['img'] : 'restaurant.jpg'))); ?>);background-size: cover !important;display: block;height: 90px"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-s-16  col-m-12  pl0 ">
                                                            <div class="row">
                                                                <div class="col-s-12 right">
                                                                    <a class="result-title hover_feedback zred bold ln24   fontsize0 " href="<?php echo e(url('restaurant/'.$res['id'])); ?>" >
                                                                        <?php echo e($res['title']); ?>

                                                                    </a>
                                                                    <div class="clear"></div>
                                                                    <a class="ln24 search-page-text mr10 zblack search_result_subzone right" href="<?php echo e(url('restaurant-type/'.$res['type']['id'])); ?>" title="Restaurants in Salwa Road">
                                                                        <b><?php echo e($res['type']['title']); ?></b>
                                                                    </a>
                                                                </div>
                                                                <div class="left floating search_result_rating col-s-3 clearfix" style="line-height: 14px;">
                                                                    <div  class="rating-popup rating-for-6200419 res-rating-nf right level-6 bold">
                                                                        <?php echo e($res['rate']); ?>

                                                                    </div>
                                                                    <div class="clear mb5"></div>
                                                                    <a href="<?php echo e(url('restaurant/'.$res['id'].'/review')); ?>" class="result-reviews search-result-reviews right fontsize5 grey-text">
                                                                        <?php echo e($res['restaurantExtra']['review'] ? $res['restaurantExtra']['review']  : 'بدون '); ?> نقد
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div style=" max-width:370px; " class="col-m-16 search-result-address grey-text nowrap ln22 right">
                                                                    <?php echo e($res['heading']); ?>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div style=" max-width:370px; " class="col-m-16 search-result-address grey-text nowrap ln22 right">
                                                                    <?php echo e(str_limit($res['content'],50)); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ui divider"></div>
                                                <div class="search-page-text clearfix row">
                                                    <div class="clearfix">
                                                        <span class="col-s-5 col-m-4 ttupper fontsize5 grey-text right text-center">شماره تماس: </span>
                                                        <span class="col-s-11 col-m-12 nowrap  pl0"><b><?php echo e($res['tel']); ?></b></span>
                                                    </div>
                                                    <div class="res-cost clearfix">
                                                        <span class="col-s-5 col-m-4 ttupper fontsize5 grey-text right text-center">ارسال پیامک:</span>
                                                        <span class="col-s-11 col-m-12 pl0"><b><?php echo e($res['sms']); ?></b></span>
                                                    </div>
                                                    <div class="res-timing clearfix" title="24 Hours">
                                                        <span class="col-s-5 col-m-4 ttupper   fontsize5  grey-text right text-center">ساعت کاری:</span>
                                                        <div class="col-s-11 col-m-12 pl0 search-grid-right-text right">
                                                            <b><?php echo e($res['working_hour']); ?></b>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="ui two item menu search-result-action mt0">
                                        <a class="item result-menu" href="<?php echo e(url('restaurant/'.$res['id'].'/menu')); ?>" style="border-left: 1px solid #e7e7e7;">
                                            <span class="zdark fontsize4 bold">منوی رستوران</span>
                                        </a>
                                        <a href="<?php echo e(url('restaurant/'.$res['id'])); ?>" class="item res-snippet-ph-info">
                                            <span  class="zdark fontsize4 bold">صفحه رستوران</span>
                                        </a>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-l-12">
                        <?php echo e($list->links()); ?>

                    </div>
                </div>
            </section>
        </div>
        <?php else: ?>
            <div class="panel">
                <div class="panel-body">
                    <h2 style="text-align: center;">رستورانی با این لینک وجود ندارد.</h2>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>