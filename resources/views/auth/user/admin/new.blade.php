@section('content')
{{--    {{ dd(old()) }}--}}
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
                            <input class="form-control" name="frm[userInfo][name]" type="text" id="userInfo[name]" value="{{ old('frm.userInfo.name') }}">
                        </div>
                        <div class="form-group">
                            <label for="userInfo[family]" class="control-label">{{ trans('auth.family') }}:</label>
                            <input class="form-control" name="frm[userInfo][family]" type="text" id="userInfo[family]" value="{{ old('frm.userInfo.family') }}">
                        </div>
                        <div class="form-group{{ $errors->has('user.username') ? ' has-error' : '' }}">
                            <label for="username" class="control-label">{{ trans('auth.username') }}:</label>
                            <input data-field="username" data-table="user" data-href="{{ url(getCurrentURL('controller').'/checkUnique') }}" required title="{{ trans('validate.please fill in this field') }}." class="text-left en-font form-control" name="frm[user][username]" type="text" id="username" value="{{ old('frm.user.username') }}">
                        </div>
                        <div class="form-group{{ $errors->has('user.email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">{{ trans('auth.email') }}:</label>
                            <input value="{{ old('frm.user.email') }}" data-field="email" data-table="user" data-href="{{ url(getCurrentURL('controller').'/checkUnique') }}" required title="{{ trans('validate.please fill in this field') }}" class="text-left en-font form-control" name="frm[user][email]" type="text" id="email">
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{ trans('auth.mobile') }}:</label>
                            <input value="{{ old('frm.userInfo.mobile') }}" class="text-left en-font form-control" name="frm[userInfo][mobile]" type="text" id="userInfo[mobile]">
                        </div>
                        <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
                            <label for="role_id" class="control-label">{{ trans('auth.roles') }}:</label>
                            <select required title="{{ trans('validate.please fill in this field') }}" class="form-control multiple" name="frm[user_role][]" id="role_id" data-select="data-select" multiple>
                                <option value="">{{ trans('public.select') }}...</option>
                                @foreach($roles as $role)
                                    <option @if(is_array(old('frm.user_role')) && in_array($role['id'], old('frm.user_role'))) selected @endif value="{{ $role['id'] }}">{{ trans('auth.'.$role['title']) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role_id" class="control-label">{{ trans('auth.password') }}:</label>
                            <input class="text-left en-font form-control" name="password" title="{{ trans('validate.please fill in this field') }}" type="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="role_id" class="control-label">{{ trans('auth.password') }}:</label>
                            <input class="text-left en-font form-control" type="password" title="{{ trans('validate.Please enter the same value again') }}" id="password_again" name="password_again">
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
                rules: {
                    password: "required",
                    password_again: {
                        equalTo: "#password"
                    }
                }
            });
            $("input[name='frm[user][username]'], input[name='frm[user][email]']").blur(function(e){
                _this = $(this);
                if (_this.val() == '') return;
                var field = _this.attr('data-field');
                var val = _this.val();
                var table = _this.attr('data-table');
                var url = _this.attr('data-href');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: url,
                    data: { 'table' : table, 'field' : field, 'value' : val },
                    success: function(response){
                        if (response == 1) {
                            if($('html').attr('lang') == 'fa')
                                _this.closest('div.form-group').addClass('has-error').append("<br><label class='error'>این فیلد قبلا وارد شده است.</label>");
                            else if ($('html').attr('lang') == 'en')
                                _this.closest('div.form-group').addClass('has-error').append("<br><label class='error'>this field is unique</label>");
                        } else {
                            _this.closest('div.form-group').removeClass('has-error').children('label.error,br').remove();
                        }

                    }
                });
            })
        });
    </script>
@endsection