<header class="custom-header">
    <!-- Barra superior -->
    <div class="custom-nav">
        <div class="left">
            <button class="menu-toggle" id="menuToggle">
                &#9776; <span>MENU</span>
            </button>
        </div>

        <div class="center">
            <div class="brand d-flex align-items-center justify-content-center gap-2">
                <a href="{{route('inicio')}}"><img src="{{ asset('img/logo.png') }}" alt="Logo Enmanuel Membreño" class="logo-img" title="Galeria de arte Enamnuel Membreño"></a>
            </div>
        </div>

        <div class="right">
            <a href="{{ url('contactUs') }}" class="contact-link">CONTACTO ✉</a>
        </div>
    </div>

    <!-- Menú lateral hamburguesa -->
    <div id="sideMenu" class="side-menu">
        <button class="close-btn" id="closeMenu">&times;</button>
        <ul class="nav flex-column p-3">
            <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('ObrasArte')}}">Obras de arte</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('aboutUs')}}">Artista</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('events')}}">Eventos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('contactUs')}}">Contacto</a></li>

            @guest
                <li class="nav-item mt-3 d-flex align-items-center gap-2">
                    <span style="font-size: 18px; color: #5c3d99;">&#128100;</span>
                    <div>
                        <a href="{{ route('login') }}" class="nav-link p-0 d-inline">Iniciar sesión</a>
                        <span style="color: white">/</span>
                        <a href="{{ route('register') }}" class="nav-link p-0 d-inline">Regístrate</a>
                    </div>
                </li>
            @endguest


            @auth
                <li class="nav-item mt-3 text-center fw-bold">
                    {{ Auth::user()->name }}
                </li>
                @if(Auth::user()->rol === 'admin')
                    <li class="nav-item"><a class="nav-link" href="{{ asset('/admin') }}">Panel de administración</a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{route('perfil')}}">Ver perfil</a></li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 mt-2">Cerrar sesión</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</header>
