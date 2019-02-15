<header class="navbar bg-gradient navbar-expand-lg shadow mb-5" role="banner">
    <div class="container">
        <a class="navbar-brand mb-0 h1 font-weight-normal" href="{{ route('home') }}">
            Cablera.Online
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <nav class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a> 
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="/horizon" class="dropdown-item">Horizon</a>
                        <a href="{{ route('admin.dashboard.index') }}" class="dropdown-item">Administración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </div>
                    </li>
                @endauth
                @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Ingresar</a></li>
                @endguest
            </ul>
        </nav>
    </div><!-- .container -->
</header>