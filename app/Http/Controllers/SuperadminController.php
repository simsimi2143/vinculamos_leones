<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\RoleUsuarios;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SuperadminController extends Controller
{
    protected $nombreRol;

    public function __construct()
    {
        $this->nombreRol = RoleUsuarios::select('rous_nombre')->where('rous_codigo', 1)->first()->rous_nombre;
    }
    public function listarUsuarios()
    {
        return view('superadmin.usuarios.listar', [
            'usuarios' => Usuarios::where('rous_codigo', 1)->orderBy('usua_creado', 'desc')->get()
        ]);
    }

    public function crearUsuario()
    {
        return view('superadmin.usuarios.crear');
    }

    public function guardarAdmin(Request $request) {
        $request->validate(
            [
                'nombre' => 'required|max:50',
                'apellido' => 'required|max:50',
                'nickname' => 'required',
                'email' => 'required|max:100',
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
                'email.max' => 'El correo electrónico excede el máximo de caracteres permitidos (100).',
                'clave.required' => 'La contraseña es requerida.',
                'clave.min' => 'La contraseña debe tener 8 caracteres como mínimo.',
                'clave.max' => 'La contraseña debe tener 25 caracteres como máximo.',
                'confirmarclave.required' => 'La confirmación de contraseña es requerida.',
                'confirmarclave.same' => 'Las contraseñas no coinciden.'
            ]
        );

        $usuaVerificar = Usuarios::where(['usua_nickname' => $request->nickname, 'rous_codigo' => 1])->first();
        if ($usuaVerificar) return redirect()->back()->with('errorRegistro', 'El usuario ya se encuentra registrado como.')->withInput();

        $usuaCrear = Usuarios::create([
            'usua_nickname' => $request->nickname,
            'rous_codigo' => 1,
            'usua_nombre' => $request->nombre,
            'usua_apellido' => $request->apellido,
            'usua_email' => $request->email,
            'usua_email_alternativo' => '',
            'usua_clave' => Hash::make($request->clave),
            'usua_creado' => Carbon::now()->format('Y-m-d H:i:s'),
            'usua_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'usua_vigente' => 1,
            'usua_usuario_mod' => Session::get('superadmin')->usua_nickname,
            // 'usua_rol_mod' => Session::get('superadmin')->rous_codigo
        ]);
        if (!$usuaCrear) return redirect()->back()->with('errorRegistro', 'Ocurrió un error durante el registro del usuario, intente más tarde.')->withInput();
        return redirect()->route('superadmin.listar.usuarios')->with('exitoRegistro', 'El usuario fue registrado correctamente.');
    }
    public function habilitarAdmin($usua_nickname) {
        $usuaVerificar = Usuarios::where(['usua_nickname' => $usua_nickname, 'rous_codigo' => 1])->first();
        if (!$usuaVerificar) return redirect()->back()->with('errorUsuario', 'El usuario no se encuentra registrado.');

        $usuaActualizar = Usuarios::where(['usua_nickname' => $usua_nickname, 'rous_codigo' => 1])->update([
            'usua_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'usua_vigente' => 1,
            'usua_usuario_mod' => Session::get('superadmin')->usua_nickname,
        ]);
        if (!$usuaActualizar) return redirect()->back()->with('errorUsuario', 'Ocurrió un error al habilitar el usuario, intente más tarde.');
        return redirect()->route('superadmin.listar.usuarios')->with('exitoUsuario', 'El usuario fue habilitado correctamente.');
    }

    public function deshabilitarAdmin($usua_nickname) {
        $usuaVerificar = Usuarios::where(['usua_nickname' => $usua_nickname, 'rous_codigo' => 1])->first();
        if (!$usuaVerificar) return redirect()->back()->with('errorUsuario', 'El usuario no se encuentra registrado.');

        $usuaActualizar = Usuarios::where(['usua_nickname' => $usua_nickname, 'rous_codigo' => 1])->update([
            'usua_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'usua_vigente' => 0,
            'usua_usuario_mod' => Session::get('superadmin')->usua_nickname,
        ]);
        if (!$usuaActualizar) return redirect()->back()->with('errorUsuario', 'Ocurrió un error al deshabilitar el usuario, intente más tarde.');
        return redirect()->route('superadmin.listar.usuarios')->with('exitoUsuario', 'El usuario fue deshabilitado correctamente.');
    }

    public function eliminarAdmin(Request $request) {
        $usuaVerificar = Usuarios::where(['usua_nickname' => $request->usua_nickname, 'rous_codigo' => 1])->first();
        if (!$usuaVerificar) return redirect()->back()->with('errorUsuario', 'El usuario no se encuentra registrado.');

        $usuaEliminar = Usuarios::where(['usua_nickname' => $request->usua_nickname, 'rous_codigo' => 1])->delete();
        if (!$usuaEliminar) return redirect()->back()->with('errorUsuario', 'Ocurrió un error al eliminar el usuario, intente más tarde.');
        return redirect()->route('superadmin.listar.usuarios')->with('exitoUsuario', 'El usuario fue eliminado correctamente.');
    }


    public function editarUsuario($usua_nickname) {
        $usuaVerificar = Usuarios::where(['usua_nickname' => $usua_nickname, 'rous_codigo' => 1])->first();
        if (!$usuaVerificar) return redirect()->back()->with('errorUsuario', 'El usuario no se encuentra registrado.');
        return view('superadmin.usuarios.editar', [
            'usuario' => $usuaVerificar
        ]);
    }

    public function actualizarUsuario(Request $request, $usua_nickname) {
        $request->validate(
            [
                'nombre' => 'required|max:100',
                'apellido' => 'required|max:100',
                'email' => 'required|max:100',
            ],
            [
                'nombre.required' => 'El nombre es requerido.',
                'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
                'apellido.required' => 'El apellido es requerido.',
                'apellido.max' => 'El apellido excede el máximo de caracteres permitidos (100).',
                'email.required' => 'El correo electrónico es requerido.',
                'email.max' => 'El correo electrónico excede el máximo de caracteres permitidos (100).'
            ]
        );
        $usuaActualizar = Usuarios::where('usua_nickname',$usua_nickname)->update([
            'usua_email' => $request->email,
            'usua_nombre' => $request->nombre,
            'usua_apellido' => $request->apellido,
            'usua_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'usua_usuario_mod' => Session::get('superadmin')->usua_nickname,
        ]);
        // return $usuaActualizar;
        if (!$usuaActualizar) return redirect()->back()->with('errorUsuario', 'Ocurrió un problema al actualizar los datos del usuario, intente más tarde.')->withInput();
        return redirect()->route('superadmin.listar.usuarios')->with('exitoUsuario', 'Los datos del usuario fueron actualizados correctamente.');
    }

    public function editarClaveUsuario($usua_nickname) {
        $usuaVerificar = Usuarios::where(['usua_nickname' => $usua_nickname, 'rous_codigo' => 1])->first();
        if (!$usuaVerificar) return redirect()->back()->with('errorUsuario', 'El usuario no se encuentra registrado.');
        return view('superadmin.usuarios.clave', [
            'usuario' => $usuaVerificar
        ]);
    }

    public function actualizarClaveUsuario(Request $request, $usua_nickname) {
        $request->validate(
            [
                'nueva' => 'required|min:8|max:25',
                'repetir' => 'required|same:nueva',
            ],
            [
                'nueva.required' => 'La nueva contraseña es requerida.',
                'nueva.min' => 'La nueva contraseña debe tener 8 caracteres como mínimo.',
                'nueva.max' => 'La nueva contraseña debe tener 25 caracteres como máximo.',
                'repetir.required' => 'La confirmación de nueva contraseña es requerida.',
                'repetir.same' => 'No coincide con la nueva contraseña ingresada, intente nuevamente.',
            ]
        );

        $claveActualizar = Usuarios::where(['usua_nickname' => $usua_nickname, 'rous_codigo' => 1])->update([
            'usua_clave' => Hash::make($request->nueva),
            'usua_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'usua_usuario_mod' => Session::get('superadmin')->usua_nickname,
            // 'usua_rol_mod' => Session::get('superadmin')->rous_codigo,
        ]);
        if (!$claveActualizar) return redirect()->back()->with('errorClave', 'La contraseña del usuario no se pudo actualizar, intente más tarde.')->withInput();
        return redirect()->route('superadmin.usuario.editar', $usua_nickname)->with('exitoClave', 'La contraseña del usuario fue actualizada correctamente.');
    }

}
