<div class="container my-5">
    <div class="row justify-content-center g-4">
        <h1 class="title-social text-center" style="font-size: 50px !important;"> {{__('messages.TITLE_MEDIA_ABOUT')}}</h1>
        {{-- Facebook --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <div class="card social-card text-center h-100">

            <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <img src="{{ asset('img/icons/facebook.png') }}" alt="Facebook" class="mb-3" style="width: 60px;">
                        <h6>{{__('messages.FOLLOW_ON')}}Facebook</h6>
                    </div>
                    <a href="https://www.facebook.com/p/Galer%C3%ADa-de-Arte-Enmanuel-Membre%C3%B1o-100025235529748/?locale=es_LA" target="_blank" class="btn contact-details mt-3">{{__('messages.BTN_MEDIA_ABOUT')}}</a>
                </div>
            </div>
        </div>

        {{-- Instagram --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <div class="card social-card text-center h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <img src="{{ asset('img/icons/instagram.png')}}" alt="Instagram" class="mb-3" style="width: 60px;">
                        <h6>{{__('messages.FOLLOW_ON')}}Instagram</h6>
                    </div>
                    <a href="https://www.instagram.com/galeria.enmanuel/?hl=es-la" target="_blank" class="btn contact-details mt-3">{{__('messages.BTN_MEDIA_ABOUT')}}</a>
                </div>
            </div>
        </div>

        {{-- TikTok --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <div class="card social-card text-center h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <img src="{{ asset('img/icons/tiktok.png') }}" alt="TikTok" class="mb-3" style="width: 60px;">
                        <h6>{{__('messages.FOLLOW_ON')}}TikTok</h6>
                    </div>
                    <a href="https://www.tiktok.com/@galeria.enmanuel" target="_blank" class="btn contact-details mt-3">{{__('messages.BTN_MEDIA_ABOUT')}}</a>
                </div>
            </div>
        </div>

        {{-- WhatsApp --}}
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
            <div class="card social-card text-center h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <img src="{{ asset('img/icons/whatsapp.png') }}" alt="WhatsApp" class="mb-3" style="width: 60px;">
                        <h6>{{__('messages.CONTACT_WHA_ABOUT')}} WhatsApp</h6>
                    </div>
                    <a href="https://wa.me/+50496432644" target="_blank" class="contact-details btn mt-3">{{__('messages.CHAT_WHA_ABOUT')}}</a>
                </div>
            </div>
        </div>

    </div>
</div>
