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
            <a href="#" class="btn btn-outline-light me-2">Login</a>
            <a href="#" class="btn btn-light">Registro</a>
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
          <div class="col-md-6 left-content">
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
          <div class="col-md-6 left-content">
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
          <div class="col-md-6 left-content">
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
    <h2 class="text-center mb-4">Galería de Arte</h2>
    <div class="row">
      <div class="col-md-2">
        <!-- Filers -->
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
        <!-- News and events -->
        <aside class="noticias">
          <h5>Noticias y Eventos</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><strong>01 Abr:</strong> Expo en Tegucigalpa</li>
            <li class="mb-2"><strong>10 Abr:</strong> Mural en San Pedro</li>
            <li class="mb-2"><strong>15 Abr:</strong> Taller de pintura</li>
          </ul>
        </aside>
      </div>
      <!-- Galería de Obras -->
      <section class="col-md-10">
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <div class="card obra-card" style="width: 15rem;">
            <a href="{{url('artDetails')}}"><img src="{{ asset('img/obra1.jpg') }}" class="card-img-top" alt="Obra 1"></a>
            <div class="card-body text-center">
              <h5 class="card-title">Obra 1</h5>
              <p class="card-text">Descripción breve de la obra.</p>
              <p><strong>$300.00</strong></p>
            </div>
          </div>
          <div class="card obra-card" style="width: 15rem;">
            <img src="{{ asset('img/obra2.jpg') }}" class="card-img-top" alt="Obra 2">
            <div class="card-body text-center">
              <h5 class="card-title">Obra 2</h5>
              <p class="card-text">Otra descripción breve.</p>
              <p><strong>$450.00</strong></p>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <!-- FOOTER -->
  <footer class="bg-dark text-white py-3 mt-auto text-center">
    <div class="container">
      <p class="mb-0">© 2024 Galería de Arte. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>