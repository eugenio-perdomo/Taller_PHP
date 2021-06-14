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
        $noticias = Noticias::all();
        return view('noticias.index',compact("noticias"));
    }

    public function listaNoticias()
    {
        $noticias = Noticias::paginate(20);
        return view('noticias.lista',compact("noticias"));
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tituloNoticia' => 'required',
            'copeteNoticia' => 'required',
            'cuerpoNoticia' => 'required',
            'tipoNoticia' => 'required'
        ]);
        Noticias::create($request->all());
        return redirect()->route('noticias.index')
            ->with('success', 'Se creo la noticia con exito.');
    }

    public function show(Noticias $noticia)
    {
        return view('noticias.show', compact('noticia'));
    }

    public function edit(Noticias $noticia)
    {
        return view('noticias.edit', compact('noticia'));
    }

    public function update(Request $request, Noticias $noticias)
    {
        $request->validate([
            'tituloNoticia' => 'required',
            'copeteNoticia' => 'required',
            'cuerpoNoticia' => 'required',
            'tipoNoticia' => 'required'
        ]);

        $noticias->update($request->all());

        return redirect()->route('noticias.index')
            ->with('success', 'Se actualizo correctamente');
    }

    public function destroy(Noticias $noticias)
    {
        $noticias->delete();
        return redirect()->route('noticias.index')
            ->with('success', 'Se elimino correctamente');
    }
}
