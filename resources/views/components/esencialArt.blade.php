<section class="arte-esencial py-5 bg-light">
    <div class="container">
        <h2 class="title-art-home mb-4 fw-bold text-center">{{__('messages.TITLE_HOME_ART')}}</h2>

        <div class="row g-3">
            <!-- Fila 1 -->
            <div class="col-12 col-md-4">
                <a href="https://www.galeriaenmanuel.com/artDetails/22" class="d-block">
                    <img src="{{ asset('img/artEsencial/Diosa_Temis_enmanuel_membreno.webp') }}" 
                         alt="Diosa Temis - Obra de Enmanuel Membreño" 
                         title="Diosa Temis - Obra de Enmanuel Membreño" 
                         class="img-fluid rounded arte-img arte-img-small">
                </a>
            </div>
            <div class="col-12 col-md-8">
                <a href="https://www.galeriaenmanuel.com/artDetails/20" class="d-block">
                    <img src="{{ asset('img/artEsencial/El-estudio-de-lo-absurdo-enmanuel-membreno.webp') }}" 
                         alt="El Estudio de lo Absurdo - Obra de Enmanuel Membreño" 
                         title="El Estudio de lo Absurdo - Obra de Enmanuel Membreño" 
                         class="img-fluid rounded arte-img arte-img-large">
                </a>
            </div>

            <!-- Fila 2 -->
            <div class="col-12 col-md-4">
                <a href="https://www.galeriaenmanuel.com/artDetails/23" class="d-block">
                    <img src="{{ asset('img/artEsencial/Manpostero_enmanuel_membreno.webp') }}" 
                         alt="Manpostero - Obra de Enmanuel Membreño" 
                         title="Manpostero - Obra de Enmanuel Membreño" 
                         class="img-fluid rounded arte-img">
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="https://www.galeriaenmanuel.com/artDetails/24" class="d-block">
                    <img src="{{ asset('img/artEsencial/Ecos-del-tiempo_Enmanuel_Membreno.webp') }}" 
                         alt="Ecos del Tiempo - Obra de Enmanuel Membreño" 
                         title="Ecos del Tiempo - Obra de Enmanuel Membreño" 
                         class="img-fluid rounded arte-img">
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="https://www.galeriaenmanuel.com/artDetails/21" class="d-block">
                    <img src="{{ asset('img/artEsencial/Retrato_memoria _campesina.webp') }}" 
                         alt="Retrato_memoria _campesina - Enmanuel Membreño" 
                         title="Retrato_memoria _campesina - Enmanuel Membreño" 
                         class="img-fluid rounded arte-img">
                </a>
            </div>
            <div class="mt-4 d-flex justify-content-center gap-3">
                    <a href="{{ localized_url('ObrasArte') }}" class="contact-details btn-biografia">{{__('messages.BTN_HOME_ART')}}</a>
            </div>
        </div>

    </div>
</section>

<style>
.title-art-home {
    font-size: 3rem;
    font-weight: 100;
    line-height: 0.9;
    text-transform: uppercase;
    color: #111;
    font-family: 'Anton', sans-serif;
}
.arte-img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.arte-img-small {
    height: 650px;
}

.arte-img-large {
    height: 650px;
}


@media (max-width: 991.98px) {
    .arte-img-small,
    .arte-img-large {
        height: 400px;
    }
}

@media (max-width: 767.98px) {
    .arte-img-small,
    .arte-img-large,
    .arte-img {
        height: auto !important;
        width: 100%;
    }

    .arte-esencial .row > div {
        flex: 0 0 100%;
        max-width: 100%;
    }

    .arte-esencial .row {
        display: block;
    }
}

</style>