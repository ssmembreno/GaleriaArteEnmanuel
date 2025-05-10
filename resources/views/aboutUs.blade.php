@extends('_layouts/layout')

@section('contentAboutUs')
    <div class="about-hero">
        <div class="about-hero-content">
            @include('components.aboutUs.tittle')
            @include('components.aboutUs.firma')
        </div>

        <div class="about-hero-image">
            <img src="{{ asset('img/Enmanuel4.jpg') }}" alt="Enmanuel Membreño | artista hondureño | arte" title="Enmanuel Membreño">
        </div>
    </div>

    <div class="about-description">
        @include('components.aboutUs.descripcion')
    </div>
@endsection
