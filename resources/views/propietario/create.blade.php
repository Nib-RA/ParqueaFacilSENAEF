@extends('administrador.administradorindex')

@section('contenido')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Añadir un nuevo propietario</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('propietarios.index') }}" title="Regresar">
                    <i class="fas fa-backward "></i>
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('propietarios.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Documento:</strong>
                    <input type="number" name="documento" class="form-control" placeholder="Documento">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Tipo documento:</strong>
                    <select name="tipo_documento" class="form-control">
                        <option value="ti">Tarjeta de identidad</option>
                        <option value="cc">Cédula de ciudadanía</option>
                        <option value="ce">Cédula de extranjería</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Nombres:</strong>
                    <input type="text" name="nombres" class="form-control" placeholder="Nombres">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Dirección:</strong>
                    <textarea class="form-control" style="height:50px" name="direccion"
                        placeholder="Dirección"></textarea>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="number" name="telefono" class="form-control" placeholder="Teléfono">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="email" name="correo" class="form-control" placeholder="Correo">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Fecha de nacimiento:</strong>
                    <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento">
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col">
                <strong>Genero:</strong>
                <div class="form-check form-check-inline">
                    <input type="radio" name="genero" class="form-check-input" id="genero1" value="M">
                    <label for="genero1" class="form-check-label">Masculino</label>
                </div>
                <div class="form-check form check inline">
                    <input type="radio" name="genero" class="form-check-input" id="genero2" value="F">
                    <label for="genero2" class="form-check-label">Femenino</label>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Cargo:</strong>
                    <select name="cargo" class="form-control">
                        <option value="visitante">Visitante</option>
                        <option value="administrativo">Administrativo</option>
                        <option value="instructor">instructor</option>
                        <option value="aprendiz">Aprendiz</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Tipo de licencia:</strong>
                    <input type="text" name="tipo_licencia" class="form-control" placeholder="Tipo de licencia">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Número de licencia:</strong>
                    <input type="text" name="numero_licencia" class="form-control" placeholder="Número de licencia">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>            
        </div>

    </form>
@endsection