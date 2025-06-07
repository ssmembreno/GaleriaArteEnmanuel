<div class="nota-container" id="info-artista">
    <div class="tarjeta">
        <div class="contenido-tarjeta">
            <div class="nota-img">
                <div class="card-3d imagen-slider">
                    <img src="{{asset('img/EnmanuelInfo.webp')}}" alt="Enmanuel Membreño" class="imagen-artista ">
                    <img src="{{asset('img/Enmanuel-Membreño.webp')}}" alt="Enmanuel Membreño" class="imagen-artista active">
                </div>
            </div>
            <div class="nota-contenido">
                <h2 class="nota-titulo title-name-home">Enmanuel Membreño</h2>
                <p class="nota-subtitulo">{{__('messages.CARD_ARTIST')}}</p>
                <div class="nota-separador"></div>
                <p class="nota-descripcion">
                    <strong>{{__('messages.CARD_ARTIST_STRONG')}}</strong> {{__('messages.CARD_BIO')}}
                </p>
                <a href="{{localized_url('aboutUs')}}" class="nota-btn">{{__('messages.CARD_BTN')}}</a>
            </div>
        </div>
    </div>
</div>

<!-- Vanilla Tilt -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>

<!-- Animación de cambio de imagen -->
<script>
    VanillaTilt.init(document.querySelectorAll(".card-3d"), {
        max: 5,
        speed: 500,
        "max-glare": 0.2,
        perspective: 1000
    });

    // Timer para el cambio de imagen 5 seg
    const imagenes = document.querySelectorAll('.imagen-slider .imagen-artista');
    let index = 0;

    setInterval(() => {
        imagenes[index].classList.remove('active');
        index = (index + 1) % imagenes.length;
        imagenes[index].classList.add('active');
    }, 5000);
</script>


<style>
    /* Estilos animacion de la imagen  */
.imagen-slider {
    position: relative;
    width: 300px;
    height: 330px;
    border-radius: 10px;
    overflow: hidden;
}

.imagen-slider .imagen-artista {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.imagen-slider .imagen-artista.active {
    opacity: 1;
    z-index: 2;
}

</style>
