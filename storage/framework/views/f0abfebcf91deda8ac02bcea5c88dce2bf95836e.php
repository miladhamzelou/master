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
                    <tr>
                        <td><b>شهرها</b></td>
                        <td>
                            <?php foreach($value['place'] as $city): ?>
                                <b style="background-color: #6de1ff;color: #ffffff;padding: 2px 7px;"><?php echo e($city['name']); ?></b>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>تگ ها</b></td>
                        <td>
                            <?php foreach($value['tag'] as $tag): ?>
                                <b style="background-color: #6de1ff;color: #ffffff;padding: 2px 7px;"><?php echo e($tag['title']); ?></b>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                        <tr>
                            <td><b>رستوران ها</b></td>
                            <td>
                                <?php foreach($value['restaurant'] as $res): ?>
                                    <b style="background-color: #6de1ff;color: #ffffff;padding: 2px 7px;"><?php echo e($res['title']); ?></b>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                </table>
                <?php if($value['img']): ?>
                    <img class="img-thumbnail" src="<?php echo e(asset('images/collection/'.$value['img'])); ?>" >
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('public.Close')); ?></button>
            </div>
        </div>
    </div>
</div>