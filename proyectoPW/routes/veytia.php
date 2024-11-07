<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorreservasAdmi;
use App\Http\Controllers\controladornotificacionesProgramados;

// Route::get('/prueba', function () {
//     return view('welcome');
// });

Route::get('/reservasAdmi',[controladorreservasAdmi::class, 'controladorreservasAdmi'])->name('rutareservasAdmi');
Route::get('/notificacionesProgramados',[controladornotificacionesProgramados::class, 'controladornotificacionesProgramados']);

Route::post('/reservasAdmiexportar', [controladorreservasAdmi::class, 'controladorreservasAdmialert']);
