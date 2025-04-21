@extends('_layouts/admin')

@section('ContentAdmin')
    <h1>Crear una nueva obra</h1>

    <div class="container-fluid">
        @include('_includes/Modules')

        <form action="{{ route('obras.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Título de la Obra</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" ></textarea>
            </div>

            <div class="form-group">
                <label for="tipo_obra_id">Tipo de Obra</label>
                <select class="form-control" id="tipo_obra_id" name="tipo_obra_id" >
                    @foreach($tiposObra as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tamaño">Tamaño</label>
                <input type="text" class="form-control" id="tamaño" name="tamaño" >
            </div>

            <div class="form-group">
                <label for="precio">Precio ($)</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" >
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado">
            </div>

            <div class="form-group">
                <label for="imagen">URL o nombre de la imagen</label>
                <input type="text" class="form-control" id="imagen" name="imagen">
            </div>

            <div class="form-group">
                <label for="artista_id">Artista</label>
                <select class="form-control" id="artista_id" name="artista_id" >
                    @foreach($artistas as $artista)
                        <option value="{{ $artista->id }}">{{ $artista->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Obra</button>
            <a href="{{ route('obras.index') }}" class="btn btn-secondary">Volver al listado</a>
        </form>
    </div>
@endsection
