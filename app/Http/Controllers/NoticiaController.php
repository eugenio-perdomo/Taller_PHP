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
        $noticias = Noticias::paginate(20);
        return view('noticias.index', compact("noticias"));
    }

    public function create()
    {
        return view('noticias.create');
    }

    /*
    public function index()
    {
        $noticias = Noticia::all();
        return view("noticias.index",compact("noticias"));
    }

    public function create()
    {
        //
    }
*/
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
