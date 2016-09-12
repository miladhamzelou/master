<div id="ajax">
    <form action="<?php echo e(url('user/'.$collection['user']['username'].'/updateCollection/'.$collection['id'])); ?>" novalidate="novalidate" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" value="<?php echo e($city_id); ?>" name="city_id">
        <div class="form-group<?php echo e($errors->has('frm.title') ? ' has-error' : ''); ?>">
            <label for="exampleInputEmail1">عنوان کالکشن:</label>
            <input name="frm[title]" type="text" class="form-control text-right" value="<?php echo e($collection['title']); ?>">
        </div>
        <div class="form-group<?php echo e($errors->has('frm.desc') ? ' has-error' : ''); ?>">
            <label for="exampleInputEmail1">توضیحات:</label>
            <input name="frm[desc]" type="text" class="form-control text-right" value="<?php echo e($collection['desc']); ?>">
        </div>
        <?php if(count($collection['tag']) > 0): ?>
        <div class="form-group tags">
            <label for="exampleInputEmail1">تگ ها:</label>
            <select name="tags[]" class="js-example-basic-multiple form-control" multiple="multiple">
                <?php foreach($tags as $tag): ?>
                    <option <?php foreach($collection['tag'] as $sub): ?> <?php if($sub['id'] == $tag['id']): ?> selected <?php endif; ?> <?php endforeach; ?> value="<?php echo e($tag['id']); ?>"><?php echo e($tag['title']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
        <?php if(count($collection['restaurant']) > 0): ?>
        <div class="form-group restaurant">
            <label for="exampleInputEmail1">رستوران:</label>
            <select name="restaurant[]" class="js-example-basic-multiple form-control" multiple="multiple">
                <?php foreach($restaurant as $res): ?>
                    <option <?php foreach($collection['restaurant'] as $sub): ?> <?php if($sub['id'] == $res['id']): ?> selected <?php endif; ?> <?php endforeach; ?> value="<?php echo e($res['id']); ?>"><?php echo e($res['title']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="exampleInputEmail1">آپلود عکس:</label>
            <input class="form-control" type="file" name="image">
        </div>
        <?php if($collection['img']): ?>
            <img height="200" width="200" class="img-thumbnail" src="<?php echo e(asset('images/collection/'.$collection['img'])); ?>">
        <?php endif; ?>
        <div class="form-group">
            <button type="submit" class="btn btn-default left">ویرایش کالکشن</button>
        </div>
    </form>
</div>
<script>
    $('form').submit(function(e){
        e.preventDefault();
        if ($('.tags select').val() || $('.restaurant select').val()) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('action'),
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success : function (response) {
                if (response == 'ok') {
                    toastr.success('ویرایش با موفقیت انجام شد.');
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    },'1000');
                } else {
                    $('#ajax').html(response);
                    $('.js-example-basic-multiple').select2();
                }
            }
        });}
        else {
            toastr.error('تگ و یا رستوران را انتخاب کنید.');
            return false;
        }
    });
    $('input[name=image]').change(function(event){
        $('img').remove();
        var total_file=event.target.files.length;
        for(var i=0;i<total_file;i++)
        {
            $(this).closest('div.form-group').append("<img style='margin-top: 15px;' height='150' width='150' class='img-thumbnail' src='"+URL.createObjectURL(event.target.files[i])+"'>");
        }
    })
</script>