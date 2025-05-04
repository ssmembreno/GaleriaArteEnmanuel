@extends('_layouts.layout')

@section('content')
    @include('components.sliderHome')

    <div class="container py-5">
        <h2 class="text-center my-4">Galería de Arte</h2>

        <div class="row gx-5">
            <!-- Sidebar filtros -->
            <div class="col-lg-3">
                @include('components.filters',['tiposObra' => $tiposObra])
            </div>

            <!-- Galería de obras -->
                <div class="col-lg-9" id="galeria-obras">
                    <div class="row g-4">
                        @forelse($obras as $obra)
                            @include('components.cards')
                        @empty
                            <p class="text-center">No hay obras disponibles por ahora.</p>
                        @endforelse
                    </div>
                </div>
        </div>
    </div>
@endsection
