<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>118food :: @yield('title')</title>
    @yield('description')
    @yield('keywords')
    @section('stylesheets')
        <link href="{{ asset('assets/tools/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/tools/bootstrap/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/tools/fonts/fonts.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/tools/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/tools/fancybox/source/jquery.fancybox.css') }}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{ asset('assets/tools/rating/dist/themes/bootstrap-stars.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/select2/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tools/toastr/toastr.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/z1.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/z2.css') }}" />
        <link href="{{ asset('assets/home/css/style.css') }}" rel="stylesheet">
    @show
    @section('javascript')
        <script src="{{ asset('assets/tools/bootstrap/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/tools/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/tools/select2/select2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/tools/fancybox/source/jquery.fancybox.pack.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/tools/rating/jquery.barrating.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/tools/custombox-master/dist/custombox.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/tools/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/home/js/home.js') }}"></script>
        <script src="{{ asset('assets/home/js/custom.js') }}"></script>
    @show
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
</head>
<body class="start ct-present is-responsive en">
@yield('content')
{{--@include('home.zone.footer')--}}
</body>
</html>
