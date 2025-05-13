@extends('_layouts.logins')

@section('content')
    <div class="login-wrapper">
        <div class="login-box">
            <div class="login-logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>
            <div class="login-title">¡Bienvenido!</div>
            <div class="login-subtitle">Bienvenido de nuevo, introduce tus datos para continuar</div>

            <div class="toggle-buttons mb-4">
                <button id="btn-login" class="active" onclick="toggleForm('login')" type="button">Iniciar sesión</button>
                <button id="btn-register" onclick="toggleForm('register')" type="button">Crear cuenta</button>
            </div>

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

            <!-- Register Form -->
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

            <div class="footer-note">
                Únete a millones de inversores inteligentes que confían en nosotros para gestionar sus finanzas. Inicia sesión o regístrate para acceder a tu panel personalizado.
            </div>
        </div>
    </div>

@endsection

<script>
    function toggleForm(form) {
        const loginForm = document.getElementById('form-login');
        const registerForm = document.getElementById('form-register');
        const loginBtn = document.getElementById('btn-login');
        const registerBtn = document.getElementById('btn-register');

        if (form === 'login') {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
            loginBtn.classList.add('active');
            registerBtn.classList.remove('active');
        } else {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
            registerBtn.classList.add('active');
            loginBtn.classList.remove('active');
        }
    }
</script>
