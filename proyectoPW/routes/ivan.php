<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliticasController;
use App\Http\Controllers\InicioSesionController;

// Route::get('/prueba', function () {
//     return view('welcome');
// });

Route::view('/prueba','welcome');

use App\Http\Controllers\ControladorPoliticasCancelacion;

Route::get('/politicasCancelacion', [ControladorPoliticasCancelacion::class, 'politicasCancelacion'])->name('rutaPloticas');
Route::view('/hotelesDetalles','detallesHoteles')->name('rutadetallesHoteles');

//Route::get('/iniciarSesion', [InicioSesionController::class, 'create'])->name('rutainiciosesion');
//Route::post('/iniciarSesion', [InicioSesionController::class, 'store'])->name('rutainiciosesion.store');
