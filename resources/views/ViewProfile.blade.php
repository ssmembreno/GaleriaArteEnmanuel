@extends('_layouts.layout')

@section('content')

    <div id="particles-js"></div>

    <div class="container profile-container pb-5">

        @include('components.MyProfile.datosPerfil')

        @include('components.MyProfile.modificarDatos')

        @include('components.MyProfile.misFavoritos')
    </div>

@endsection
