<!doctype html>
<html lang="es" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Galería de Arte</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column h-100">
  <!-- HEADER -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">🎨 Galería</a>
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
                                  <a class="dropdown-item" href="#">Ver perfil</a>
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
            <img src="{{ asset('img/Enmanuel1.webp') }}" alt="Imagen 1">
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
            <img src="{{ asset('img/Enmanuel2.webp') }}" alt="Imagen 2">
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
            <img src="{{ asset('img/Enmanuel3.webp') }}" alt="Imagen 3">
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

  <main class="container my-5 flex-grow-1">
      @include('galery/galeryArt')
  </main>
  <!-- FOOTER -->
  <footer class="bg-dark text-white py-3 mt-auto text-center">
    <div class="container">
      <p class="mb-0">© 2024 Galería de Arte. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>
