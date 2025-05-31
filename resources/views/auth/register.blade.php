@extends('_layouts.logins')

@section('content')
    <div class="login-wrapper">
        <div class="login-box">
            <div class="login-logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>
            <div class="login-title">{{ __('messages.WELCOME_LOG') }}</div>
            <div class="login-subtitle">{{ __('messages.WELCOME_BACK_LOG') }}</div>

            <div class="toggle-buttons mb-4">
                <button id="btn-login" class="active" onclick="toggleForm('login')" type="button">{{ __('messages.LOGIN_BUTTON_LOG') }}</button>
                <button id="btn-register" onclick="toggleForm('register')" type="button">{{ __('messages.REGISTER_BUTTON_LOG') }}</button>
            </div>

            <!-- Login Form -->
            <form id="form-login" action="{{ action([\App\Http\Controllers\Login\LoginController::class, 'login']) }}" method="POST">
                @csrf
                <div class="input-group-custom">
                    <i class="fas fa-envelope"></i>
                    <input name="email" type="email" class="form-control-custom" placeholder="{{ __('messages.EMAIL_PLACEHOLDER_LOG') }}" required autocomplete="off">
                </div>
                <div class="input-group-custom">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" class="form-control-custom" placeholder="{{ __('messages.PASSWORD_PLACEHOLDER_LOG') }}" required autocomplete="off">
                </div>
                <button type="submit" class="btn-continue mt-2">{{ __('messages.CONTINUE_BUTTON_LOG') }}</button>
            </form>

            <!-- Register Form -->
            <form id="form-register" style="display:none" action="{{action([\App\Http\Controllers\Login\RegisterController::class,'register'])}}" method="POST">
                @csrf
                <div class="input-group-custom">
                    <i class="fas fa-user"></i>
                    <input name="name" type="text" class="form-control-custom" placeholder="{{ __('messages.NAME_PLACEHOLDER_LOG') }}" autocomplete="off">
                </div>
                <div class="input-group-custom">
                    <i class="fas fa-user"></i>
                    <input name="apellido" type="text" class="form-control-custom" placeholder="{{ __('messages.LASTNAME_PLACEHOLDER_LOG') }}" autocomplete="off">
                </div>
                <div class="input-group-custom">
                    <i class="fas fa-envelope"></i>
                    <input name="email" type="email" class="form-control-custom" placeholder="{{ __('messages.EMAIL_PLACEHOLDER_LOG') }}" autocomplete="off">
                </div>
                <div class="input-group-custom">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" class="form-control-custom" placeholder="{{ __('messages.PASSWORD_PLACEHOLDER_LOG') }}" autocomplete="off">
                </div>
                <div class="input-group-custom">
                    <i class="fas fa-lock"></i>
                    <input name="password_confirmation" type="password" class="form-control-custom" placeholder="{{ __('messages.CONFIRM_PASSWORD_PLACEHOLDER_LOG') }}" autocomplete="off">
                </div>
                <button type="submit" class="btn-continue mt-2">{{ __('messages.REGISTER_BUTTON_SUBMIT_LOG') }}</button>
            </form>

            <div class="divider"><span>{{ __('messages.DIVIDER_TEXT_LOG') }}</span></div>

            <div class="social-icons">
                <a href="http://127.0.0.1:8000/auth/google/redirect"><img src="{{asset('img/icons/google.png')}}" alt="{{ __('messages.GOOGLE_ALT_LOG') }}"></a>
            </div>

            <div class="footer-note">
                {{ __('messages.FOOTER_NOTE_LOG') }}
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
