@extends('_layouts.admin')

@section('ContentAdmin')
    @include('_includes.Modules')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('eventos.update', $evento->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre del evento</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre', $evento->nombre) }}" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" rows="4">{{ old('descripcion', $evento->descripcion) }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" class="form-control" id="fecha" value="{{ old('fecha', $evento->fecha) }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="hora_inicio">Hora inicio</label>
                        <input type="time" name="hora_inicio" class="form-control" id="hora_inicio" value="{{ old('hora_inicio', $evento->hora_inicio) }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="hora_fin">Hora fin</label>
                        <input type="time" name="hora_fin" class="form-control" id="hora_fin" value="{{ old('hora_fin', $evento->hora_fin) }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ubicacion">Ubicación</label>
                    <input type="text" name="ubicacion" class="form-control" id="ubicacion" value="{{ old('ubicacion', $evento->ubicacion) }}" required>
                </div>

                <div class="form-group">
                    <label for="ubicacion">Estado</label>
                    <input type="text" name="estado" class="form-control" id="estado" value="{{ old('estado', $evento->estado) }}" required>
                </div>

                <button type="submit" class="btn btn-success">Guardar cambios</button>
                <a href="{{ route('evento.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
