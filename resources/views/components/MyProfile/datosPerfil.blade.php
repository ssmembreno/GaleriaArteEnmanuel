@php use Illuminate\Support\Str; @endphp

<div class="mb-4">
    <div class="collapse-toggle" data-bs-toggle="collapse" data-bs-target="#collapsePerfil" aria-expanded="true" aria-controls="collapsePerfil">
        <h2 class="title-obra-details">{{ __('messages.MY_PROFILE') }}</h2>
        <img src="{{ asset('img/icons/arrowBottom.png') }}" alt="{{ __('messages.OPEN') }}" class="collapse-arrow">

    </div>
    <hr style="width: 100%">
    <div class="collapse show" id="collapsePerfil">
        <div class="row align-items-center mt-3">
            <div class="col-12 col-md-3 text-center mb-3 mb-md-0">
                @if ($usuario->avatar && Str::startsWith($usuario->avatar, 'http'))
                    <img src="{{ $usuario->avatar }}" alt="{{ __('messages.GOOGLE_AVATAR_ALT') }}" class="profile-avatar">
                @else
                    <img src="{{ asset('img/default-avatar.webp') }}" alt="{{ __('messages.DEFAULT_AVATAR_ALT') }}" class="profile-avatar">
                @endif
            </div>
            <div class="col-12 col-md-9 profile-info">
                <p><strong>{{ __('messages.NAME_MYPROFILE') }}:</strong> {{ $usuario->name }} {{ $usuario->apellido }}</p>
                <p><strong>{{ __('messages.EMAIL_MYPROFILE') }}:</strong> {{ $usuario->email }}</p>
                <p><strong>{{ __('messages.REGISTERED_SINCE') }}:</strong> {{ $usuario->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>
</div>
