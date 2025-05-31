@extends('_layouts/admin')

@section('ContentAdmin')
    <h1>Crear una nueva obra</h1>

    <div class="container-fluid">
        @include('_includes/Modules')

        <form action="{{ route('obras.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="artista_id">Artista<span class="text-danger">*</span></label>
                <select class="form-control" id="artista_id" name="artista_id" >
                    @foreach($artistas as $artista)
                        <option value="{{ $artista->id }}">{{ $artista->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nombre">Título de la Obra<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="descripcion">Descripción<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="descr_ingles">Descripción en inglés<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="desc_ingles" name="desc_ingles" rows="3"></textarea>
                </div>
            </div>
        </div>



            <div class="form-group">
                <label for="genero_id">Genero<span class="text-danger">*</span></label>
                <select class="form-control" id="genero_id" name="genero_id" >
                    @foreach($generoObra as $genero)
                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tipo_obra_id">Técnica<span class="text-danger">*</span></label>
                <select class="form-control" id="tipo_obra_id" name="tipo_obra_id" >
                    @foreach($tiposObra as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tamaño">Tamaño<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="tamaño" name="tamaño" >
            </div>

            <div class="form-group">
                <label for="precio">Precio ($)<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" >
            </div>

            <div class="form-group">
                <label for="estado" class="form-label">Estado<span class="text-danger">*</span></label>
                <select class="form-control" name="estado" id="estado" class="form-select" required>
                    <option value="EnVenta">En Venta</option>
                    <option value="Vendida">Vendida</option>
                </select>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen Principal <span>(Recuerda subir una imagen)</span> <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="imagen" name="imagen" onchange="previewImage(event)">
                <img id="preview" src="#" alt="Vista previa" style="display: none; max-width: 200px; margin-top: 10px;">
            </div>

            <div class="form-group">
                <label for="imagenes">Imágenes adicionales (Detalles)</label>
                <input type="file" class="form-control" id="imagenes" name="imagenes[]" onchange="previewMultipleImages(event)" multiple>
                <div id="previewMultiples" class="d-flex flex-wrap mt-3"></div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Obra</button>
        </form>
    </div>
@endsection

