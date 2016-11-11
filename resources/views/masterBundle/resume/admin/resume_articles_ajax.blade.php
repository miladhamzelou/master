<form action="{{ url(getCurrentURL('controller').'/Articles') }}" novalidate="novalidate" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('masterBundle.resume.admin.resume_articles_form')
    <button type="submit" class="btn btn-primary pull-left">{{ trans('public.send request') }}</button>
    @if(count($articles) > 0)
        <a class="btn btn-danger pull-left fa-margin" href="{{ url(getCurrentURL('controller').'/DeleteAll/articles') }}">{{ trans('public.delete all') }}</a>
    @endif
</form>