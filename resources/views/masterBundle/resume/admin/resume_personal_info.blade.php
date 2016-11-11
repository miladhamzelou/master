@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.personal info') }}</h4>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <form action="{{ url(getCurrentURL('controller').'/PersonalInfo') }}" novalidate="novalidate" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('masterBundle.resume.admin.resume_personal_info_form')
                        <button type="submit" class="btn btn-primary pull-left">{{ trans('public.send request') }}</button>
                        @if(count($personal_info) > 0)
                            <a class="btn btn-danger pull-left fa-margin" href="{{ url(getCurrentURL('controller').'/DeleteAll/personal_info') }}">{{ trans('public.delete all') }}</a>
                        @endif
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