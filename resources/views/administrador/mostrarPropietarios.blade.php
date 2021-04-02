@extends('administrador.administradorindex')

@section('contenido')
    <div class="pages" id="mostrar-propietarios">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Visualización de propietarios</h1>
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
                                    <th>Tipo Documento</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Genero</th>
                                    <th>Cargo</th>
                                    <th>Tipo Licencia</th>
                                    <th>Número Licencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($propietarios as $propietario)
                                    <tr>
                                        <td>{{$propietario->documento}}</td>
                                        <td>{{$propietario->tipo_documento}}</td>
                                        <td>{{$propietario->nombres}}</td>
                                        <td>{{$propietario->apellidos}}</td>
                                        <td>{{$propietario->direccion}}</td>
                                        <td>{{$propietario->telefono}}</td>
                                        <td>{{$propietario->correo}}</td>
                                        <td>{{$propietario->fecha_nacimiento}}</td>
                                        <td>{{$propietario->genero}}</td>
                                        <td>{{$propietario->cargo}}</td>
                                        <td>{{$propietario->tipo_licencia}}</td>
                                        <td>{{$propietario->numero_licencia}}</td>
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