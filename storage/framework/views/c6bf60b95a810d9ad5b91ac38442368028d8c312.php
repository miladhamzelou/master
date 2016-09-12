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
                                    <a onclick="Admin.changeEnum(this, event)" data-field="approve"  data-status="<?php echo e($value['approve']); ?>" href="<?php echo e(url(getCurrentURL('controller').'/changeEnum/' . $value['id'])); ?>"><span class="fa <?php if($value['approve']): ?> fa-check-circle text-success <?php else: ?> fa-minus-circle text-danger <?php endif; ?>"></span></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div  style="padding-bottom: 0;margin-bottom: 0" class="photosContainer parentPhotoBox mtop0 mbot0 thumbsContainer">
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach($value['gallery'] as $gal): ?>
                                <div  class="col-md-2 no-padding-right">
                                    <a data-fancybox-group="review-gallery-<?php echo e($value['id']); ?>"  class="group res-photo-thumbnail" href="<?php echo e(asset('images/restaurant/'.$value['restaurant_id'].'/'.$gal['file'])); ?>">
                                        <img class="img-thumbnail" height="150" width="150"  src="<?php echo e(asset('images/restaurant/'.$value['restaurant_id'].'/'.$gal['file'])); ?>" style="display: inline-block;margin-left: 5px;margin-bottom: 15px;">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('public.Close')); ?></button>
            </div>
        </div>
    </div>
</div>