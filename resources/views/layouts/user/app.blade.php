<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đặc sản ba miền</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://bootstraptaste.com" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Html::style('css/app.css') !!}
    {!! Html::script('js/app.js') !!}

    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ asset('metisMenu/dist/metisMenu.min.js') }}"></script>

    {{ Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('/bower_components/font-awesome/css/font-awesome.min.css') }}
    {{ Html::script('/bower_components/jquery/dist/jquery.min.js') }}
    {{ Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}

    <link href="{{ asset('user/css/user.css') }}" rel="stylesheet">

    <link href="{{ asset('user/css/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/jcarousel.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/jcarousel.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/flexslider.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/skins/default.css') }}" rel="stylesheet">
    
    <script src="{{ asset('user/js/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('user/js/jquery.fancybox-media.js') }}"></script>
    <script src="{{ asset('user/js/portfolio/jquery.quicksand.js') }}"></script>
    <script src="{{ asset('user/js/portfolio/setting.js') }}"></script>
    <script src="{{ asset('user/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('user/js/animate.js') }}"></script>
    <script src="{{ asset('user/js/custom.js') }}"></script>
</head>
<body>
    <div id="wrapper">
        @include('layouts.user.header')
        @yield('content')
        @include('layouts.user.footer')
    </div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</body>
</html>
