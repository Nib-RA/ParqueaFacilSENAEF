@extends ('administrador.administradorindex')

@section('contenido')
    <div class="pages" id="mostrar-vigilantes">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Visualización de novedades</h1>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Tipo</th>
                                    <th>Descripción</th>
                                    <th>Número Ticket Reg</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($novedades as $novedad)
                                    <tr>
                                        <td>{{$novedad->id}}</td>
                                        <td>{{$novedad->tipo}}</td>
                                        <td>{{$novedad->descripcion}}</td>
                                        <td>{{$novedad->numero_ticket_reg}}</td>
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