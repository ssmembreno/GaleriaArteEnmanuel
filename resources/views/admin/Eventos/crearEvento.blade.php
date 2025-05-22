@extends('_layouts.admin')

@section('ContentAdmin')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Crear nuevo evento</h1>

    @include('_includes.Modules')
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nombre">Nombre del evento</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required value="{{ old('nombre') }}">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="4">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fecha">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" required value="{{ old('fecha') }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="hora_inicio">Hora inicio</label>
                            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required value="{{ old('hora_inicio') }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="hora_fin">Hora fin</label>
                            <input type="time" name="hora_fin" id="hora_fin" class="form-control" required value="{{ old('hora_fin') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ubicacion">Ubicación</label>
                        <input type="text" name="ubicacion" id="ubicacion" class="form-control" required value="{{ old('ubicacion') }}">
                    </div>


                    <div class="form-group">
                        <label for="imagen">Imagen del evento</label>
                        <input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" id="estado" class="form-control" required value="{{ old('estado') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar evento</button>
                    <a href="{{ route('evento.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
@endsection

