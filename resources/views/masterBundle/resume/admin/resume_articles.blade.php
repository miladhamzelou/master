@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.articles') }}</h4>
            </div>
            <div class="pull-left">
                <a href="{{ url(getCurrentURL('controller').'/Articles') }}" class="btn-box-tool pull-left" onclick="Admin.reload(event)"><i class="fa fa-refresh"></i></a>
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
                    <div class="ajax-content">
                        @include('masterBundle.resume.admin.resume_articles_ajax')
                    </div>
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