@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('auth.create new user') }}</h4>
            </div>
            <div class="pull-left">
                <a href="{{ url(getCurrentURL('controller').'/NewUser') }}"><span class="fa fa-plus-square"></span></a>
                <a href="{{ url(getCurrentURL('controller').'/UsersList') }}"><span class="fa fa-arrow-circle-left"></span></a>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ url(getCurrentURL('controller').'/Store') }}" accept-charset="UTF-8" novalidate="novalidate">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="userInfo[name]" class="control-label">{{ trans('auth.name') }}:</label>
                            <input class="form-control" name="frm[userInfo][name]" type="text" id="userInfo[name]">
                        </div>
                        <div class="form-group">
                            <label for="userInfo[family]" class="control-label">{{ trans('auth.family') }}:</label>
                            <input class="form-control" name="frm[userInfo][family]" type="text" id="userInfo[family]">
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">{{ trans('auth.username') }}:</label>
                            <input required title="{{ trans('validate.please fill in this field') }}" class="text-left en-font form-control" name="frm[user][username]" type="text" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">{{ trans('auth.email') }}:</label>
                            <input required title="{{ trans('validate.please fill in this field') }}" class="text-left en-font form-control" name="frm[user][email]" type="text" id="email">
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{ trans('auth.mobile') }}:</label>
                            <input class="text-left en-font form-control" name="frm[userInfo][mobile]" type="text" id="userInfo[mobile]">
                        </div>
                        <div class="form-group">
                            <label for="role_id" class="control-label">{{ trans('auth.roles') }}:</label>
                            <select required title="{{ trans('validate.please fill in this field') }}" class="form-control multiple" name="frm[user_role][]" id="role_id" data-select="data-select" multiple>
                                <option value="">{{ trans('public.select') }}...</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role['id'] }}">{{ trans('auth.'.$role['title']) }}</option>
                                @endforeach
                            </select>
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
            $('form').validate();
        });
    </script>
@endsection