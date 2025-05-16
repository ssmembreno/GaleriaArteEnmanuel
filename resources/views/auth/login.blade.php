@extends('_layouts.logins')

@section('content')
    <div class="login-wrapper">
        <div class="login-box">
            <div class="login-logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>
            <div class="login-title">¡Bienvenido!</div>
            <div class="login-subtitle">Introduce tus datos para continuar</div>

            <div class="toggle-buttons mb-4">
                <button id="btn-login" class="active" onclick="toggleForm('login')" type="button">Iniciar sesión</button>
                <button id="btn-register" onclick="toggleForm('register')" type="button">Crear cuenta</button>
            </div>

            @include('_includes.Modules')
            <!-- Login Form -->
            <form id="form-login" action="{{ action([\App\Http\Controllers\Login\LoginController::class, 'login']) }}" method="POST">
                @csrf
                <div class="input-group-custom">
                    <i class="fas fa-envelope"></i>
                    <input name="email" type="email" class="form-control-custom" placeholder="Correo electrónico" required autocomplete="off">
                </div>
                <div class="input-group-custom">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" class="form-control-custom" placeholder="Contraseña" required autocomplete="off">
                </div>
                <button type="submit" class="btn-continue mt-2">Continuar</button>
            </form>

            <!-- formulario de registro-->
            <form id="form-register" style="display:none" action="{{action([\App\Http\Controllers\Login\RegisterController::class,'register'])}}" method="POST">
                @csrf
                <div class="input-group-custom">
                    <i class="fas fa-user"></i>
                    <input name="name" type="text" class="form-control-custom" placeholder="Nombre" autocomplete="off">
                </div>
                <div class="input-group-custom">
                    <i class="fas fa-user"></i>
                    <input name="apellido" type="text" class="form-control-custom" placeholder="Apellido" autocomplete="off">
                </div>
                <div class="input-group-custom">
                    <i class="fas fa-envelope"></i>
                    <input name="email" type="email" class="form-control-custom" placeholder="Correo electrónico" autocomplete="off">
                </div>
                <div class="input-group-custom">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" class="form-control-custom" placeholder="Contraseña" autocomplete="off">
                </div>
                <div class="input-group-custom">
                    <i class="fas fa-lock"></i>
                    <input name="password_confirmation" type="password" class="form-control-custom" placeholder="Confirmar contraseña" autocomplete="off">
                </div>
                <button type="submit" class="btn-continue mt-2">Regístrate</button>
            </form>

            <div class="divider"><span>O continúa con</span></div>

            <div class="social-icons">
                <a href="http://127.0.0.1:8000/auth/google/redirect"><img src="{{asset('img/icons/google.png')}}" alt="Google"></a>
            </div>

            <div class="text-center mt-4 mb-4">
                <a href="{{ url('/') }}" class="btn-continue text-decoration-none"
                   style="text-decoration: none; background-color: transparent; border: 1px solid #007bff; color: #007bff; padding: 10px 20px; border-radius: 5px; transition: all 0.3s;">
                    ← Volver a la galería
                </a>
            </div>


            <div class="footer-note mt-5">
                Únete a los amantes del arte que ya descubren nuevas emociones a través de nuestras obras. Inicia sesión para explorar la galería, guardar tus favoritas y compartir la inspiración con el mundo.
            </div>
        </div>
    </div>
@endsection
