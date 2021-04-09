<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::paginate(5);

        return view('vehiculo.index', compact('vehiculos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propietarios = Propietario::all();
        return view('vehiculo.create')->with('propietarios', $propietarios);
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
            'placa' => 'required',
            'tipo' => 'required',
            'marca' => 'required',
            'linea' => 'required',
            'modelo' => 'required',
            'servicio' => 'required',
            'cilidraje' => 'required',
            'chasis' => 'required',
            'motor' => 'required',
            'color' => 'required',
            'tipo_carroceria' => 'required',
            'documento_pro' => 'required'
        ]);

        Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehiculo creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        return view('vehiculo.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        $propietarios = Propietario::all();
        return view('vehiculo.edit', compact('vehiculo'))->with('propietarios', $propietarios);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'placa' => 'required',
            'tipo' => 'required',
            'marca' => 'required',
            'linea' => 'required',
            'modelo' => 'required',
            'servicio' => 'required',
            'cilidraje' => 'required',
            'chasis' => 'required',
            'motor' => 'required',
            'color' => 'required',
            'tipo_carroceria' => 'required',
            'documento_pro' => 'required'
        ]);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehiculo actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehiculo eliminado correctamente');
    }
}
