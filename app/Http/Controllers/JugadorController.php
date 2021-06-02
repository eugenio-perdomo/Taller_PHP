<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores = Jugador::all();
        return view("administrador.jugadors.lista", compact("jugadores"));
    }

    public function listaJugadores(){
        $jugadores = Jugador::all();
        return view("jugadors.lista", compact("jugadores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.jugadors.crearJugador');
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
            'apellido' => 'required',
            'fnacimiento' => 'required',
            'nacionalidad' => 'required'
            
        ]);
    
        Jugador::create($request->all());
     
        return redirect()->route('jugadors.index')
                        ->with('success','Se creo con exito el jugador.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function show(Jugador $jugador)
    {
        return view('administrador.jugadors.show',compact('jugador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function edit(Jugador $jugador)
    {
        return view('administrador.jugadors.edit',compact('jugador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jugador $jugador)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'nacionalidad' => 'required',
            'fnacimiento' => 'required'
        ]);
    
        $jugador->update($request->all());
    
        return redirect()->route('jugadors.index')
                        ->with('success','Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jugador $jugador)
    {
        $jugador->delete();
        return redirect()->route('jugadors.index')
                        ->with('success','Se elimino correctamente');
    }
}
