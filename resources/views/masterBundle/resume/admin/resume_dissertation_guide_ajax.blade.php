<form action="{{ url(getCurrentURL('controller').'/DissertationGuide') }}" novalidate="novalidate" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('masterBundle.resume.admin.resume_dissertation_guide_form')
    <button type="submit" class="btn btn-primary pull-left">{{ trans('public.send request') }}</button>
    @if(count($dissertation_guide) > 0)
        <a class="btn btn-danger pull-left fa-margin" href="{{ url(getCurrentURL('controller').'/DeleteAll/dissertation_guide') }}">{{ trans('public.delete all') }}</a>
    @endif
</form>