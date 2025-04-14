@extends('_layouts/admin')

@section('editContentAdmin')
    <h1>Editar Obra</h1>
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Crear nueva Obra</h1>

            <form action="{{action([App\Http\Controllers\Backend\obraController::class,'update'],$obra->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="nombre">ID obra</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" value="{{$obra->id}}" disabled >
                </div>

                <div class="form-group">
                    <label for="nombre">Título de la Obra</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" value="{{$obra->nombre}}"  >
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" autocomplete="off" value="{{$obra->descripcion}}"></textarea>
                </div>

                <div class="form-group">
                    <label for="tecnica">Técnica</label>
                    <input type="text" class="form-control" id="tecnica" name="tecnica" autocomplete="off" value="{{$obra->tecnica}}" >
                </div>

                <div class="form-group">
                    <label for="tamaño">Tamaño</label>
                    <input type="text" class="form-control" id="tamaño" name="tamaño" autocomplete="off" value="{{$obra->tamaño}}" >
                </div>

                <div class="form-group">
                    <label for="precio">Precio ($)</label>
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" autocomplete="off" value="{{$obra->precio}}" >
                </div>

                <button type="submit" class="btn btn-primary">Guardar Obra</button>
                <a href="{{ action([App\Http\Controllers\Backend\obraController::class, 'index'])}}">
                    <span class="btn btn-secondary">Volver al listado de Obras</span>
                </a>
            </form>
        </div>
@endsection
