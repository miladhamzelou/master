@extends('layout.admin')
@section('content')
    <div class="wrapper" style="margin-top: 20px;">
        <div class="mbot clearfix">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
            <section style="min-height: 500px;" class="white-bg col-l-16 ui segment">
                <h1 class="ui header">
                    ورود به سایت
                </h1>
                <div class="ptop pbot2 row  pl10 pr20">
                    <article class="col-l-16">
                        <form class="form-horizontal" novalidate role="form" method="POST" action="{{ url(getLocale().'/Auth/login') }}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">پست الکترونیک:</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control text-left" name="field" value="{{ old('field') }}">
                                    @foreach ($errors->get('field') as $error)
                                        <span style="color: red;display: block;position: relative;top: 10px;">{{ $error }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">پسورد</label>
                                <div class="col-md-5">
                                    <input type="password" class="form-control text-left" name="password">
                                    @foreach ($errors->get('password') as $error)
                                        <span style="color: red;display: block;position: relative;top: 10px;">{{ $error }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-push-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> مرا به خاطر بسپار
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-push-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> ورود به سایت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </article>
                </div>
            </section>
        </div>
    </div>
@endsection