<form action="{{ url(getCurrentURL('controller').'/BookCompilation') }}" novalidate="novalidate" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('masterBundle.resume.admin.resume_book_compilation_form')
    <button type="submit" class="btn btn-primary pull-left">{{ trans('public.send request') }}</button>
    @if(count($book_compilation) > 0)
        <a class="btn btn-danger pull-left fa-margin" href="{{ url(getCurrentURL('controller').'/DeleteAll/book_compilation') }}">{{ trans('public.delete all') }}</a>
    @endif
</form>