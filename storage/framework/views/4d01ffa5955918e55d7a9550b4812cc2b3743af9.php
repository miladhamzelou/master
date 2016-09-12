<div class="col-md-8 no-padding">
   <div class="panel">
       <div class="panel-body">
           <form action="" novalidate="novalidate" method="post">
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
               <div class="form-group">
                   <label for="exampleInputEmail1">نام کاربری:</label>
                   <input name="username" type="text" class="form-control text-left" style="font-family: Tahoma" value="<?php echo e($info['username']); ?>">
                   <?php foreach($errors->get('username') as $error): ?>
                       <span style="color: red;display: block;position: relative;top: 10px;"><?php echo e($error); ?></span>
                   <?php endforeach; ?>
               </div>
               <button type="submit" class="btn btn-default">تغییر نام کاربری</button>
           </form>
       </div>
   </div>
</div>
<div class="col-md-4 no-padding-right"><?php echo $__env->make('auth.dashboard.zone.sidebar-left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>