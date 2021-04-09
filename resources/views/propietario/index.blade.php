@extends('administrador.administradorindex')

@section('contenido')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Propietarios</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('propietarios.create') }}" title="Crear propietario">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <div class="pages">
        <table class="table table-bordered table-responsive-lg">
            <tr>
                <th>Documento</th>
                <th>Tipo documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Fecha Nacimiento</th>
                <th>Genero</th>
                <th>Cargo</th>
                <th>Tipo Licencia</th>
                <th>Número Licencia</th>
            </tr>
            @foreach ($propietarios as $propietario)
                <tr>
                    <td>{{ $propietario->documento }}</td>
                    <td>{{ $propietario->tipo_documento }}</td>
                    <td>{{ $propietario->nombres }}</td>
                    <td>{{ $propietario->apellidos }}</td>
                    <td>{{ $propietario->direccion }}</td>
                    <td>{{ $propietario->telefono }}</td>
                    <td>{{ $propietario->correo }}</td>
                    <td>{{ $propietario->fecha_nacimiento }}</td>
                    <td>{{ $propietario->genero }}</td>
                    <td>{{ $propietario->cargo }}</td>
                    <td>{{ $propietario->tipo_licencia }}</td>
                    <td>{{ $propietario->numero_licencia }}</td>
                    <td class="width">
                        <a href="{{ route('propietarios.show', ['propietario' => $propietario->documento]) }}" title="show">
                            <i class="fas fa-eye text-success fa-lg"></i>
                        </a>
                        <a href="{{ route('propietarios.edit', ['propietario' => $propietario->documento]) }}" title="edit">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        <button data-id={{ route('propietarios.destroy', ['propietario' => $propietario->documento]) }} class="eliminar" data-toggle="modal" data-target="#deleteModal">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! $propietarios->links() !!}

    <!-- Delete Warning Modal -->
    <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar propietario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="modal-form-delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <h5 class="text-center">¿Esta seguro de eliminar este propietario?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-danger">Si, eliminar propietario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection