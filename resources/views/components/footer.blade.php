<footer class="footer-custom">
    <div class="container-footer">
        <div class="row g-4 flex-wrap justify-content-between align-items-start">

            <!-- Marca -->
            <div class="col-12 col-sm-6 col-lg-3">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 80px;">
                <p class="footer-text mt-2">
                    {{__('messages.TITLE_FOOTER')}}
                </p>
            </div>

            <!-- Páginas -->
            <div class="col-6 col-sm-6 col-lg-2">
                <h6 class="fw-semibold">{{__('messages.PAGE_FOOTER')}}</h6>
                <ul class="list-unstyled mt-2">
                    <li class="mb-1"><a href="{{localized_url('/')}}">{{__('messages.NAV_HOME')}}</a></li>
                    <li class="mb-1"><a href="{{localized_url('/ObrasArte')}}">{{__('messages.NAV_ART')}}</a></li>
                    <li class="mb-1"><a href="{{localized_url('/aboutUs')}}">{{__('messages.NAV_ARTIST')}}</a></li>
                    <li class="mb-1"><a href="{{localized_url('/events')}}">{{__('messages.NAV_EVENTS')}}</a></li>
                    <li class="mb-1"><a href="{{localized_url('/contactUs')}}">{{__('messages.NAV_CONTACT')}}</a></li>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <h6 class="fw-semibold">{{__('messages.CONTACT_FOOTER')}}</h6>

                <form id="footerForm" action="{{route('contactanos.store')}}" class="mt-3" method="POST">
                    @csrf
                    <input type="hidden" name="_captcha" value="false">
                    <input type="hidden" name="_template" value="table">

                    <div class="mb-2">
                        <input type="text" name="nombre" class="form-control-footer form-control-sm" placeholder="{{__('messages.CONTACT_FOOTER_NAME')}}" required>
                    </div>
                    <div class="mb-2">
                        <input type="text" name="email" class="form-control-footer form-control-sm" placeholder="{{__('messages.CONTACT_FOOTER_EMAIL')}}" required>
                    </div>
                    <div class="mb-2">
                        <textarea name="mensaje" class="form-control-footer form-control-sm" rows="2" placeholder="{{__('messages.CONTACT_FOOTER_MESSAGE')}}" required></textarea>
                    </div>
                    <button type="submit" class="btn contact-form btn-sm w-100">{{__('messages.CONTACT_FOOTER_send')}}</button>
                </form>

                <div id="mensajeEnviado" style="display: none; margin-top: 0.5rem;" class="alert alert-success p-2">
                    ✅ ¡Mensaje enviado!
                </div>
            </div>

            <!-- Redes sociales -->
            <div class="col-12 col-sm-6 col-lg-3">
                <h6 class="fw-semibold">{{__('messages.SOCIAL_FOOTER')}}</h6>
                <div class="icons-social d-flex flex-wrap gap-2 mt-2">
                    <a href="https://www.facebook.com/p/Galer%C3%ADa-de-Arte-Enmanuel-Membre%C3%B1o-100025235529748/?locale=es_LA" target="_blank"><img src="{{ asset('img/icons/facebook.png') }}" alt="Facebook" width="44"></a>
                    <a href="https://www.instagram.com/galeria.enmanuel/?hl=es-la" target="_blank"><img src="{{ asset('img/icons/instagram.png') }}" alt="Instagram" width="44"></a>
                    <a href="https://www.tiktok.com/@galeria.enmanuel" target="_blank"><img src="{{ asset('img/icons/tiktok.png') }}" alt="TikTok" width="44"></a>
                    <a href="https://wa.me/+50496432644" target="_blank"><img src="{{ asset('img/icons/whatsapp.png') }}" alt="WhatsApp" width="44"></a>
                </div>
            </div>
        </div>
        <hr style="width: 100%;">
        <div class="row">
            <div class="col text-center mb-1">
                <p class="copyrigth">Samuel Membreño &copy; Galería de Arte Enmanuel Membreño - {{ date('Y') }}</p>
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const footerForm = document.getElementById('footerForm');
        if (!footerForm) return;

        footerForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(footerForm);

            fetch(footerForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
                .then(async res => {
                    if (!res.ok) {
                        const errorText = await res.text();
                        console.error("Error:", errorText);
                        throw new Error("Algo salió mal");
                    }
                    return res.json();
                })
                .then(data => {
                    const mensajeDiv = document.getElementById('mensajeEnviado');
                    mensajeDiv.textContent = data.mensaje;
                    mensajeDiv.style.display = 'block';
                    footerForm.reset();

                    setTimeout(() => {
                        mensajeDiv.style.display = 'none';
                    }, 4000);
                })
                .catch(error => {
                    console.error("Error al enviar:", error);
                    alert('❌ Error al enviar el mensaje.');
                });
        });
    });
</script>
