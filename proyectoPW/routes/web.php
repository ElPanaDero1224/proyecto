<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PoliticasController;
use App\Http\Controllers\InicioSesionController;
use App\Http\Controllers\ControladorPoliticasCancelacion;

Route::view('/prueba', 'welcome');

// Ruta para mostrar las políticas de cancelación
Route::get('/politicasCancelacion', [ControladorPoliticasCancelacion::class, 'politicasCancelacion'])->name('rutaPloticas');

// Ruta para mostrar los detalles de los hoteles
Route::view('/hotelesDetalles', 'detallesHoteles')->name('rutadetallesHoteles');

// Rutas para el inicio de sesión
Route::get('/iniciarSesion', [InicioSesionController::class, 'create'])->name('rutainiciosesion');
Route::post('/iniciarSesion', [InicioSesionController::class, 'store'])->name('rutainiciosesion.store');

// Otras rutas
Route::view('/', 'inicioSesion')->name('rutainiciarsesion');
//Route::view('/recuperacion', 'recuperacionContraseña')->name('rutarrecuperarpass');
//Route::view('/restablecer', 'restablecerContraseña')->name('rutarestablecerpass');
Route::view('/registro', 'registro')->name('rutaregistro');
Route::view('/vuelos', 'busquedaVuelos')->name('rutabusquedaVuelos');
Route::view('/vuelosDestino', 'vuelosDestino')->name('rutavuelosDestino');
Route::view('/vuelosDetalles', 'detallesVuelo')->name('rutadetallesVuelo');
Route::view('/hoteles', 'busquedaHoteles')->name('rutabusquedaHoteles');
Route::view('/reservas', 'reservas')->name('rutareservas');
Route::view('/carrito', 'carrito')->name('rutacarrito');
Route::view('/vuelosAdmi', 'busquedaVuelosAdmi')->name('rutabusquedaVuelosAdmi');
Route::view('/vuelosAdmiAdministrar', 'administrarVuelos')->name('rutaadministrarVuelos');
Route::view('/vuelosAdmiNew', 'registroNewVuelo')->name('rutaregistroNewVuelo');
Route::view('/hotelesAdmi', 'busquedaHotelesAdmi')->name('rutabusquedaHotelesAdmi');
Route::view('/politicasAdmi', 'modificarPoliticas')->name('rutamodificarPoliticas');
Route::view('/hotelesAdmiformulario', 'formularioNewHotel')->name('rutarformularioHotel');
Route::view('/reservasAdmi', 'reservasAdmi')->name('rutareservasAdmi');
Route::view('/notificaciones', 'notificaciones')->name('rutanotificaciones');
Route::view('/notificaciones/plantillas', 'notificacionesPlantillas')->name('rutaplantillas');
Route::view('/notificaciones/programados', 'notificacionesProgramados')->name('rutaprogramadas');
Route::view('/panel', 'panelPrincipal')->name('rutapanel');

// Rutas adicionales desde otros archivos
require base_path('routes/isa.php');
require base_path('routes/sam.php');
require base_path('routes/veytia.php');
require base_path('routes/ivan.php');
require base_path('routes/jose.php');