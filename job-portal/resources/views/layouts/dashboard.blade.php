<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::user()->id }}">
    <title>
        @yield('title')
    </title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @yield('css')
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    @yield('js')
</head>
<body>
    <div id="dashboard" class="wrapper">
        @include('dashboard.includes.nav')
        @include('dashboard.includes.sidebar')
        <div class="content-wrapper">
            @include('dashboard.includes.header')
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        @include('dashboard.includes.footer')
    </div>
</body>
</html>
