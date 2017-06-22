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
                <img src="/images/mini-logo.png" alt="Logo {{ config('app.name') }}">
                {{ config('app.name') }}
            </a>
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