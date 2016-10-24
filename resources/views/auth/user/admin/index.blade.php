@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('auth.users') }}</h4>
            </div>
            <div class="pull-left">
                <a onclick="Admin.reload(event)" href="{{ url(getCurrentURL('controller').'/UsersList') }}"><span class="fa fa-refresh"></span></a>
                <a href="{{ url(getCurrentURL('controller').'/SearchForm') }}" class="btn btn-box-tool" data-status="close" onclick="Admin.search(this, event)" title="{{ trans('public.search entity') }}"><i class="fa fa-search"></i></a>
                <a href="{{ url(getCurrentURL('controller').'/NewUser') }}"><span class="fa fa-plus-square"></span></a>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="search-box" style=" display: none"></div>
            <div class="ajax-content">
                @include('auth.user.admin.ajax')
            </div>
            <img src="{{ asset('assets/admin/img/ajax-loader.gif') }}" class="ajax display-none"/>
        </div>
    </div>
    <div id="ajax-result" style="display: none"></div>
@endsection