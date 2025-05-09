<div class="valoracion-obra valoracion-contenedor">
    <div class="contenido-valoracion contenido-valoracion-centrado mt-4">
        <h3 class="mt-5 title-obra-details">¿Deseas enviar una valoración de la obra?</h3>
        @auth
            <form action="{{ route('valorar.store', ['obra' => $obra->id]) }}" method="POST">
                @csrf
                <div class="star-rating mb-3">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="star" data-value="{{ $i }}">☆</span>
                    @endfor
                </div>

                <input type="hidden" name="calificacion" id="calificacion" value="">
                <button type="submit" class="boton-session-details-succes" disabled id="submitValoracion">Enviar valoración</button>
            </form>
        @endauth

        @guest
            <button class="boton-session-details" data-bs-toggle="modal" data-bs-target="#loginModal">
                Iniciar sesión o registrarse
            </button>
        @endguest
    </div>

    <div class="imagen-brochazo imagen-brochazo-derecha">
        <img src="{{ asset('img/Pintura.png') }}" alt="Pintura" class="img-fluid">
    </div>
</div>
