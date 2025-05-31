@extends('_layouts.logins')

@section('content')
    <div class="login-wrapper">
        <div class="login-box">
            <div class="login-logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo"><br>
                @foreach(config('app.available_locales') as $lang => $locale)
                    <a href="?lang={{ $locale }}">
                        @if($locale === 'es')
                            <img src="{{ asset('img/icons/espana.png') }}" alt="Español" title="Español" style="width: 40px;">
                        @elseif($locale === 'en')
                            <img src="{{ asset('img/icons/estados-unidos.png') }}" alt="English" title="English" style="width: 40px;">
                        @endif
                    </a>
                @endforeach
            </div>

            <div class="login-title">{{ __('messages.WELCOME_LOG') }}</div>
            <div class="login-subtitle">{{ __('messages.SUBTITLE_LOG') }}</div>

            <div class="toggle-buttons mb-4">
                <button id="btn-login" class="active" onclick="toggleForm('login')" type="button">{{ __('messages.LOGIN_BUTTON_LOG') }}</button>
                <button id="btn-register" onclick="toggleForm('register')" type="button">{{ __('messages.REGISTER_BUTTON_LOG') }}</button>
            </div>

            @include('_includes.Modules')
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

            <!-- formulario de registro-->
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

            <div class="divider"><span>{{ __('messages.OR_CONTINUE_WITH_LOG') }}</span></div>

            <div class="social-icons">
                <a href="http://127.0.0.1:8000/auth/google/redirect"><img src="{{asset('img/icons/google.png')}}" alt="Google"></a>
            </div>

            <div class="text-center mt-4 mb-4">
                <a href="{{ url('/') }}" class="btn-continue text-decoration-none"
                   style="text-decoration: none; background-color: transparent; border: 1px solid #007bff; color: #007bff; padding: 10px 20px; border-radius: 5px; transition: all 0.3s;">
                    {{ __('messages.BACK_TO_GALLERY_LOG') }}
                </a>
            </div>


            <div class="footer-note mt-5">
                {{ __('messages.FOOTER_NOTE_LOG') }}
            </div>
        </div>
    </div>
@endsection
