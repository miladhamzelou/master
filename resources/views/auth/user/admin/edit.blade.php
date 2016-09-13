@extends('layout.base')
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                @if(config('app.action') == 'edit')
                    {{ trans('public.Edit Record') }}
                @elseif(strtolower(config('app.action')) == 'create')
                    {{ trans('public.Create New Record') }}
                @endif
            </h3>
            <div class="box-tools pull-right">
                <a href="{{ url(getCurrentURL('controller')).'/create' }}" title="{{ trans('public.create new entity') }}" class="btn-box-tool pull-left"><i class="fa fa-plus"></i></a>
                <a href="{{ url(getCurrentURL('controller')).'/Index' }}" title="{{ trans('public.return to list') }}" class="btn-box-tool pull-left"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="box-body">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <div class="col-md-12">
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    </div>
                @endif
            @endforeach
                <div class="col-md-12" style="margin-bottom: 20px;">
                    @foreach ($errors->all() as $error)
                        <span style="color: red;display: block;position: relative;top: 10px;">{{ $error }}</span>
                    @endforeach
                </div>
            {!! form($form) !!}
        </div>
    </div>
@endsection