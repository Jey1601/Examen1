<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DirectorioController;
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

Route::get('/', [DirectorioController::class,'index'])->name('directorio.index');

Route::get('/directorio/crear', [DirectorioController::class,'crear'])->name('directorio.crear');

Route::get('/directorio/buscar', [DirectorioController::class,'buscar'])->name('directorio.buscar');

Route::get('/directorio/obtener', [DirectorioController::class,'obtener'])->name('directorio.obtener');

Route::get('/directorio/eliminar/{codigoEntrada}', [DirectorioController::class,'eliminar'])->name('directorio.eliminar');

Route::get('/directorio/destroy/{codigoEntrada}', [DirectorioController::class,'destroy'])->name('directorio.destroy');

Route::post('/directorio/guardar', [DirectorioController::class,'guardar'])->name('directorio.guardar');

Route::get('/contactos/obtener/{codigoEntrada}', [ContactoController::class,'obtenerContactos'])->name('contacto.obtenerContactos');

Route::get('/contactos/ver', [ContactoController::class,'ver'])->name('contacto.ver');

Route::get('/contactos/agregar/{codigoEntrada}', [ContactoController::class,'agregar'])->name('contacto.agregar');

Route::get('/contactos/eliminar/{id}', [ContactoController::class,'eliminar'])->name('contacto.eliminar');

Route::post('/contactos/guardar', [ContactoController::class,'guardar'])->name('contacto.guardar');