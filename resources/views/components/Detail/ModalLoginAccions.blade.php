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
