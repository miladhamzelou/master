@section('content')
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
                                <div class="form-group{{ $errors->has('frm.subject') ? ' has-error' : '' }}">
                                    <label>{{ trans('mail.subject') }}:<span class="required">*</span></label>
                                    <input required title="{{ trans('validate.please fill in this field') }}." type="text" name="frm[subject]" class="form-control" value="{{ old('frm.subject') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.subject') ? ' has-error' : '' }}">
                                    <label class="checkbox-inline">
                                        <input checked type="checkbox" id="choice-send"><span>{{ trans('mail.send to group') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row show-send" style="display: none">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.subject') ? ' has-error' : '' }}">
                                    <label>{{ trans('mail.send to') }}:</label>
                                    <input  class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.subject') ? ' has-error' : '' }}">
                                    <label>{{ trans('mail.mail address') }}:</label>
                                    <input placeholder="exampe@gmail.com, example2@yhoo.com, ..." type="text" name="frm[subject]" class="en-font form-control text-left" value="{{ old('frm.subject') }}">
                                    <p class="help-block">{{ trans('mail.emails can also enter according to the pattern') }}.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.message') ? ' has-error' : '' }}">
                                    <label>{{ trans('mail.message') }}:<span class="required">*</span></label>
                                    <textarea rows="5" required title="{{ trans('validate.please fill in this field') }}." type="text" name="frm[message]" class="form-control">{{ old('frm.message') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.message') ? ' has-error' : '' }}">
                                    <label class="checkbox-inline">
                                        <input id="choice-template"  type="checkbox"><span>{{ trans('mail.choice template') }}</span>
                                    </label>
                                    <label class="checkbox-inline">
                                        <input id="choice-editor"   type="checkbox"><span>{{ trans('mail.choice editor') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary">{{ trans('public.send request') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
            $(window).load(function() {
                $('#choice-template, #choice-editor').change(function() {
                    var _this = $(this);
                    if ($('html').attr('dir') == 'rtl')
                        toastr.error('این سرویس برای شما غیرفعال است.');
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
            })
    </script>
@endsection