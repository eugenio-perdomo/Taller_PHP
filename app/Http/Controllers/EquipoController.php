<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::all();
        return view("equipos.lista",compact("equipos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.crearEquipo');
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
            'nombre' => 'required',
            'nomCorto' => 'required',
            'tresLetras' => 'required'
        ]);
    
        Equipo::create($request->all());
     
        return redirect()->route('equipos.index')
                        ->with('success','Se creo con exito el equipo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
