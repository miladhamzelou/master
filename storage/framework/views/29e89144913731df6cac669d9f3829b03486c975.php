<aside id="sidebar">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo e(trans('master.master bundle')); ?>

                    </a>
                    <span class="fa fa-angle-down pull-left"></span>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="list-group">
                        <a href="<?php echo e(getCurrentURL('prefix').'/MasterBundle/MasterClass/ClassList'); ?>" class="list-group-item"><?php echo e(trans('master.class')); ?></a>
                        <a href="<?php echo e(getCurrentURL('prefix').'/MasterBundle/Term/TermList'); ?>" class="list-group-item"><?php echo e(trans('master.training course')); ?></a>
                        <a href="<?php echo e(getCurrentURL('prefix').'/MasterBundle/UniversityTree/TreeList'); ?>" class="list-group-item"><?php echo e(trans('master.university and educational centers')); ?></a>
                        <a href="<?php echo e(getCurrentURL('prefix').'/MasterBundle/FieldTree/TreeList'); ?>" class="list-group-item"><?php echo e(trans('master.field and trend')); ?></a>
                        <a href="<?php echo e(getCurrentURL('prefix').'/MasterBundle/Lesson/LessonList'); ?>" class="list-group-item"><?php echo e(trans('master.specialized master')); ?></a>
                    </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo e(trans('auth.users')); ?>

                    </a>
                    <span class="fa fa-angle-right pull-left"></span>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="list-group">
                    <a href="<?php echo e(url(getCurrentURL('prefix').'/Auth/User/UsersList')); ?>" class="list-group-item"><?php echo e(trans('auth.users list')); ?></a>
                </div>
            </div>
        </div>
    </div>
</aside>