<div id="obraSlider" class="splide">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach($obrasParaSlider as $obraItem)
                <li class="splide__slide position-relative">
                    <img src="{{ asset('storage/'.$obraItem->imagen) }}" alt="{{ $obraItem->nombre }} Enmanuel Membreño artista hondureño Arte Naturaleza Retratos Paisajes bodegones">
                    <a href="{{localized_route('obraDetails', $obraItem->id)  }}" class="zoom-icon">
                        <i class="fas fa-search"></i>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.4.1/dist/js/splide-extension-auto-scroll.min.js"></script>
