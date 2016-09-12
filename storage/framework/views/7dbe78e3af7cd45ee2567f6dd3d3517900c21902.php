<div class=" restab_wrap" style=" min-height: 549px;">
    <div id="tabtop" class="tabcontent-wrapper brstd  maps ">
        <div class="ui segment map_container" style="position:relative; overflow:hidden;">
            <div class="mbot0">
                <h2>آدرس رستوران به روی نقشه</h2>
            </div>
            <div class="mbot">
                <p style="font-size: 12px;color: darkgray"><?php echo e($res['address']); ?></p>
            </div>
            <div id="dm-map-canvas" style="height: 350px; position: relative;" class="mtop0 leaflet-container leaflet-fade-anim" tabindex="0"></div>
        </div>
    </div>
</div>
<script>
    function initMap() {
        var myLatLng = {lat: <?php echo e($res['lat']); ?>, lng: <?php echo e($res['lng']); ?>};

        var map = new google.maps.Map(document.getElementById('dm-map-canvas'), {
            zoom: 17,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }
</script>
