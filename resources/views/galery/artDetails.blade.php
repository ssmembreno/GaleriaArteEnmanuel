@extends('_layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="row gy-5 align-items-start">
            <!-- Imagen principal -->
            <div class="col-lg-8 col-md-12 text-center animate-left">
                <div class="main-image mb-2 mx-auto" id="mainImageWrapper" style="cursor: zoom-in;">
                    <img src="{{ asset('storage/'.$obra->imagen) }}" alt="Obra principal" class="img-fluid" id="mainImage">
                </div>

                <div class="thumbnail-gallery d-flex justify-content-center flex-wrap gap-2">
                    <img src="{{ asset('storage/'.$obra->imagen) }}" class="thumbnail">
                    @foreach($obra->imagenes as $imagen)
                        <img src="{{ asset('storage/'.$imagen->ruta_imagen) }}" class="thumbnail">
                    @endforeach
                </div>
            </div>

            <!-- Información de la obra -->
            <div class="col-lg-4 col-md-12 animate-left">
                <div class="obra-info">
                    <h1>{{ $obra->nombre }}</h1>
                    <p class="text-muted">by {{ $obra->artista->nombre ?? 'Unknown Artist' }}</p>

                    <p class="price">${{ number_format($obra->precio, 2) }}</p>

                    <button class="btn btn-contact w-100 my-4 py-3">Contacta con el artista</button>

                    @php
                        $promedio = round($obra->valoraciones->avg('calificacion'), 1);
                        $cantidad = $obra->valoraciones->count();
                    @endphp

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>Valoraciones({{ $cantidad }})</strong>

                        <div>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($promedio))
                                    <span style="color: #fcd34d; font-size: 1.5rem;">★</span>
                                @else
                                    <span style="color: #ccc; font-size: 1.5rem;">★</span>
                                @endif
                            @endfor
                        </div>
                    </div>

                    <h5 class="mt-4">Description</h5>
                    <p>{{ $obra->descripcion }}</p>

                    <h5 class="mt-4">Details</h5>
                    <div class="row mb-4">
                        <div class="col-5 fw-bold">Dimensiónes:</div>
                        <div class="col-7">{{ $obra->tamaño }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-5 fw-bold">Tenica</div>
                        <div class="col-7">{{ $obra->tipoObra->nombre ?? 'N/A' }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-5 fw-bold">Disponibilidad:</div>
                        <div class="col-7">
                            @if($obra->estado == 'EnVenta')
                                <span class="status-art-details text-white">{{ $obra->estado }}</span>
                            @else
                                <span class="status-art-details-red text-white">{{ $obra->estado }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="extra-info p-3">
                        <p>🚚 <strong>Shipping by ArtMajour</strong></p>
                        <p>📦 Ships from France within 2 business days</p>
                        <p>🔄 14-day return policy</p>
                        <p>🔒 100% secure transaction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @auth
        <h3 class="mt-5">Valora esta obra</h3>

        <form action="{{ route('valorar.store', ['obra' => $obra->id]) }}" method="POST">
            @csrf
            <div class="star-rating mb-3">
                @for ($i = 1; $i <= 5; $i++)
                    <span class="star" data-value="{{ $i }}">☆</span>
                @endfor
            </div>

            <input type="hidden" name="calificacion" id="calificacion" value="">

            <button type="submit" class="btn btn-success" disabled id="submitValoracion">Enviar valoración</button>
        </form>

    @endauth

    @guest
        <p class="mb-3">Para dejar una valoración necesitas estar registrado.</p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
            Iniciar sesión o registrarse
        </button>
    @endguest


    <div>
        <h3>Comentarios</h3>
        @auth
            <form action="{{ route('comentarios.store', ['obra' => $obra->id]) }}" method="POST">
                @csrf
                <textarea name="contenido" required></textarea>
                <button type="submit">Enviar comentario</button>
            </form>
        @endauth

        @guest
            <p class="mb-3">Para dejar un comentario necesitas estar registrado.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                Iniciar sesión o registrarse
            </button>
        @endguest

        @if($obra->comentarios && $obra->comentarios->count())
            @foreach($obra->comentarios as $comentario)
                <div class="comentario mb-2 p-2 border rounded">
                    <strong>{{ $comentario->user->name}}</strong> dice:
                    <p>{{ $comentario->contenido }}</p>
                    <small>{{ $comentario->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        @else
            <p>No hay comentarios aún.</p>
        @endif
    </div>

    <!-- Modal Bootstrap con Carousel -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-dark border-0">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 d-flex align-items-center justify-content-center position-relative">

                    <!-- Botón previo -->
                    <button class="carousel-control-prev position-absolute start-0 top-50 translate-middle-y" type="button" data-bs-target="#carouselImages" data-bs-slide="prev" style="width: 80px; height: 80px; background: rgba(0,0,0,0.5); border: none; border-radius: 50%;">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <!-- Carousel -->
                    <div id="carouselImages" class="carousel slide w-100" data-bs-ride="carousel">
                        <div class="carousel-inner text-center">
                            <!-- Primera imagen activa -->
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/'.$obra->imagen) }}" class="d-block mx-auto img-fluid modal-carousel-img">
                            </div>

                            @foreach($obra->imagenes as $imagen)
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/'.$imagen->ruta_imagen) }}" class="d-block mx-auto img-fluid modal-carousel-img">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Botón siguiente -->
                    <button class="carousel-control-next position-absolute end-0 top-50 translate-middle-y" type="button" data-bs-target="#carouselImages" data-bs-slide="next" style="width: 80px; height: 80px; background: rgba(0,0,0,0.5); border: none; border-radius: 50%;">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal de Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content px-3 py-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Iniciar sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <button class="btn w-100 mb-3 btn-danger"> <i class="fab fa-google me-2"></i> Google</button>
                    </div>

                    <div class="text-center my-3">
                        <hr class="w-25 d-inline-block"> <span class="px-2 text-muted">O</span> <hr class="w-25 d-inline-block">
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <div class="input-group">

                                <input type="password" name="password" class="form-control" required id="loginPassword">
                                <span class="input-group-text" onclick="togglePassword()"> 👁️ </span>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Iniciar sesión</button>

                        <div class="mt-3 text-center">
                            <a href="#">¿Olvidaste tu contraseña?</a>
                            <br>
                            <small>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        @if ($errors->has('email') || $errors->has('password'))
        // Espera a que cargue el DOM y abre el modal automáticamente
        window.onload = function() {
            let loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        };
        @endif
    </script>
@endsection
