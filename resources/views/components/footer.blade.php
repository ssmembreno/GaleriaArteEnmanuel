<footer class="footer-custom">
    <div class="container-footer">
        <div class="row g-4 flex-wrap justify-content-between align-items-start">

            <!-- Marca -->
            <div class="col-12 col-sm-6 col-lg-3">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 80px;">
                <p class="footer-text mt-2">
                    Exposición y reconocimiento de las obras de arte del artista Emmanuel Membreño.
                </p>
            </div>

            <!-- Páginas -->
            <div class="col-6 col-sm-6 col-lg-2">
                <h6 class="fw-semibold">Páginas</h6>
                <ul class="list-unstyled mt-2">
                    <li class="mb-1"><a href="{{url('/')}}">Inicio</a></li>
                    <li class="mb-1"><a href="{{url('/ObrasArte')}}">Obras de arte</a></li>
                    <li class="mb-1"><a href="{{url('/aboutUs')}}">Artista</a></li>
                    <li class="mb-1"><a href="{{url('/events')}}">Eventos</a></li>
                    <li class="mb-1"><a href="{{url('/contactUs')}}">Contacto</a></li>
                </ul>
            </div>

            <!-- Contacto -->
            <div class="col-12 col-sm-6 col-lg-3">
                <h6 class="fw-semibold">Contáctanos</h6>
                <form class="mt-3">
                    <div class="mb-2">
                        <input type="text" class="form-control form-control-sm" placeholder="nombre" required>
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control form-control-sm" rows="2" placeholder="mensaje" required></textarea>
                    </div>
                    <button type="submit" class="btn contact-form btn-sm w-100">Enviar</button>
                </form>
            </div>

            <!-- Redes sociales -->
            <div class="col-12 col-sm-6 col-lg-3">
                <h6 class="fw-semibold">Redes Sociales</h6>
                <div class="icons-social d-flex flex-wrap gap-2 mt-2">
                    <a href="#"><img src="{{ asset('img/icons/facebook.png') }}" alt="Facebook" width="44"></a>
                    <a href="#"><img src="{{ asset('img/icons/instagram.png') }}" alt="Instagram" width="44"></a>
                    <a href="#"><img src="{{ asset('img/icons/tiktok.png') }}" alt="TikTok" width="44"></a>
                    <a href="#"><img src="{{ asset('img/icons/whatsapp.png') }}" alt="WhatsApp" width="44"></a>
                </div>
            </div>
        </div>
        <hr style="width: 100%;">
        <div class="row">
            <div class="col text-center mb-1">
                <p class="copyrigth">Samuel Membreño &copy; Galería de Arte Enmanuel Membreño - {{ date('Y') }}</p>
            </div>
        </div>
    </div>
</footer>
