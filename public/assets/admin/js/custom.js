var Custom  = function()
{
    return {

        citySelect : function () {
            $('.event-listener').change(function () {
                var listener_id = $(this).val();
                var url = $(this).attr('data-href') + '/HSelect';
                $("select#region_id option").remove();
                $('.ajax-loader').show('slow');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: url,
                    data: {'listener' : listener_id },
                    success: function(response){
                        $('.ajax-loader').hide('slow');
                        $("select#region_id").append("<option value=''>انتخاب</option>");
                        for (i = 0; i < response.length ; i++) {
                            $("select#region_id").append("<option value='" + response[i]['id'] + "'>" + response[i]['name'] + "</option>");
                        }
                    }
                });
            });
        }
    }
}();