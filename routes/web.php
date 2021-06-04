<?php

use App\Http\Controllers\Admin\rolesController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\LigaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NoticiaController;

Route::get('/', ['middleware' => 'auth', function () {
    return view('home');
}]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('/roles', RolesController::class)->names('roles');

/**
 * Probar lo de jugadors y jugadores
 */

Route::resource('/jugadores', JugadorController::class)->names('jugadores');
Route::get('/jugadors/lista', [JugadorController::class,'listaJugadores']);
Route::resource('/jugadors', JugadorController::class);

Route::get('/ligas/lista', [LigaController::class,'listaLigas']);
Route::resource('/ligas', LigaController::class);

Route::get('/equipos/lista', [EquipoController::class,'listaEquipos']);
Route::resource('/equipos', EquipoController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('/noticia', NoticiaController::class)->names('web.noticia');

