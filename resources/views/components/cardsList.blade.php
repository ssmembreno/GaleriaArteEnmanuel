<!--Carga las obras con filtros aplicados-->
<div class="row g-4">
    @forelse($obras as $obra)
        @include('components.cards')
    @empty
        <p class="text-center">No hay obras disponibles con estos filtros. </p>
    @endforelse
</div>
