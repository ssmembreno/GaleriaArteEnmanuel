@extends('_layouts/layout')

@section('contentAboutUs')
    <div class="about-hero">
        <div class="about-hero-content">
            @include('components.aboutUs.tittle')
        </div>

        <div class="about-hero-image">
            <img src="{{ asset('img/Enmanuel4.jpg') }}" alt="Enmanuel Membreño | artista hondureño | arte" title="Enmanuel Membreño">
        </div>
    </div>

    <div class="about-description">
        @include('components.aboutUs.descripcion')
    </div>

    <div class="d-flex justify-content-center">
        @include('components.aboutUs.socialCards')
    </div>

    @include('components.buttonScroll')
@endsection
