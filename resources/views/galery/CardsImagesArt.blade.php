<div class="container">
    <div class="row" id="masonry-grid">
        <!--Verifica si hay obras con los filtros aplicados-->
        @if($obras->isEmpty())
            <div class="no-results-container text-center position-relative" style="height: 800px;">
                <img src="{{ asset('img/pintura.png') }}" alt="pintura Enmanuel Membreño" class="w-100 h-100 object-fit-cover" >
                <h3 class="title-obra-details title-comments position-absolute top-50 start-50 translate-middle fw-bold" >
                    ¡Lo sentimos no hemos podido encontrar obras con estos filtros!
                </h3>
            </div>
        @else
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

                        <div class="text-uppercase" style="font-size: 0.85rem; font-weight: bold">
                            "{{ strtoupper($obra->nombre) }}"
                        </div>

                        <div class="descripcion-limitada text-muted mt-1" style="font-size: 0.85rem; font-weight: bold">
                            {{$obra->descripcion   }}
                        </div>

                        <div class="mt-1 text-muted mt-1" style="font-size: 0.85rem; font-weight: bold">
                            {{ $obra->tipoObra->nombre ?? 'Sin técnica' }} | {{ $obra['tamaño'] }} cm
                        </div>
                        <div class="mt-1" style="font-size: 0.85rem; font-weight: bold">
                            <p >{{$obra->precio}} $</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif


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
