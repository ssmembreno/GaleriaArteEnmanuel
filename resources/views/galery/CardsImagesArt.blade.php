<div class="container">
    <div class="row" id="masonry-grid">
        @foreach($obras as $obra)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="position-relative obra-hover-group">
                    <a href="{{ route('obraDetails', $obra->id) }}" class="d-block">
                        <img src="{{ asset('storage/' . $obra->imagen) }}"
                             alt="Obra {{ $obra->nombre }}"
                             class="img-fluid rounded w-100"
                             title="Obra: {{ $obra->nombre }} por Enmanuel Membreño">
                    </a>

                    <div class="btn-favorito-container d-flex flex-column align-items-end">
                        <button class="btn-favorito-toggle"
                                data-id="{{ $obra->id }}"
                                @guest
                                    data-auth="false"
                                data-bs-toggle="modal"
                                data-bs-target="#loginModal"
                                @else
                                    data-auth="true"
                            @endguest>
                            <i class="fa fa-heart"></i>
                        </button>
                        <a href="{{ route('obraDetails', $obra->id) }}" class="btn-detalles mt-2" title="Ver detalles">
                            <i class="fas fa-magnifying-glass"></i>
                        </a>
                    </div>
                </div>
                <div class="mt-2 px-1">
                    <div class="fw-bold">{{ $obra->artista->nombre ?? 'Nombre del artista' }}</div>
                    <div class="text-uppercase text-muted" style="font-size: 0.9rem;">
                        "{{ strtoupper($obra->nombre) }}"
                    </div>
                    <div class="text-muted" style="font-size: 0.85rem;">
                        {{ $obra->tipoObra->nombre ?? 'Sin técnica' }} | {{ $obra['tamaño'] }}
                    </div>

                    <div>
                        <p>{{$obra->precio}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('components.Detail.ModalLoginAccions')

<script>
    window.obrasFavoritas = @json(auth()->check() ? auth()->user()->favoritos->pluck('id') : []);
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const grid = document.querySelector('#masonry-grid');

        const msnry = new Masonry(grid, {
            itemSelector: '.col-12',
            percentPosition: true
        });

        imagesLoaded(grid).on('progress', function () {
            msnry.layout();
        });
    });
</script>
