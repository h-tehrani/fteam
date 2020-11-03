<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css\UserCss\defaultPc.css') }}" rel="stylesheet" media="screen and (min-width: 1000px)" />
    <link href="{{ asset('css\UserCss\defaultTablet.css') }}" rel="stylesheet" media="screen and (max-width: 1000px)" />
    <link href="{{ asset('css\UserCss\defaultMobile.css') }}" rel="stylesheet" media="screen and (max-width: 500px)" />
    <link href="{{ asset('css\bootstrap-rtl.min.css') }}" rel="stylesheet" />
    <title>طراحی وب اف تیم </title>
</head>
<body style="scroll-behavior:smooth!important;">
<div class="container-fluid">
    @include('partials.errors')
    @include('partials.Header')
    @yield('content')
    @include('partials.Footer')
</div>
{{--scripts--}}
<script src="/js/app.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/default.js"></script>
<script src="/js/axios.js"></script>
<script src="/js/custom.js"></script>


</body>
</html>
