@extends('_layouts.layout')

@section('content')
    @include('galery.Title-Art')
    <div class="container pt-5 mt-5 mb-5">
        <div class="row">
            @include('components.filters')

            <div class="col-md-9">
                <div class="row" id="galeria-obras">
                    @include('galery.CardsImagesArt')
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    const filtrarObrasURL = "{{ route('filtrar.obras') }}";
</script>
<script>
    const filtrarObrasURL = "{{ route('filtrar.obras') }}";
</script>
<script>
    window.obrasFavoritas = @json($favoritosIds);
</script>
