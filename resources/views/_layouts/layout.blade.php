<!doctype html>
<html lang="es" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Galería de Arte de [Nombre del Artista] | Obras, Eventos y Valoraciones</title>
    <link rel="icon" href="{{asset('img/logo.png')}}">

    <!-- Descripción SEO -->
    <meta name="description" content="Explora la galería de arte de Enmanuel Membreño, un talentoso pintor hondureño. Descubre obras únicas, califícalas, deja comentarios y entérate de próximos eventos artísticos.">

    <!-- Palabras clave -->
    <meta name="keywords" content="galería de arte, arte hondureño, pinturas, cuadros, artista hondureño, eventos de arte, exposición de arte, obras de arte online">

    <!-- Robots para indexación -->
    <meta name="robots" content="index, follow">

    <!-- Canonical URL -->
    <link rel="canonical" href="" />

    <!-- CSRF Token para Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--more SEO-->
    <meta property="og:title" content="Galería de Arte de Enmanuel Membreño">
    <meta property="og:description" content="Descubre el arte original de un pintor hondureño. Visualiza, comenta y sigue sus eventos.">
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_ES">

    <!-- Fuentes y estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/eventos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
</head>
<body>
<div class="main-wrapper">
    @include('components.navBar')

    <main class="main-content flex-grow-1">
        @yield('content')
        @yield('contentAboutUs')
        @yield('contentContactUs')
        @yield('contentEventsNews')
    </main>

    <a href="https://wa.me/+50496432644"
       class="whatsapp-float"
       target="_blank"
       title="¿Necesitas ayuda? Chatea con nosotros por WhatsApp">
        <img src="{{ asset('img/icons/whatsapp.png') }}" alt="WhatsApp" />
    </a>

    @include('components.footer')
</div>
    <!-- HEADER -->
    <!--Librerias-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!--Masonry IMAGES-->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
    <!-- JS personalizados -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/alertsForms.js') }}"></script>
    <script src="{{ asset('js/DetailsData.js') }}"></script>
    <script src="{{ asset('js/favoriteArt.js') }}"></script>
    <script src="{{ asset('js/ImagesFormAdmin.js') }}"></script>
    <script src="{{asset('js/Filters.js')}}"></script>
    <script src="{{asset('js/SliderHome.js')}}"></script>
    <script src="{{asset('js/CardInfo.js')}}"></script>
    <script src="{{asset('js/Coments.js')}}"></script>
    <script src="{{asset('js/SliderDetails-preview.js')}}"></script>
    <script src="{{asset('js/BurguerMenu.js')}}"></script>
    <script src="{{asset('js/particles.js')}}"></script>
    <script src="{{asset('js/Formularios.js')}}"></script>
</body>
</html>
