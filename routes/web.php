<?php

use App\Http\Controllers\JugadorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\LigaController;
use App\Http\Controllers\Admin\RolesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['middleware' => 'auth', function () {
    return view('home');
}]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('/roles', RolesController::class)->names('roles');

Route::resource('/noticias', NoticiaController::class)->names('noticias');

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
