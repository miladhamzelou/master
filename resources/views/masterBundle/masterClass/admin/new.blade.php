@extends('layout.admin')
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="pull-right">
                <h4 class="panel-title">{{ trans('master.create new class') }}</h4>
            </div>
            <div class="pull-left">
                <a href="{{ url(getCurrentURL('controller').'/ClassList') }}" class="btn-box-tool pull-left"><i class="fa fa-arrow-circle-left"></i></a>
                <a href="{{ url(getCurrentURL('controller')).'/NewClass' }}"  class="btn-box-tool pull-left"><i class="fa fa-plus-square"></i></a>
            </div>
            <div class="row"></div>
        </div>
        <div class="panel-body">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        </div>
                    </div>
                @endif
            @endforeach
            <form action="{{ url(getCurrentURL('controller').'/Store') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('frm.group') ? ' has-error' : '' }}">
                            <label>{{ trans('master.group') }}:<span class="required">*</span></label>
                            <input required title="{{ trans('validate.please fill in this field') }}" type="text" name="frm[group]" class="form-control" value="{{ old('frm.group') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ trans('master.exam date') }}:</label>
                            <input type="text" name="frm[exam_date]" data-datepicker='data-datepicker' value="{{ old('frm.exam_date') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>{{ trans('public.minute') }}:</label>
                            <select name="exam_minute" class="form-control">
                                <option value="">{{ trans('public.select') }}...</option>
                                <option @if(old('exam_minute') == '00') selected @endif value="00">00</option>
                                <option @if(old('exam_minute') == '15') selected @endif value="15">15</option>
                                <option @if(old('exam_minute') == '30') selected @endif value="30">30</option>
                                <option @if(old('exam_minute') == '45') selected @endif value="45">45</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>{{ trans('public.hour') }}:</label>
                            <select name="exam_hour" class="form-control">
                                <option value="">{{ trans('public.select') }}...</option>
                                @for($i = 8 ; $i <= 16 ; $i++ )
                                    <option @if(old('exam_hour') == $i) selected @endif value="{{ $i }}">@if($i < 10) {{ '0'.$i }} @else {{ $i }} @endif</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('frm.term_id') ? ' has-error' : '' }}">
                            <label>{{ trans('master.term') }}:<span class="required">*</span></label>
                            <select title="{{ trans('validate.please fill in this field') }}" required name="frm[term_id]" data-select class="form-control">
                                <option value="">{{ trans('public.select') }}...</option>
                                @if(@$term)
                                    @foreach($term as $trm)
                                        <option @if(old('frm.term_id') == $trm['id']) selected @endif value="{{ $trm['id'] }}">{{ $trm['title'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('frm.university_tree_id') ? ' has-error' : '' }}">
                            <label>{{ trans('master.university') }}:<span class="required">*</span></label>
                            <select title="{{ trans('validate.please fill in this field') }}" required name="frm[university_tree_id]" data-select class="form-control">
                                <option value="">{{ trans('public.select') }}...</option>
                                @if(@$university)
                                    @foreach($university as $uni)
                                        <option @if(old('frm.university_tree_id') == $uni['id']) selected @endif value="{{ $uni['id'] }}">{{ $uni['name'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('frm.lesson_id') ? ' has-error' : '' }}">
                            <label>{{ trans('master.lesson') }}:<span class="required">*</span></label>
                            <select title="{{ trans('validate.please fill in this field') }}" required name="frm[lesson_id]" data-select class="form-control">
                                <option value="">{{ trans('public.select') }}...</option>
                                @if(@$lesson)
                                    @foreach($lesson as $course)
                                        <option @if(old('frm.lesson_id') == $course['id']) selected @endif value="{{ $course['id'] }}">{{ $course['title'] }}</option>
                                    @endforeach
                                @endif
                            </select>
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
    <script>
        $(window).load(function(){
            $('form').validate();
            $('form').submit(function(event){
                if ($("select[name=exam_hour]").val() && !$("select[name=exam_minute]").val() || $("select[name=exam_minute]").val() && !$("select[name=exam_hour]").val() ) {
                    event.preventDefault();
                    toastr.error('ساعت را به درستی وارد کنید.');
                    if ($('.error:visible').length > 0)
                        toastr.error('فرم را تکمیل نکرده اید.');
                } else if ($("select[name=exam_hour]").val() && $("select[name=exam_minute]").val() && !$("input[name='frm[exam_date]']").val()) {
                    event.preventDefault();
                    toastr.error('تاریخ امتحان را وارد نکرده اید.');
                    if ($('.error:visible').length > 0)
                        toastr.error('فرم را تکمیل نکرده اید.');
                }
            });
        })
    </script>
@endsection