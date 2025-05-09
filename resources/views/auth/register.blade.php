@extends('_layouts.logins')

@section('content')
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Bienvenido a Galeria de arte Enmanuel</h1>
    </div>
    @include('_includes/Modules')
    <form class="user" action="{{action([\App\Http\Controllers\Login\RegisterController::class,'register'])}}" method="POST">
        @csrf
        <div class="form-group">
            <input name="name" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Introduzca su nombre" autocomplete="off">
            <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
        </div>
        <div class="form-group">
            <input name="apellido" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Introduzca su apellido" autocomplete="off">
            <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
        </div>
        <div class="form-group">
            <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Intoduzca su correo electronico" autocomplete="off">
            <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" autocomplete="off">
            <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
        </div>
        <div class="form-group">
            <input name="password_confirmation" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Confirmar contraseña" autocomplete="off">
            <div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" id="customCheck">
                <label class="custom-control-label" for="customCheck">Remember
                    Me</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">Registrate</button>

        <hr>
        <a href="index.html" class="btn btn-google btn-user btn-block">
            <i class="fab fa-google fa-fw"></i> Login with Google
        </a>
    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="forgot-password.html">Forgot Password?</a>
    </div>
    <div class="text-center">
        <a class="small" href="register.html">Create an Account!</a>
    </div>
</div>
@endsection
