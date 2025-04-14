@extends('_layouts/admin')

@section('welcome')
    <div class="text-center p-5 bg-white rounded-4 shadow">
        <h1 class="mb-3">Bienvenido</h1>
        <p class="lead">al panel administrativo de la Galería de Arte <strong>Enmanuel</strong></p>
        <a href="{{asset('admin/obras')}}" class="btn btn-primary mt-3">Ver las Obras</a>
    </div>
@endsection
