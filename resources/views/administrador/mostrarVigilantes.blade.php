@extends('administrador.administradorindex')

@section('contenido')
    <div class="pages" id="mostrar-vigilantes">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Visualización de vigilantes</h1>
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
                                    <th>Turno</th>
                                    <th>Rol</th>
                                    <th>Contraseña</th>
                                    <th>Documento Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vigilantes as $vigilante)
                                    <tr>
                                        <td>{{$vigilante->documento}}</td>
                                        <td>{{$vigilante->nombres}}</td>
                                        <td>{{$vigilante->turno}}</td>
                                        <td>{{$vigilante->rol}}</td>
                                        <td>{{$vigilante->contrasena}}</td>
                                        <td>{{$vigilante->documento_adm}}</td>
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
