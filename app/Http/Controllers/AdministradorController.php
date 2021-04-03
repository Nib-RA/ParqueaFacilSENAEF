<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use App\Models\Propietario;
use App\Models\Vehiculo;

class AdministradorController extends Controller
{
    public function __invoke()
    {
        return view('administrador.administradorindex');
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
}
