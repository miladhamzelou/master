<div class="panel">
    <div class="panel-body" style="min-height: 500px;">
        <form method="POST" action="<?php echo e(url(getCurrentURL('localization').'/user/'.$info['username'].'/createRestaurant/'.$res['id'])); ?>" enctype="multipart/form-data" novalidate="novalidate">
            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group<?php echo e($errors->has('frm.restaurant.title') ? ' has-error' : ''); ?> col-md-6">
                <label for="title" class="control-label required">عنوان:</label>
                <input value="<?php echo e($res['title']); ?>" class="form-control" name="frm[restaurant][title]" required="required" type="text" id="title">
            </div>
            <div class="form-group<?php echo e($errors->has('frm.restaurant.heading') ? ' has-error' : ''); ?> col-md-6">
                <label for="heading" class="control-label required">سر تیتر:</label>
                <input value="<?php echo e($res['heading']); ?>" class="form-control" name="frm[restaurant][heading]" required="required" type="text" id="heading">
            </div>
            <div class="form-group col-md-3">
                <label for="is_closed" class="control-label">وضعیت:</label>
                <select class="form-control" id="is_closed" name="frm[restaurant][is_closed]">
                    <option value="">انتخاب</option>
                    <option value="0" <?php if($res['is_closed'] == 0): ?> selected="selected" <?php endif; ?>>باز</option>
                    <option value="1" <?php if($res['is_closed'] == 1): ?> selected="selected" <?php endif; ?>>بسته</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="tel" class="control-label">تلفن:</label>
                <input value="<?php echo e($res['tel']); ?>" class="text-left form-control en-font" name="frm[restaurant][tel]" type="text" id="tel">
            </div>
            <div class="form-group col-md-3">
                <label for="sms" class="control-label">پیامک:</label>
                <input value="<?php echo e($res['sms']); ?>" class="text-left form-control en-font" name="frm[restaurant][sms]" type="text" id="sms">
            </div>
            <div class="form-group col-md-3">
                <label for="website" class="control-label">وبسایت:</label>
                <input value="<?php echo e($res['website']); ?>" class="text-left form-control en-font" name="frm[restaurant][website]" type="text" id="website">
            </div>
            <div class="form-group col-md-4">
                <label for="tel" class="control-label">ساعت کاری:</label>
                <input value="<?php echo e($res['working_hour']); ?>" class="form-control" name="frm[restaurant][working_hour]" type="text" id="tel">
            </div>
            <div class="form-group col-md-4">
                <label for="sms" class="control-label">نام مدیر:</label>
                <input value="<?php echo e($res['admin_name']); ?>" class="form-control" name="frm[restaurant][admin_name]" type="text" id="sms">
            </div>
            <div class="form-group col-md-4">
                <label for="website" class="control-label">موبایل مدیر:</label>
                <input value="<?php echo e($res['admin_mobile']); ?>" class="text-left form-control en-font" name="frm[restaurant][admin_mobile]" type="text" id="website">
            </div>
            <div class="form-group<?php echo e($errors->has('frm.restaurant.content') ? ' has-error' : ''); ?> col-md-12">
                <label for="content" class="control-label required">محتوا:</label>
                <textarea  class="form-control" name="frm[restaurant][content]" required="required" cols="50" rows="10" id="content"><?php echo e($res['content']); ?></textarea>
            </div>
            <div class="form-group<?php echo e($errors->has('frm.restaurant.type_id') ? ' has-error' : ''); ?> col-md-12">
                <label for="keywords" class="control-label required">نوع رستوران:</label>
                <select class="form-control js-example-basic-multiple" name="frm[restaurant][type_id]" multiple>
                    <option value="">انتخاب</option>
                    <?php foreach($type as $t): ?>
                        <option <?php foreach($res['category'] as $cat): ?> <?php if($cat['id'] == $t['id']): ?> selected <?php endif; ?> <?php endforeach; ?> value="<?php echo e($t['id']); ?>"><?php echo e($t['title']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group<?php echo e($errors->has('frm.tag') ? ' has-error' : ''); ?> col-md-12">
                <label for="keywords" class="control-label required">کلمات کلیدی:</label>
                <select name="frm[tag][]" class="form-control js-example-basic-multiple" multiple >
                    <option value="">انتخاب</option>
                    <?php foreach($tag as $t): ?>
                        <option <?php foreach(@$res['tag'] as $tags): ?>  <?php if($t['id'] == $tags['id']): ?> selected <?php endif; ?> <?php endforeach; ?> value="<?php echo e($t['id']); ?>"><?php echo e($t['title']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="keywords" class="control-label required">اپشن های رستوران:</label>
                <select name="frm[option][]" class="form-control js-example-basic-multiple" multiple >
                    <option value="">انتخاب</option>
                    <?php foreach($option as $opt): ?>
                        <option <?php foreach($res['option'] as $options): ?>  <?php if($opt['id'] == $options['id']): ?> selected <?php endif; ?> <?php endforeach; ?> value="<?php echo e($opt['id']); ?>"><?php echo e($opt['title']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group<?php echo e($errors->has('frm.restaurant.province_id') ? ' has-error' : ''); ?> col-md-3">
                <label for="is_closed" class="control-label">استان:</label>
                <select data-select class="form-control event-listener"  data-result="city" name="frm[restaurant][province_id]" id="province">
                    <option value="">انتخاب</option>
                    <?php foreach($province as $p): ?>
                        <option <?php if($res['province_id'] == $p['id']): ?> selected <?php endif; ?> value="<?php echo e($p['id']); ?>"><?php echo e($p['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group<?php echo e($errors->has('frm.restaurant.city_id') ? ' has-error' : ''); ?> col-md-3">
                <label for="is_closed" class="control-label">شهر:</label>
                <select data-select class="form-control event-listener" name="frm[restaurant][city_id]" data-result="region" id="city">
                    <?php if($res['city_id']): ?>
                        <?php foreach($city as $c): ?>
                            <?php if($res['city_id'] == $c['id']): ?>
                                <option  value="<?php echo e($c['id']); ?>"><?php echo e($c['name']); ?></option>
                                <?php break; ?>;
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group<?php echo e($errors->has('frm.restaurant.region_id') ? ' has-error' : ''); ?> col-md-3">
                <label for="is_closed" class="control-label">منطقه:</label>
                <select data-select class="form-control event-listener" name="frm[restaurant][region_id]" data-result="neighbourhood" id="region">
                    <?php if($res['region_id']): ?>
                        <?php foreach($region as $c): ?>
                            <?php if($res['region_id'] == $c['id']): ?>
                                <option  value="<?php echo e($c['id']); ?>"><?php echo e($c['name']); ?></option>
                                <?php break; ?>;
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group<?php echo e($errors->has('frm.restaurant.neighbourhood_id') ? ' has-error' : ''); ?> col-md-3">
                <label for="is_closed" class="control-label">محله:</label>
                <select data-select class="form-control" name="frm[restaurant][neighbourhood_id]" id="neighbourhood">
                    <?php if($res['neighbourhood_id']): ?>
                        <?php foreach($neighbourhood as $c): ?>
                            <?php if($res['neighbourhood_id'] == $c['id']): ?>
                                <option  value="<?php echo e($c['id']); ?>"><?php echo e($c['name']); ?></option>
                                <?php break; ?>;
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="content" class="control-label required">آدرس:</label>
                <textarea  class="form-control" name="frm[restaurant][address]" required="required" cols="50" rows="10" id="content"><?php echo e($res['address']); ?></textarea>
            </div>
            <div class="form-group col-md-12">
                <label for="content" class="control-label required">مشخص کردن آدرس از روی نقشه:</label>
                <div id="map"></div>
            </div>
            <div class="form-group col-md-12">
                <label for="content" class="control-label required">آپلود عکس:</label>
                <input type="file" data-res="show-image" name="img" class="form-control image-uploader">
            </div>
            <div class="show-image">
                <?php if(file_exists(public_path().'/images/restaurant/'.$res['id'].'/'.$res['img']) && $res['img']): ?>
                    <span class="gi">
                <img style='margin-left: 10px;margin-bottom: 10px;' height='150' width='150' class='img-thumbnail' src="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$res['img'])); ?>">
                <a href="<?php echo e(url(getCurrentURL('localization').'/user/'.$info['username'].'/deletePhoto')); ?>" class="delete-image" data-id="<?php echo e($res['id']); ?>" style="font-size: 25px;color: #fff;position: relative;top: 0px;left: 100px;cursor: pointer">
                    <span class="fa fa-trash"></span>
                </a>
                      </span>
                <?php endif; ?>
            </div>
            <div class="form-group col-md-12">
                <label for="content" class="control-label required">گالری تصاویر:</label>
                <input type="file" data-res="show-image-gallery" name="gallery[]" class="form-control image-uploader" multiple>
            </div>
            <div class="show-image-gallery">
                <?php foreach($res['gallery'] as $gal): ?>
                    <span class="gi">
                    <img style='margin-left: 10px;margin-bottom: 10px;' height='150' width='150' class='img-thumbnail' src="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$gal['file'])); ?>">
                    <a href="<?php echo e(url(getCurrentURL('localization').'/user/'.$info['username'].'/deletePhotoGallery')); ?>" class="delete-image-gallery" data-id="<?php echo e($gal['id']); ?>" style="font-size: 25px;color: #fff;position: relative;top: 0px;left: 100px;cursor: pointer">
                        <span class="fa fa-trash"></span>
                    </a>
                </span>
                <?php endforeach; ?>
            </div>
            <div class="form-group col-md-12">
                <label for="content" class="control-label required">آپلود منو:</label>
                <input type="file" data-res="show-image-gallery" name="menu[]" class="form-control image-uploader" multiple>
            </div>
            <div class="show-image-gallery">
                <?php foreach($res['menu'] as $gal): ?>
                    <?php foreach($gal['gallery'] as $gal): ?>
                    <span class="gi">
                    <img style='margin-left: 10px;margin-bottom: 10px;' height='150' width='150' class='img-thumbnail' src="<?php echo e(asset('images/restaurant/'.$res['id'].'/'.$gal['file'])); ?>">
                    <a href="<?php echo e(url(getCurrentURL('localization').'/user/'.$info['username'].'/deletePhotoMenu')); ?>" class="delete-image-gallery" data-id="<?php echo e($gal['id']); ?>" style="font-size: 25px;color: #fff;position: relative;top: 0px;left: 100px;cursor: pointer">
                        <span class="fa fa-trash"></span>
                    </a>
                </span>
                <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
            <input type="hidden" id="lat" value="<?php echo e($res['lat']); ?>" name="frm[restaurant][lat]">
            <input type="hidden" id="lng" value="<?php echo e($res['lng']); ?>" name="frm[restaurant][lng]">
            <div class="form-group col-md-12">
                <button class="pull-left" type="submit">ثبت رستوران</button>
            </div>
        </form>
    </div>
</div>
<script>
    $('.image-uploader,.image-uploader-gallery').change(function(event){
        var total_file=event.target.files.length;
        for(var i=0;i<total_file;i++)
        {
            $('.'+$(this).attr('data-res')).append("<img style='margin-left: 10px;margin-bottom: 10px;' height='150' width='150' class='img-thumbnail' src='"+URL.createObjectURL(event.target.files[i])+"'>");
        }
    })
</script>
<style>
    #map {
        height: 300px;
    }
    #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
    }
</style>
<script>
    $('.delete-image-gallery').click(function(e){
        e.preventDefault();
        var obj = $(this);
        var url = $(this).attr('href');
        var gallery_id = $(this).attr('data-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data : { 'gallery_id' :gallery_id},
            success: function(response){
                obj.closest('span.gi').fadeOut('slow');
            }
        });
    });
    $('.delete-image').click(function(e){
        e.preventDefault();
        var obj = $(this);
        var url = $(this).attr('href');
        var gallery_id = $(this).attr('data-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data : { 'r_id' :gallery_id},
            success: function(response){
                obj.closest('span.gi').fadeOut('slow');
            }
        });
    })
</script>
<script>
    var map;
    var markers = [];
    function initMap() {
        var tehran = {lat: 35.7087565,lng:51.2618922};
        var lat = $('#lat').val();
        var lng = $('#lng').val();
        var old = {lat: parseFloat(lat) ,lng: parseFloat(lng)};
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: tehran,
            mapTypeId: 'terrain'
        });
        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function(event) {
            deleteMarkers();
            addMarker(event.latLng);
        });
        addMarker(old);
    }
    // Adds a marker to the map and push to the array.
    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markers.push(marker);
        $('#lat').val(location.lat());
        $('#lng').val(location.lng());
    }
    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }
    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }
    // Shows any markers currently in the array.
    function showMarkers() {
        setMapOnAll(map);
    }
    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }
</script>
