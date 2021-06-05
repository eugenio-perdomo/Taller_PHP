<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Models\Editor;
use App\Models\Usuario;
use App\Models\Normal;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class RolesController extends Controller
{
    use HasRoles;
    
    public function __construct()
    {
        $this->middleware('can:roles.index');
    }

    public function index()
    {
        $editores = Editor::where('confirmado', false)->get();
        $administradores = Administrador::where('confirmado', false)->get();;

        return view("roles.index", compact(["editores", "administradores"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('jugadores.edit', compact('jugador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Usuario::where('id', $id);
        $editor = Editor::where('editor_id', $id);
        $administrador = Administrador::where('administrador_id', $id);
        if ($editor->count() > 0) {
            $editor->update(['confirmado' => true]);
            $user = Usuario::where('id', $id)->first();
            $user->roles()->detach();
            $user->assignRole('Editor');
        } else {
            if ($administrador->count() > 0) {
                $administrador->update(['confirmado' => true]);
                $user = Usuario::where('id', $id)->first();
                $user = Usuario::where('id', $id)->first();
                $user->roles()->detach();
                $user->assignRole('Admin');
            }
        }
        return redirect()->route('roles.index')
            ->with('success', 'Se confirmó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::where('id', $id);
        $editor = Editor::where('editor_id', $id);
        $administrador = Administrador::where('administrador_id', $id);
        if ($editor->count() > 0) {
            $editor->delete();
            $user = Usuario::where('id', $id)->first();
            Normal::create([
                'normal_id' => $user->id,
            ]);
        } else {
            if ($administrador->count() > 0) {
                $administrador->delete();
                $user = Usuario::where('id', $id)->first();
                Normal::create([
                    'normal_id' => $user->id,
                ]);
            }
        }
        return redirect()->route('roles.index')
            ->with('success', 'Se rechazó correctamente');
    }
}