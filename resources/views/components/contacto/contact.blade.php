<section class="contact-section container py-5">
    <div class="contact-card p-4 rounded-bottom-5 bg-white position-relative">
        <h3 class="contact-title">Contáctanos</h3>
        <div class="row">
            <div class="col-md-6 mb-4">
                <h3 class="mb-4">Ponte en contacto con nosotros</h3>
                <ul class="contact-info-Contac list-unstyled">
                    <li><i class="bi bi-telephone-fill"></i> +504 9643-2644 </li>
                    <li><i class="bi bi-geo-alt-fill"></i> Tegucigalpa, Honduras</li>
                </ul>
            </div>
            @if(session('mensaje'))
                <div class="alert alert-success">
                    {{ session('mensaje') }}
                </div>
            @endiF
            <div class="col-md-6">
                <form id="contact-form" action="{{route('contactanos.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="_captcha" value="false">
                    <input type="hidden" name="_template" value="table">

                    <div class="form-row d-flex gap-3 mb-3">
                        <div class="flex-fill">
                            <label for="firstName">Nombre<span class="text-danger">*</span></label>
                            <input type="text" name="nombre" id="firstName" class="form-control" required>
                        </div>
                        <div class="flex-fill">
                            <label for="lastName">Apellido<span class="text-danger">*</span></label>
                            <input type="text" name="apellido" id="lastName" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Correo Electrónico<span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="message">Mensaje<span class="text-danger">*</span></label>
                        <textarea id="message" name="mensaje" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn contact-form">Enviar Mensaje</button>
                </form>
                <div id="mensajeEnviado" style="display: none; margin-top: 1rem;" class="alert alert-success">
                ✅ ¡Mensaje enviado correctamente!
                </div>
            </div>
        </div>

    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
