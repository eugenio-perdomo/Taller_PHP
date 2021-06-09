<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use GrahamCampbell\ResultType\Success;
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
        return view("administrador.equipos.lista", compact("equipos"));
    }

    public function listaEquipos()
    {
        $equipos = Equipo::all();
        return view("equipos.lista", compact("equipos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.equipos.crearEquipo');
    }

    public function listarJugadores(Equipo $equipo)
    {
        echo 'Hola: ' . $equipo;
        $jugadoresLibres = Jugador::whereNull('equipo_id')->get();
        $jugadores = Jugador::join('equipos', 'jugadors.equipo_id', '=', 'equipos.id')
            ->select('jugadors.nombre', 'jugadors.apellido', 'jugadors.fnacimiento', 'jugadors.nacionalidad', 'equipos.nombre as teamName')
            ->WhereNotNull('equipo_id')->get();

        return view("administrador.equipos.listarJugadores", compact(["jugadoresLibres", "jugadores", "equipo"]));
    }

    public function vincularJugador($idEquipo, $idJugador)
    {
        $jugador = Jugador::where('id', $idJugador)->first();
        if ($jugador->equipo_id == null) {
            $jugador->equipo_id = $idEquipo;
        } else {
            $equipo = Equipo::where('id', $idEquipo)->first();
            return redirect()->route('administrador.equipo.vincularJugador')
                ->with($equipo->nombre);
        }
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
            ->with('success', 'Se creo con exito el equipo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        $jugadores = Jugador::where('equipo_id', $equipo->id)->get();
        echo 'Hola: ' . $equipo;
        return view('equipos.mostrarEquipo', compact(['jugadores', 'equipo']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        return view('administrador.equipos.edit', compact('equipo'));
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
        $request->validate([
            'nombre' => 'required',
            'nomCorto' => 'required',
            'tresLetras' => 'required'
        ]);

        $equipo->update($request->all());

        return redirect()->route('equipos.index')
            ->with('success', 'Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')
            ->with('success', 'Se elimino correctamente');
    }
}
