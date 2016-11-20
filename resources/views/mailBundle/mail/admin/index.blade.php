@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('mail.send mail') }}</h4>
            </div>
            <div class="pull-left">
                <a onclick="Admin.reload(event)" href="{{ url(getCurrentURL('controller').'/MailList') }}"><span class="fa fa-refresh"></span></a>
                <a  href="{{ url(getCurrentURL('controller').'/NewMail') }}"><span class="fa fa-plus-square"></span></a>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="ajax-content">
                @include('mailBundle.mail.admin.ajax')
            </div>
            <img src="{{ asset('assets/admin/img/ajax-loader.gif') }}" class="ajax display-none"/>
        </div>
    </div>
    <div id="ajax-result" style="display: none"></div>
@endsection