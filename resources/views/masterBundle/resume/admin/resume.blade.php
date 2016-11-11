@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.full resume') }}</h4>
            </div>
            <div class="pull-left">
                <a href="{{ url(getCurrentURL('controller').'/Resume') }}" class="btn-box-tool pull-left" onclick="Admin.reload(event)"><i class="fa fa-refresh"></i></a>
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
                    <form action="{{ url(getCurrentURL('controller').'/Resume') }}" method="post" novalidate>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <legend>اطلاعات فردی</legend>
                            <div class="">@include('masterBundle.resume.admin.resume_personal_info_form')</div>
                        </fieldset>
                        <fieldset>
                            <legend>اطلاعات فردی</legend>
                            @include('masterBundle.resume.admin.resume_conferences_form')
                        </fieldset>
                        <fieldset>
                            <legend>اطلاعات فردی</legend>
                            @include('masterBundle.resume.admin.resume_dissertation_guide_form')
                        </fieldset>
                        <fieldset>
                            <legend>اطلاعات فردی</legend>
                            @include('masterBundle.resume.admin.resume_education_form')
                        </fieldset>
                        <fieldset>
                            <legend>اطلاعات فردی</legend>
                            @include('masterBundle.resume.admin.resume_articles_form')
                        </fieldset>
                        <fieldset>
                            <legend>اطلاعات فردی</legend>
                            @include('masterBundle.resume.admin.resume_awards_form')
                        </fieldset>
                        <fieldset>
                            <legend>اطلاعات فردی</legend>
                            @include('masterBundle.resume.admin.resume_book_compilation_form')
                        </fieldset>
                        <fieldset>
                            <legend>اطلاعات فردی</legend>
                            @include('masterBundle.resume.admin.resume_translated_book_form')
                        </fieldset>
                        <fieldset>
                            <legend>اطلاعات فردی</legend>
                            @include('masterBundle.resume.admin.resume_operating_activity_form')
                        </fieldset>
                        <button type="submit" class="btn btn-primary pull-left">{{ trans('public.send request') }}</button>
                        <a class="btn btn-danger pull-left fa-margin" href="{{ url(getCurrentURL('controller').'/DeleteAll') }}">{{ trans('public.delete all') }}</a>
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