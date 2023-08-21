<?php

namespace App\Http\Controllers;
use App\Models\RoleUsuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios;

class AutenticationController extends Controller
{
    public function ingresar() {
        return view('auth.ingresar');
    }



    public function cerrarSesion() {
        if (Session::has('admin')) {
            Session::forget('admin');
            return redirect()->route('ingresar.formulario')->with('sessionFinalizada', 'Sesión finalizada.');
        } elseif (Session::has('digitador')) {
            Session::forget('digitador');
            return redirect()->route('ingresar.formulario')->with('sessionFinalizada', 'Sesión finalizada.');
        } elseif (Session::has('observador')) {
            Session::forget('observador');
            return redirect()->route('ingresar.formulario')->with('sessionFinalizada', 'Sesión finalizada.');
        } else {
            Session::forget('superadmin');
            return redirect()->route('ingresar.formulario')->with('sessionFinalizada', 'Sesión finalizada.');
        }
        return redirect()->back();
    }

    public function validarIngreso(Request $request) {
        $request->validate(
            [
                'nickname' => 'required',
                'clave' => 'required',
            ],
            [
                'run.required' => 'El nombre de usuario es requerido.',
                'clave.required' => 'La contraseña es requerida.',
            ]
        );

        $usuario = Usuarios::where(['usua_nickname' => $request->nickname])->first();

        if ($usuario == NULL) return redirect()->back()->with('errorName', 'El usuario no se encuentra registrado.')->withInput();
        if ($usuario->usua_vigente == 0) return redirect()->back()->with('errorName', 'El usuario no se encuentra habilitado para ingresar al sistema. Si tiene dudas, notifique al administrador.')->withInput();

        $validarClave = Hash::check($request->clave, $usuario->usua_clave);
        if (!$validarClave) return redirect()->back()->with('errorClave', 'La contraseña es incorrecta.')->withInput();

        if ($usuario->rous_codigo == 1) {
            $request->session()->put('admin', $usuario);
            return redirect()->route('admin.home');
        } elseif ($usuario->rous_codigo == 2) {
            $request->session()->put('digitador', $usuario);
            return redirect()->route('digitador.home');
        } elseif ($usuario->rous_codigo == 3) {
            $request->session()->put('observador', $usuario);
            return redirect()->route('observador.home');
        } elseif ($usuario->rous_codigo == 4) {
            $request->session()->put('supervisor', $usuario);
            return redirect()->route('supervisor.home');
        } else {
            $request->session()->put('superadmin', $usuario);
            return redirect()->route('superadmin.listar.usuarios');
        }
    }

    public function registrarSuperadmin() {
        return view('auth.registrar_superadmin');
    }

    public function guardarSuperadmin(Request $request) {
        $request->validate(
            [
                'nombre' => 'required|max:50',
                'apellido' => 'required|max:50',
                'nickname' => 'required',
                'email' => 'max:100',
                'clave' => 'required|min:8|max:25',
                'confirmarclave' => 'required|same:clave'
            ],
            [
                'nombre.required' => 'El nombre es requerido.',
                'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (50).',
                'apellido.required' => 'El apellido es requerido.',
                'apellido.max' => 'El apellido excede el máximo de caracteres permitidos (50).',
                'nickname.required' => 'El nombre de usuario es requerido.',
                'email.required' => 'El correo electrónico es requerido.',
                'email.max' => 'El correo electrónico excede excede el máximo de caracteres permitidos (100).',
                'clave.required' => 'La contraseña es requerida.',
                'clave.min' => 'La contraseña debe tener 8 caracteres como mínimo.',
                'clave.max' => 'La contraseña debe tener 25 caracteres como máximo.',
                'confirmarclave.required' => 'La confirmación de contraseña es requerida.',
                'confirmarclave.same' => 'Las contraseñas no coinciden.'
            ]
        );

        $usuaVerificar = Usuarios::where(['usua_nickname' => $request->nickname, 'rous_codigo' => 4])->first();
        if ($usuaVerificar) return redirect()->back()->with('errorRegistro', 'El usuario ya se encuentra registrado.')->withInput();

        $usuario = Usuarios::create([
            'usua_nickname' => $request->nickname,
            'rous_codigo' => 4,
            'usua_email' => $request->email,
            'usua_email_alternativo' => '',
            'usua_clave' => Hash::make($request->clave),
            'usua_nombre' => $request->nombre,
            'usua_apellido' => $request->apellido,
            'usua_creado' => Carbon::now()->format('Y-m-d H:i:s'),
            'usua_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'usua_vigente' => 1,
            'usua_nickname_mod' => $request->nickname,
            'usua_rol_mod' => 4
        ]);
        if (!$usuario) return redirect()->back()->with('errorRegistro', 'Ocurrió un error durante el registro del usuario, intente más tarde.')->withInput();
        return redirect()->route('auth.ingresar')->with('usuarioRegistrado', 'El usuario fue registrado correctamente.');
    }
}
