<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Rastreador de noticias">
    <title>@yield('title')</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li{{ Request::is('/') ? ' class=active' : '' }}><a href="{{ url('/') }}">Inicio</a></li>
                        <li{{ Request::is('category/politica') ? ' class=active' : '' }}><a href="{{ route('category_show', ['category' => 'politica']) }}">Política</a></li>
                        <li{{ Request::is('category/policiales') ? ' class=active' : '' }}><a href="{{ route('category_show', ['category' => 'policiales']) }}">Policiales</a></li>
                        <li{{ Request::is('category/cultura') ? ' class=active' : '' }}><a href="{{ route('category_show', ['category' => 'cultura']) }}">Cultura</a></li>
                        @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->hasRole('admin'))
                                <li><a href="{{ route('admin_posts') }}">Administración</a></li>
                                @endif
                                <li><a href="{{ route('favorites') }}">Favorities</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header"><i class="fa fa-fw fa-btn fa-cog"></i> Settings</li>
                                <li>
                                    <a href="{{ route('profile') }}">Profile</a>
                                    <a href="{{ route('security') }}">Security</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-fw fa-btn fa-sign-out"></i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
