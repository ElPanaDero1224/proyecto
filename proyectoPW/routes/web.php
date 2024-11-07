<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

//USUARIO
Route::view('/','inicioSesion')->name('rutainiciarsesion');

Route::view('/recuperacion','recuperacionContraseña')->name('rutarrecuperarpass');

Route::view('/restablecer','restablecerContraseña')->name('rutarestablecerpass');

Route::view('/registro','registro')->name('rutaregistro');

Route::view('/vuelos','busquedaVuelos')->name('rutabusquedaVuelos');
Route::view('/vuelosDestino','vuelosDestino')->name('rutavuelosDestino');
Route::view('/vuelosDetalles','detallesVuelo')->name('rutadetallesVuelo');

Route::view('/hoteles','busquedaHoteles')->name('rutabusquedaHoteles');
/*Route::view('/hotelesDetalles','detallesHoteles')->name('rutadetallesHoteles');*/
Route::view('/politicas','politicasCancelacion')->name('rutaPloticas');

Route::view('/reservas','reservas')->name('rutareservas');

Route::view('/carrito','carrito')->name('rutacarrito');


//ADMINISTRADOR
Route::view('/vuelosAdmi','busquedaVuelosAdmi')->name('rutabusquedaVuelosAdmi');
Route::view('/vuelosAdmiAdministrar','administrarVuelos')->name('rutaadministrarVuelos');
Route::view('/vuelosAdmiNew','registroNewVuelo')->name('rutaregistroNewVuelo');

//Route::view('/hotelesAdmi','busquedaHotelesAdmi')->name('rutabusquedaHotelesAdmi');
//Route::view('/hotelesAdmiEdit','editarinfoHotel')->name('rutaeditarHotel');
Route::view('/politicasAdmi','modificarPoliticas')->name('rutamodificarPoliticas');
Route::view('/hotelesAdmiformulario','formularioNewHotel')->name('rutarformularioHotel');

Route::view('/reservasAdmi','reservasAdmi')->name('rutareservasAdmi');

Route::view('/notificaciones','notificaciones')->name('rutanotificaciones');
Route::view('/notificaciones/plantillas','notificacionesPlantillas')->name('rutaplantillas');
Route::view('/notificaciones/programados','notificacionesProgramados')->name('rutaprogramadas');

Route::view('/panel','panelPrincipal')->name('rutapanel');






//RUTAS JALA LAS RUTAS DE LOS OTROS ARCHIVOS. (DE PREFERENCIA NO MOVER)
require base_path('routes/isa.php');
require base_path('routes/sam.php');
require base_path('routes/veytia.php');
require base_path('routes/ivan.php');
require base_path('routes/jose.php');


