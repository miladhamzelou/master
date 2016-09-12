@extends('layout.home')
@section('title') عضویت در سایت @endsection
@section('content')
    @include('home.zone.nav')
    <div class="wrapper" style="margin-top: 20px;">
        <div class="mbot clearfix">
            <section style="min-height: 500px;" class="white-bg col-l-16 ui segment">
                <h1 class="ui header">
                    عضویت در سایت
                </h1>
                <div class="ptop pbot2 row  pl10 pr20">
                    <article class="col-l-16">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('Auth/register') }}" novalidate>
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class=" col-md-3 control-label">نام کاربری:</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control text-left" name="username" value="{{ old('username') }}">
                                    @foreach ($errors->get('username') as $error)
                                        <span style="color: red;display: block;position: relative;top: 10px;">{{ $error }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">پست الکترونیک:</label>
                                <div class="col-md-5">
                                    <input type="email" class="form-control text-left" name="email" value="{{ old('email') }}">
                                    @foreach ($errors->get('email') as $error)
                                        <span style="color: red;display: block;position: relative;top: 10px;">{{ $error }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-3  control-label">پسورد:</label>
                                <div class="col-md-5">
                                    <input type="password" class="form-control text-left" name="password">
                                    @foreach ($errors->get('password') as $error)
                                        <span style="color: red;display: block;position: relative;top: 10px;">{{ $error }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">تایید پسورد</label>
                                <div class="col-md-5">
                                    <input type="password" class="form-control text-left" name="password_confirmation">
                                    @foreach ($errors->get('password_confirmation') as $error)
                                        <span style="color: red;display: block;position: relative;top: 10px;">{{ $error }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-push-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> عضویت در سایت
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
