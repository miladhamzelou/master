@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.change resume') }}</h4>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-7 col-md-push-2">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <form action="{{ url(getCurrentURL('controller').'/ChangeResume') }}" novalidate="novalidate" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.resume.name') ? ' has-error' : '' }}">
                                    <label>{{ trans('auth.name') }}:</label>
                                    <input  type="text" class="form-control" name="frm[resume][name]">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.resume.family') ? ' has-error' : '' }}">
                                    <label>{{ trans('auth.family') }}:</label>
                                    <input  type="text" class="form-control" name="frm[resume][family]">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.resume.science_ranking_id') ? ' has-error' : '' }}">
                                    <label>{{ trans('master.science ranking') }}:</label>
                                    <select class="form-control" name="frm[resume][science_ranking_id]">
                                        <option value="">{{ trans('public.select') }}...</option>
                                        @foreach($science_ranking as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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