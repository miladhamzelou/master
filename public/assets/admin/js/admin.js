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
            Admin.fancyBox();
            Admin.tree();
            Admin.treeCheckbox();
        },
        ready : function () {
            Admin.datePicker();
            Admin.select2();
            Admin.afterPaginate();
            Admin.sendSearchForm();
            Admin.fancyBox();
            Admin.tree();
            Admin.treeCheckbox();

        },
        reload : function(event){
            event.preventDefault();
            var url = document.location.href;
            $('.ajax').fadeIn('slow');
            $(".ajax-content").css({
                'opacity' : 0.5,
                'pointer-events': 'none',
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                success: function(response){
                    $('.ajax-content').removeAttr('style').html(response);
                    $('.ajax').fadeOut('slow');
                    toastr.success('صفحه مجدد بارگزاری گردید.');
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
                        .find("*[data-field='"+ field +"']")
                        .attr('data-sort', replace_sort)
                        .addClass(replace_sort+'-sort')
                        .parent('th')
                        .css({ 'background-color' : '#f9f9f9', 'border-right' : '1px solid #f0f0f0', 'border-left' : '1px solid #f0f0f0'});
                    var index = parseInt($("*[data-field='"+ field +"']").parent().index()) + 1;
                    $("td:nth-child("+ index +")").css({ 'background-color' : '#f9f9f9', 'border-right' : '1px solid #f0f0f0', 'border-left' : '1px solid #f0f0f0'});
                    Admin.ajax();
                }
            });
        },
        show : function(object, event){ // show result
            event.preventDefault();
            var obj = $(object);
            var url = obj.attr("href");
            $('.ajax').fadeIn('slow');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                success: function(response){
                    $('.ajax').fadeOut('slow');
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
            $('.ajax').fadeIn('slow');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                success: function(){
                    $('.ajax').fadeOut('slow');
                    obj.closest('tr').fadeOut('5000');
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
            $('.ajax').fadeIn('slow');
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
                        $('.ajax').fadeOut('slow');
                        $('.search-box').html(response).slideDown();
                        Admin.ajax();
                    }
                });
            } else {
                $('.ajax').fadeOut('slow');
                $(obj).attr('data-status', 'close');
                $('.search-box').slideUp();
            }
        },
        sendSearchForm : function () {
            $('.searchBtn').off('click').click(function (event) {
                event.preventDefault();
                var data = $('.searchBtn').closest('form').serialize();
                var url  = $('.searchBtn').closest('form').attr('action');
                $('.ajax').fadeIn('slow');
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
                        $('.ajax').fadeOut('slow');
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
                    $(obj).children('span').removeClass(status == 1 ? 'fa-check text-success' : 'fa-minus text-danger').addClass(status == 0 ? 'fa-check text-success' : 'fa-minus text-danger');
                    //Admin.reload(event);
                }
            });
        },
        select2 : function () {
            $("select[data-select],.multiple").select2({
                theme: "bootstrap"
            });
        },
        datePicker : function () {
            $("input[data-datepicker]").persianDatepicker({
                cellWidth: 35,
                cellHeight: 25,
                fontSize: 12,
            });
        },
        fancyBox : function(){
            $("a#single_image").fancybox();
            $("a.group").fancybox({
                'transitionIn'	:	'elastic',
                'transitionOut'	:	'elastic',
                'speedIn'		:	600,
                'speedOut'		:	200,
                'overlayShow'	:	false
            });
        },
        tree : function() {
            $('.tree')
                .jstree({
                    'core': {
                        'themes': {
                            'name': 'proton',
                            'responsive': true
                        }
                    }
                });
        },
        treeCheckbox : function() {
            $('.tree-checkbox')
                .jstree({
                    'plugins': ["wholerow", "checkbox"],
                    'core': {
                        'themes': {
                            'name': 'proton',
                            'responsive': true
                        }
                    }
                });
        },
        treeRemove : function (obj,event){
            event.preventDefault();
            var url = $(obj).attr('href');
            var res = [];
            res = $('.tree').jstree(true).get_selected();
            if (res.length == 0) {
                toastr.error('هیچ آیتمی انتخاب نشده است.');
                return;
            }
            var item_id = [], i;
            for (i = 0 ; i < res.length ; i++) {
                item_id[i] = $('.tree').jstree(true).get_selected('text')[i].li_attr['data-id'];
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                data: { 'items' : item_id },
                success: function(response){
                    Admin.reload(event);
                }
            });
        },
        newTree : function(obj,event){
            event.preventDefault();
            var url = $(obj).attr('href');
            var res = [];
            res = $('.tree').jstree(true).get_selected();
            var item_id = [], i;
            for (i = 0 ; i < res.length ; i++) {
                item_id[i] = $('.tree').jstree(true).get_selected('text')[i].li_attr['data-id'];
            }
            $('.ajax').fadeIn('slow');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                data: { 'item_id' : item_id },
                success: function(response){
                    $('.ajax').fadeOut('slow');
                    $('#ajax-modal').html(response).fadeIn('slow');
                    $('#modal').modal({
                        backdrop: 'static',
                        keyboard: true,
                    });
                }
            });
        },
        treeEdit : function(obj,event){
            event.preventDefault();
            var url = $(obj).attr('href');
            var res = [];
            res = $('.tree').jstree(true).get_selected();
            if (res.length == 0) {
                toastr.error('هیچ آیتمی انتخاب نشده است.');
                return;
            } else if(res.length > 1) {
                toastr.error('بیش از یک آیتم انتخاب شده است.');
                return;
            }
            item_id = $('.tree').jstree(true).get_selected('text')[0].li_attr['data-id'];
            $('.ajax').fadeIn('slow');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                data: { 'item_id' : item_id },
                success: function(response){
                    $('.ajax').fadeOut('slow');
                    $('#ajax-modal').html(response).fadeIn('slow');
                    $('#modal').modal({
                        backdrop: 'static',
                        keyboard: true,
                    });
                }
            });
        },
        updateTree : function(obj,e){
            e.preventDefault();
            $('.ajax-loader-180').fadeIn('slow');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $(obj).closest('form').attr('action'),
                type: 'post',
                data : $(obj).closest('form').serialize(),
                success : function (response) {
                    if (response == 'ok') {
                        $('.ajax-loader-180').fadeOut('slow');
                        setTimeout(function(){
                            window.location.href = window.location.href;
                        },'1000');
                        toastr.success('با موفقیت انجام شد.');
                    } else {
                        $('.ajax-loader-180').fadeOut('slow');
                        $('.frm-form').html('').html(response);
                    }
                }
            });
        },
        duplicateRow : function(obj, event)
        {
            event.preventDefault();
            _this = $(obj);
            _this.closest('td').children('a:hidden').show();
            var new_row = _this.closest('tr').clone();
            new_row.find('input,select,textarea').each(function(){
                var input =  $(this).attr('name').toString();
                var num = input.match(/.*\[\w+\_(\d+)\].*/)[1];
                $(this).attr('name', input.replace(num, parseInt(num) + 1));
            });
            new_row.find('input,select,textarea').val('').end().insertAfter('.table tr:last');
            _this.hide();
        },
        deleteRow: function(obj, event) {
            event.preventDefault();
            _this = $(obj);
            var item = _this.closest('tr');
            if (item.parent('tbody').children('tr').length < 3) {
                item.prev().children('td').children('a:hidden').show();
                if (item.parent('tbody').children('tr').length < 2)
                    item.prev().children('td').children('a:last').hide();
                else if (item.parent('tbody').children('tr').length == 2) {
                        item.prev().children('td').children('a:last').hide();
                        item.next().children('td').children('a:last').hide();
                    }
            } else {
                item.prev().children('td').children('a:hidden').show();
            }
            item.remove();
        }
    }

}();