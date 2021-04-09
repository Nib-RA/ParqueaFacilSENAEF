<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Vigilante;
use Illuminate\Http\Request;

class VigilanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vigilante = Vigilante::paginate(5);

        return view('vigilante.index', compact('vigilantes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $administradores = Administrador::all();
        return view('vigilante.create')->with('administradores', $administradores);
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
            'nombres' => 'required',
            'turno' => 'required',
            'rol' => 'required',
            'contrasena' => 'required',
            'documento_adm' => 'required'
        ]);

        Vigilante::create($request->all());

        return redirect()->route('vigilantes.index')
            ->with('success', 'Vigilante creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vigilante  $vigilante
     * @return \Illuminate\Http\Response
     */
    public function show(Vigilante $vigilante)
    {
        return view('vigilante.show', compact('vigilante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vigilante  $vigilante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vigilante $vigilante)
    {
        $administradores = Administrador::all();
        return view('vigilante.edit', compact('vigilante'))->with('administradores', $administradores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vigilante  $vigilante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vigilante $vigilante)
    {
        $request->validate([
            'documento' => 'required',
            'nombres' => 'required',
            'turno' => 'required',
            'rol' => 'required',
            'contrasena' => 'required',
            'documento_adm' => 'required'
        ]);

        $vigilante->update($request->all());

        return redirect()->route('vigilantes.index')
            ->with('success', 'Vigilante actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vigilante  $vigilante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vigilante $vigilante)
    {
        $vigilante->delete();

        return redirect()->route('vigilantes.index')
            ->with('success', 'Vigilantes eliminado correctamente');
    }
}
