<?php

use Illuminate\Support\Facades\Route;

// Route::get('/prueba', function () {
//     return view('welcome');
// });

//Route::view('/prueba','welcome');

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\BusquedaVuelosController;
use App\Http\Controllers\VuelosDestinoController;
use App\Http\Controllers\DetallesVueloController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuariosController;

//Route::get('/registro', [RegistroController::class, 'create'])->name('rutaregistro');
//Route::post('/registro', [RegistroController::class, 'store']);

Route::get('/registro', [UsuariosController::class, 'create'])->name('rutaregistro');
Route::post('/registro', [UsuariosController::class, 'store']);

// Mostrar formulario para solicitar restablecimiento
Route::get('/recuperar', [UsuariosController::class, 'recuperar'])->name('password.request');

// Enviar correo de recuperación
Route::post('/recuperar', [UsuariosController::class, 'enviarCorreoRecuperacion'])->name('password.email');

// Restablecer contraseña (formulario con token)
Route::get('/restablecer/{token}', [UsuariosController::class, 'restablecer'])->name('password.reset');

// Actualizar la contraseña
Route::post('/restablecer', [UsuariosController::class, 'actualizarContraseña'])->name('password.update');


Route::post('/iniciarsesion', [UsuariosController::class, 'iniciarsesion'])->name('rutainiciosesion');
Route::post('/cerrarsesion', [UsuariosController::class, 'cerrarsesion'])->name('rutacerrarsesion');


Route::get('/verificar-codigo', [UsuariosController::class, 'mostrarFormulario2FA'])->name('ruta2fa');
Route::post('/verificar-codigo', [UsuariosController::class, 'verificarCodigo2FA'])->name('verificar2fa');

//Route::get('/vuelos', [BusquedaVuelosController::class, 'index'])->name('rutabusquedaVuelos');
Route::post('/vuelos', [BusquedaVuelosController::class, 'store'])->name('rutabusquedaVuelos.store');

Route::get('/vuelosDestino', [VuelosDestinoController::class, 'index'])->name('rutavuelosDestino');

Route::get('/vuelosDetalles/{numero}', [DetallesVueloController::class, 'show'])->name('rutadetallesVuelo');

Route::get('/carrito', [CarritoController::class, 'index'])->name('rutacarrito');

Route::get('/hotelesAdminformulario', [HotelController::class, 'create'])->name('hotelesAdminformulario.create');
Route::post('/hotelesAdmin', [HotelController::class, 'store'])->name('hotelesAdminformulario.store');

Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');



