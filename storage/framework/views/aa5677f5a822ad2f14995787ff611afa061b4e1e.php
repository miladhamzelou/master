<?php $__env->startSection('title'); ?>
    کالکشن ها,منطقه ها و محله های شهر <?php echo e($city['name']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.zone.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="wrapper mtop2">
        <h2 class="ui header">
            <span class="segment_heading">کالکشن</span>
            <span class="sub header">
                <span class="segment_sub_heading">
                    لیستی از کالکشن ها برای دسترسی آسان به رستوران ها در شهر <?php echo e($city['name']); ?>

                </span>
            </span>
        </h2>
        <div class="collections-grid row">
            <?php foreach($collection as $col): ?>
                <div class="col-md-4 mbot right">
                    <div class="ui fluid card">
                        <a href="<?php echo e(url('RestaurantFilter/'.str_replace(' ','-',$city['name']).'/'.$col['id'])); ?>">
                            <div class="row">
                                <div class="col-s-7">
                                    <div  class="collection-box-bg"  style="display: block; background-image: url(<?php echo e(asset('images/restaurant-filter/'.($col['img'] ? $col['img'] : 'default.png'))); ?>); background-position: center center;"></div>
                                </div>
                                <div class="col-s-9">
                                    <div class="row">
                                        <div class="ptop0 mr20 ml5 coll_detail">
                                            <div class="heading bold ln20">
                                                <?php echo e($col['title']); ?>

                                            </div>
                                            <div class="zblack fontsize4 description mt5  hp "><?php echo e($col['desc']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-md-4 mbot right">
                <div class="ui fluid card ta-center" style="height: 120px;">
                    <a href="<?php echo e(url('collections/'.str_replace(' ','-',$city['name']))); ?>" style="display: block; height: 100%;">
                        <div style="margin: 10px auto 0px auto;">
                            <img src="https://b.zmtcdn.com/images/icons/collections.png?output-format=webp" style="width: 60px; height: 60px;">
                        </div>
                        <p class="zred" style="padding: 10px;">کالکشن های <?php echo e($city['name']); ?></p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper mtop2">
        <?php if($city): ?>
            <?php if(count($city['region']) > 0): ?>
                <h2 class="ui header">
                    مناطق و محله های شهر <?php echo e($city['name']); ?>

                    <span class="sub header">جستجوی رستوران براساس منطقه بندی</span>
                </h2>
                <?php if( $city['code_map']): ?>
                    <div style="height: 400px;margin:5px 0 0 0" id="map-region"></div>
                    <div class="hidden" id="floating-panel">
                        <input id="address" type="textbox" value="<?php echo e($city['name']); ?>">
                    </div>
                    <script>
                        var map;
                        function initMap() {
                            map = new google.maps.Map(document.getElementById('map-region'), {
                                zoom:11,
                                center: {lat: 35.7435653,lng:51.6037373},
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });
                            var geocoder = new google.maps.Geocoder();

                            geocodeAddress(geocoder, map);

                            var infoWindow  = new google.maps.InfoWindow();

                            // Define the LatLng coordinates for the polygon.
                            <?php echo $city['code_map']; ?>


                            // Construct the polygon.
                            for (i=0;i<coords.length;i++ ){
                                var bermudaTriangle = new google.maps.Polygon({
                                    paths: coords[i],
                                    strokeColor: '#FF0000',
                                    strokeOpacity: 0.8,
                                    strokeWeight: 3,
                                    fillColor: '#FF0000',
                                    fillOpacity: 0.35
                                });
                                bermudaTriangle.setMap(map);
                                // Add a listener for the click event.
                                bermudaTriangle.addListener('click', (function(i){
                                    return function (event)
                                    {
                                        infoWindow.setContent(content[i]);
                                        infoWindow.setPosition(event.latLng);
                                        infoWindow.open(map);
                                    }
                                })(i));

                            }
                        }
                        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                        function geocodeAddress(geocoder, resultsMap) {
                            var address = document.getElementById('address').value;
                            geocoder.geocode({'address': address}, function(results, status) {
                                if (status === 'OK') {
                                    resultsMap.setCenter(results[0].geometry.location);
                                    var marker = new google.maps.Marker({
                                        map: resultsMap,
                                        icon:image,
                                        position: results[0].geometry.location
                                    });
                                } else {
                                    alert('Geocode was not successful for the following reason: ' + status);
                                }
                            });
                        }
                    </script>
                <?php endif; ?>
                <?php foreach($city['region'] as $region): ?>
                    <div class="mtop">
                        <div class="mtop ptop0 mbot0">
                            <h4 class="ttupper">
                                <a href="<?php echo e(url('Region-Restaurant-List/'.str_replace(' ','-',trim($city['name'])).'/'.str_replace(' ','-',trim($region['name'])))); ?>"><?php echo e($region['name']); ?></a>
                            </h4>
                        </div>
                        <ul class="row">
                            <?php foreach($region['neighbourhood'] as $neigh): ?>
                                <li class="col-l-4 mbot right">
                                    <div class="ui segment">
                                        <i class="fa fa-angle-left"></i>
                                        <a href="<?php echo e(url('Neighbourhood-Restaurant-List/'.str_replace(' ','-',trim($city['name'])).'/'.str_replace(' ','-',trim($region['name'])).'/'.str_replace(' ','-',trim($neigh['name'])))); ?>"><?php echo e($neigh['name']); ?></a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </section>
    <section class="wrapper mtop2 ptop" style="margin-bottom: 25px;">
        <h2 class="ui header">
            <span class="segment_heading">جستجوی سریع</span>
        <span class="sub header">
            <span class="segment_sub_heading">
                جستجوی رستوران ها براساس نوع در <?php echo e($city['name']); ?>

            </span>
        </span>
        </h2>
        <div class="ui segment eight column doubling padded grid">
            <?php foreach($types as $item): ?>
                <a href="<?php echo e(url('restaurant-list/'.$city['id'].'/'.$item['id'])); ?>" class="column ta-center start-categories-item">
                    <img class="ui middle aligned mini image mb5" src="<?php echo e(asset('images/restaurant-type/'. ($item['img'] ? $item['img'] : 'default.png'))); ?>" style="height: 48px; width: 48px; display: inline-block;">
                    <div><?php echo e($item['title']); ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
    <?php echo $__env->make('home.zone.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>