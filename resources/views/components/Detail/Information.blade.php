<div class="col-lg-4 col-md-12 animate-left">
    <div class="obra-info">
        <h1 class="title-obra-details">{{ $obra->nombre }}</h1>
        <p class="text-muted">{{ $obra->artista->nombre ?? 'Unknown Artist' }}</p>
        <a href="https://wa.me/+50496432644" target="_blank" class="btn contact-details w-100 my-4 py-3">
            {{__('messages.BTN_CONTACT')}}
        </a>

        @php
            $promedio = round($obra->valoraciones->avg('calificacion'), 1);
            $cantidad = $obra->valoraciones->count();
        @endphp

        <div class="d-flex justify-content-between align-items-center mb-2">
            <strong> {{__('messages.VALORACIONES')}} ({{ $cantidad }})</strong>
            <div>
                @for ($i = 1; $i <= 5; $i++)
                    <span style="color: {{ $i <= floor($promedio) ? '#fcd34d' : '#ccc' }}; font-size: 1.5rem;">★</span>
                @endfor
            </div>
        </div>

        <hr style="width:100%;">


        <h5 class="mt-4"> {{__('messages.DESCRIPCION')}}:</h5>

        @if(app()->getLocale() == 'en')
            <p>{{ $obra->desc_ingles ?? 'No description available.' }}</p>
        @else
            <p>{{ $obra->descripcion }}</p>
        @endif

        <div class="row mb-2">
            <div class="col-6 fw-bold"> {{__('messages.PRECIO')}}:</div>
            <div class="col-6">{{ number_format($obra->precio, 2)}}$</div>
        </div>
        <div class="row mb-2">
            <div class="col-6 fw-bold"> {{__('messages.DIMENSIONES')}}:</div>
            <div class="col-6">{{ $obra->tamaño }} cm</div>
        </div>
        <div class="row mb-2">
            <div class="col-6 fw-bold"> {{__('messages.TECNICA')}}:</div>
            <div class="col-6">{{ $obra->tipoObra->nombre ?? 'N/A' }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-6 fw-bold"> {{__('messages.DISPONIBILIDAD')}}:</div>
            <div class="col-6">
                <span class="badge {{ $obra->estado == 'EnVenta' ? 'bg-success' : 'bg-danger' }}">
                    {{ $obra->estado }}
                </span>
            </div>
        </div>

        <hr style="width:100%;">
        <div class="info-box bg-light p-3 rounded mt-4 shadow-sm" style="font-family: Cal Sans, sans-serif;">
            <h6 class="fw-bold mb-3">{{__('messages.INFO_EXTRA')}}</h6>
            <ul class="list-unstyled mb-0">
                <li class="mb-1">{{__('messages.INFO1')}}</li>
                <li class="mb-1">{{__('messages.INFO2')}}</li>
                <li class="mb-1">{{__('messages.INFO3')}}</li>
                <li class="mb-1">{{__('messages.INFO4')}}</li>
            </ul>
        </div>
    </div>
</div>
