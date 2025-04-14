@extends('_layouts/admin')


@section('content')
        <h1>Obras de arte</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID Obra</th>
                            <th>Titulo Obra</th>
                            <th>Descripcion</th>
                            <th>Tecnica</th>
                            <th>Tamaño</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID Obra</th>
                            <th>Titulo Obra</th>
                            <th>Descripcion</th>
                            <th>Tecnica</th>
                            <th>Tamaño</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($obras as $obra)
                                <tr>
                                    <td>{{ $obra->id }}</td>
                                    <td>{{ $obra->nombre }}</td>
                                    <td>{{ $obra->descripcion }}</td>
                                    <td>{{ $obra->tecnica }}</td>
                                    <td>{{ $obra->tamaño }}</td>
                                    <td>${{ $obra->precio }}</td>
                                    <td>
                                        <a href="{{ action([App\Http\Controllers\Backend\obraController::class, 'edit'], $obra->id) }}" class="btn btn-warning btn-icon-split">
                                            <span class="text">Editar</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
