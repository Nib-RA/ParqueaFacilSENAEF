@extends('administrador.administradorindex')

@section('contenido')
    <div class="pages" id="mostrarVehiculos">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Visualización de vehículos</h1>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Placa</th>
                                    <th>Tipo</th>
                                    <th>Marca</th>
                                    <th>Linea</th>
                                    <th>Modelo</th>
                                    <th>Servicio</th>
                                    <th>Cilindraje</th>
                                    <th>Chasis</th>
                                    <th>Motor</th>
                                    <th>Color</th>
                                    <th>Tipo Carroceria</th>
                                    <th>Documento Pro</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehiculos as $vehiculo)
                                    <tr>
                                        <td>{{$vehiculo->placa}}</td>
                                        <td>{{$vehiculo->tipo}}</td>
                                        <td>{{$vehiculo->marca}}</td>
                                        <td>{{$vehiculo->linea}}</td>
                                        <td>{{$vehiculo->modelo}}</td>
                                        <td>{{$vehiculo->servicio}}</td>
                                        <td>{{$vehiculo->cilindraje}}</td>
                                        <td>{{$vehiculo->chasis}}</td>
                                        <td>{{$vehiculo->motor}}</td>
                                        <td>{{$vehiculo->color}}</td>
                                        <td>{{$vehiculo->tipo_carroceria}}</td>
                                        <td>{{$vehiculo->documento_pro}}</td>
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
