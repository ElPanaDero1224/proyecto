<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorreservasAdmi;
use App\Http\Controllers\controladornotificacionesProgramados;
use App\Http\Controllers\controladorrestablecerContraseña;
use App\Http\Controllers\controladornotificacionesPlantillas;
use App\Http\Controllers\ReportesAdministrativosController;
use App\Models\vuelos;


// Route::get('/prueba', function () {
//     return view('welcome');
// });

Route::get('/reservasAdmi',[controladorreservasAdmi::class, 'reservasAdmi'])->name('rutareservasAdmi');
Route::get('/restablecer',[controladorrestablecerContraseña::class, 'restablecerContraseña'])->name('rutarestablecerpass');
Route::get('/notificaciones/programados',[controladornotificacionesProgramados::class, 'notificacionesProgramados'])->name('rutaprogramadas');
Route::get('/notificaciones/plantillas',[controladornotificacionesPlantillas::class, 'notificacionesPlantillas'])->name('rutaplantillas');

Route::post('/reservasAdmiexportar', [controladorreservasAdmi::class, 'reservasAdmialert']);
Route::post('/formrestablecerContraseña', [controladorrestablecerContraseña::class, 'Alert']);
Route::post('/confirmacionregistro', [controladornotificacionesPlantillas::class, 'confirmacionregistro']);
Route::post('/hotel', [controladornotificacionesPlantillas::class, 'hotel']);
Route::post('/vuelo', [controladornotificacionesPlantillas::class, 'vuelo']);
Route::post('/cancelacion', [controladornotificacionesPlantillas::class, 'cancelacion']);
Route::post('/retraso', [controladornotificacionesPlantillas::class, 'retraso']);



Route::resource('reportes_administrativos', ReportesAdministrativosController::class);

Route::get('/reportes-administrativos', [ReportesAdministrativosController::class, 'index'])->name('rutareportes');



// Ruta para mostrar la vista de gestión de reservas
Route::get('/reservas', [ReportesAdministrativosController::class, 'index'])->name('reservas.index');


// Ruta para generar el PDF
Route::get('/reservas/pdf', [ReportesAdministrativosController::class, 'generarPdf'])->name('reservas.pdf');

