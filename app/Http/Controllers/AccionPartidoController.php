<?php

namespace App\Http\Controllers;

use App\Models\accion_partido;
use App\Models\estadistica_partido;
use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Partido;
use App\Models\Equipo;

class AccionPartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPartido)
    {
        $jugadoresLocales = Jugador::join('equipos', 'jugadors.equipo_id', '=', 'equipos.id')
            ->join('estadistica_partido', 'estadistica_partido.equipo_id', '=', 'equipos.id')
            ->select('jugadors.id', 'jugadors.nombre', 'jugadors.apellido')
            ->where('estadistica_partido.partido_id', $idPartido)
            ->where('estadistica_partido.estado', "Local")->get();

        $jugadoresVisitantes = Jugador::join('equipos', 'jugadors.equipo_id', '=', 'equipos.id')
            ->join('estadistica_partido', 'estadistica_partido.equipo_id', '=', 'equipos.id')
            ->select('jugadors.id', 'jugadors.nombre', 'jugadors.apellido')
            ->where('estadistica_partido.partido_id', $idPartido)
            ->where('estadistica_partido.estado', "Visitante")->get();

        $equipoLocal = Equipo::join('estadistica_partido', 'equipos.id', '=', 'estadistica_partido.equipo_id')
            ->join('partidos', 'estadistica_partido.partido_id', '=', 'partidos.id')
            ->select('equipos.*')
            ->where('estadistica_partido.partido_id', $idPartido)
            ->where('estadistica_partido.estado', 'Local')
            ->first();

        $equipoVisitante = Equipo::join('estadistica_partido', 'equipos.id', '=', 'estadistica_partido.equipo_id')
            ->join('partidos', 'estadistica_partido.partido_id', '=', 'partidos.id')
            ->select('equipos.*')
            ->where('estadistica_partido.partido_id', $idPartido)
            ->where('estadistica_partido.estado', 'Visitante')
            ->first();

        $partido = Partido::where('id', $idPartido)->first();

        return view('administrador/partidos/crearAccionPartido', compact(['jugadoresLocales', 'jugadoresVisitantes', 'equipoLocal', 'equipoVisitante', 'partido']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function cargarAccion(Request $request, $idPartido, $estado)
    {
        $request->validate([
            'jugador' => 'required',
            'minuto' => 'required',
            'accion' => 'required',
        ]);
        error_log("Antes");
        if ($estado == 'Local') {
            error_log("IF");
            $accion = new accion_partido;
            error_log($request->input('jugador'));
            $accion->jugador_id = $request->input('jugador');
            error_log($request->input('minuto'));
            $accion->minuto = $request->input('minuto');
            error_log($request->input('accion'));
            $accion->accion = $request->input('accion');
            $accion->partido_id = $idPartido;
            $accion->save();

            return redirect()->route('crearAcciones', $idPartido)
                ->with('accion', '¡Acción agregada con éxito!');
        } else {
            error_log("Else");
            $accion = new accion_partido;
            error_log($request->input('jugador'));
            $accion->jugador_id = $request->input('jugador');
            error_log($request->input('minuto'));
            $accion->minuto = $request->input('minuto');
            error_log($request->input('accion'));
            $accion->accion = $request->input('accion');
            $accion->partido_id = $idPartido;
            $accion->save();

            return redirect()->route('crearAcciones', $idPartido)
                ->with('accion', '¡Acción agregada con éxito!');
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
