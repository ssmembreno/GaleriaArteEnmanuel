<h2 class="text-center mb-4">Galería de Arte</h2>
<div class="row">
    <div class="col-md-2">
        <!-- Filers -->
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
        <!-- News and events -->
        <aside class="noticias">
            <h5>Noticias y Eventos</h5>
            <ul class="list-unstyled">
                <li class="mb-2"><strong>01 Abr:</strong> Expo en Tegucigalpa</li>
                <li class="mb-2"><strong>10 Abr:</strong> Mural en San Pedro</li>
                <li class="mb-2"><strong>15 Abr:</strong> Taller de pintura</li>
            </ul>
        </aside>
    </div>
    <!-- Galería de Obras -->
    <section class="col-md-10">
        <div class="row">
            @forelse($obras as $obra)
                <div class="col-12 col-sm-6 col-md-4 mb-4 d-flex justify-content-center">
                    <div class="card obra-card" style="width: 15rem;">
                        <a href="{{ route('obraDetails', $obra->id)}}">
                            <img src="{{ asset('img/Enmanuel1.webp') }}" class="card-img-top" alt="{{ $obra->nombre }}">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $obra->nombre }}</h5>
                            <p class="card-text">{{ $obra->descripcion }}</p>
                            <p><strong>{{ number_format($obra->precio, 2) }} $</strong></p>
                        </div>
                    </div>
                </div>
            @empty
                <p>No hay obras disponibles por ahora.</p>
            @endforelse
        </div>
    </section>
</div>
