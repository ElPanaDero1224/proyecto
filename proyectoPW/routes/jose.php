<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladordetallesHoteles;
use App\Http\Controllers\ControladoreditarinfoHotel;
use App\Http\Controllers\ControladorbusquedaHotelesAdmi;
// Route::get('/prueba', function () {
//     return view('welcome');
// });


//Vista detallesHoteles
Route::view('/prueba','welcome');
Route::get('/hotelesDetalles',[ControladordetallesHoteles::class,'detallesHoteles'])->name('rutadetallesHoteles');
Route::get('/hotelesAdmiEdit',[ControladoreditarinfoHotel::class,'editarinfoHotel'])->name('rutaeditarHotel');
Route::get('/hotelesAdmi',[ControladorbusquedaHotelesAdmi::class,'busquedahotelesAdmi'])->name('rutabusquedaHotelesAdmi');
Route::post('/editarhotel',[ControladoreditarinfoHotel::class,'procesarEditarHotel']);
Route::post('/realizarbusquedahotelesadmi',[ControladorbusquedaHotelesAdmi::class,'procesarbusquedahotelesAdmi']);