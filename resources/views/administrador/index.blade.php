@extends('administrador.administradorindex')

@section('contenido')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Administradores</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('administradors.create') }}" title="Crear administrador">
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
                <th>Nombres</th>
                <th>Cargo</th>
                <th>Contraseña</th>
            </tr>
            @foreach ($administradores as $administrador)
                <tr>
                    <td>{{ $administrador->documento }}</td>
                    <td>{{ $administrador->nombres }}</td>
                    <td>{{ $administrador->cargo }}</td>
                    <td>{{ $administrador->contrasena }}</td>
                    <td class="width">
                        <a href="{{ route('administradors.show', ['administrador' => $administrador->documento]) }}" title="show">
                            <i class="fas fa-eye text-success fa-lg"></i>
                        </a>
                        <a href="{{ route('administradors.edit', ['administrador' => $administrador->documento]) }}" title="edit">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        <button data-id={{ route('administradors.destroy', ['administrador' => $administrador->documento]) }} class="eliminar" data-toggle="modal" data-target="#deleteModal">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! $administradores->links() !!}

    <!-- Delete Warning Modal -->
    <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="modal-form-delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <h5 class="text-center">¿Esta seguro de eliminar este administrador?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-danger">Si, eliminar administrador</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
