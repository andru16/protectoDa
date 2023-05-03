<?php

use App\Http\Controllers\ControlUsuarios\ControlUsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/usuarios/control-usuarios', [ControlUsuarioController::class, 'vistaUsuarios'])->name('control-usuarios-vista');
    Route::get('/usuarios/listar-usuarios', [ControlUsuarioController::class, 'listarUsuarios']);
});
