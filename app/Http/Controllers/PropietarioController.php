<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propietarios = Propietario::paginate(5);

        return view('propietario.index', compact('propietarios'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propietario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required',
            'tipo_documento' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'cargo' => 'required',
            'tipo_licencia' => 'required',
            'numero_licencia' => 'required',
        ]);

        Propietario::create($request->all());

        return redirect()->route('propietarios.index')
            ->with('success', 'Propietario creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        return view('propietario.show', compact('propietario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit(Propietario $propietario)
    {
        return view('propietario.edit', compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propietario $propietario)
    {
        $request->validate([
            'documento' => 'required',
            'tipo_documento' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'cargo' => 'required',
            'tipo_licencia' => 'required',
            'numero_licencia' => 'required',
        ]);

        $propietario->update($request->all());

        return redirect()->route('propietarios.index')
            ->with('success', 'Propietario actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propietario $propietario)
    {
        $propietario->delete();

        return redirect()->route('propietarios.index')
            ->with('success', 'Propietario eliminado correctamente');
    }
}
