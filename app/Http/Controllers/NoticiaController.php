<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrador;
use App\Models\Editor;
use App\Models\Noticias;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticia = Noticias::create([
            'username' => 'pablo.suarez',
            'nombre' => 'Pablo',
            'apellido' => 'Suárez',
            'fNacimiento' => '1996-02-15',
            'email' => 'pablo.suarez.urrutia@gmail.com',
            'id_creador' => '1',
        ]);
        return view('noticias.index');
    }

    public function listaNoticias()
    {
        $equipos = Noticias::all();
        return view("noticias.lista",compact("noticia"));
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Noticias $noticia)
    {
        return view('noticias.show', compact('noticia'));
    }

    public function edit(Noticias $noticia)
    {
        return view('noticias.edit', compact('noticia'));
    }

    public function update(Request $request, Noticias $noticia)
    {
        //
    }

    public function destroy(Noticias $noticia)
    {
        //
    }
}
