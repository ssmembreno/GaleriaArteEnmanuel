<div class="container my-2">
    <h3 class="title-obra-details title-comments">{{__('messages.COMENTS')}}</h3>
    @auth
        <div id="mensaje-exito" class="alert alert-success d-none" role="alert">
            {{__('messages.COMENT_SUCCESS')}}
        </div>
        <form action="{{ route('comentarios.store', ['obra' => $obra->id]) }}" method="POST" class="mb-4" id="comentario-form">
            @csrf
            <div class="d-flex align-items-start bg-white p-3 rounded shadow">
                <img src="{{ Auth::user()->avatar ?? asset('img/default-avatar.webp') }}" class="rounded-circle me-2" width="40" height="40" alt="avatar">
                <textarea name="contenido" class="form-control me-2" rows="2" placeholder="{{__('messages.ADD_COMENT')}}" required></textarea>
                <button type="submit" class="btn-comments">{{__('messages.CONTACT_FOOTER_send')}}</button>
            </div>
        </form>
    @endauth

    @guest
        <div class="d-flex justify-content-center">
            <button class="boton-session-details" data-bs-toggle="modal" data-bs-target="#loginModal">
                {{__('messages.NAV_LOGIN')}} o {{__('messages.NAV_SIGNUP')}}
            </button>
        </div>
    @endguest


    @if($obra->comentarios && $obra->comentarios->count())
        <div class="comentarios-wrapper" id="comentarios-list">
            @foreach($obra->comentarios as $comentario)
                @if($comentario->status == 1)
                <div class="comentario-card bg-white p-3 rounded shadow mb-3 position-relative">
                    <div class="d-flex">
                        <img src="{{ Auth::user()->avatar ?? asset('img/default-avatar.webp') }}" class="rounded-circle me-2" width="40" height="40" alt="avatar">
                        <div>
                            <strong>{{ $comentario->user->name }}</strong>
                            <small class="text-muted ms-2">{{ $comentario->created_at->diffForHumans() }}</small>
                            <p class="mt-2 mb-1">{{ $comentario->contenido }}</p>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @else
        <p class="text-white">No hay comentarios aún.</p>
    @endif
</div>
