@extends('_layouts.layout')

@section('content')
        <div class="container mt-5">
            <h2 class="mb-4 text-center">{{ $obra->nombre }}</h2>

            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('img/Enmanuel1.webp') }}" alt="{{ $obra->nombre }}" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <p><strong>Descripción:</strong> {{ $obra->descripcion }}</p>
                    <p><strong>Técnica:</strong> {{ $obra->tecnica }}</p>
                    <p><strong>Tamaño:</strong> {{ $obra->tamaño }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($obra->precio, 2) }}</p>
                    <p><strong>Estado:</strong> {{ $obra->estado }}</p>
                    <p><strong>Tipo de Obra:</strong> {{ $obra->tipoObra->nombre ?? 'No asignado' }}</p>
                    <p><strong>Artista:</strong> {{ $obra->artista->nombre ?? 'Desconocido' }}</p>
                </div>
            </div>
        </div>
@endSection
