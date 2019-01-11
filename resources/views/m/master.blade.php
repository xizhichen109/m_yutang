<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/m.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <div id="app" class="wrap">
        <router-view></router-view>
        <p_tab></p_tab>
        {{--<ul class="tab">
            <router-link  to="/venue" tag="li"><i class="glyphicon glyphicon-home"></i> 场馆</router-link>
            <router-link to="/game" tag="li"><i class="glyphicon glyphicon-fire"></i> 活动</router-link>
            <router-link to="/find" tag="li"><i class="glyphicon glyphicon-search"></i> 发现</router-link>
            <router-link to="/about" tag="li"><i class="glyphicon glyphicon-user"></i> 我的</router-link>
        </ul>--}}
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/responsive.js') }}"></script>
</body>
</html>
