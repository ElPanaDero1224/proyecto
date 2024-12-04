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
use App\Http\Controllers\VuelosEnReservasVuelosController;



Route::resource("aerolineas", AerolineasController::class);
Route::resource("precios", PreciosController::class);
Route::resource("vuelos", VuelosController::class);
Route::resource('disponibilidad_asientos', DisponibilidadAsientosController::class);
Route::resource('vuelos_en_reservas_vuelos', VuelosEnReservasVuelosController::class);

#Route::view('/verAerolineasAdmin', 'verAerolineasAdmin');
#Route::view('/registroNewAerolineaAdmin', 'registroNewAerolineaAdmin');
#Route::view('/verPreciosAdmin', 'verPreciosAdmin');
#Route::view('/registroNewPrecioAdmin','registroNewPrecioAdmin');

Route::get('/cosa/{id}', [VuelosEnReservasVuelosController::class, 'form'])->name('form');

Route::get('/vuelosDestino', [VuelosController::class, 'table'])->name('vuelosDestino');

Route::post('/busquedaVuelosSearch', [VuelosController::class, 'busqueda']);
Route::post('/vuelos_en_reservas_vuelos/{id}', [VuelosEnReservasVuelosController::class, 'store'])->name('vuelos_en_reservas_vuelos.store');


#Route::get('/vuelosAdmi', [busquedaVuelosAdmi::class,'busquedaVuelosAdmi'])->name('rutabusquedaVuelosAdmi'); //pendiente
Route::get('/vuelosAdmiAdministrar', [administrarVuelos::class,'administrarVuelos'])->name('administrarVuelos'); //mine listo completamente
Route::get('/panel', [panelPrincipal::class, 'panelPrincipal'])->name('panelPrincipal'); //mine listo por completo panelprincipal

Route::get('/modVuelDest', [modificarVuelosDestinos::class,'modificarVueloDestino'])->name('modVuelDest'); //mine listo completamente



//Formulario
//Route::post('/recuperacionFormulario', [recuperacionContraseña::class,'recuperar'])->name('recuperacionFormulario');
Route::post('/insertarVuelo', [registroNewVuelo::class,'registroVuelo'])->name('insertarVuelo');
Route::post('/mdfcvls', [modificarVuelosDestinos::class,'mdfcvls'])->name('mdfcvls');

Route::view('/prueba','welcome');

