<header class="sticky">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">🎨 Galería</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="{{url('/')}}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('ObrasArte')}}">Obras de arte</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('aboutUs')}}">Artista</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url ('eventsNews')}}">Eventos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url ('contactUs')}}">Contacto</a></li>
                </ul>
            </div>
            <!-- Login/Register -->
            <div class="d-flex">
                @guest
                    <li class="nav-item">
                        <a class="btn btn-outline-light mr-2" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="{{ route('register') }}">Registro</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

                            @if(Auth::user()->rol === 'admin')
                                <a class="dropdown-item" href="{{ asset('/admin') }}">Panel de administración</a>
                            @endif

                                <a class="dropdown-item" href="{{route('perfil')}}">Ver perfil</a>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Cerrar sesión</button>
                            </form>
                        </div>
                    </li>
                @endauth
            </div>
        </div>
    </nav>
</header>
