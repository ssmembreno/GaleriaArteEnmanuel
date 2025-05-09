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
