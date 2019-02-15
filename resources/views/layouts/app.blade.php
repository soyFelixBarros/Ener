<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head profile="http://gmpg.org/xfn/11">
        <meta name="robots" content="noodp, noydir">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('description')">
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        @section('css')
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        @show
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body>
        <div id="app">
            @include('partials.header')

            @yield('content')

            @include('partials.footer')
        </div>
        @section('javascript')
        <script src="{{ mix('/js/app.js') }}"></script>
        @show
    </body>
</html>