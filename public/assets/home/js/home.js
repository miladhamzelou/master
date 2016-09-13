$(document).ready(function() {
    // h select in all app
    $('.event-listener').change(function () {
        var listener_id = $(this).val();
        var listener = $(this).attr('id');
        var result = $(this).attr('data-result');
        var url = $(this).attr('data-url');
        $("select#"+result+" option").remove();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data : { 'listener' : listener, 'result' : result,'listener_id' : listener_id},
            success: function(response){
                for (i = 0; i < response.length ; i++) {
                    if (i == 0) {
                        $("select#"+result).append("<option value=''>انتخاب</option>");
                    }
                    $("select#"+result).append("<option value='" + response[i]['id'] + "'>" + response[i]['name'] + "</option>");
                }
            }
        });
    });
    // end of h select
    $('#example-bootstrap').barrating({
        theme: 'bootstrap-stars',
        showSelectedRating: false
    });
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

    $("select[data-select]").select2();
    $(".js-example-basic-multiple").select2();

    $('#save-collection').click(function(e){
        e.preventDefault();
        var _this = $(this);
        var collection_id = $(this).attr('data-collection');
        if (_this.attr('data-status') == 0) {
            var url = '/userSaveCollection/UserCollection'
        } else {
            var url = '/userRemoveSaveCollection/RemoveUserCollection/' + _this.attr('data-status');
        }
        $(this).addClass('button loading');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data : { 'collection_id' : collection_id },
            success: function(response){
                if (_this.attr('data-status') == 0) {
                    _this.attr('data-status',response);
                    _this.removeClass('button loading').html('کالکشن ذخیره شده').addClass('border-red');
                } else {
                    _this.attr('data-status',0);
                    _this.removeClass('button loading border-red').html('ذخیره کالکشن');
                }
            }
        });
    });

    $('*[data-follow]').click(function(e){
        e.preventDefault();
        var _this = $(this);
        var user_id = _this.attr('data-user');
        var following_id = _this.attr('data-following');
        $(this).addClass('button loading');
        if (_this.attr('data-status') == 'following')
            var url = '/user/auth/auth/userUnFollow'
        else
            var url = '/user/auth/auth/userFollow';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data : { 'user_id' : user_id, 'following_id' : following_id},
            success: function(response){
                if (_this.attr('data-status') == 'following') {
                    _this.removeClass('button loading').html("<span class='fa fa-user-plus'></span>").removeClass('border-green').attr('data-status','follow');
                }
                else {
                    _this.removeClass('button loading').html("<span class='fa fa-check'></span>").addClass('border-green').attr('data-status','following');
                }
                $('.following-'+following_id).html(response.following_id_following);
                $('.follower-'+following_id).html(response.following_id_follower);

                $('.follower-'+user_id).html(response.follow_id_follower);
                $('.following-'+user_id).html(response.follow_id_following);
            }
        });
    });

    $('#user-add-review').click(function(){
        $('.new-review').slideToggle('slow')
    });

    $('#user-add-photo-menu').click(function(){
        $('.new-photo-menu').slideToggle('slow')
    });
});