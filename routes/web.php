<?php

use App\Http\Controllers\JugadorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\LigaController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\Admin\RolesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NoticiaController;
use App\Models\Jugador;

Route::get('/', ['middleware' => 'auth', function () {
    return view('home');
}]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('/roles', RolesController::class)->names('roles');

Route::resource('/jugadores', JugadorController::class)->names('jugadores');
Route::get('/jugadors/lista', [JugadorController::class,'listaJugadores']);
Route::resource('/jugadors', JugadorController::class);

Route::get('/ligas/lista', [LigaController::class,'listaLigas']);
Route::resource('/ligas', LigaController::class);

Route::get('/partidos/lista', [PartidoController::class,'listaPartidos']);
Route::resource('/partidos', PartidoController::class);

Route::get('/equipos/{idequipo}/agregar', [EquipoController::class,'listarJugadores'])->name('equipos.agregar');
Route::get('/equipos/{idEquipo}/quitar/{idJugador}', [EquipoController::class,'quitarJugador'])->name('equipos.quitar');
Route::get('/equipos/{idEquipo}/vincular/{idJugador}', [EquipoController::class,'vincularJugador'])->name('equipo.vincular');
Route::get('/equipos/{idEquipo}/listar/{idJugador}', [EquipoController::class,'listarOpciones'])->name('equipo.listarOpciones');
Route::get('/equipos/lista', [EquipoController::class,'listaEquipos'])->name('equipo.lista');
Route::resource('/equipos', EquipoController::class)->names('equipos');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/noticia/lista', [NoticiaController::class, 'listaNoticias']);
Route::resource('/noticia', NoticiaController::class)->names('noticias');

Route::get('/partidos/cargarEstadisiticas', [PartidoController::class, 'cargarEstadisticas'])->name('cargarEstadisticas');
Route::resource('/partidos', PartidoController::class)->names('partidos');