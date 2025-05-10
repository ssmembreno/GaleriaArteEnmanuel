@extends('_layouts.layout')

@section('content')
    @include('galery.Title-Art')
    <div class="container pt-5 mt-5 mb-5">
        <div class="row">
            @include('components.filters') {{-- filtros a la izquierda --}}

            <div class="col-md-9">
                <div class="row" id="galeria-obras">
                    @include('galery.CardsImagesArt') {{-- solo las obras aquí --}}
                </div>
            </div>
        </div>
    </div>

    @include('components.buttonScroll')
@endsection

<script>
    const filtrarObrasURL = "{{ route('filtrar.obras') }}";
</script>
<script>
    const filtrarObrasURL = "{{ route('filtrar.obras') }}";
</script>
