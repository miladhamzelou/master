<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a aria-hidden="true" data-dismiss="modal" class="close" type="button">×</a>
                <h4 class="modal-title"><?php echo e(trans('public.Show Record')); ?></h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <?php foreach(ftArray(config('app.bundle'), lcfirst(config('app.controller')) , 'list') as $cnf): ?>
                        <tr>
                            <td width="20%"><b><?php if(@$cnf['trans'] == 'default' || !@$cnf['trans']): ?> <?php echo e(trans(lcfirst(config('app.controller')).'.'.@$cnf['text'])); ?> <?php elseif(@$cnf['trans']): ?> <?php echo e(trans(@$cnf['trans'] . '.' . @$cnf['text'])); ?> <?php else: ?> <?php echo e(trans('public' . '.' . @$cnf['text'])); ?> <?php endif; ?>:</b></td>
                            <td>
                                <?php if(@$cnf['custom_value'] && !@$cnf['join']): ?>
                                    <?php echo e($cnf['custom_value']); ?>

                                <?php elseif(@$cnf['join']): ?>
                                    <?php echo e(eval($cnf['custom_value'])); ?>

                                <?php elseif(@$cnf['db_field']): ?>
                                    <?php if(@$cnf['type'] == 'date' && config('app.dir') == 'rtl'): ?>
                                        <?php echo e(FarsiLib::g2jdate($value[$cnf['db_field']])); ?>

                                    <?php elseif(@$cnf['type'] == 'text'): ?>
                                        <p style="text-align: justify"><?php echo e(@$value[$cnf['db_field']]); ?></p>
                                    <?php else: ?>
                                        <?php echo e(@$value[$cnf['db_field']]); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($cnf['data-field'] == 'approve'): ?>
                                        <a onclick="Admin.changeEnum(this, event)" data-field="approve" data-status="<?php echo e($value['approve']); ?>" href="<?php echo e(url(getCurrentURL('controller').'/changeEnum/' . $value['id'])); ?>"><span class="fa <?php if($value['approve']): ?> fa-check-circle text-success <?php else: ?> fa-minus-circle text-danger <?php endif; ?>"></span></a>
                                    <?php else: ?>
                                        <a onclick="Admin.changeEnum(this, event)" data-field="is_closed" data-status="<?php echo e($value['is_closed']); ?>" href="<?php echo e(url(getCurrentURL('controller').'/changeEnum/' . $value['id'])); ?>"><span class="fa <?php if($value['is_closed']==0): ?> fa-check-circle text-success <?php else: ?> fa-minus-circle text-danger <?php endif; ?>"></span></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>تگ ها</td>
                        <td>
                        <?php foreach($value['tag'] as $tag): ?>
                            <b style="background-color: #6de1ff;color: #ffffff;padding: 2px 7px;"><?php echo e($tag['title']); ?></b>
                        <?php endforeach; ?>
                        </td>
                    </tr>
                        <tr>
                            <td>hاپشن ها</td>
                            <td>
                                <?php foreach($value['option'] as $tag): ?>
                                    <b style="background-color: #6de1ff;color: #ffffff;padding: 2px 7px;"><?php echo e($tag['title']); ?></b>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>اپشن ها</td>
                            <td></td>
                        </tr>
                    <tr>
                        <td>موقعیت:</td>
                        <td><?php echo e($value['city']['province']['name'] . ' ' . $value['city']['name'] . ' ' .$value['region']['name'] . ' ' . $value['neighbourhood']['name']); ?></td>
                    </tr>
                </table>
                <?php if($value['img']): ?>
                    <img class="img-thumbnail" height="200" width="200" src="<?php echo e(asset('images/restaurant/'.$value['id'].'/'.$value['img'])); ?>"><br>
                <?php endif; ?>
                <?php if($value['gallery']): ?>
                    <?php foreach($value['gallery'] as $gal): ?>
                        <img class="img-thumbnail" style="margin: 5px 0 5px 10px;" height="200" width="200" src="<?php echo e(asset('images/restaurant/'.$value['id'].'/'.$gal['file'])); ?>">
                    <?php endforeach; ?>
                <?php endif; ?>
                <div style="height: 400px;margin:45px 0 15px 0" id="map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('public.Close')); ?></button>
            </div>
        </div>
    </div>
</div>
    <script>

    function initMap() {
        var myLatLng = {lat: <?php echo $value['lat']; ?>, lng: <?php echo $value['lng']; ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPNmj_sp-6Pho65Tveca7mOcttBBbr-OU&callback=initMap"></script>