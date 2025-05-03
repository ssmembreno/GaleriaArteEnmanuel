<!doctype html>
<html lang="es" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galería de Arte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column h-100">
<!-- HEADER -->
<header>
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
                    <li class="nav-item"><a class="nav-link" href="{{url('aboutUs')}}">Artista</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('eventsNews')}}">Eventos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('contactUs')}}">Contacto</a></li>
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
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('perfil')}}">Ver perfil</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </div>
        </div>
    </nav>
</header>

<!-- CARRUSEL-->
<div id="heroSlider" class="carousel slide hero-carousel carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="row g-0">
                <div class="col-md-6 left-content slide1">
                    <h1>BUY ART ONLINE</h1>
                    <p>Where to Buy Contemporary Art? ArtMajeur! The Art Gallery with 3,600,000 works for sale by international artists.</p>
                    <a href="#" class="btn btn-purple">Browse artworks</a>
                </div>
                <div class="col-md-6 right-image">
                    <img src="{{ asset('img/Enmanuel1.jpg') }}" alt="Imagen 1">
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="row g-0">
                <div class="col-md-6 left-content slide2">
                    <h1>EXHIBITIONS</h1>
                    <p>Discover new exhibitions from local and international artists.</p>
                    <a href="#" class="btn btn-purple">View events</a>
                </div>
                <div class="col-md-6 right-image">
                    <img src="{{ asset('img/Enmanuel2.jpg') }}" alt="Imagen 2">
                </div>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="row g-0">
                <div class="col-md-6 left-content slide3">
                    <h1>PROMOTE YOUR ART</h1>
                    <p>Join the platform and showcase your talent to the world.</p>
                    <a href="#" class="btn btn-purple">Start now</a>
                </div>
                <div class="col-md-6 right-image">
                    <img src="{{ asset('img/Enmanuel3.jpg') }}" alt="Imagen 3">
                </div>
            </div>
        </div>
    </div>
    <!--Indicators
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
    -->
    <!-- Buttons carousel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="container">
    <h2 class="text-center my-4">Galería de Arte</h2>
    <div class="d-flex gap-4">
        <!-- Sidebar filtros -->
        <div class="d-none d-md-block" style="min-width: 220px;">
            <aside class="filtros mb-4">
                <h5>Filtros</h5>
                <div class="mb-3">
                    <label class="form-label">Tipo de obra</label>
                    <select class="form-select">
                        <option>Todas</option>
                        <option>Pintura</option>
                        <option>Escultura</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio máximo</label>
                    <input type="number" class="form-control" placeholder="500">
                </div>
                <button class="btn btn-primary w-100">Aplicar</button>
            </aside>

            <aside class="noticias">
                <h5>Noticias y Eventos</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><strong>01 Abr:</strong> Expo en Tegucigalpa</li>
                    <li class="mb-2"><strong>10 Abr:</strong> Mural en San Pedro</li>
                    <li class="mb-2"><strong>15 Abr:</strong> Taller de pintura</li>
                </ul>
            </aside>
        </div>

        <!-- Galería tipo masonry -->
        <div class="row gx-4 gy-5">
            @forelse($obras as $obra)
                <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="obra-card text-center h-100 d-flex flex-column justify-content-between">
                        <div class="obra-img-wrapper position-relative">
                            <a href="{{ route('obraDetails', $obra->id) }}">
                                @if ($obra->estado === 'Vendida')
                                    <div class="ribbon"><span>Vendida</span></div>
                                @endif
                                <img src="{{ asset('storage/'.$obra->imagen) }}" alt="{{ $obra->nombre }}">
                            </a>
                        </div>
                        <div class="obra-info mt-3 px-2 pb-3">
                            <strong>{{ $obra->nombre }}</strong>

                            @if(auth()->check())
                                <!--Manejo de favoritos con JS y AJAX para evitar el recargo de la web al añadir una obra a favoritos-->
                                <button type="button" class="btn toggle-favorito" data-id="{{ $obra->id }}">
                                    {{ auth()->check() && auth()->user()->favoritos()->where('obra_id', $obra->id)->exists() ? '❤️' : '🤍' }}
                                </button>
                            @endif


                            <small>{{ $obra->descripcion }}</small>
                            <span>{{ number_format($obra->precio, 2) }} $</span>
                        </div>
                    </div>
                </div>
            @empty
                <p>No hay obras disponibles por ahora.</p>
            @endforelse
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white py-3 mt-auto text-center">
    <div class="container">
        <p class="mb-0">© 2024 Galería de Arte. Todos los derechos reservados.</p>
    </div>
</footer>
</body>
</html>

