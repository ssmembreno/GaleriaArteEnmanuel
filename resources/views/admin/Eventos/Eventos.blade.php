@extends('_layouts/admin')

@section('ContentAdmin')
    <h1>Eventos publicados</h1>
    @include('_includes/Modules')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de eventos</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($eventos as $evento)
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td>{{ $evento->nombre }}</td>
                            <td>{{ $evento->descripcion }}</td>
                            <td>{{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}</td>
                            <td>{{ $evento->hora_inicio }} - {{ $evento->hora_fin }}</td>
                            <td>{{ $evento->ubicacion }}</td>
                            <td class="mt-3">
                                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning btn-icon-split mb-1">
                                    <span class="text"><i class="fa-solid fa-pen"></i></span>
                                </a>

                                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este evento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-icon-split">
                                        <span class="text"><i class="fa-solid fa-trash"></i></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
