<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content px-3 py-4">
            <div class="modal-header border-0">
                <h5 class="modal-title">{{__('messages.NAV_LOGIN')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <button class="btn w-100 mb-1">
                        <a id="googleLogin" href="#"><img src="{{asset('img/icons/google.png')}}" alt="Google"></a>
                    </button>
                </div>

                <div class="text-center my-3">
                    <hr class="w-25 d-inline-block"> <span class="px-2 text-muted">{{__('messages.o')}}</span> <hr class="w-25 d-inline-block">
                </div>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="hidden" name="intended" id="intended" value="">

                    <div class="mb-3">
                        <label class="form-label"> {{__('messages.CORREO_MODAL')}}</label>
                        <input type="email" name="email" class="form-control" required>
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{__('messages.PASSWORD_MODAL')}}</label>
                        <div class="input-group">

                            <input type="password" name="password" class="form-control" required id="loginPassword">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark w-100">{{__('messages.NAV_LOGIN')}}</button>

                    <div class="mt-3 text-center">
                        <small>{{__('messages.MESSAGE_MODAL')}} <a id="registerLink" href="{{ route('register', ['intended' => url()->current()]) }}">{{__('messages.NAV_SIGNUP')}}</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const intendedInput = document.getElementById('intended');
        if (intendedInput) {
            intendedInput.value = window.location.href;
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const registerLink = document.getElementById('registerLink');
        if (registerLink) {
            registerLink.href = '/register?intended=' + encodeURIComponent(window.location.href);
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const googleLogin = document.getElementById('googleLogin');
        if (googleLogin) {
            googleLogin.href = '/auth/google/redirect?intended=' + encodeURIComponent(window.location.href);
        }
    });
</script>
