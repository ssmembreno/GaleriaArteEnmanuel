@extends('_layouts.admin')

@section('ContentAdmin')
    <h1>Obras de arte</h1>

    @include('_includes/Modules')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Comentarios por Obra</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID Obra</th>
                        <th>Nombre Obra</th>
                        <th>Comentario</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($obras as $obra)
                        @foreach($obra->comentarios as $comentario)
                            <tr>
                                <td>{{$obra->id}}</td>
                                <td>{{ $obra->nombre }}</td>
                                <td>{{ $comentario->contenido }}</td>
                                <td>{{ $comentario->user->name ?? 'Usuario eliminado' }}</td>
                                <td>
                                    @if($comentario->status)
                                            <span class="badge bg-success" style="color: white">Aprobado</span>
                                    @else
                                        <span class="badge bg-warning text-dark"  style="color: white">Pendiente</span>
                                    @endif
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('comentarios.aprobar', $comentario->id) }}" style="display:inline">
                                        @csrf
                                        @method('PATCH')
                                        @if($comentario->status == 1)
                                            <button type="submit" class="btn btn-sm btn-success" disabled><i class="fa-solid fa-check"></i></button>
                                        @else
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa-solid fa-check"></i></button>
                                        @endif

                                    </form>

                                    <form method="POST" action="{{ route('comentarios.destroy', $comentario->id) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
