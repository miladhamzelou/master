<form action="{{ url(getCurrentURL('controller').'/OperatingActivity') }}" novalidate="novalidate" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('masterBundle.resume.admin.resume_operating_activity_form')
    <button type="submit" class="btn btn-primary pull-left">{{ trans('public.send request') }}</button>
    @if(count($operating_activity) > 0)
        <a class="btn btn-danger pull-left fa-margin" href="{{ url(getCurrentURL('controller').'/DeleteAll/operating_activity') }}">{{ trans('public.delete all') }}</a>
    @endif
</form>