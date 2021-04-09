@extends('administrador.administradorindex')

@section('contenido')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Visualización del administrador</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('administradors.index') }}" title="Regresar">
                    <i class="fas fa-backward "></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Documento:</strong>
                {{ $administrador->documento }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo documento:</strong>
                {{ $administrador->nombres }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombres:</strong>
                {{ $administrador->cargo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellidos:</strong>
                {{ $administrador->contrasena }}
            </div>
        </div>
    </div>
@endsection