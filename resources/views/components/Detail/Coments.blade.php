<div class="container my-2">
    <h3 class="title-obra-details title-comments">Envianos un comentario sobre la obra</h3>
    @auth
        <div id="mensaje-exito" class="alert alert-success d-none" role="alert">
            ¡Comentario enviado con éxito! Será visible tras ser aprobado.
        </div>
        <form action="{{ route('comentarios.store', ['obra' => $obra->id]) }}" method="POST" class="mb-4" id="comentario-form">
            @csrf
            <div class="d-flex align-items-start bg-white p-3 rounded shadow">
                <img src="{{ Auth::user()->avatar ?? asset('img/default-avatar.webp') }}" class="rounded-circle me-2" width="40" height="40" alt="avatar">
                <textarea name="contenido" class="form-control me-2" rows="2" placeholder="Añadir un comentario" required></textarea>
                <button type="submit" class="btn-comments">Enviar</button>
            </div>
        </form>
    @endauth

    @guest
        <div class="d-flex justify-content-center">
            <button class="boton-session-details" data-bs-toggle="modal" data-bs-target="#loginModal">
                Iniciar sesión o registrarse
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
