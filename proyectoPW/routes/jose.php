<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladordetallesHoteles;
use App\Http\Controllers\ControladoreditarinfoHotel;
use App\Http\Controllers\ControladorbusquedaHotelesAdmi;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\controladorBusquedaHoteles;
use App\Models\Hotel;
use App\Http\Controllers\ComentariosController;
use App\Models\Comentarios;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservaHotelController;
use App\Http\Controllers\DestinosController;





//Rutas Comentarios
Route::get('/hoteles/{id}', [ControladordetallesHoteles::class, 'detallesHoteles'])->name('hoteles.detalles');
Route::post('/comentarios', [ComentariosController::class, 'store'])->name('comentarios.store');
Route::delete('/comentarios/{id}', [ComentariosController::class, 'destroy'])->name('comentarios.destroy');




//Vista detallesHoteles


/*Route::get('/hotelesDetalles',[ControladordetallesHoteles::class,'detallesHoteles'])->name('rutadetallesHoteles');
Route::get('/hotelesAdmiEdit',[ControladoreditarinfoHotel::class,'editarinfoHotel'])->name('rutaeditarHotel');
Route::get('/hotelesAdmi',[ControladorbusquedaHotelesAdmi::class,'busquedahotelesAdmi'])->name('rutabusquedaHotelesAdmi');
Route::post('/editarhotel',[ControladoreditarinfoHotel::class,'procesarEditarHotel']);
Route::post('/realizarbusquedahotelesadmi',[ControladorbusquedaHotelesAdmi::class,'procesarbusquedahotelesAdmi']); */


//Rutas de Usuarios no Admin
Route::get('/hoteles', [ControladorbusquedaHoteles::class, 'busquedahoteles']);
Route::get('/hotelesDetalles/{id}', [ControladordetallesHoteles::class, 'detallesHoteles'])->name('detallesHoteles');
Route::get('/politicas/{id}', [ControladordetallesHoteles::class, 'politicasCancelacion'])->name('politicas.hotel');



// Rutas de modelos
Route::resource('hotels',HotelsController::class);
Route::resource('comentarios', ComentariosController::class);
Route::resource('destinos', DestinosController::class);

//modal
Route::post('/reservar', [ReservaHotelController::class, 'reservar'])->name('reservar.hotel');
