<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partido::all();
        return view("administrador.partidos.lista", compact("partidos"));
    }

    public function listaPartidos()
    {
        $partidos = Partido::all();
        return view("administrador.partidos.lista", compact("partidos"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.partidos.crearPartido');
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
            'estadoPartido' => 'required',
            'fecha' => 'required'
        ]);
    
        Partido::create($request->all());
     
        return redirect()->route('partidos.index')
                        ->with('success','Se creo con exito el partido.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partido $partido)
    {
        return view('administrador.partidos.show',compact('partido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partido $partido)
    {
        return view('administrador.partidos.edit',compact('partido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Partido $partido)
    {
        $request->validate([
            'estadoPartido' => 'required',
            'fecha' => 'required'
        ]);
    
        $partido->update($request->all());
    
        return redirect()->route('partidos.index')
                        ->with('success','Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partido $partido)
    {
        $partido->delete();
        return redirect()->route('partidos.index')
                        ->with('success','Se elimino correctamente');
    }
}
