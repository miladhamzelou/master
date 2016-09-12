<section class="content-header">
    <div class="col-xs-12">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="{{ url(getCurrentURL('prefix')) }}"><i class="fa fa-home"></i> {{ trans('public.Home') }}</a></li>
                @if(config('app.controller'))
                    <li><a href="{{ url(getCurrentURL('controller').'/Index') }}">{{ trans(lcfirst(config('app.controller')) . '.' . config('app.title')) }}</a></li>
                @endif
            </ul>
        </div>
    </div>
</section>
