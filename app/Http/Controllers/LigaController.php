<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;

class LigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligas = Liga::all();
        return view("administrador.ligas.lista", compact("ligas"));
    }

    public function listaLigas()
    {
        $ligas = Liga::all();
        return view("ligas.lista", compact("ligas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.ligas.crearLiga');
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
            'nombreLiga' => 'required',
            'participantes' => 'required'
            // 'sistemaDeJuego' => 'required'
        ]);
    
        Liga::create($request->all());
     
        return redirect()->route('ligas.index')
                        ->with('success','Se creo con exito la liga.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Liga  $liga
     * @return \Illuminate\Http\Response
     */
    public function show(Liga $liga)
    {
        return view('administrador.ligas.show',compact('liga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Liga  $liga
     * @return \Illuminate\Http\Response
     */
    public function edit(Liga $liga)
    {
        return view('administrador.ligas.edit',compact('liga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Liga  $liga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liga $liga)
    {
        $request->validate([
            'nombreLiga' => 'required',
            'participantes' => 'required'
            // 'sistemaDeJuego' => 'required'
        ]);
    
        $liga->update($request->all());
    
        return redirect()->route('ligas.index')
                        ->with('success','Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Liga  $liga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liga $liga)
    {
        $liga->delete();
        return redirect()->route('ligas.index')
                        ->with('success','Se elimino correctamente');
    }
}
