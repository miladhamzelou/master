<form name="create-collection-form" action="<?php echo e(url('/user/'.Auth::user()->info()['username'].'/StoreNewCollection')); ?>" novalidate="novalidate" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <input type="hidden" value="<?php echo e($city_id); ?>" name="city_id">
    <div class="form-group<?php echo e($errors->has('frm.title') ? ' has-error' : ''); ?>">
        <label for="exampleInputEmail1">عنوان کالکشن:</label>
        <input name="frm[title]" type="text" class="form-control text-right" value="<?php echo e(@$input['title']); ?>">
    </div>
    <div class="form-group<?php echo e($errors->has('frm.desc') ? ' has-error' : ''); ?>">
        <label for="exampleInputEmail1">توضیحات:</label>
        <input name="frm[desc]" type="text" class="form-control text-right" value="<?php echo e(@$input['desc']); ?>">
    </div>
    <div class="form-group">
        <label class="radio-inline">
            <input type="radio" name="select-add" id="inlineRadio1" <?php if(count(@$input['tags']) > 0 || !@$input['restaurant']): ?> checked <?php endif; ?> value="tag"> افزودن تگ
        </label>
        <label class="radio-inline">
            <input type="radio" name="select-add" id="inlineRadio2" <?php if(count(@$input['restaurant']) > 0): ?> checked <?php endif; ?> value="restaurant"> افزودن رستوران
        </label>
    </div>
    <div class="form-group tags"  <?php if(count(@$input['restaurant']) > 0): ?> style="display: none" <?php endif; ?> >
        <label for="exampleInputEmail1">تگ ها:</label>
        <select name="tags[]" class="js-example-basic-multiple form-control" multiple="multiple">
            <?php foreach($tags as $tag): ?>
                <option <?php if(@$input['tags']): ?> <?php foreach(@$input['tags'] as $inp): ?> <?php if($tag['id'] == $inp): ?> selected <?php endif; ?> <?php endforeach; ?> <?php endif; ?> value="<?php echo e($tag['id']); ?>"><?php echo e($tag['title']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group restaurant" <?php if(count(@$input['tags']) > 0 || !@$input['restaurant']): ?> style="display: none" <?php endif; ?>>
        <label for="exampleInputEmail1">رستوران:</label>
        <select name="restaurant[]" class="js-example-basic-multiple form-control" multiple="multiple">
            <?php foreach($restaurant as $res): ?>
                <option <?php if(@$input['restaurant']): ?> <?php foreach(@$input['restaurant'] as $inp): ?> <?php if($res['id'] == $inp): ?> selected <?php endif; ?> <?php endforeach; ?> <?php endif; ?> value="<?php echo e($res['id']); ?>"><?php echo e($res['title']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">آپلود عکس:</label>
        <input class="form-control" type="file" name="image" value="<?php echo e(@$input['image']); ?>">
    </div>
    <div class="form-group">
        <button style="margin-top: 15px;" type="submit" class="btn btn-default left">افزودن کالکشن جدید</button>
    </div>
</form>
<script>
    $('form[name=create-collection-form]').submit(function(e){
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
                        toastr.success('منتظر تایید ادمین باشید...');
                        setTimeout(function(){
                                window.location.href = window.location.href;
                        },'3000');
                    } else {
                        $('#ajax-result').html(response);
                        toastr.error('لطفا فیلد ها را به دقت پر کنید.');
                    }
                    initAjax(event);
                }
            });
        } else {
            toastr.error('تگ و یا رستوران را انتخاب کنید.');
            return false;
        }
    });
    function  initAjax(event)
    {
        $("*[name=select-add]").change(function(){
            if($(this).val() == 'tag') {
                $('.tags').show();
                $('.restaurant').hide();
                $('.restaurant select option:selected').each(function(){
                    $(this).prop('selected',false);
                });
                $('.js-example-basic-multiple').select2();
            }else {
                $('.restaurant').show();
                $('.tags').hide();
                $('.tags select option:selected').each(function(){
                    $(this).prop('selected',false);
                })
                $('.js-example-basic-multiple').select2();
            }
        });
        changeImage(event);
        $('.js-example-basic-multiple').select2();

    }
    function changeImage(event)
    {
        $('input[name=image]').change(function(event){
            $('img').remove();
            var total_file=event.target.files.length;
            for(var i=0;i<total_file;i++)
            {
                $(this).closest('div.form-group').append("<img style='margin-top: 15px;' height='150' width='150' class='img-thumbnail' src='"+URL.createObjectURL(event.target.files[i])+"'>");
            }
        });
    }
</script>
