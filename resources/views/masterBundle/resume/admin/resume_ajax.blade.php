<form action="{{ url(getCurrentURL('controller').'/Resume') }}" method="post" novalidate>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <fieldset>
        <legend>{{ trans('master.personal info') }}</legend>
        <div class="">@include('masterBundle.resume.admin.resume_personal_info_form')</div>
    </fieldset>
    <fieldset>
        <legend>{{ trans('master.conferences') }}</legend>
        @include('masterBundle.resume.admin.resume_conferences_form')
    </fieldset>
    <fieldset>
        <legend>{{ trans('master.dissertation guide') }}</legend>
        @include('masterBundle.resume.admin.resume_dissertation_guide_form')
    </fieldset>
    <fieldset>
        <legend>{{ trans('master.education') }}</legend>
        @include('masterBundle.resume.admin.resume_education_form')
    </fieldset>
    <fieldset>
        <legend>{{ trans('master.articles') }}</legend>
        @include('masterBundle.resume.admin.resume_articles_form')
    </fieldset>
    <fieldset>
        <legend>{{ trans('master.awards and honors') }}</legend>
        @include('masterBundle.resume.admin.resume_awards_form')
    </fieldset>
    <fieldset>
        <legend>{{ trans('master.books compilation') }}</legend>
        @include('masterBundle.resume.admin.resume_book_compilation_form')
    </fieldset>
    <fieldset>
        <legend>{{ trans('master.translated books') }}</legend>
        @include('masterBundle.resume.admin.resume_translated_book_form')
    </fieldset>
    <fieldset>
        <legend>{{ trans('master.operating activity') }}</legend>
        @include('masterBundle.resume.admin.resume_operating_activity_form')
    </fieldset>
    <button type="submit" class="btn btn-primary pull-left">{{ trans('public.send request') }}</button>
    <a class="btn btn-danger pull-left fa-margin" href="{{ url(getCurrentURL('controller').'/DeleteAll') }}">{{ trans('public.delete all') }}</a>
</form>