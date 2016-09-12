<div class="col-md-8 no-padding">
    <div class="panel">
        <div class="panel-body">
            <form action="" novalidate="novalidate" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">پسورد:</label>
                    <input name="password" type="password" class="form-control text-left" style="font-family: Tahoma" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">پسورد جدید:</label>
                    <input name="newpassword" type="password" class="form-control text-left" style="font-family: Tahoma">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">پسورد جدید:</label>
                    <input name="retypepassword" type="password" class="form-control text-left" style="font-family: Tahoma">
                </div>
                <button type="submit" class="btn btn-default">تغییر رمز</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-4 no-padding-right"><?php echo $__env->make('auth.dashboard.zone.sidebar-left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>