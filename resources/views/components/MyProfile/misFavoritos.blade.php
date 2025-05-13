<div class="mb-4">
    <div class="collapse-toggle" data-bs-toggle="collapse" data-bs-target="#collapseFavoritos" aria-expanded="false" aria-controls="collapseFavoritos">
        <h2 class="title-obra-details">Mis Favoritos</h2>
        <img src="{{ asset('img/icons/arrowBottom.png') }}" alt="Abrir" class="collapse-arrow">
    </div>
    <hr style="width: 100%">
    <div class="collapse" id="collapseFavoritos">
        <div class="favoritos-section mt-3">
            @if($favoritos->isEmpty())
                <p class="text-muted">No tienes obras en favoritos aún.</p>
            @else
                <div class="masonry-grid" data-masonry='{"percentPosition": true }'>
                    @foreach($favoritos as $favorito)
                        <div class="masonry-item col-12 col-sm-6 col-md-4 mb-4">
                            <div class="obra-card text-center">
                                <div class="obra-img-wrapper">
                                    <a href="{{ route('obraDetails', $favorito->obra->id) }}">
                                        <img src="{{ asset('storage/' . $favorito->obra->imagen) }}" alt="{{ $favorito->obra->nombre }}" class="img-fluid rounded">
                                    </a>
                                </div>
                                <div class="obra-info mt-2">
                                    <strong>{{ $favorito->obra->nombre }}</strong><br>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const grid = document.querySelector('.masonry-grid');

        if (grid) {
            const msnry = new Masonry(grid, {
                itemSelector: '.masonry-item',
                percentPosition: true
            });

            imagesLoaded(grid, function () {
                msnry.layout();
            });

            const favoritosCollapse = document.getElementById('collapseFavoritos');
            favoritosCollapse.addEventListener('shown.bs.collapse', function () {
                imagesLoaded(grid, function () {
                    msnry.layout();
                });
            });
        }
    });
</script>
