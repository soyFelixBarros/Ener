<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head profile="http://gmpg.org/xfn/11">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T98BC6T');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Rastreador de noticias">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T98BC6T"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}" rel="home">
                        <img src="/images/mini-logo.png" alt="{{ config('app.name') }}">
                    </a>
                    <p class="navbar-text">Noticias de Chaco</p>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li{{ Request::is('/') ? ' class=active' : '' }}><a href="{{ url('/') }}">{{ __('navbar.home') }}</a></li>
                        <li{{ Request::is('category/politica') ? ' class=active' : '' }}><a href="{{ route('category_show', ['category' => 'politica']) }}">{{ __('navbar.politics') }}</a></li>
                        <li{{ Request::is('category/policiales') ? ' class=active' : '' }}><a href="{{ route('category_show', ['category' => 'policiales']) }}">Policiales</a></li>
                        <li{{ Request::is('category/deportes') ? ' class=active' : '' }}><a href="{{ route('category_show', ['category' => 'deportes']) }}">Deportes</a></li>
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
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-100207187-1', 'auto');
      ga('send', 'pageview');

    </script>
</body>
</html>
