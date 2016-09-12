/**
 * Created by wina on 9/6/2016.
 */
$(document).ready(function(){
    $('#user-add-collection').click(function(e){
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('href'),
            type: 'post',
            data : { city_id : $(this).attr('data-city')},
            success : function (response) {
                $('#ajax-result').html(response);
                $('#modal').show().modal({
                    backdrop: 'static',
                    keyboard: true,
                });
                initAjax(event);
            }
        });
    });
    function initAjax(event)
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
        $('.js-example-basic-multiple').select2();
        $('input[name=image]').change(function(event){
            $('img').remove();
            var total_file=event.target.files.length;
            for(var i=0;i<total_file;i++)
            {
                $(this).closest('div.form-group').append("<img style='margin-top: 15px;' height='150' width='150' class='img-thumbnail' src='"+URL.createObjectURL(event.target.files[i])+"'>");
            }
        });
    }
});

