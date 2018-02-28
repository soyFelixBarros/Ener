<header class="navbar navbar-light bg-white border-bottom navbar-expand-lg fixed-top mb-4" role="banner">
    <div class="container">
        <a class="navbar-brand mb-0 h1" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>

        <nav class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item{{ request()->is('newspapers*') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('newspapers') }}">Diarios <span class="sr-only">(current)</span></a>
                </li>
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin_posts') }}" class="dropdown-item">Administración</a>
                            <div class="dropdown-divider"></div>
                            @endif
                            <a href="{{ route('profile') }}" class="dropdown-item">Perfil</a>
                            <a href="{{ route('security') }}" class="dropdown-item">Seguridad</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        </div>
                    </li>
                @endif
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/search">
                <img src="https://www.algolia.com/static_assets/images/press/downloads/search-by-algolia.svg" width="130" class="mr-3">
                <input name="q" class="form-control mr-sm-2" type="search" aria-label="Search" value="{{ old('q') }}">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </nav>
    </div><!-- .container -->
</header>