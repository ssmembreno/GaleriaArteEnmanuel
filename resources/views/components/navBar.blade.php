<header class="custom-header">
    <!-- Barra superior -->
    <div class="custom-nav">
        <div class="left">
            <button class="menu-toggle" id="menuToggle">
                &#9776; <span>MENU</span>
            </button>
        </div>

        <div class="center">
            <div class="brand d-flex align-items-center justify-content-center gap-2">
                <a href="{{localized_url('/')}}"><img src="{{ asset('img/logo.png') }}" alt="Logo Enmanuel Membreño" class="logo-img" title="Galeria de arte Enamnuel Membreño"></a>
            </div>
        </div>

        <div class="right">
            <a href="{{ localized_url('contactUs') }}" class="contact-link">{{__('messages.NAV_CONTACT_HEADER')}} ✉</a>
        </div>

    </div>

    <!-- Menú lateral hamburguesa -->
    <div id="sideMenu" class="side-menu">
        <button class="close-btn" id="closeMenu">&times;</button>
        <ul class="nav flex-column p-3">
            <li class="nav-item d-flex align-items-center gap-2 justify-content-center text-align-center">
                <span></span>
                @foreach(config('app.available_locales') as $lang => $locale)
                    <a href="?lang={{ $locale }}">
                        @if($locale === 'es')
                            <img src="{{ asset('img/icons/flag.png') }}" alt="Español" title="Español" style="width: 30px;">
                        @elseif($locale === 'en')
                            <img src="{{ asset('img/icons/estados-unidos.png') }}" alt="English" title="English" style="width: 30px;">
                        @endif
                    </a>
                @endforeach
            </li>
            <hr style="width: 100%; color: white">
            <li class="nav-item"><a class="nav-link" href="{{localized_url('/')}}">{{__('messages.NAV_HOME')}}</a></li>
            <hr style="width: 100%; color: white">
            <li class="nav-item"><a class="nav-link" href="{{localized_url('ObrasArte')}}">{{__('messages.NAV_ART')}}</a></li>
            <hr style="width: 100%; color: white">
            <li class="nav-item"><a class="nav-link" href="{{localized_url('aboutUs')}}">{{__('messages.NAV_ARTIST')}}</a></li>
            <hr style="width: 100%; color: white">
            <li class="nav-item"><a class="nav-link" href="{{ localized_url('events') }}">{{__('messages.NAV_EVENTS')}}</a></li>
            <hr style="width: 100%; color: white">
            <li class="nav-item"><a class="nav-link" href="{{localized_url('contactUs')}}">{{__('messages.NAV_CONTACT')}}</a></li>
            <hr style="width: 100%; color: white">
            @guest
                <li class="nav-item mt-3 d-flex align-items-center gap-2">
                    <img src="{{asset('img/icons/user-icon.png')}}" alt="user" style="width: 20px;">
                    <div>
                        <a href="{{ route('login') }}" class="nav-link p-0 d-inline">{{__('messages.NAV_LOGIN')}}</a>
                        <span style="color: white">/</span>
                        <a href="{{ route('register') }}" class="nav-link p-0 d-inline">{{__('messages.NAV_SIGNUP')}}</a>
                    </div>
                </li>
            @endguest

            @auth
                <li class="nav-item mt-3 text-center fw-bold">
                    {{ Auth::user()->name }}
                </li>
                @if(Auth::user()->rol === 'admin')
                    <li class="nav-item"><a class="nav-link" href="{{ asset('/admin') }}">{{__('messages.NAV_PANEL')}}</a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{route('perfil')}}">{{__('messages.NAV_PROFILE')}}</a></li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 mt-2">{{__('messages.NAV_LOGOUT')}}</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</header>
