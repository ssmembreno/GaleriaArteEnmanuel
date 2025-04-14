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
    <div class="d-flex flex-wrap justify-content-center gap-3">
      <div class="card obra-card" style="width: 15rem;">
        <a href="{{url('artDetails')}}"><img src="{{ asset('img/obra1.jpg') }}" class="card-img-top" alt="Obra 1"></a>
        <div class="card-body text-center">
          <h5 class="card-title">Obra 1</h5>
          <p class="card-text">Descripción breve de la obra.</p>
          <p><strong>$300.00</strong></p>
        </div>
      </div>
      <div class="card obra-card" style="width: 15rem;">
        <img src="{{ asset('img/obra2.jpg') }}" class="card-img-top" alt="Obra 2">
        <div class="card-body text-center">
          <h5 class="card-title">Obra 2</h5>
          <p class="card-text">Otra descripción breve.</p>
          <p><strong>$450.00</strong></p>
        </div>
      </div>
    </div>
  </section>
</div>