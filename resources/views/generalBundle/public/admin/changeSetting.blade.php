@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('general.site setting') }}</h4>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 col-md-push-2">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <form method="POST" action="{{ url(getCurrentURL('controller').'/ChangeSetting') }}" accept-charset="UTF-8" novalidate="novalidate">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="userInfo[name]" class="control-label">{{ trans('general.admin name') }}:</label>
                            <input required title="{{ trans('validate.please fill in this field') }}" class="form-control" name="frm[admin_name]" type="text" value="{{ @$setting['admin_name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="userInfo[name]" class="control-label">{{ trans('general.site title') }}:</label>
                            <input required title="{{ trans('validate.please fill in this field') }}" class="form-control" name="frm[site_title]" type="text" value="{{ @$setting['site_title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="userInfo[name]" class="control-label">{{ trans('general.telegram') }}:</label>
                            <input class="form-control text-left" name="frm[telegram]" type="text" value="{{ @$setting['telegram'] }}">
                        </div>
                        <div class="form-group">
                            <label for="userInfo[name]" class="control-label">{{ trans('general.telegram channel') }}:</label>
                            <input class="form-control text-left" name="frm[telegram_channel]" type="text" value="{{ @$setting['telegram_channel'] }}">
                        </div>
                        <div class="form-group">
                            <label for="userInfo[name]" class="control-label">{{ trans('general.instagram') }}:</label>
                            <input class="form-control text-left" name="frm[instagram]" type="text" value="{{ @$setting['instagram'] }}">
                        </div>
                        <div class="form-group">
                            <label for="userInfo[name]" class="control-label">{{ trans('general.facebook') }}:</label>
                            <input class="form-control text-left" name="frm[facebook]" type="text" value="{{ @$setting['facebook'] }}">
                        </div>
                        <div class="form-group">
                            <label for="userInfo[name]" class="control-label">{{ trans('general.twitter') }}:</label>
                            <input class="form-control text-left" name="frm[twitter]" type="text" value="{{ @$setting['twitter'] }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary pull-left" type="submit">{{ trans('public.send request') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).load(function() {
            $('form').validate({
            });
        });
    </script>
@endsection