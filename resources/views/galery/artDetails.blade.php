@extends('_layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="row gy-5 align-items-start">
            <!-- Imagen principal -->
            @include('components.Detail.SliderImages')

            <!-- Información de la obra -->
            @include('components.Detail.Information')
        </div>
    </div>
    <!-- Valoraciones -->
    @include('components.Detail.Valoracion')

    <!-- Comentarios -->
    @include('components.Detail.Coments')

    <!--Slider parte inferior de detalles de la obra-->
    @include('components.Detail.previewMoreSlider')
    <!-- Modal Bootstrap con Carousel -->
    @include('components.Detail.ModalImages')

    <!-- Modal de Login si no esta registrado para realizar acciones (comentarios/comentarios) -->
    @include('components.Detail.ModalLoginAccions')

    <script>
        @if ($errors->has('email') || $errors->has('password'))
        // Espera a que cargue el DOM y abre el modal automáticamente
        window.onload = function() {
            let loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        };
        @endif
    </script>
@endsection
