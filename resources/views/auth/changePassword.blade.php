@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('auth.change password') }}</h4>
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
                    <form action="" novalidate="novalidate" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('auth.old password') }}:</label>
                            <input required title="{{ trans('validate.please fill in this field') }}" name="password" type="password" class="form-control text-left" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('auth.new password') }}:</label>
                            <input required title="{{ trans('validate.please fill in this field') }}" name="newpassword" id="newpassword" type="password" class="form-control text-left">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('auth.retype new password') }}:</label>
                            <input title="{{ trans('validate.Please enter the same value again') }}"  name="passwordagain" id="passwordagain" type="password" class="form-control text-left">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ trans('public.send request') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).load(function() {
            $('form').validate({
                rules: {
                    newpassword: "required",
                    passwordagain: {
                        equalTo: "#newpassword"
                    }
                }
            });
        });
    </script>
@endsection