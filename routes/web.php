<?php
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\LigaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NoticiaController;

Route::get('/', ['middleware' => 'auth', function() {
    return view('home');
}]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/jugadores', JugadorController::class);

// Route::get('/create/agregar', function(){
//     return view('jugadores.agregar');
// });

Route::resource('/equipos', EquipoController::class);

Route::resource('/ligas', LigaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Esta puede ir un nuevo archivo admin.php
Route::resource('/noticia', NoticiaController::class)->names('web.noticia');

