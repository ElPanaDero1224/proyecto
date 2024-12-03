<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\busquedaVuelosAdmi;
use App\Http\Controllers\administrarVuelos;
use App\Http\Controllers\panelPrincipal;
use App\Http\Controllers\recuperacionContraseña;
use App\Http\Controllers\registroNewVuelo;
use App\Http\Controllers\modificarVuelosDestinos;

use App\Http\Controllers\AerolineasController;
use App\Http\Controllers\PreciosController;
use App\Http\Controllers\VuelosController;
use App\Http\Controllers\DisponibilidadAsientosController;



Route::resource("aerolineas", AerolineasController::class);
Route::resource("precios", PreciosController::class);
Route::resource("vuelos", VuelosController::class);
Route::resource('disponibilidad_asientos', DisponibilidadAsientosController::class);

#Route::view('/verAerolineasAdmin', 'verAerolineasAdmin');
#Route::view('/registroNewAerolineaAdmin', 'registroNewAerolineaAdmin');
#Route::view('/verPreciosAdmin', 'verPreciosAdmin');
#Route::view('/registroNewPrecioAdmin','registroNewPrecioAdmin');

Route::get('/vuelosDestino', [VuelosController::class, 'table']);

Route::post('/busquedaVuelosSearch', [VuelosController::class, 'busqueda']);



#Route::get('/vuelosAdmi', [busquedaVuelosAdmi::class,'busquedaVuelosAdmi'])->name('rutabusquedaVuelosAdmi'); //pendiente
Route::get('/vuelosAdmiAdministrar', [administrarVuelos::class,'administrarVuelos'])->name('administrarVuelos'); //mine listo completamente
Route::get('/panel', [panelPrincipal::class, 'panelPrincipal'])->name('panelPrincipal'); //mine listo por completo panelprincipal
Route::get('/recuperacion', [recuperacionContraseña::class,'recuperacionContraseña'])->name('recuperacionContraseña'); //mine listo por completo /recuperacion
Route::get('/vuelosAdmiNew', [registroNewVuelo::class,'registroNewVuelo'])->name('registroNewVuelo'); //mine listo completamente
Route::get('/modVuelDest', [modificarVuelosDestinos::class,'modificarVueloDestino'])->name('modVuelDest'); //mine listo completamente



//Formulario
Route::post('/recuperacionFormulario', [recuperacionContraseña::class,'recuperar'])->name('recuperacionFormulario');
Route::post('/insertarVuelo', [registroNewVuelo::class,'registroVuelo'])->name('insertarVuelo');
Route::post('/mdfcvls', [modificarVuelosDestinos::class,'mdfcvls'])->name('mdfcvls');

Route::view('/prueba','welcome');

