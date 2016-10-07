<!DOCTYPE html>
<html dir="{{ Config::get('app.dir') }}" lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    @section('stylesheets')
        <link href="{{ asset('assets/tools/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/tools/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/tools/fonts/fonts.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/tools/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/select2/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/datepicker/css/persianDatepicker-default.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/fancybox/source/jquery.fancybox.css') }}" type="text/css" media="screen" />
        @if(Config::get('app.dir') == 'rtl')
            <link href="{{ asset('assets/tools/bootstrap/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
            <link href="{{ asset('assets/admin/css/rtl/style-rtl.css') }}" rel="stylesheet">
        @elseif(Config::get('app.dir') == 'ltr')
            <link href="{{ asset('assets/admin/css/ltr/style-ltr.css') }}" rel="stylesheet">
        @endif
        <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    @show
    @section('javascript')
        <script src="{{ asset('assets/tools/bootstrap/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/tools/jquery.validate/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/tools/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- plugin -->
        <script src="{{ asset('assets/tools/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/tools/select2/select2.min.js') }}"></script>
        <script src="{{ asset('assets/tools/datepicker/js/persianDatepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/tools/fancybox/source/jquery.fancybox.pack.js') }}"></script>
        <!-- end plugin -->
        <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
        <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    @show
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
</head>
<body>
@include('admin.zone.header')
<div class="container">
    <div class="row">
        <div id="main-content">
            <div class="col-md-3">
                @include('admin.zone.sidebar')
            </div>
            <div class="col-md-9">
                <div id="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.zone.footer')
<script>
    $(document).ready(function () {
        Admin.init();
    });
</script>
</body>