<div class="mb-4">
    <div class="collapse-toggle" data-bs-toggle="collapse" data-bs-target="#collapseEditar" aria-expanded="false" aria-controls="collapseEditar">
        <h2 class="title-obra-details">{{ __('messages.EDIT_MY_DATA_MDATA') }}</h2>
        <img src="{{ asset('img/icons/arrowBottom.png') }}" alt="Abrir" class="collapse-arrow">
    </div>
    <hr style="width: 100%">
    <div class="collapse" id="collapseEditar">
        <div class="edit-section mt-3">
            <form id="updateProfileForm" action="{{ route('usuario.update', $usuario->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('messages.NAME_MDATA') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $usuario->name) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">{{ __('messages.LASTNAME_MDATA') }}</label>
                    <input type="text" name="apellido" id="apellido" value="{{ old('apellido', $usuario->apellido) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('messages.EMAIL_MDATA') }}</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('messages.NEW_PASSWORD_MDATA') }}</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('messages.PASSWORD_PLACEHOLDER_MDATA') }}">
                </div>

                <button type="button" class="btn btn-rounded" data-bs-toggle="modal" data-bs-target="#confirmModal">
                    {{ __('messages.SAVE_CHANGES_MDATA') }}
                </button>
            </form>
            @include('components.confirmActionsModal')
        </div>
    </div>
</div>
