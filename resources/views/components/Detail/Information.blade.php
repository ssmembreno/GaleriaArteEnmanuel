<div class="col-lg-4 col-md-12 animate-left">
    <div class="obra-info">
        <h1 class="title-obra-details">{{ $obra->nombre }}</h1>
        <p class="text-muted">{{ $obra->artista->nombre ?? 'Unknown Artist' }}</p>
        <a href="https://wa.me/50498765432" target="_blank" class="btn contact-details w-100 my-4 py-3">
            Contacta con el artista
        </a>

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

        <hr style="width:100%;">


        <h5 class="mt-4">Descripción</h5>
        <p>{{ $obra->descripcion }}</p>

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

        <hr style="width:100%;">
        <div class="info-box bg-light p-3 rounded mt-4 shadow-sm" style="font-family: Cal Sans, sans-serif;">
            <h6 class="fw-bold mb-3">Información extra de la obra</h6>
            <ul class="list-unstyled mb-0">
                <li class="mb-1">🎨 Obra original y única</li>
                <li class="mb-1">📩 Contacta con el artista para más detalles</li>
                <li class="mb-1">📷 Imágenes reales de alta calidad</li>
                <li class="mb-1">✅ Compra segura directamente con el artista</li>
            </ul>
        </div>
    </div>
</div>
