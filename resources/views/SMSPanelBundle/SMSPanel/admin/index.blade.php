@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('sms.SMSPanel') }}</h4>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="ajax-content">
                <div class="alert alert-info">
                    <p>{{ trans('sms.SMS service is not active for you') }}<span data-toggle="tooltip" data-placement="bottom" title="{{ trans('sms.To activate the service via e-mail info[at]andishe-farda.ir') }}" class="@if(config('app.dir') == 'rtl') pull-left @else pull-right @endif fa fa-info-circle"></span></p>
                </div>
            </div>
        </div>
    </div>
@endsection