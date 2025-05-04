<!doctype html>
<html lang="es" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Galería de Arte</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!--Token CSRF FORMS-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>
<body class="d-flex flex-column h-100">
    <!-- HEADER -->
    @include('components.navBar')
        @yield('content')
        @yield('contentAboutUs')
        @yield('contentContactUs')
        @yield('contentEventsNews')
  <!-- FOOTER -->
    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- JS personalizados -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/alertsForms.js') }}"></script>
    <script src="{{ asset('js/DetailsData.js') }}"></script>
    <script src="{{ asset('js/favoriteArt.js') }}"></script>
    <script src="{{ asset('js/ImagesFormAdmin.js') }}"></script>
    <script src="{{asset('js/Filters.js')}}"></script>
</body>
</html>
