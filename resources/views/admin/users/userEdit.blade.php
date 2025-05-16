@extends('_layouts.admin')

@section('ContentAdmin')
    <h1>Editar Usuario</h1>
    <div class="container-fluid">
        @include('_includes/Modules')

        <form action="{{ route('usuarios.update', $usuarios->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id">ID Usuario</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $usuarios->id }}" disabled>
            </div>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{ $usuarios->name }}" required disabled >
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" autocomplete="off" value="{{ $usuarios->apellido }}" required disabled>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="{{ $usuarios->email }}" required disabled>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select class="form-control" name="rol" id="rol" required>
                    <option value="admin" {{ $usuarios->rol === 'admin' ? 'selected' : '' }}>admin</option>
                    <option value="usuario" {{ $usuarios->rol === 'usuario' ? 'selected' : '' }}>usuario</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            <a href="{{ action([\App\Http\Controllers\Backend\UsuariosController::class, 'index']) }}">
                <span class="btn btn-secondary">Volver al listado de usuarios</span>
            </a>
        </form>
    </div>
@endsection
