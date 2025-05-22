<!-- Contenedor general con partículas -->
<div class="neon-events-wrapper">
    <!-- Fondo de partículas -->
    <div id="particles-js"></div>

    <!-- Contenido real -->
    <div class="neon-events-container">

        <div class="neon-events-header">
            <h1 class="Events-title">Eventos</h1>
            <h2 class="neon-events-title text-muted">Próximos eventos disponibles para la exposición de obras.</h2>
        </div>

        <div class="neon-events-list">
            @foreach ($eventos as $evento)
                <div class="neon-event-card {{ !$evento->estado ? 'evento-finalizado' : '' }}">
                <!-- Imagen -->
                    <img class="neon-event-image" src="{{ asset('storage/' . $evento->imagen) }}"
                         alt="{{ $evento->nombre }}" title="{{ $evento->nombre }}">

                    <!-- Contenido -->
                    <div class="neon-event-content">
                        <h2 class="neon-event-title">{{ $evento->nombre }}<br>
                            <span>{{ $evento->ciudad }}</span>
                        </h2>

                        <p class="neon-event-description">{{ $evento->descripcion }}</p>

                        <div class="neon-event-details">
                            <div class="neon-event-detail">
                                <i>📆</i>
                                <span>{{ \Carbon\Carbon::parse($evento->fecha)->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</span>
                            </div>

                            <div class="neon-event-detail">
                                <i>🕒</i>
                                <span>{{ $evento->hora_inicio }} - {{ $evento->hora_fin }}</span>
                            </div>

                            <div class="neon-event-detail">
                                <i>📍</i>
                                <span>{{ $evento->ubicacion }}</span>
                            </div>

                            @if($evento->estado)
                            <div class="neon-event-detail">
                                <p style="font-weight: bold; color: #5ec916; font-size: 16px; margin-top: 20px; margin-left: 10px">Proximamente</p>
                            </div>
                            @else
                                <div class="neon-event-detail">
                                    <p style="font-weight: bold; color: red; font-size: 16px; margin-top: 20px; margin-left: 10px">Evento Finalizado</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

<style>
    .evento-finalizado {
        background-color: #f0f0f0;
    }
</style>
