<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(trans('myclass.create new class')); ?>

                <span class="fa fa-chevron-left pull-left"></span>
            </h3>
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo e(getCurrentURL('controller').'/Store'); ?>">
                <input type="hidden" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group<?php echo e($errors->has('frm.myclass.title') ? ' has-error' : ''); ?>">
                    <label><?php echo e(trans('myclass.class name')); ?>:</label>
                    <input type="text" name="frm[myclass][title]" class="form-control" value="<?php echo e(old('frm.myclass.title')); ?>">
                </div>
                <div class="form-group<?php echo e($errors->has('frm.myclass.term_id') ? ' has-error' : ''); ?>">
                    <label><?php echo e(trans('myclass.term')); ?>:</label>
                    <select type="text" name="frm[myclass][term_id]" class="form-control">
                        <option value=""><?php echo e(trans('public.select')); ?>...</option>
                        <?php if(@$term): ?>
                            <?php foreach(@$term as $term): ?>
                                <option value="<?php echo e($term['id']); ?>"><?php echo e($term['title']); ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <?php /*<a id="add_row" class="fa fa-plus-square pull-left"></a>*/ ?>
                <?php /*<a id='delete_row' class="pull-left fa fa-trash"></a>*/ ?>
                            <?php /*<table class="table table-bordered table-hover" id="tab_logic">*/ ?>
                                <?php /*<thead>*/ ?>
                                <?php /*<tr >*/ ?>
                                    <?php /*<th class="text-center">*/ ?>
                                        <?php /*#*/ ?>
                                    <?php /*</th>*/ ?>
                                    <?php /*<th class="text-center">*/ ?>
                                        <?php /*Name*/ ?>
                                    <?php /*</th>*/ ?>
                                    <?php /*<th class="text-center">*/ ?>
                                        <?php /*Mail*/ ?>
                                    <?php /*</th>*/ ?>
                                    <?php /*<th class="text-center">*/ ?>
                                        <?php /*Mobile*/ ?>
                                    <?php /*</th>*/ ?>
                                <?php /*</tr>*/ ?>
                                <?php /*</thead>*/ ?>
                                <?php /*<tbody>*/ ?>
                                <?php /*<tr id='addr0'>*/ ?>
                                    <?php /*<td>*/ ?>
                                        <?php /*1*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                        <?php /*<input type="text" name='name0'  placeholder='Name' class="form-control"/>*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                        <?php /*<input type="text" name='mail0' placeholder='Mail' class="form-control"/>*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                        <?php /*<input type="text" name='mobile0' placeholder='Mobile' class="form-control"/>*/ ?>
                                    <?php /*</td>*/ ?>
                                <?php /*</tr>*/ ?>
                                <?php /*<tr id='addr1'></tr>*/ ?>
                                <?php /*</tbody>*/ ?>
                            <?php /*</table>*/ ?>



                <button type="submit" class="btn btn-default pull-left"><?php echo e(trans('myclass.create class')); ?></button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>