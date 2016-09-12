@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans(lcfirst(config('app.controller')) . '.' . ucwords(str_replace('_',' ',snake_case(config('app.controller'))))) }}</h3>
            <div class="box-tools pull-right">
                <a href="{{ url(getCurrentURL('controller')).'/create' }}" title="{{ trans('public.Create New Entity') }}" class="btn-box-tool pull-left"><i class="fa fa-plus"></i></a>
                <a href="{{ url(getCurrentURL('controller').'/index') }}" title="{{ trans('public.Reload List') }}" class="btn-box-tool pull-left" onclick="Admin.reload(event)"><i class="fa fa-refresh"></i></a>
{{--                <a href="{{ url(getCurrentURL('controller').'/searchForm') }}" class="btn btn-box-tool pull-left" data-status="close" onclick="Admin.search(this, event)" title="{{ trans('public.Search Entity') }}"><i class="fa fa-search"></i></a>--}}
                <img src="{{ asset('assets/admin/img/loader.gif') }}" class="ajax-loader display-none"/>
            </div>
        </div>
        <div class="box-body">
            <div class="search-box" style="display: none"></div>
            <div class="ajax-content">
            @include(lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix')) . '.ajax')
            </div>
        </div>
    </div>
@endsection