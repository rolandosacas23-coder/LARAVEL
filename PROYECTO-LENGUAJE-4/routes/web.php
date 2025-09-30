<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactoController;
use App\Http\Controllers\eventoController;
use App\Http\Controllers\notaController;

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
    return view('welcome');
});
Route::get('/contacto',[contactoController::class,'index'])->name('contacto.index');
Route::get('/contacto/crear',[contactoController::class,'create'])->name('contacto.create');
Route::get('/contacto/{id}',[contactoController::class,'show'])->name('contacto.show');
Route::post('/contacto/crear', [contactoController::class, 'store'])->name('contacto.guardar');
Route::put('/contacto/{id}/editar', [contactoController::class, 'update'])->name('contacto.update')->where('id','[0-9]+');
Route::get('/contacto/{id}/editar', [contactoController::class, 'edit'])->name('contacto.edit')->where('id', '[0-9]+');
Route::delete('/contacto/{id}/borrar', [contactoController::class, 'destroy'])->name('contacto.borrar')->where('id', '[0-9]+');



//--------------------------RUTAS EVENTOS---------------------------------EVENTOS---------------------------EVENTOS----------------------------
Route::get('/evento',[eventoController::class,'index'])->name('evento.index');
Route::get('/evento/crear',[eventoController::class,'create'])->name('evento.create');
Route::get('/evento/{id}',[eventoController::class,'show'])->name('evento.show');
Route::post('/evento/crear', [eventoController::class, 'store'])->name('evento.guardar');
Route::put('/evento/{id}/editar', [eventoController::class, 'update'])->name('evento.update')->where('id','[0-9]+');
Route::get('/evento/{id}/editar', [eventoController::class, 'edit'])->name('evento.edit')->where('id', '[0-9]+');
Route::delete('/evento/{id}/borrar', [eventoController::class, 'destroy'])->name('evento.borrar')->where('id', '[0-9]+');

//--------------------------rutas notas-----------------------------------------------------------------------------------------------------

Route::get('/nota',[notaController::class,'index'])->name('nota.index');
Route::get('/nota/crear',[notaController::class,'create'])->name('nota.create');
Route::get('/nota/{id}',[notaController::class,'show'])->name('nota.show');
Route::post('/nota/crear', [notaController::class, 'store'])->name('nota.guardar');
Route::put('nota/{id}/editar',[notaController::class,'update'])->name('nota.update')->where('id','[0-9]+');
Route::get('/nota/{id}/editar', [notaController::class, 'edit'])->name('nota.edit')->where('id', '[0-9]+');
Route::delete('/nota/{id}/borrar', [notaController::class, 'destroy'])->name('nota.borrar')->where('id', '[0-9]+');