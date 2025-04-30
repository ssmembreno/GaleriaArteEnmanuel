@extends('_layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="row gy-5 align-items-start">
            <!-- Imagen principal -->
            <div class="col-lg-8 col-md-12 text-center">
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

            <!-- Información de la obra -->
            <div class="col-lg-4 col-md-12">
                <div class="obra-info">
                    <h1>{{ $obra->nombre }}</h1>
                    <p class="text-muted">by {{ $obra->artista->nombre ?? 'Unknown Artist' }}</p>

                    <div class="rating mb-2">
                        ★★★★★ <span class="text-muted">(150 reviews)</span>
                    </div>

                    <p class="price">$ {{ number_format($obra->precio, 2) }}</p>

                    <button class="btn btn-contact w-100 my-4 py-3">Contacta con el artista</button>

                    <h5 class="mt-4">Description</h5>
                    <p>{{ $obra->descripcion }}</p>

                    <h5 class="mt-4">Details</h5>
                    <div class="row mb-4">
                        <div class="col-5 fw-bold">Dimensiónes:</div>
                        <div class="col-7">{{ $obra->tamaño }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-5 fw-bold">Tenica</div>
                        <div class="col-7">{{ $obra->tipoObra->nombre ?? 'N/A' }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-5 fw-bold">Disponibilidad:</div>
                        <div class="col-7">
                            @if($obra->estado == 'EnVenta')
                                <span class="status-art-details text-white">{{ $obra->estado }}</span>
                            @else
                                <span class="status-art-details-red text-white">{{ $obra->estado }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="extra-info p-3">
                        <p>🚚 <strong>Shipping by ArtMajour</strong></p>
                        <p>📦 Ships from France within 2 business days</p>
                        <p>🔄 14-day return policy</p>
                        <p>🔒 100% secure transaction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bootstrap con Carousel mejorado -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-dark border-0">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 d-flex align-items-center justify-content-center position-relative">

                    <!-- Botón previo -->
                    <button class="carousel-control-prev position-absolute start-0 top-50 translate-middle-y" type="button" data-bs-target="#carouselImages" data-bs-slide="prev" style="width: 80px; height: 80px; background: rgba(0,0,0,0.5); border: none; border-radius: 50%;">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <!-- Carousel -->
                    <div id="carouselImages" class="carousel slide w-100" data-bs-ride="carousel">
                        <div class="carousel-inner text-center">
                            <!-- Primera imagen activa -->
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/'.$obra->imagen) }}" class="d-block mx-auto img-fluid modal-carousel-img">
                            </div>

                            @foreach($obra->imagenes as $imagen)
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/'.$imagen->ruta_imagen) }}" class="d-block mx-auto img-fluid modal-carousel-img">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Botón siguiente -->
                    <button class="carousel-control-next position-absolute end-0 top-50 translate-middle-y" type="button" data-bs-target="#carouselImages" data-bs-slide="next" style="width: 80px; height: 80px; background: rgba(0,0,0,0.5); border: none; border-radius: 50%;">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.getElementById('mainImage');
            const mainImageWrapper = document.getElementById('mainImageWrapper');

            thumbnails.forEach((thumbnail, index) => {
                thumbnail.addEventListener('click', () => {
                    mainImage.classList.add('fade-out');
                    setTimeout(() => {
                        mainImage.src = thumbnail.src;
                        mainImage.classList.remove('fade-out');
                        // Cambiar el slide activo en el carousel también
                        const carousel = new bootstrap.Carousel(document.getElementById('carouselImages'));
                        carousel.to(index);
                    }, 300);
                });
            });

            mainImageWrapper.addEventListener('click', function () {
                const myModal = new bootstrap.Modal(document.getElementById('imageModal'));
                myModal.show();
            });
        });
    </script>
@endsection
