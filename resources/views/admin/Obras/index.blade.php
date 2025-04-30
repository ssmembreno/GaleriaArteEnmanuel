@extends('_layouts/admin')

@section('ContentAdmin')
        <h1>Obras de arte</h1>
        <!--Alerta de exito cuando se edita la obra -->
        @include('_includes/Modules')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>ID Obra</th>
                            <th>Titulo Obra</th>
                            <th>Descripcion</th>
                            <th>Tecnica</th>
                            <th>Precio</th>
                            <th>Tamaño</th>
                            <th>estado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Imagen</th>
                            <th>ID Obra</th>
                            <th>Titulo Obra</th>
                            <th>Descripcion</th>
                            <th>Tecnica</th>
                            <th>Precio</th>
                            <th>Tamaño</th>
                            <th>estado</th>
                            <th>Acciones</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($obras as $obra)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/'.$obra->imagen)}}" alt="{{$obra->nombre}}" height="130px" width="130px" style="display: flex; margin:0px auto; justify-content: center; align-items: center">
                                    </td>
                                    <td>{{ $obra->id }}</td>
                                    <td>{{ $obra->nombre }}</td>
                                    <td>{{ $obra->descripcion }}</td>
                                    <td>{{ $obra->tipoObra->nombre ?? 'Sin tipo' }}</td>
                                    <td>{{ $obra->precio }} $</td>
                                    <td>{{ $obra->tamaño }}</td>
                                    <td>{{ $obra->estado }}</td>
                                    <td class="mt-3">
                                        <a href="{{ action([App\Http\Controllers\Backend\obraController::class, 'edit'], $obra->id) }}" class="btn btn-warning btn-icon-split">
                                            <span class="text">Editar</span>
                                        </a>

                                        <form method="POST" action="{{action([\App\Http\Controllers\Backend\obraController::class, 'destroy'],$obra->id)}}" class="mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta obra?')">Eliminar</button>
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
