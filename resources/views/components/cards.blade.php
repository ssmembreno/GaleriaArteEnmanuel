<div class="col-md-4 col-sm-6 mb-4">
    <article class="art-card position-relative shadow-sm rounded overflow-hidden bg-white">
            {{-- Estado: Vendida --}}
            @if($obra->estado === 'Vendida')
                <div class="etiqueta-vendida animar-una-vez">
                    <span>vendida</span>
                </div>
            @endif
            {{-- Imagen principal --}}
            <div class="art-image position-relative">
                <a href="{{ route('obraDetails', $obra->id) }}" class="d-block position-relative art-image">
                    <img src="{{ asset('storage/' . $obra->imagen) }}"
                         alt="Obra {{ $obra->nombre }} por {{ $obra->artista->nombre }}"
                         class="img-fluid w-100">
                </a>
                {{-- Botones de acción --}}
                <div class="art-actions position-absolute top-0 end-0 p-2 d-flex flex-column gap-2">
                    <button type="button" class="btn toggle-favorito btn-light btn-sm rounded-circle" data-id="{{ $obra->id }}">
                        {{ auth()->check() && auth()->user()->favoritos()->where('obra_id', $obra->id)->exists() ? ' ♡' : '❤️' }}
                    </button>
                    <a href="{{ route('obraDetails', $obra->id) }}" class="btn btn-light btn-sm rounded-circle" title="Ver detalles">
                        🔍
                    </a>
                </div>
            </div>

            {{-- Info de la obra --}}
            <div class="p-3">
                <p class="fw-semibold mb-1">{{ $obra->artista->nombre }}</p>
                <p class="fst-italic mb-1 text-muted">"{{ $obra->nombre }}"</p>
                <p class="text-muted small mb-2">
                    {{ ucfirst($obra->tipo_obra) }} - {{$obra->tipoObra->nombre ?? 'Técnica no especificada'}} | {{ $obra->tamaño ?? 'Dimensiones no disponibles' }}
                </p>
                <p class="fs-5 fw-bold">{{ number_format($obra->precio, 2, ',', '.') }} $</p>

            </div>
    </article>
</div>




<script>
    document.addEventListener('DOMContentLoaded', () => {
        const etiquetas = document.querySelectorAll('.animar-solo-una-vez');
        etiquetas.forEach(etiqueta => {
            setTimeout(() => {
                etiqueta.classList.remove('animar-solo-una-vez');
            }, 1000);
        });
    });
</script>
