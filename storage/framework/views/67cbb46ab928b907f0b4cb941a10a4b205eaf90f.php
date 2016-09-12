<?php $__env->startSection('title'); ?> رستوران های  <?php echo e(@$currentType['title']); ?> در شهر <?php echo e($currentCity['name']); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.zone.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section>
        <div id="mainframe" class="wrapper">
            <?php if($restaurant): ?>
                <div style="height: 400px;margin:15px 0 15px 0" id="map"></div>
                <div class="hidden" id="floating-panel">
                    <input id="address" type="textbox" value="<?php echo e($city['name']); ?>">
                </div>
                <script>
                    $().ready(function(){
                        initializeMap();
                        var map;
                        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                        function initializeMap() {
                            var locations = <?php echo $restaurant; ?>;

                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 11,
                                center: new google.maps.LatLng(35.780567,51.3732961),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });
                            var geocoder = new google.maps.Geocoder();

                            geocodeAddress(geocoder, map);

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
                    });
                </script>
            <?php endif; ?>
            <?php if($city['region']): ?>
                <div style="height: 400px;" id="map-region"></div>
                <div class="hidden" id="floating-panel">
                    <input id="address" type="textbox" value="<?php echo e($city['name']); ?>">
                </div>
                <script>
                    var map;
                    function initMap() {
                        map = new google.maps.Map(document.getElementById('map-region'), {
                            zoom: 10,
                            center: {lat: 35.7435653,lng:51.6037373},
                            mapTypeId: 'terrain'
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
            <div class="row">
                <div class="col-l-16">
                    <div class="row">
                        <div class="mt10">
                            <?php echo $__env->make('restaurantBundle.sidebar-left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('restaurantBundle.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('restaurantBundle.sidebar-right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>