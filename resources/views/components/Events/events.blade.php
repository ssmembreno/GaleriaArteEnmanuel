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
                <div class="neon-event-card">
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
