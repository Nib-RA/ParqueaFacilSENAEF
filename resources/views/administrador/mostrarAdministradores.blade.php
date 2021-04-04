@extends ('administrador.administradorindex')

@section('contenido')
    <div class="pages" id="mostrar-administradores">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Visualización de administradores</h1>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Documento</th>
                                    <th>Nombres</th>
                                    <th>Cargo</th>
                                    <th>Contraseña</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($administradores as $administrador)
                                    <tr>
                                        <td>{{$administrador->documento}}</td>
                                        <td>{{$administrador->nombres}}</td>
                                        <td>{{$administrador->cargo}}</td>
                                        <td>{{$administrador->contrasena}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection