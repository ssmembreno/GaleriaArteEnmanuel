<div class="col-lg-8 col-md-12 text-center animate-left">
    <div class="main-image mb-2 mx-auto" id="mainImageWrapper" style="cursor: zoom-in;">
        <img src="{{ asset('storage/'.$obra->imagen) }}" alt="Obra principal" class="img-fluid" id="mainImage">
    </div>

    <div class="thumbnail-gallery d-flex justify-content-center flex-wrap gap-2">
        <img src="{{ asset('storage/'.$obra->imagen) }}" class="thumbnail">
        @foreach($obra->imagenes as $imagen)
            <img src="{{ asset('storage/'.$imagen->ruta_imagen) }}" class="thumbnail">
        @endforeach
    </div>
</div>
