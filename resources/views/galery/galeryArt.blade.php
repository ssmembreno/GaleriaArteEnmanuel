
@section('contentART')
<div class="container">
    <h2 class="text-center my-4">Galería de Arte</h2>
    <div class="d-flex gap-4">
        <!-- Sidebar filtros -->
        <div class="d-none d-md-block" style="min-width: 220px;">
        <aside class="filtros mb-4">
                <h5>Filtros</h5>
                <div class="mb-3">
                    <label class="form-label">Tipo de obra</label>
                    <select class="form-select">
                        <option>Todas</option>
                        <option>Pintura</option>
                        <option>Escultura</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio máximo</label>
                    <input type="number" class="form-control" placeholder="500">
                </div>
                <button class="btn btn-primary w-100">Aplicar</button>
            </aside>

            <aside class="noticias">
                <h5>Noticias y Eventos</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><strong>01 Abr:</strong> Expo en Tegucigalpa</li>
                    <li class="mb-2"><strong>10 Abr:</strong> Mural en San Pedro</li>
                    <li class="mb-2"><strong>15 Abr:</strong> Taller de pintura</li>
                </ul>
            </aside>
        </div>

        <!-- Galería tipo masonry -->
        <div class="row gx-4 gy-5">
            @forelse($obras as $obra)
                <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="obra-card text-center h-100 d-flex flex-column justify-content-between">
                        <div class="obra-img-wrapper position-relative">
                            <a href="{{ route('obraDetails', $obra->id) }}">
                                @if ($obra->estado === 'Vendida')
                                <div class="ribbon"><span>Vendida</span></div>
                            @endif
                                <img src="{{ asset('storage/'.$obra->imagen) }}" alt="{{ $obra->nombre }}">
                            </a>
                        </div>
                        <div class="obra-info mt-3 px-2 pb-3">
                            <strong>{{ $obra->nombre }}</strong>

                            <!--Manejo de favoritos con JS y AJAX para evitar el recargo de la web al añadir una obra a favoritos-->
                            <button type="button" class="btn toggle-favorito" data-id="{{ $obra->id }}">
                                {{ auth()->check() && auth()->user()->favoritos()->where('obra_id', $obra->id)->exists() ? '❤️' : '🤍' }}
                            </button>

                            <small>{{ $obra->descripcion }}</small>
                            <span>{{ number_format($obra->precio, 2) }} $</span>
                        </div>
                    </div>
                </div>
            @empty
                <p>No hay obras disponibles por ahora.</p>
            @endforelse
        </div>

    </div>
</div>
@endsection
