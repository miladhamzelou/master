<!DOCTYPE html>
<html  dir="{{ Config::get('app.dir') }}" lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="URL" content="@if(config('app.controller')){{ getCurrentURL('action') }}@else{{ getCurrentURL('prefix') }}@endif">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @if(config('app.controller'))
            {{ trans('public.Administrator') }} :: {{ trans(lcfirst(config('app.controller')).'.'.config('app.title')) }}
        @elseif(config('app.prefix') == 'Admin') ::
            @if(@Auth::user()->info()['name']){{ @Auth::user()->info()['name'] .' '.@Auth::user()->info()['family'] }} @else {{ @Auth::user()->info()['username'] }} @endif
        @endif
    </title>
    @section('stylesheets')
        <link href="{{ asset('assets/tools/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/tools/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/tools/fonts/fonts.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/admin/css/skins/skin-blue.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/select2/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/datepicker/css/persianDatepicker-default.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/fancybox/source/jquery.fancybox.css') }}" type="text/css" media="screen" />
        @if(Config::get('app.dir') == 'rtl')
            <link href="{{ asset('assets/tools/bootstrap/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
            <link href="{{ asset('assets/admin/css/rtl/AdminLTE-rtl.css') }}" rel="stylesheet">
            <link href="{{ asset('assets/admin/css/rtl/style-rtl.css') }}" rel="stylesheet">
        @elseif(Config::get('app.dir') == 'ltr')
            <link href="{{ asset('assets/admin/css/ltr/AdminLTE-ltr.css') }}" rel="stylesheet">
            <link href="{{ asset('assets/admin/css/ltr/style-ltr.css') }}" rel="stylesheet">
        @endif
        <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    @show
    @section('javascript')
        <script src="{{ asset('assets/tools/bootstrap/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/tools/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--[if lt IE 9]>
        <script src="{{ asset('assets/tools/bootstrap/js/html5shiv.js') }}"></script>
        <script src="{{ asset('assets/tools/bootstrap/js/respond.js') }}"></script>
        <![endif]-->
        <!-- plugin -->
        <script src="{{ asset('assets/tools/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/tools/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/tools/select2/select2.min.js') }}"></script>
        <script src="{{ asset('assets/tools/datepicker/js/persianDatepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/tools/fancybox/source/jquery.fancybox.pack.js') }}"></script>
        <!-- end plugin -->
        <script src="{{ asset('assets/admin/js/AdminLTE.js') }}"></script>
        <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
        <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    @show
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin.zone.header')
    @include('admin.zone.sidebar')
    <div class="content-wrapper">
        @include('admin.zone.navigation')
        <div class="row"></div>
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('admin.zone.footer')
</div>
<div id="ajax-result" style="display: none"></div>
@if(Config::get('app.dir') == 'rtl')
    <script>
        $('.sidebar-toggle').click(function () {
            $('.breadcrumb').toggleClass('margin-50');
            if($(document).width() < 940) {
                $('.breadcrumb').toggleClass('margin-50');
            }
            $('.main-sidebar').css({ 'height' : $(document).height() });
        })
    </script>
@endif
<script>
    $(document).ready(function () {
        Admin.init();
    });
</script>
</body>