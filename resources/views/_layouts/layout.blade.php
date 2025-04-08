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
            <li class="nav-item"><a class="nav-link" href="{{url ('eventsNews')}}">Eventos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url ('contactUs')}}">Contacto</a></li>
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

  <main>
        @yield('content')
        @yield('contentAboutUs')
        @yield('contentContactUs')
        @yield('contentEventsNews')
  </main>

  <!-- FOOTER -->
  <footer class="bg-dark text-white py-3 mt-auto text-center">
    <div class="container">
      <p class="mb-0">© 2024 Galería de Arte. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>