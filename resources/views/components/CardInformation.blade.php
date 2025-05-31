<div class="nota-container" id="info-artista">
    <div class="tarjeta">
        <div class="contenido-tarjeta">
            <div class="nota-img">
                <img src="{{asset('img/EnmanuelInfo.webp')}}" alt="Enmanuel Membreño">
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

<style>
.title-name-home {
    font-size: 2.8rem;
    font-weight: 100;
    line-height: 0.9;
    text-transform: uppercase;
    color: #111;
    font-family: 'Anton', sans-serif;
}
</style>