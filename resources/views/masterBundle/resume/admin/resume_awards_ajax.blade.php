<form action="{{ url(getCurrentURL('controller').'/Awards') }}" novalidate="novalidate" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('masterBundle.resume.admin.resume_awards_form')
    <button type="submit" class="btn btn-primary pull-left">{{ trans('public.send request') }}</button>
    @if(count($awards) > 0)
        <a class="btn btn-danger pull-left fa-margin" href="{{ url(getCurrentURL('controller').'/DeleteAll/awards') }}">{{ trans('public.delete all') }}</a>
    @endif
</form>