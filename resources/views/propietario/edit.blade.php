@extends('administrador.administradorindex')

@section('contenido')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Actualizar propietario</h2>
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
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('propietarios.update', ['propietario' => $propietario->documento]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Documento:</strong>
                    <input type="number" name="documento" class="form-control" value="{{ $propietario->documento }}" placeholder="Documento" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Tipo documento:</strong>
                    <select name="tipo_documento" class="form-control">
                        <option value="ti" {{ $selectTipo = $propietario->tipo_documento == "ti" ? 'selected' : ''}}>Tarjeta de identidad</option>
                        <option value="cc" {{ $selectTipo = $propietario->tipo_documento == "cc" ? 'selected' : ''}}>Cédula de ciudadanía</option>
                        <option value="ce" {{ $selectTipo = $propietario->tipo_documento == "ce" ? 'selected' : ''}}>Cédula de extranjería</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Nombres:</strong>
                    <input type="text" name="nombres" class="form-control" value="{{ $propietario->nombres }}" placeholder="Nombres">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="apellidos" class="form-control" value="{{ $propietario->apellidos }}" placeholder="Apellidos">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Dirección:</strong>
                    <textarea class="form-control" style="height:50px" name="direccion"
                        placeholder="Dirección">{{ $propietario->direccion }}</textarea>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="number" name="telefono" class="form-control" value="{{ $propietario->telefono }}" placeholder="Teléfono">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="email" name="correo" class="form-control" value="{{ $propietario->correo }}" placeholder="Correo">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Fecha de nacimiento:</strong>
                    <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $propietario->fecha_nacimiento->format('Y-m-d') }}" placeholder="Fecha de nacimiento">
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col">
                <strong>Genero:</strong>
                <div class="form-check form-check-inline">
                    <input type="radio" name="genero" class="form-check-input" id="genero1" value="M" {{ $selectTipo = $propietario->genero == "M" ? 'checked' : ''}}>
                    <label for="genero1" class="form-check-label">Masculino</label>
                </div>
                <div class="form-check form check inline">
                    <input type="radio" name="genero" class="form-check-input" id="genero2" value="F" {{ $selectTipo = $propietario->genero == "F" ? 'checked' : ''}}>
                    <label for="genero2" class="form-check-label">Femenino</label>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Cargo:</strong>
                    <select name="cargo" class="form-control">
                        <option value="visitante" {{ $selectTipo = $propietario->cargo == "visitante" ? 'selected' : ''}}>Visitante</option>
                        <option value="administrativo" {{ $selectTipo = $propietario->cargo == "administrativo" ? 'selected' : ''}}>Administrativo</option>
                        <option value="instructor" {{ $selectTipo = $propietario->cargo == "instructor" ? 'selected' : ''}}>instructor</option>
                        <option value="aprendiz" {{ $selectTipo = $propietario->cargo == "aprendiz" ? 'selected' : ''}}>Aprendiz</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Tipo de licencia:</strong>
                    <input type="text" name="tipo_licencia" class="form-control" placeholder="Tipo de licencia" value="{{ $propietario->tipo_licencia }}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Número de licencia:</strong>
                    <input type="text" name="numero_licencia" class="form-control" placeholder="Número de licencia" value="{{ $propietario->numero_licencia }}">
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