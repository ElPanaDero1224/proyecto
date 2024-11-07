<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorreservasAdmi;
use App\Http\Controllers\controladornotificacionesProgramados;
use App\Http\Controllers\controladorrestablecerContraseña;

// Route::get('/prueba', function () {
//     return view('welcome');
// });

Route::get('/reservasAdmi',[controladorreservasAdmi::class, 'reservasAdmi'])->name('rutareservasAdmi');
Route::get('/restablecer',[controladorrestablecerContraseña::class, 'restablecerContraseña'])->name('rutarestablecerpass');
Route::get('/notificaciones/programados',[controladornotificacionesProgramados::class, 'notificacionesProgramados'])->name('rutaprogramadas');

Route::post('/reservasAdmiexportar', [controladorreservasAdmi::class, 'controladorreservasAdmialert']);
