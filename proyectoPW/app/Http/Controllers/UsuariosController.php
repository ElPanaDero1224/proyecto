<?php

namespace App\Http\Controllers;

use App\Http\Requests\InicioSesionRequest;
use App\Http\Requests\recuperacionContraseñaValidador;
use App\Http\Requests\RegistroRequest;
use App\Http\Requests\validadorrestablecerContraseña;
use App\Models\usuarios;
use App\Notifications\UsuarioRegistrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function iniciarsesion(InicioSesionRequest $request)
    {
        $usuario = usuarios::where('email', $request->email)->first();
    
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return back()->withErrors(['email' => 'Credenciales incorrectas.']);
        }
    
        // Enviar código 2FA
        $this->enviarCodigo2FA($usuario);
    
        // Guardar el ID del usuario en sesión temporal para 2FA
        session(['usuario_id' => $usuario->id]);
    
        // Verificar el rol del usuario y redirigir según corresponda
        if ($usuario->rol_id == 1) {
            // Redirigir al administrador
            return redirect()->route('vuelos.index')->with('exito', 'Se ha enviado un código de verificación a tu correo.');
        } else {
            // Redirigir al cliente
            return redirect()->route('ruta2fa')->with('exito', 'Se ha enviado un código de verificación a tu correo.');
        }
    }
    



    public function cerrarsesion(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('rutainiciarsesion')->with('exito', '¡Has cerrado sesión correctamente!');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registro');
    }

    public function store(RegistroRequest $request)
    {
        // Crear un usuario en la base de datos
        $usuario = usuarios::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellidos,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol_id' => 2, // Rol por defecto (cliente)
        ]);

        // Enviar correo de bienvenida
        $usuario->notify(new UsuarioRegistrado());

        // Redirigir con mensaje flash
        return redirect()->route('rutainiciarsesion')->with('exito', '¡Registro exitoso! Confirma tu cuenta desde el correo.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuarios $usuarios)
    {
        //
    }

    public function recuperar()
    {
        return view('recuperacionContraseña');
    }

    public function enviarCorreoRecuperacion(recuperacionContraseñaValidador $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()
                ->route('rutainiciarsesion')
                ->with('exito', '¡Hemos enviado un enlace de recuperación a tu correo!');
        }

        return back()
            ->withErrors(['email' => 'No pudimos encontrar un usuario con ese correo.']);
    }

    public function restablecer(Request $request, $token)
    {
        return view('restablecerContraseña', ['token' => $token, 'email' => $request->email]);
    }

    public function actualizarContraseña(validadorrestablecerContraseña $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password), // Asegúrate de usar el campo correcto aquí
                ])->setRememberToken(Str::random(60));
                

                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()
                ->route('rutainiciarsesion')
                ->with('exito', '¡Tu contraseña ha sido actualizada exitosamente!');
        }

        return back()->withErrors(['email' => 'Ocurrió un error al actualizar tu contraseña.']);

        $usuario = usuarios::where('email', $request->email)->first();
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        return redirect()->route('login')->with('success', 'Contraseña actualizada exitosamente.');
    }


    public function enviarCodigo2FA($usuario)
    {
        // Generar un código de 6 dígitos
        $codigo = rand(100000, 999999);

        // Guardar el código y su tiempo de expiración (5 minutos) en la base de datos
        $usuario->two_factor_code = $codigo;
        $usuario->two_factor_expires_at = Carbon::now()->addMinutes(5);
        $usuario->save();

        // Enviar el código al correo
        Mail::to($usuario->email)->send(new \App\Mail\Codigo2FA($codigo));
    }

    public function mostrarFormulario2FA()
    {
        return view('verificarCodigo2FA');
    }

    public function verificarCodigo2FA(Request $request)
    {
        $request->validate([
            'codigo' => 'required|digits:6',
        ]);

        $usuario = usuarios::find(session('usuario_id'));

        if (!$usuario || $usuario->two_factor_code !== $request->codigo || Carbon::now()->greaterThan($usuario->two_factor_expires_at)) {
            return back()->withErrors(['codigo' => 'El código es inválido o ha expirado.']);
        }

        // Limpiar el código 2FA
        $usuario->two_factor_code = null;
        $usuario->two_factor_expires_at = null;
        $usuario->save();

        // Iniciar sesión y redirigir
        Auth::login($usuario);
        return redirect()->route('vuelosDestino')->with('exito', '¡Inicio de sesión exitoso!');
    }


}
