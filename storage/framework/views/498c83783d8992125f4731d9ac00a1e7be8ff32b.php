<?php $__env->startSection('title'); ?> رستوران های <?php echo e($currentType['title']); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.zone.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section>
        <div id="mainframe" class="wrapper">
            <?php if($restaurant): ?>
                <div style="height: 400px;margin:15px 0 15px 0" id="map"></div>
                <script>
                    $().ready(function(){
                        initializeMap();
                        var map;
                        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                        function initializeMap() {
                            var locations = <?php echo $restaurant; ?>;

                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 7,
                                center: new google.maps.LatLng(35.780567,51.3732961),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            var infowindow = new google.maps.InfoWindow();

                            var marker, i;

                            for (i = 0; i < locations.length; i++) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    map: map
                                });

                                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                        infowindow.setContent(locations[i][0]);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                            }
                        }
                    });
                </script>
            <?php endif; ?>
            <div class="row">
                <div class="col-l-16">
                    <div class="row">
                        <div class="mt10">
                            <?php echo $__env->make('restaurantBundle.restaurantType.home.sidebar-left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('restaurantBundle.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('restaurantBundle.restaurantType.home.sidebar-right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>