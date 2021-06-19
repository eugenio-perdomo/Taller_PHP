<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrador;
use App\Models\Editor;
use App\Models\Noticias;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticias::orderBy('updated_at', 'desc')->get();
        return view('noticias.index',compact("noticias"));
    }

    public function listaNoticias()
    {
        $noticias = Noticias::orderBy('updated_at', 'desc')->get();
        //Son 100 y muestra 20, implementar el mostrado de las otras tambien paginas
        //$noticias = Noticias::paginate(20);
        return view('noticias.lista',compact("noticias"));
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        //return Storage::put('noticia', $request->file('direccion'));
        
        //Noticias::create($request->all());
        
        $nota = new Noticias;
        $nota->tituloNoticia = $request->input('tituloNoticia');
        $nota->copeteNoticia = $request->input('copeteNoticia');
        $nota->cuerpoNoticia = $request->input('cuerpoNoticia');
        $nota->tipoNoticia = $request->input('tipoNoticia');
        $nota->id_creador = $request->input('id_creador');

        if ($request->file('direccion')) {
            $url = Storage::put('posts', $request->file('direccion'));
            $nota->direccion = $url;
        }
        
        $request->validate([
            'tituloNoticia' => 'required',
            'copeteNoticia' => 'required',
            'cuerpoNoticia' => 'required',
            'tipoNoticia' => 'required'
        ]);

        $nota->save();
        return redirect()->route('noticias.index')
            ->with('success', 'Se creo la noticia con exito.');
    }

    public function show($id)
    {
        $noticia = Noticias::where('id',$id)->first();
        $listaRelacionada = Noticias::where('tipoNoticia', $noticia->tipoNoticia)->orderBy('updated_at', 'desc')->get();
        return view('noticias.show', compact('noticia','listaRelacionada'));
    }

    public function edit($id)
    {
        $noticia = Noticias::where('id',$id)->first();

        return view('noticias.edit', compact('noticia'));
    }

    public function update(Request $request, $idNoticias)
    {   
        $request->validate([
            'tituloNoticia' => 'required',
            'copeteNoticia' => 'required',
            'cuerpoNoticia' => 'required',
            'tipoNoticia' => 'required'
        ]);

        
        $nota = Noticias::where('id', $idNoticias)->first();
        $nota->tituloNoticia = $request->input('tituloNoticia');
        $nota->copeteNoticia = $request->input('copeteNoticia');
        $nota->cuerpoNoticia = $request->input('cuerpoNoticia');
        $nota->tipoNoticia = $request->input('tipoNoticia');
        
        if ($request->file('direccion')) {
            $url = Storage::put('posts', $request->file('direccion'));
            $nota->direccion = $url;
            // dd($nota->direccion);
        }

        $nota->save();

        return redirect()->route('noticias.lista')
            ->with('success', 'Se actualizo correctamente');
    }

    public function destroy($idNoticias)
    {
        $noticias = Noticias::where('id', $idNoticias)->first();
        $noticias->delete();
        return redirect()->route('noticias.lista')
            ->with('success', 'Se elimino correctamente');
    }
}
