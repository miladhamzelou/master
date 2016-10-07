@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.master class list') }}</h4>
            </div>
            <div class="pull-left">
                <a href="{{ url(getCurrentURL('controller')).'/NewClass' }}"  class="btn-box-tool pull-left"><i class="fa fa-plus-square"></i></a>
                <a href="{{ url(getCurrentURL('controller').'/ListTree') }}" class="btn-box-tool pull-left" onclick="Admin.reload(event)"><i class="fa fa-refresh"></i></a>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="panel-body">
                <div class="ajax-content">
                    @include('masterBundle.masterClass.admin.ajax')
                </div>
                <img src="{{ asset('assets/admin/img/ajax-loader.gif') }}" class="ajax display-none"/>
            </div>
        </div>
    </div>
@endsection