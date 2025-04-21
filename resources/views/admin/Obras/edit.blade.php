@extends('_layouts/admin')

@section('ContentAdmin')
    <h1>Editar Obra</h1>
        <div class="container-fluid">
            <!--Se controla los errores de la validacion del formulario de edicion de la obra -->
            @include('_includes/Modules')
            <form action="{{action([App\Http\Controllers\Backend\obraController::class,'update'],$obra->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="nombre">ID obra</label>
                    <input type="text" class="form-control" id="id" name="id" autocomplete="off" value="{{$obra->id}}" disabled >
                </div>

                <div class="form-group">
                    <label for="nombre">Título de la Obra</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" value="{{$obra->nombre}}"  >
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" autocomplete="off">{{$obra->descripcion}}</textarea>
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
                    <input type="text" class="form-control" id="tamaño" name="tamaño" autocomplete="off" value="{{$obra->tamaño}}" >
                </div>

                <div class="form-group">
                    <label for="precio">Precio ($)</label>
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" autocomplete="off" value="{{$obra->precio}}" >
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" autocomplete="on" value="{{$obra->estado}}">
                </div>

                <div class="form-group">
                    <label for="imagen">URL o nombre de la imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" autocomplete="off" value="{{$obra->imagen}}">
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
                <a href="{{ action([App\Http\Controllers\Backend\obraController::class, 'index'])}}">
                    <span class="btn btn-secondary">Volver al listado de Obras</span>
                </a>
            </form>
        </div>
@endsection
