@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.training course') }}</h4>
            </div>
            <div class="pull-left">
                <a onclick="Admin.reload(event)" href="{{ url(getCurrentURL('controller').'/TermList') }}"><span class="fa fa-refresh"></span></a>
                <a href="{{ url(getCurrentURL('controller').'/Create') }}"><span class="fa fa-plus-square"></span></a>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="ajax-content">
                @include('masterBundle.term.admin.ajax')
            </div>
            <img src="{{ asset('assets/admin/img/ajax-loader.gif') }}" class="ajax display-none"/>
        </div>
    </div>
    <div id="ajax-result" style="display: none"></div>
@endsection