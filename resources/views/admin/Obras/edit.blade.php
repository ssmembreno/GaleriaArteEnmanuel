@extends('_layouts/admin')

@section('ContentAdmin')
    <h1>Editar Obra</h1>
        <div class="container-fluid">
            <!--Se controla los errores de la validacion del formulario de edicion de la obra -->
            @include('_includes/Modules')
            <form action="{{action([App\Http\Controllers\Backend\obraController::class,'update'],$obra->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="nombre">ID obra</label>
                    <input type="text" class="form-control" id="id" name="id" autocomplete="off" value="{{$obra->id}}" disabled >
                </div>

                <div class="form-group">
                    <label for="artista_id">Artista</label>
                    <select class="form-control" id="artista_id" name="artista_id" >
                        @foreach($artistas as $artista)
                            <option value="{{ $artista->id }}">{{ $artista->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre">Título de la Obra</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" value="{{$obra->nombre}}"  >
                </div>

                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descripcion">Descripción<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" autocomplete="off">{{$obra->descripcion}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descr_ingles">Descripción en inglés<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="desc_ingles" name="desc_ingles" rows="3"autocomplete="off">{{$obra->desc_ingles}}</textarea>
                        </div>
                    </div>
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
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control" name="estado" id="estado" class="form-select" required>
                        <option value="EnVenta">En Venta</option>
                        <option value="Vendida">Vendida</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="imagen">imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" autocomplete="off">
                    @if($obra->imagen !== '')
                        <img src="{{asset('storage/'.$obra->imagen)}}" width="160px" height="160px" class="img-thumbnail mt-3">
                    @endif
                </div>

                <div class="form-group">
                    <label for="imagenes">Imágenes adicionales (Detalles)</label>
                    <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple>
                    <div id="previewMultiples" class="d-flex flex-wrap mt-3"></div>
                    {{-- Mostrar imágenes adicionales ya existentes --}}
                    @if($obra->imagenes->count() > 0)
                        <div id="imagenesExistentes" class="d-flex flex-wrap mt-3">
                            @foreach($obra->imagenes as $imagen)
                                <div class="m-2">
                                    <img src="{{ asset('storage/' . $imagen->ruta_imagen) }}" alt="Imagen adicional" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Guardar Obra</button>
            </form>
        </div>
@endsection
