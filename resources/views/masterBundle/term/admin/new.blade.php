@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.create new term') }}</h4>
            </div>
            <div class="pull-left">
                <a href="{{ url(getCurrentURL('controller').'/TermList') }}" title="{{ trans('public.return') }}" class="btn-box-tool pull-left"><i class="fa fa-arrow-circle-left"></i></a>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 col-md-push-2">
                    @if(count(@$errors) > 0)
                        <div class="alert alert-message">{{ trans('public.fill out the form not') }}</div>
                    @endif
                    @foreach (['danger', 'warning', 'success', 'info', 'message'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <form action="{{ url(getCurrentURL('controller').'/Store') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.title') ? ' has-error' : '' }}">
                                    <label>{{ trans('public.title') }}:<span class="required">*</span></label>
                                    <input required title="{{ trans('validate.please fill in this field') }}." type="text" name="frm[title]" class="form-control" value="{{ old('frm.title') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('frm.code') ? ' has-error' : '' }}">
                                    <label>{{ trans('master.term code') }}:<span class="required">*</span></label>
                                    <input required title="{{ trans('validate.please fill in this field') }}." type="text" name="frm[code]" value="{{ old('frm.code') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('frm.from_date') ? ' has-error' : '' }}">
                                    <label>{{ trans('master.start date') }}:<span class="required">*</span></label>
                                    <input required title="{{ trans('validate.please fill in this field') }}." type="text" name="frm[from_date]" data-datepicker='data-datepicker' value="{{ old('frm.from_date') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('frm.to_date') ? ' has-error' : '' }}">
                                    <label>{{ trans('master.end date') }}:<span class="required">*</span></label>
                                    <input required title="{{ trans('validate.please fill in this field') }}." type="text" name="frm[to_date]" data-datepicker='data-datepicker' value="{{ old('frm.to_date') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary">{{ trans('public.send request') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).load(function() {
            $('form').validate();
            $('form').submit(function(e){
                var from_date = new Date($("*[name='frm[from_date]']").val());
                var to_date = new Date($("*[name='frm[to_date]']").val());
                if(from_date >= to_date) {
                    e.preventDefault();
                    if ($('html').attr('lang') == 'fa') {
                        toastr.error('تاریخ شروع و پایان ترم به درستی وارد نشده است.');
                        toastr.error('فرم رابه درستی تکمیل نکرده اید.');
                    }
                    else {
                        toastr.error('start and end dates of the term has not been entered correctly.');
                        toastr.error('form not completed correctly.');
                    }
                }
            })
        });
    </script>
@endsection