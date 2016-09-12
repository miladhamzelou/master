<div class="col-md-8 no-padding">
   <div class="panel">
       <div class="panel-body">
           <form action="" novalidate="novalidate" method="post" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
               <div class="form-group">
                   <label for="exampleInputEmail1">نام:</label>
                   <input name="frm[info][name]" type="text" class="form-control" value="<?php echo e($info['userInfo']['name']); ?>">
               </div>
               <div class="form-group">
                   <label for="exampleInputEmail1">نام خانوادگی:</label>
                   <input name="frm[info][family]" type="text" class="form-control" value="<?php echo e($info['userInfo']['family']); ?>">
               </div>
               <div class="form-group">
                   <label for="frm[info][mobile]">موبایل:</label>
                   <input name="frm[info][mobile]" type="text" class="form-control" value="<?php echo e($info['userInfo']['mobile']); ?>">
               </div>
               <div class="form-group">
                   <label for="exampleInputEmail1">معرفی:</label>
                   <input name="frm[info][shortIntroduce]" type="text" class="form-control" value="<?php echo e($info['userInfo']['shortIntroduce']); ?>">
               </div>
               <div class="form-group">
                   <label for="exampleInputEmail1">عکس:</label>
                   <input name="image" type="file" class="form-control">
               </div>
               <button type="submit" class="btn btn-default">ویرایش پروفایل</button>
           </form>
       </div>
   </div>
</div>
<div class="col-md-4 no-padding-right"><?php echo $__env->make('auth.dashboard.zone.sidebar-left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>