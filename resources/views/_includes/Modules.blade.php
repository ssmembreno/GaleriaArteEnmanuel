<!--Modulo de errores-->
@foreach($errors->all() as $error)
    <div class="alert alert-danger">
        {{$error}}
    </div>
@endforeach

<!--Modulo de Exito-->
@if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
@endif
