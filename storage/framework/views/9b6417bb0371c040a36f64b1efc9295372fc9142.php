<?php if(count($entity) > 0): ?>
    <div class="table-responsive">
        <div class="text-left">
            <?php echo e($entity->links()); ?>

        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <?php foreach(ftArray(config('app.bundle'), lcfirst(config('app.controller')) , 'list') as $cnf): ?>
                    <?php if(!@$cnf['show_page']): ?>
                        <th><a <?php if(@$cnf['sort']): ?> data-sort="DESC" class="has-sort" href="<?php echo e(url(getCurrentURL('controller').'/'.config('app.action'))); ?>" onclick="Admin.sort(event, this)" <?php endif; ?> data-field="<?php echo e(@$cnf['data-field']); ?>"><?php if(@$cnf['trans'] == 'default' || !@$cnf['trans']): ?> <?php echo e(trans(lcfirst(config('app.controller')).'.'.@$cnf['text'])); ?> <?php elseif(@$cnf['trans']): ?> <?php echo e(trans(@$cnf['trans'] . '.' . @$cnf['text'])); ?> <?php else: ?> <?php echo e(trans('public' . '.' . @$cnf['text'])); ?> <?php endif; ?></a></th>
                    <?php endif; ?>
                <?php endforeach; ?>
                <th class="last-left"><?php echo e(trans('public.Action')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($entity as $key => $value): ?>
                <tr>
                    <?php foreach(ftArray(config('app.bundle'), lcfirst(config('app.controller')) , 'list') as $cnf): ?>
                        <?php if(!@$cnf['show_page']): ?>
                            <?php if(@$cnf['custom_value'] && !@$cnf['join']): ?>
                                <td><?php echo e($cnf['custom_value']); ?></td>
                            <?php elseif(@$cnf['join']): ?>
                                <td><?php echo e(eval($cnf['custom_value'])); ?></td>
                            <?php elseif(@$cnf['db_field']): ?>
                                <?php if(@$cnf['type'] == 'date' && config('app.dir') == 'rtl'): ?>
                                    <td><?php echo e(FarsiLib::g2jdate(@$value[$cnf['db_field']])); ?></td>
                                <?php elseif(@$cnf['type'] == 'text'): ?>
                                    <td><?php echo e(str_limit(@$value[$cnf['db_field']], @$cnf['count'] ? @$cnf['count'] : 15 )); ?></td>
                                <?php else: ?>
                                    <td><?php echo e(@$value[$cnf['db_field']]); ?></td>
                                <?php endif; ?>
                            <?php else: ?>
                                <td><a onclick="Admin.changeEnum(this, event)" data-field="approve" data-status="<?php echo e($value['approve']); ?>" href="<?php echo e(url(getCurrentURL('controller').'/changeEnum/' . $value['id'])); ?>"><span class="fa <?php if($value['approve']): ?> fa-check-circle text-success <?php else: ?> fa-minus-circle text-danger <?php endif; ?>"></span></a></td>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td class="table-action">
                        <a href="<?php echo e(url(getCurrentURL('controller').'/destroy/' . $value['id'] )); ?>"  onclick="Admin.delete(this,event)"><span class="fa fa fa-trash-o"></span></a>
                        <a href="<?php echo e(url(getCurrentURL('controller').'/show/' . $value['id'] )); ?>"  onclick="Admin.show(this, event)"><span class="fa fa-tv"></span></a>
<?php /*                        <a href="<?php echo e(url(getCurrentURL('controller').'/edit/' . $value['id'] )); ?>"><span class="fa fa-pencil"></span></a>*/ ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <?php echo e($entity->links()); ?>

        </div>
    </div>
<?php else: ?>
    <div class="alert alert-info">
        <p><?php echo e(trans('public.Record Not Found')); ?></p>
    </div>
<?php endif; ?>