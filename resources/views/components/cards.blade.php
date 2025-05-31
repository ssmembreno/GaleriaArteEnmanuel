<!-- Separador con línea -->
<div class="container-fluid px-0">
    <hr class="my-4">
</div>

<!-- Galería de imágenes -->
<div class="container pt-5 mt-5 mb-3">
    <div class="mx-auto" style="max-width: 1140px;">
        <div class="row" id="masonry-grid">
            @foreach($obras as $obra)
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <a href="{{ localized_route('obraDetails', $obra->id) }}" class="d-block">
                    <img src="{{ asset('storage/' . $obra->imagen) }}"
                             alt="{{ $obra->nombre }}"
                             class="img-fluid rounded shadow-sm w-100 home-img"
                             title="{{$obra->nombre}}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Botones centrados -->
    <div class="mt-4 d-flex justify-content-center gap-3">
        <a href="{{ localized_url('contactUs') }}" class="contact-details btn-biografia">{{__('messages.BTN_HOME_CONTACT')}}</a>
        <a href="{{ localized_url('ObrasArte') }}" class="contact-details btn-biografia">{{__('messages.BTN_HOME_ART')}}</a>
    </div>
</div>

<div class="container-fluid px-0">
    <hr class="my-4">
</div>

<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var grid = document.querySelector('#masonry-grid');
        imagesLoaded(grid, function () {
            new Masonry(grid, {
                itemSelector: '.col-12',
                percentPosition: true
            });
        });
    });
</script>
