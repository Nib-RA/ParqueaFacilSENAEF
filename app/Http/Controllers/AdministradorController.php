<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use App\Models\Propietario;
use App\Models\Vehiculo;
use App\Models\Vigilante;
use App\Models\Novedad;

class AdministradorController extends Controller
{
    public function __invoke()
    {
        return view('administrador.administradorindex');
    }

    public function mostrarAdministradores()
    {
        $administradores = Administrador::all();
        return view('administrador.mostrarAdministradores')->with('administradores', $administradores);
    }

    public function mostrarPropietarios()
    {
        $propietarios = Propietario::all();
        return view('administrador.mostrarPropietarios')->with('propietarios', $propietarios);
    }

    public function mostrarVehiculos()
    {
        $vehiculos = Vehiculo::all();
        return view('administrador.mostrarVehiculos')->with('vehiculos', $vehiculos);
    }

    public function mostrarVigilantes()
    {
        $vigilantes = Vigilante::all();
        return view('administrador.mostrarVigilantes')->with('vigilantes', $vigilantes);
    }

    public function mostrarNovedades()
    {
        $novedades = Novedad::all();
        return view('administrador.mostrarNovedades')->with('novedades', $novedades);
    }
}
