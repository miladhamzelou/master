<form action="{{ url(getCurrentURL('controller').'/Conferences') }}" novalidate="novalidate" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('masterBundle.resume.admin.resume_conferences_form')
    <button type="submit" class="btn btn-primary pull-left">{{ trans('public.send request') }}</button>
    @if(count($conferences) > 0)
        <a class="btn btn-danger pull-left fa-margin" href="{{ url(getCurrentURL('controller').'/DeleteAll/conferences') }}">{{ trans('public.delete all') }}</a>
    @endif
</form>