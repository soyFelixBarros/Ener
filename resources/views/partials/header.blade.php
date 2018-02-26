<header class="navbar navbar-light bg-light navbar-expand-lg mb-4" role="banner">
    <div class="container">
        <a class="navbar-brand mb-0 h1" href="{{ route('home') }}">
            {{--  <img src="/images/mini-logo.png" width="30" height="30" class="d-inline-block align-top" alt="Mini logo {{ route('home') }}">  --}}
            {{ config('app.name') }}
        </a>
        <span class="navbar-text">
            Chaco, Argentina
        </span>

        <nav class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
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
                            <a href="{{ route('profile') }}" class="dropdown-item">Profile</a>
                            <a href="{{ route('security') }}" class="dropdown-item">Security</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        </div>
                    </li>
                @endif
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/search">
                <input name="q" class="form-control mr-sm-2" type="search" aria-label="Search" value="{{ old('q') }}">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </nav>
    </div><!-- .container -->
</header>