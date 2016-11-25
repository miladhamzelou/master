@section('content')
    <img src="{{ asset('assets/admin/img/ajax-loader.gif') }}" class="ajax display-none"/>
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('mail.send mail') }}</h4>
            </div>
            <div class="pull-left">
                <a href="{{ url(getCurrentURL('controller').'/MailList') }}" title="{{ trans('public.return') }}" class="btn-box-tool pull-left"><i class="fa fa-arrow-circle-{{ config('app.float') }}"></i></a>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-7 col-md-push-2">
                    @if(count(@$errors) > 0)
                        <div class="alert alert-message">{{ trans('public.fill out the form not') }}</div>
                    @endif
                    @foreach (['danger', 'warning', 'success', 'info', 'message'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <form action="{{ url(getCurrentURL('controller').'/Store') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.mail.subject') ? ' has-error' : '' }}">
                                    <label>{{ trans('mail.subject') }}:<span class="required">*</span></label>
                                    <input required title="{{ trans('validate.please fill in this field') }}." type="text" name="frm[mail][subject]" class="form-control" value="{{ old('frm.mail.subject') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="checkbox-inline">
                                        <input name="send_group"  checked  type="checkbox" id="choice-send"><span>{{ trans('mail.send to group') }}</span>
                                    </label>
                                    <label class="checkbox-inline">
                                        <input id="choice-template"  type="checkbox"><span>{{ trans('mail.choice template') }}</span>
                                    </label>
                                    <label class="checkbox-inline">
                                        <input id="choice-editor"   type="checkbox"><span>{{ trans('mail.choice editor') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row show-send" style="display: none">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.to') ? ' has-error' : '' }}">
                                    <label>{{ trans('mail.mail address') }}:</label>
                                    <input   id="mails" placeholder="example@gmail.com, example@yahoo.com, ..." type="text" name="frm[to]" class="en-font form-control text-left" value="{{ old('frm.to') }}">
                                    <p class="help-block">{{ trans('mail.emails can also enter according to the pattern') }}.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.mail.message') ? ' has-error' : '' }}">
                                    <label>{{ trans('mail.message') }}:<span class="required">*</span></label>
                                    <textarea rows="5" required title="{{ trans('validate.please fill in this field') }}." type="text" name="frm[mail][message]" class="form-control">{{ old('frm.mail.message') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ trans('mail.attachment') }}:</label>
                                    <div class="row"></div>
                                    <label class="btn btn-default">
                                        <input style="display: none" data-unlink="{{ getCurrentURL('controller').'/unlink' }}" data-href="{{ getCurrentURL('controller').'/attachment' }}" multiple type="file">
                                        <i  class="fa fa-paperclip"></i> {{ trans('public.select file') }}
                                    </label>
                                    <p class="help-block">{{ trans('validate.maximum  size of each file: 8 MB') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn   btn-primary">{{ trans('public.send request') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).load(function() {
            $('form').validate();
            $('form').submit(function(e) {
                if (!$("input[name=send_group]").prop('checked') && !$("input[name='frm[to]']").val()) {
                    e.preventDefault();
                    if ($('html').attr('dir') == 'rtl')
                        toastr.error('حداقل یک گیرنده الکترونیک وارد کنید.');
                    else
                        toastr.error('Please enter at least one recipient.');
                    return ;
                } else if($('form').valid()) {
                    $('.ajax').fadeIn('slow');
                    $("input[type=file]").val("");
                }
            });
            $('#choice-template, #choice-editor').change(function() {
                var _this = $(this);
                if ($('html').attr('dir') == 'rtl')
                    toastr.info('این سرویس برای شما غیرفعال است.');
                else
                    toastr.error('This service is disabled for you.');
                setTimeout(function() {
                    _this.attr('checked', false);
                },2000);
            });
            $('#choice-send').change(function() {
                var _this = $(this);
                $(".show-send").toggle('slow');
            });
            function split( val ) {
                return val.split( /,\s*/ );
            }
            function extractLast( term ) {
                return split( term ).pop();
            }

            $('input[type=file]').change(function(e) {
                var file_data = $(this).prop("files");
                var unlink = $(this).attr('data-unlink');
                _this = $(this);
                for(var i = 0; i < file_data.length ; i++) {
                    (function(i) {
                        var form_data = new FormData();
                        form_data.append("file[]", file_data[i]);
                        var file_size = parseFloat((file_data[i].size / 1024) / 1024);
                        if (file_size < 8) {
                            $('form').append("<input type='hidden' value='"+file_data[i]['name']+"' name='file[]'>");
                            _this.closest('div.form-group').append(' <div class="well well-sm"> ' +
                                    '<div class="row"> ' +
                                    '<div class="col-md-12 text-left"> <a class="unlink-file fa fa-remove" data-file="'+ file_data[i]["name"] +'" href="'+unlink+'"></a> <span class="en-font">'+ file_data[i]["name"] +'</span></div> ' +
                                    '</div> ' +
                                    '<div class="row"> ' +
                                    '<div class="col-md-12"> ' +
                                    '<div style="margin-bottom: 8px;" class="progress"> ' +
                                    '<div class="progress-bar progress-bar-' +i+ ' progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">0%</div> ' +
                                    '</div> ' +
                                    '</div> ' +
                                    '</div> ' +
                                    '</div>');
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: _this.attr('data-href'),
                                type: 'post',
                                data: form_data,
                                contentType: false,
                                cache: false,
                                processData: false,
                                xhr: function () {
                                    var xhr = $.ajaxSettings.xhr();
                                    if (xhr.upload) {
                                        xhr.upload.addEventListener('progress', function (event) {
                                            progress(i, event);
                                        }, false);
                                    }
                                    return xhr;
                                },
                                mimeType: "multipart/form-data"
                            }, i).done(function() {
                                setTimeout(function() {
                                    $('.progress-bar-'+i).closest('.progress').remove();
                                },2000)
                            });
                        } else {
                            $(this).val("");
                            if ($('html').attr('lang') == 'fa')
                                toastr.error('حجم فایل '+file_data[i]["name"]+' بیشتر از 8 مگابایت است.');
                            else
                                toastr.error('The file '+ file_data[i]["name"]+' exceeds the limit set.');
                        }
                    })(i);
                }
            });
            $(document).on('click','.unlink-file',function(event) {
                event.preventDefault();
                var _this = $(this);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: _this.attr('href'),
                    type: 'post',
                    data : { 'file' : $(this).attr('data-file') },
                    success : function(response) {
                        _this.closest('div.well').fadeOut('slow', function() {
                           _this.remove();
                            $("input[value='"+_this.attr('data-file')+"']").remove();
                        });
                    }
                });
            });
            function  progress (i,event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                    percent = Math.ceil(position / total * 100);
                }
                $(".progress-bar-"+i).css("width", + percent +"%").text(percent +"%");
                if (parseInt(percent) == 100)
                    $('.progress-bar-'+i).removeClass('progress-bar-info').addClass('progress-bar-success');
            }
            $( "#mails" )
                    .on( "keydown", function( event ) {
                        if ( event.keyCode === $.ui.keyCode.TAB &&
                                $( this ).autocomplete( "instance" ).menu.active ) {
                            event.preventDefault();
                        }
                    })
                    .autocomplete({
                        source: function( request, response ) {
                            $.getJSON( $(this).attr('data-href'), {
                                term: extractLast( request.term )
                            }, response );
                        },
                        search: function() {
                            // custom minLength
                            var term = extractLast( this.value );
                            if ( term.length < 2 ) {
                                return false;
                            }
                        },
                        focus: function() {
                            // prevent value inserted on focus
                            return false;
                        },
                        select: function( event, ui ) {
                            var terms = split( this.value );
                            // remove the current input
                            terms.pop();
                            // add the selected item
                            terms.push( ui.item.value );
                            // add placeholder to get the comma-and-space at the end
                            terms.push( "" );
                            this.value = terms.join( ", " );
                            return false;
                        }
                    });
        });
    </script>
@endsection