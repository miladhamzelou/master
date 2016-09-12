var Admin  = function()
{
    return {
        init : function () {
            Admin.ready();
        },
        ajax : function () {
            Admin.select2();
            Admin.datePicker();
            Admin.afterPaginate();
            Admin.sendSearchForm();
            // custom function
            Custom.citySelect();
            Admin.fancyBox();
        },
        ready : function () {
            var href = $('meta[name=URL]').attr('content');
            $('li.treeview').removeClass('active');
            $("a[href='"+ href +"']").addClass('active').closest('li.treeview').addClass('active');
            Admin.select2();
            Admin.afterPaginate();
            Admin.sendSearchForm();
            Custom.citySelect();
            Admin.fancyBox();
        },
        reload : function(event){
            event.preventDefault();
            var url = document.location.href;
            $(".ajax-content").css({
                'opacity' : 0.5,
                'pointer-events': 'none',
            });
            $('.ajax-loader').toggleClass('display-none');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                success: function(response){
                    $('.ajax-loader').toggleClass('display-none');
                    $('.ajax-content').removeAttr('style').html(response);
                    Admin.ajax();
                }
            });
        },
        sort : function(event, obj) {
            event.preventDefault();
            var url = $(obj).attr('href') + '?' + $('.searchBtn').closest('form').serialize();
            var obj = $(obj);
            var field = obj.attr('data-field');
            var sort = obj.attr('data-sort') == 'ASC' ? 'ASC' : 'DESC';
            var replace_sort = (sort == 'ASC') ? 'DESC' : 'ASC';
            $(".ajax-content").css({
                'opacity' : 0.5,
                'pointer-events': 'none',
            });
            $('.ajax-loader').show('slow');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "get",
                url: url,
                data : { field : field , type : sort},
                success: function(response){
                    $('.ajax-loader').hide('slow');
                    $('.ajax-content')
                        .removeAttr('style')
                        .html(response)
                        .find("a[data-field='"+ field +"']")
                        .attr('data-sort', replace_sort)
                        .addClass(replace_sort+'-sort');
                    Admin.ajax();
                }
            });
        },
        show : function(object, event){ // show result
            event.preventDefault();
            var obj = $(object);
            var url = obj.attr("href");
            $('.ajax-loader').show('slow');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                success: function(response){
                    $('.ajax-loader').hide('slow');
                    $('#ajax-result').html(response).fadeIn('slow');
                    $('#modal').modal({
                        backdrop: 'static',
                        keyboard: true,
                    });
                }
            });
        },
        delete : function(object, event){
            event.preventDefault();
            var obj = $(object);
            var url = obj.attr("href");
            $('.ajax-loader').show('slow');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                success: function(){
                    $('.ajax-loader').hide('slow');
                    obj.fadeOut('5000', function () {
                        Admin.reload(event);
                    })
                }
            });
        },
        paginate : function(event, obj) {
            event.preventDefault();
            var field = $('.ASC-sort,.DESC-sort').attr('data-field');
            var type = $('.ASC-sort,.DESC-sort').attr('data-sort');
            var replace_sort = (type == 'ASC') ? 'DESC' : 'ASC' ;
            if(typeof field == 'undefined' || typeof type == 'undefined'){
                var url = $(obj).attr('href') + '&' + $('.searchBtn').closest('form').serialize();
            } else {
                var url = $(obj).attr('href')+'&?field='+field+'&type='+replace_sort+ '&' +$('.searchBtn').closest('form').serialize();
            }
            $(".ajax-content").css({
                'opacity' : 0.5,
                'pointer-events': 'none',
            });    $(".ajax-content").css({
                'opacity' : 0.5,
                'pointer-events': 'none',
            });
            $('.ajax-loader').toggleClass('display-none');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "get",
                url: url,
                success: function (response) {
                    $('.ajax-loader').toggleClass('display-none');
                    $('.ajax-content').removeAttr('style').html(response).find("a[data-field='"+ field +"']").attr('data-sort',type).addClass(type+'-sort');
                    Admin.afterPaginate();
                }
            });

        },
        afterPaginate : function () {
            $('ul.pagination li a').each(function(){
                $('ul.pagination li a').attr('onclick', 'Admin.paginate(event, this)');
            });
        },
        search : function (obj, event) {
            event.preventDefault();
            $('.ajax-loader').show('slow');
            var url = $(obj).attr('href');
            var status = $(obj).attr('data-status');
            if (status == 'close') {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: url,
                    success: function(response){
                        $(obj).attr('data-status', 'open');
                        $('.ajax-loader').hide('slow');
                        $('.search-box').html(response).slideDown();
                        Admin.ajax();
                    }
                });
            } else {
                $('.ajax-loader').hide('slow');
                $(obj).attr('data-status', 'close');
                $('.search-box').slideUp();
            }
        },
        sendSearchForm : function () {
            $('.searchBtn').off('click').click(function (event) {
                event.preventDefault();
                var data = $('.searchBtn').closest('form').serialize();
                var url  = $('.searchBtn').closest('form').attr('action');
                $(".ajax-content").css({
                    'opacity' : 0.5,
                    'pointer-events': 'none',
                });
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: url,
                    data: data,
                    success: function(response){
                        $('.ajax-content').removeAttr('style').html(response);
                        Admin.ajax();
                    }
                });
            })
        },
        changeEnum : function (obj, event ) {
            event.preventDefault();
            var url = $(obj).attr('href');
            var status = $(obj).attr('data-status');
            var field = $(obj).attr('data-field');
            $('.ajax-loader').show('slow');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                data: {'enum' : status, 'field' : field},
                success: function(response){
                    $('.ajax-loader').hide('slow');
                    $(obj).attr('data-status', status == 1 ? 0 : 1);
                    $(obj).children('span').removeClass(status == 1 ? 'fa-check-circle text-success' : 'fa-minus-circle text-danger').addClass(status == 0 ? 'fa-check-circle text-success' : 'fa-minus-circle text-danger');
                    Admin.reload(event);
                }
            });

        },
        select2 : function () {
            $("select[data-select]").select2();
            $(".js-example-basic-multiple").select2();
        },
        datePicker : function () {
            $("input[data-datepicker]").persianDatepicker({
                cellWidth: 35,
                cellHeight: 25,
                fontSize: 12,
            });
        },
        fancyBox : function(){
            /* This is basic - uses default settings */
            $("a#single_image").fancybox();
            /* Apply fancybox to multiple items */
            $("a.group").fancybox({
                'transitionIn'	:	'elastic',
                'transitionOut'	:	'elastic',
                'speedIn'		:	600,
                'speedOut'		:	200,
                'overlayShow'	:	false
            });
        }

    }
}();