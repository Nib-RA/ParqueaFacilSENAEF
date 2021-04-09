@extends('administrador.administradorindex')

@section('contenido')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Actualizar vigilante</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vigilantes.index') }}" title="Regresar">
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

    <form action="{{ route('vigilantes.update', ['vigilante' => $vigilante->documento]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Documento:</strong>
                    <input type="number" name="documento" class="form-control" value="{{ $vigilante->documento }}" placeholder="Documento" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Nombres:</strong>
                    <input type="text" name="nombres" class="form-control" value="{{ $vigilante->nombres }}" placeholder="Nombres">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Turno:</strong>
                    <input type="text" name="turno" class="form-control" value="{{ $vigilante->turno }}" placeholder="Turno">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Rol:</strong>
                    <input type="text" name="rol" class="form-control" value="{{ $vigilante->rol }}" placeholder="Rol">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <strong>Contraseña:</strong>
                <input type="text" name="contrasena" class="form-control" value="{{ $vigilante->contrasena }}" placeholder="Contraseña">
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <strong>Documento-Admin:</strong>
            <input type="text" name="documento_adm" class="form-control" value="{{ $administrador->documento_adm }}" placeholder="Documento-Admin">
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
