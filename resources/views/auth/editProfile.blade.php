@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('auth.edit profile') }}</h4>
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
                        <form method="POST" action="" accept-charset="UTF-8" novalidate="novalidate">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <div class="form-group{{ $errors->has('frm.userInfo.name') ? ' has-error' : '' }}">
                                <label for="userInfo[name]" class="control-label">{{ trans('auth.name') }}:</label>
                                <input required title="{{ trans('validate.please fill in this field') }}" class="form-control" name="frm[userInfo][name]" type="text" id="userInfo[name]" value="{{ Auth::User()['userInfo']['name'] }}">
                            </div>
                            <div class="form-group{{ $errors->has('frm.userInfo.family') ? ' has-error' : '' }}">
                                <label for="userInfo[family]" class="control-label">{{ trans('auth.family') }}:</label>
                                <input required title="{{ trans('validate.please fill in this field') }}" class="form-control" name="frm[userInfo][family]" type="text" id="userInfo[family]" value="{{ Auth::User()['userInfo']['family'] }}">
                            </div>
                            <div class="form-group{{ $errors->has('frm.userInfo.gender') ? ' has-error' : '' }}">
                                <label for="userInfo[family]" class="control-label">{{ trans('auth.gender') }}:</label>
                                <select required title="{{ trans('validate.please fill in this field') }}" class="form-control" name="frm[userInfo][gender]">
                                    <option value="">{{ trans('public.select') }}...</option>
                                    <option @if(Auth::User()['userInfo']['gender'] == 'male') selected @endif value="male">{{ trans('auth.male') }}</option>
                                    <option @if(Auth::User()['userInfo']['gender'] == 'famale') selected @endif  value="famale">{{ trans('auth.famale') }}</option>
                                </select>
                            </div>
                            <div class="form-group{{ $errors->has('frm.userInfo.mobile') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('auth.mobile') }}:</label>
                                <input  required title="{{ trans('validate.please fill in this field') }}" value="{{ Auth::User()['userInfo']['mobile'] }}" class="text-left en-font form-control" name="frm[userInfo][mobile]" type="text" id="userInfo[mobile]">
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