<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladordetallesHoteles;
use App\Http\Controllers\ControladoreditarinfoHotel;
// Route::get('/prueba', function () {
//     return view('welcome');
// });


//Vista detallesHoteles
Route::view('/prueba','welcome');
Route::get('/hotelesDetalles',[ControladordetallesHoteles::class,'detallesHoteles'])->name('rutadetallesHoteles');
Route::get('/hotelesAdmiEdit',[ControladoreditarinfoHotel::class,'editarinfoHotel'])->name('rutaeditarHotel');
Route::post('/editarhotel',[ControladoreditarinfoHotel::class,'procesarEditarHotel']);