<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;

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
}
