<div class="col-lg-4 col-md-12 animate-left">
    <div class="obra-info">
        <h1 class="title-obra-details">{{ $obra->nombre }}</h1>
        <p class="text-muted">by {{ $obra->artista->nombre ?? 'Unknown Artist' }}</p>
        <button class="contact-details w-100 my-4 py-3">Contacta con el artista</button>

        @php
            $promedio = round($obra->valoraciones->avg('calificacion'), 1);
            $cantidad = $obra->valoraciones->count();
        @endphp

        <div class="d-flex justify-content-between align-items-center mb-2">
            <strong>Valoraciones ({{ $cantidad }})</strong>
            <div>
                @for ($i = 1; $i <= 5; $i++)
                    <span style="color: {{ $i <= floor($promedio) ? '#fcd34d' : '#ccc' }}; font-size: 1.5rem;">★</span>
                @endfor
            </div>
        </div>

        <h5 class="mt-4">Descripción</h5>
        <p>{{ $obra->descripcion }}</p>

        <h5 class="mt-4">Detalles</h5>
        <div class="row mb-2">
            <div class="col-6 fw-bold">Precio:</div>
            <div class="col-6">{{ number_format($obra->precio, 2)}}$</div>
        </div>
        <div class="row mb-2">
            <div class="col-6 fw-bold">Dimensiones:</div>
            <div class="col-6">{{ $obra->tamaño }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-6 fw-bold">Técnica:</div>
            <div class="col-6">{{ $obra->tipoObra->nombre ?? 'N/A' }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-6 fw-bold">Disponibilidad:</div>
            <div class="col-6">
                <span class="badge {{ $obra->estado == 'EnVenta' ? 'bg-success' : 'bg-danger' }}">
                    {{ $obra->estado }}
                </span>
            </div>
        </div>

        <div class="extra-info p-3 bg-light rounded shadow-sm mt-3 small">
            <p>🚚 <strong>Shipping by ArtMajour</strong></p>
            <p>📦 Ships from France within 2 business days</p>
            <p>🔄 14-day return policy</p>
            <p>🔒 100% secure transaction</p>
        </div>
    </div>
</div>
