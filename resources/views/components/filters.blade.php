<form id="form-filtros">
    <aside class="filtros mb-4">
        <h5>Filtros</h5>

        <!-- Rango de precio -->
        <div class="mb-4 rango-precio">
            <label class="form-label">Rango de precio</label>

            <div class="slider-container">
                <input type="range" class="range-slider filtro" id="minRange" min="0" max="5000" step="1" value="0">
                <input type="range" class="range-slider filtro" id="maxRange" min="0" max="5000" step="1" value="5000">
                <div class="range-track"></div>
            </div>

            <div class="price-tags d-flex justify-content-between mt-3">
                <div class="price-box">
                    <small>Minimum</small>
                    <input type="number" name="min_price" id="minValue" class="price-input filtro" value="0" min="0" max="5000">
                </div>
                <div class="price-box">
                    <small>Maximum</small>
                    <input type="number" name="max_price" id="maxValue" class="price-input filtro" value="5000" min="0" max="5000">
                </div>
            </div>
        </div>

        <!-- Tipo de obra -->
        <div class="mb-3">
            <label class="form-label">Tipo de obra</label>
            <select class="form-select filtro" name="tipo_obra">
                <option value="">Todas</option>
                <option value="Pintura">Pintura</option>
                <option value="Escultura">Escultura</option>
                <option value="Fotografía">Fotografía</option>
                <option value="Grabado">Grabado</option>
            </select>
        </div>

        <!-- Técnica -->
        <div class="mb-3">
            <label class="form-label">Técnica</label>
            <select class="form-select filtro" name="tecnica">
                <option value="">Todas</option> <!-- ✅ esta es la clave -->
                @foreach($tiposObra as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" id="clear-filters" class="btn btn-outline-secondary w-100 mt-2">
            Limpiar filtros
        </button>
    </aside>
</form>

<script>
    const filtrarObrasURL = "{{ route('filtrar.obras') }}";
</script>
