@extends('_layouts.layout')

@section('content')
    <div class="container">
        <h1>Perfil de {{ $usuario->name }}</h1>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Registrado desde:</strong> {{ $usuario->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="container mt-5">
        <h2>Obras Favoritas</h2>
        @if($favoritos->isEmpty())
            <p>No tienes obras en favoritos aún.</p>
        @else
            <div class="row gy-4">
                @foreach($favoritos as $favorito)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="obra-card text-center">
                            <div class="obra-img-wrapper">
                                <a href="{{ route('obraDetails', $favorito->obra->id) }}">
                                    <img src="{{ asset('storage/'.$favorito->obra->imagen) }}" alt="{{ $favorito->obra->nombre }}">
                                </a>
                            </div>
                            <div class="obra-info mt-2">
                                <strong>{{ $favorito->obra->nombre }}</strong><br>
                                <small>{{ $favorito->obra->descripcion }}</small><br>
                                <span class="fw-bold">{{ number_format($favorito->obra->precio, 2) }} $</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    @endif
@endsection
