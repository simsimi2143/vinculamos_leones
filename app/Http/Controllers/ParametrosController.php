<?php

namespace App\Http\Controllers;

use App\Models\Ambitos;
use App\Models\AmbitosAccion;
use App\Models\Carreras;
use App\Models\Comuna;
use App\Models\Convenios;
use App\Models\Escuelas;
use App\Models\GruposInteres;
use App\Models\Mecanismos;
use App\Models\Pais;
use App\Models\Regiones;
use App\Models\Programas;
use App\Models\Sedes;
use App\Models\SedesSocios;
use App\Models\SedesEscuelas;
use App\Models\SedesProgramas;
use App\Models\TipoIniciativa;
use App\Models\SociosComunitarios;
use App\Models\SubGruposInteres;
use App\Models\Tematicas;
use App\Models\TipoActividades;
use App\Models\TipoIniciativas;
use App\Models\TipoUnidades;
use App\Models\Unidades;
use App\Models\SubUnidades;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ParametrosController extends Controller
{
    protected $nombreRol;

    //TODO: Ambito de contribucion
    public function listarAmbitos()
    {
        return view('admin.parametros.ambitos', [
            'ambitos' => Ambitos::orderBy('amb_codigo', 'asc')->get()
        ]);
    }

    public function crearAmbitos(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
        ], [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.ambitos')->withErrors($validacion)->withInput();
        }

        $ambito = new Ambitos();
        $ambito->amb_nombre = $request->input('nombre');
        $ambito->amb_descripcion = $request->input('descripcion');
        $ambito->amb_director = $request->input('director');
        $ambito->amb_creado = now();
        $ambito->amb_actualizado = now();

        // Guardar el programa en la base de datos
        $ambito->save();

        return redirect()->back()->with('exitoAmbito', 'Impacto creado exitosamente');
    }

    public function eliminarAmbitos(Request $request)
    {
        $ambito = Ambitos::where('amb_codigo', $request->amb_codigo)->first();

        if (!$ambito) {
            return redirect()->route('admin.listar.ambitos')->with('errorAmbito', 'El impacto no se encuentra registrado en el sistema.');
        }

        $ambito = Ambitos::where('amb_codigo', $request->amb_codigo)->delete();

        return redirect()->route('admin.listar.ambitos')->with('exitoAmbito', 'El impacto fue eliminado correctamente.');
    }

    public function actualizarAmbitos(Request $request, $amb_codigo)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
        ], [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (255).',
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.ambitos')->withErrors($validacion)->withInput();
        }

        $ambito = Ambitos::find($amb_codigo);
        //return redirect()->route('admin.listar.ambitos')->with('errorAmbito', $amb_codigo);
        if (!$ambito) {
            return redirect()->route('admin.listar.ambitos')->with('errorAmbito', 'El impacto no se encuentra registrado en el sistema.')->withInput();;
        }

        $ambito->amb_nombre = $request->input('nombre');
        $ambito->amb_descripcion = $request->input('descripcion');
        $ambito->amb_director = $request->input('director');
        $ambito->amb_creado = now();
        $ambito->amb_actualizado = now();

        // Guardar la actualización del programa en la base de datos
        $ambito->save();

        return redirect()->back()->with('exitoAmbito', 'Impacto actualizado exitosamente')->withInput();;
    }

    //TODO: Ambito de acción
    public function listarAmbitosAccion()
    {
        return view('admin.parametros.aaccion', [
            'ambitos' => AmbitosAccion::orderBy('amac_codigo', 'asc')->get()
        ]);
    }

    public function crearAmbitosAccion(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'nombre_aa' => 'required|max:100',
        ], [
            'nombre_aa.required' => 'El nombre es requerido.',
            'nombre_aa.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.ambitosaccion')->withErrors($validacion)->withInput();
        }

        $ambito = new AmbitosAccion();
        $ambito->amac_nombre = $request->input('nombre_aa');
        $ambito->amac_descripcion = $request->input('descripcion_aa');
        $ambito->amac_director = $request->input('director_aa');
        $ambito->amac_creado = now();
        $ambito->amac_actualizado = now();

        // Guardar el programa en la base de datos
        $ambito->save();

        return redirect()->back()->with('exitoAmbito', 'Ámbito de acción creado exitosamente');
    }

    public function eliminarAmbitosAccion(Request $request)
    {
        $ambito = AmbitosAccion::where('amac_codigo', $request->amac_codigo)->first();

        if (!$ambito) {
            return redirect()->route('admin.listar.ambitosaccion')->with('errorAmbito', 'El ámbito de acción  no se encuentra registrado en el sistema.');
        }

        $ambito = AmbitosAccion::where('amac_codigo', $request->amac_codigo)->delete();

        return redirect()->route('admin.listar.ambitosaccion')->with('exitoAmbito', 'El ámbito de acción  fue eliminado correctamente.');
    }

    public function actualizarAmbitosAccion(Request $request, $amac_codigo)
    {
        $validacion = Validator::make($request->all(), [
            'nombre_aa' => 'required|max:255',
        ], [
            'nombre_aa.required' => 'El nombre es requerido.',
            'nombre_aa.max' => 'El nombre excede el máximo de caracteres permitidos (255).',
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.ambitosaccion')->withErrors($validacion)->withInput();
        }

        $ambito = AmbitosAccion::find($amac_codigo);
        //return redirect()->route('admin.listar.ambitos')->with('errorAmbito', $amb_codigo);
        if (!$ambito) {
            return redirect()->route('admin.listar.ambitosaccion')->with('errorAmbito', 'El ámbito de acción no se encuentra registrado en el sistema.')->withInput();;
        }

        $ambito->amac_nombre = $request->input('nombre_aa');
        $ambito->amac_descripcion = $request->input('descripcion_aa');
        $ambito->amac_director = $request->input('director_aa');
        $ambito->amac_creado = now();
        $ambito->amac_actualizado = now();

        // Guardar la actualización del programa en la base de datos
        $ambito->save();

        return redirect()->back()->with('exitoAmbito', 'Ámbito de acción  actualizado exitosamente')->withInput();;
    }

    //TODO: Programas
    public function listarProgramas()
    {
        $programas = Programas::orderBy('prog_codigo', 'asc')->get();
        $tipos = AmbitosAccion::orderBy('amac_codigo', 'asc')->get();
        $mecanismos = Mecanismos::orderBy('meca_codigo', 'asc')->get();

        return view('admin.parametros.programs', compact('programas', 'tipos', 'mecanismos'));
    }

    public function crearProgramas(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            /* 'director' => 'required|max:100', */
            'mecanismo' => 'required',
            'ambito' => 'required',
            'meta_socios' => 'required',
            'meta_iniciativas' => 'required',
            'meta_estudiantes' => 'required',
            'meta_docentes' => 'required',
            'meta_beneficiarios' => 'required',
        ], [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (255).',
            /* 'director.required' => 'El nombre del director es requerido.',
            'director.max' => 'El nombre del director excede el máximo de caracteres permitidos (100).', */
            'mecanismo.required' => 'Seleccione un ámbito de acción.',
            'ambito.required' => 'Seleccione un ámbito de acción.',
            'meta_socios.required' => 'Una meta de socios es necesaria.',
            'meta_iniciativas.required' => 'Una meta de iniciativas de socios es necesaria.',
            'meta_estudiantes.required' => 'Una meta de estudiantes de socios es necesaria.',
            'meta_docentes.required' => 'Una meta de docentes de socios es necesaria.',
            'meta_beneficiarios.required' => 'Una meta de beneficiarios de socios es necesaria.',
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.programas')->withErrors($validacion)->withInput();
        }

        $programa = new Programas();
        $programa->prog_nombre = $request->input('nombre');
        $programa->prog_descripcion = $request->input('descripcion');
        $programa->prog_director = $request->input('director');
        $programa->prog_meta_socios = $request->input('meta_socios');
        $programa->prog_meta_iniciativas = $request->input('meta_iniciativas');
        $programa->prog_meta_estudiantes = $request->input('meta_estudiantes');
        $programa->prog_meta_docentes = $request->input('meta_docentes');
        $programa->prog_meta_beneficiarios = $request->input('meta_beneficiarios');
        $programa->amac_codigo = $request->input('ambito');
        $programa->meca_codigo = $request->input('mecanismo');
        $programa->prog_creado = now();
        $programa->prog_actualizado = now();

        // Guardar el programa en la base de datos
        $programa->save();

        return redirect()->back()->with('exitoPrograma', 'Programa creado exitosamente')->withInput();;
    }

    public function eliminarProgramas(Request $request)
    {
        $programa = Programas::where('prog_codigo', $request->prog_codigo)->first();

        if (!$programa) {
            return redirect()->route('admin.listar.programas')->with('errorPrograma', 'El programa no se encuentra registrado en el sistema.');
        }

        $programa->delete();

        return redirect()->route('admin.listar.programas')->with('exitoPrograma', 'El programa fue eliminado correctamente.');
    }

    public function actualizarProgramas(Request $request, $prog_codigo)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            /* 'director' => 'required|max:100', */
            'mecanismo' => 'required',
            'ambito' => 'required',
            'meta_socios' => 'required',
            'meta_iniciativas' => 'required',
            'meta_estudiantes' => 'required',
            'meta_docentes' => 'required',
            'meta_beneficiarios' => 'required',
        ], [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (255).',
            /* 'director.required' => 'El nombre del director es requerido.',
            'director.max' => 'El nombre del director excede el máximo de caracteres permitidos (100).', */
            'mecanismo.required' => 'Seleccione un ámbito de acción.',
            'ambito.required' => 'Seleccione un ámbito de acción.',
            'meta_socios.required' => 'Una meta de socios es necesaria.',
            'meta_iniciativas.required' => 'Una meta de iniciativas de socios es necesaria.',
            'meta_estudiantes.required' => 'Una meta de estudiantes de socios es necesaria.',
            'meta_docentes.required' => 'Una meta de docentes de socios es necesaria.',
            'meta_beneficiarios.required' => 'Una meta de beneficiarios de socios es necesaria.',
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.programas')->withErrors($validacion)->withInput();
        }

        $programa = Programas::find($prog_codigo);

        if (!$programa) {
            return redirect()->route('admin.listar.programas')->with('errorPrograma', 'El programa no se encuentra registrado en el sistema.')->withInput();;
        }

        $programa->prog_nombre = $request->input('nombre');
        $programa->prog_descripcion = $request->input('descripcion');
        $programa->prog_director = $request->input('director');
        $programa->prog_meta_socios = $request->input('meta_socios');
        $programa->prog_meta_iniciativas = $request->input('meta_iniciativas');
        $programa->prog_meta_estudiantes = $request->input('meta_estudiantes');
        $programa->prog_meta_docentes = $request->input('meta_docentes');
        $programa->prog_meta_beneficiarios = $request->input('meta_beneficiarios');
        $programa->amac_codigo = $request->input('ambito');
        $programa->meca_codigo = $request->input('mecanismo');
        $programa->prog_actualizado = now();

        // Guardar la actualización del programa en la base de datos
        $programa->save();

        return redirect()->back()->with('exitoPrograma', 'Programa actualizado exitosamente')->withInput();;
    }

    //TODO: Parametro Convenios
    public function listarConvenios()
    {
        return view('admin.parametros.convenios', [
            'convenios' => Convenios::orderBy('conv_codigo', 'asc')->get()
        ]);
    }

    public function eliminarConvenios(Request $request)
    {
        $verificarDrop = Convenios::where('conv_codigo', $request->conv_codigo)->first();
        if (!$verificarDrop) {
            return redirect()->route('admin.listar.convenios')->with('errorConvenio', 'El convenio no se encuentra registrado en el sistema.');
        }

        try {
            $verificarDropFile = unlink('public/' . $verificarDrop->conv_ruta_archivo);
        } catch (\Exception $e) {
            echo "Archivo no encontrado: " . $e->getMessage();
        }

        $Drop = Convenios::where('conv_codigo', $request->conv_codigo)->delete();
        if (!$Drop) {
            return redirect()->back()->with('errorConvenio', 'El convenio no se pudo eliminar, intente más tarde.');
        }

        return redirect()->route('admin.listar.convenios')->with('exitoConvenio', 'El convenio fue eliminado correctamente.');
    }

    public function actualizarConvenios(Request $request, $conv_codigo)
    {
        $validacion = $request->validate(
            [
                'nombre' => 'required|max:255',
                'nombrearchivo' => 'required|max:100',
            ],
            [
                'nombre.required' => 'El nombre es requerido.',
                'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (255).',
                'nombrearchivo.required' => 'El nombre del archivo es requerido.',
                'nombrearchivo.max' => 'El nombre del archivo excede el máximo de caracteres permitidos (100).',
            ]
        );


        //CAmbiar nombre del archivo
        $file_path = Convenios::select('conv_ruta_archivo')->where(['conv_codigo' => $conv_codigo])->first();
        $file_path = $file_path->conv_ruta_archivo;
        $rutaArchivo = $file_path;
        $nuevoNombre = $request->input('nombrearchivo');
        $rutaCompleta = public_path($rutaArchivo);
        $rutaCompleta = str_replace("/", "\\", $rutaCompleta);

        if (!$validacion) {
            return redirect()->route('admin.listar.convenios')->with('errorConvenio', 'Problemas al actualizar el convenio.')->withInput();;
        }

        $archivo = $request->file('archivo');
        //return redirect()->route('admin.listar.convenios')->with('errorConvenio', $archivo);
        if($archivo){
            $extension = $archivo->getClientOriginalExtension();
            $rutaConvenio = 'files/convenios/' . $request->input('nombrearchivo') . '.'. $extension;

            if (File::exists(public_path($rutaConvenio))) File::delete(public_path($rutaConvenio));
            $moverArchivo = $archivo->move(public_path('files/convenios'), $request->input('nombrearchivo') . '.'. $extension);
            if (!$moverArchivo) {
                return redirect()->back()->with('errorConvenio', 'Ocurrió un error durante el registro del convenio, intente más tarde.')->withInput();;
            }


            if (File::exists($rutaCompleta)) File::delete($rutaCompleta);
            $convenio = Convenios::where(['conv_codigo' => $conv_codigo])->update([
                'conv_ruta_archivo' => 'files/convenios/' . $request->input('nombrearchivo') . '.'. $extension,
            ]);
        }


        //return redirect()->route('admin.listar.convenios')->with('errorConvenio', $rutaCompleta);

        if (File::exists($rutaCompleta)) {
            $directorio = dirname($rutaCompleta);
            $extension = pathinfo($rutaCompleta, PATHINFO_EXTENSION);
            $nuevaRuta = $directorio . '/' . $nuevoNombre . '.' . $extension;

            File::move($rutaCompleta, $nuevaRuta);
            $convenio = Convenios::where(['conv_codigo' => $conv_codigo])->update([
                'conv_ruta_archivo' => 'files/convenios/' . $nuevoNombre . '.' . $extension,
            ]);
        }

        $convenio = Convenios::where(['conv_codigo' => $conv_codigo])->update([
            'conv_nombre' => $request->input('nombre'),
            'conv_tipo' => $request->input('tipo'),
            'conv_descripcion' => $request->input('descripcion'),
            'conv_nombre_archivo' => $request->input('nombrearchivo'),
            'conv_actualizado' => now(),
            // 'usua_rol_mod' => Session::get('admin')->rous_codigo,
        ]);


        /* $archivo = $request->file('archivo');
        //Guardar PDF de los convenios
        if ($archivo){
            //Obtener la extension del FILE subido
            $extension = $archivo->getClientOriginalExtension();
            return redirect()->back()->with('errorConvenio', $extension);
            $rutaConvenio = 'files/convenios/' . $request->input('nombrearchivo') . '.'. $extension;

            if (File::exists(public_path($rutaConvenio))) File::delete(public_path($rutaConvenio));

            $moverArchivo = $archivo->move(public_path('files/convenios'), $request->input('nombrearchivo') . '.'. $extension);
            if (!$moverArchivo) {
                Convenios::where('conv_codigo', $conv_codigo)->delete();
                return redirect()->back()->with('errorConvenio', 'Ocurrió un error durante el registro del convenio, intente más tarde.');
            }

        } */

        return redirect()->back()->with('exitoConvenio', 'Convenio actualizado existosamente')->withInput();
    }

    public function crearConvenios(Request $request)
    {
        $validacion = $request->validate(
            [
                'nombre' => 'required|max:255',
                'nombrearchivo' => 'required|max:100',
                'archivo' => 'required',
            ],
            [
                'nombre.required' => 'El nombre es requerido.',
                'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (255).',
                'nombrearchivo.required' => 'El nombre del archivo es requerido.',
                'nombrearchivo.max' => 'El nombre del archivo excede el máximo de caracteres permitidos (100).',
                'archivo.required' => 'El archivo del convenio es requerido.',
            ]
        );
        if (!$validacion) return redirect()->route('admin.listar.convenios')->with('errorConvenio', 'Problemas al crear el copnvenio.');

        $convenio = new Convenios();
        $convenio->conv_nombre = $request->input('nombre');
        $convenio->conv_tipo = $request->input('tipo');
        $convenio->conv_descripcion = $request->input('descripcion');
        $convenio->conv_nombre_archivo = $request->input('nombrearchivo');

        $convenio->conv_visible = $request->input('visible', 1);
        //TODO: SI NO QUEREMOS MORIR, CAMBIAR ESTO
        $convenio->conv_creado = now();
        $convenio->conv_actualizado = now();

        $convenio->conv_nickname_mod = Session::get('admin')->usua_nickname;
        $convenio->conv_rol_mod = Session::get('admin')->rous_codigo;

        //Obtener la extension del FILE subido
        $archivo = $request->file('archivo');
        $extension = $archivo->getClientOriginalExtension();
        $rutaConvenio = 'files/convenios/' . $request->input('nombrearchivo') . '.'. $extension;

        if (File::exists(public_path($rutaConvenio))) File::delete(public_path($rutaConvenio));
        $moverArchivo = $archivo->move(public_path('files/convenios'), $request->input('nombrearchivo') . '.'. $extension);
        if (!$moverArchivo) {
            return redirect()->back()->with('errorConvenio', 'Ocurrió un error durante el registro del convenio, intente más tarde.')->withInput();
        }

        $convenio->conv_ruta_archivo = 'files/convenios/' . $request->input('nombrearchivo') . '.'. $extension;

        $convenio->save();

        return redirect()->back()->with('exitoConvenio', 'Convenio creado existosamente')->withInput();
    }

    //TODO: Parametro Sedes
    public function listarSedes()
    {
        return view('admin.parametros.sedes', [
            'sedes' => Sedes::orderBy('sede_codigo', 'asc')->get()
        ]);
    }

    public function crearSede(Request $request)
    {
        // Validar los datos enviados en el formulario
        $validatedData = $request->validate([
            'sede_nombre' => 'required|string',
            'sede_meta_estudiantes' => 'required|numeric',
            'sede_meta_docentes' => 'required|numeric',
            /* 'sede_meta_socios' => 'required|numeric',
            'sede_meta_iniciativas' => 'required|numeric', */
        ], [
            'sede_nombre.required' => 'El campo Nombre de la sede es requerido.',
            'sede_meta_estudiantes.required' => 'El campo Estudiantes es requerido.',
            'sede_meta_docentes.required' => 'El campo Docentes es requerido.',
            /* 'sede_meta_socios.required' => 'El campo Socios es requerido.', */
            /* 'sede_meta_iniciativas.required' => 'El campo Iniciativas es requerido.', */
            'sede_meta_estudiantes.numeric' => 'El campo Estudiantes debe ser numérico.',
            'sede_meta_docentes.numeric' => 'El campo Docentes debe ser numérico.',
            /* 'sede_meta_socios.numeric' => 'El campo Socios debe ser numérico.',
            'sede_meta_iniciativas.numeric' => 'El campo Iniciativas debe ser numérico.', */
        ]);

        // Crear una nueva instancia del modelo Sede
        $sede = new Sedes();
        $sede->sede_nombre = $request->input('sede_nombre');
        $sede->sede_descripcion = $request->input('sede_descripcion');
        $sede->sede_direccion = $request->input('direccion');
        $sede->sede_meta_estudiantes = $request->input('sede_meta_estudiantes');
        $sede->sede_meta_docentes = $request->input('sede_meta_docentes');
        $sede->sede_meta_socios = $request->input('sede_meta_socios');
        $sede->sede_meta_iniciativas = $request->input('sede_meta_iniciativas');

        // Obtener los datos de la sesión
        $sede->sede_visible = $request->input('sede_visible', 1);
        $sede->sede_creado = Session::get('sede_creado');
        $sede->sede_actualizado = Session::get('sede_actualizado');
        $sede->sede_nickname_mod = Session::get('admin')->usua_nickname;
        $sede->sede_rol_mod = Session::get('admin')->rous_codigo;

        // Guardar la sede en la base de datos
        $sede->save();

        // Redireccionar o realizar alguna acción adicional si es necesario
        return redirect()->back()->with('success', 'Sede creada exitosamente');
    }

    public function eliminarSedes(Request $request)
    {
        $verificarDrop = Sedes::where('sede_codigo', $request->sedecodigo)->first();

        if (!$verificarDrop) {
            return redirect()->route('admin.listar.sedes')->with('errorSede', 'El campus no se encuentra registrado en el sistema.');
        }

        $sededrop = Sedes::where('sede_codigo', $request->sedecodigo)->delete();
        if (!$sededrop) {
            return redirect()->back()->with('errorSede', 'Ocurrió un error en el sistema.');
        }

        return redirect()->route('admin.listar.sedes')->with('exitoSede', 'El campus fue eliminado correctamente.');
    }

    public function actualizarSedes(Request $request, $sede_codigo)
    {
        $sede = Sedes::find($sede_codigo);

        if (!$sede) {
            return redirect()->route('admin.listar.sedes')->with('errorSede', 'El campus no se encuentra registrado en el sistema.');
        }

        // Validar los datos enviados en el formulario
        $validatedData = $request->validate([
            'sede_nombre' => 'required|string',
            'sede_meta_estudiantes' => 'required|numeric',
            'sede_meta_docentes' => 'required|numeric',
            /* 'sede_meta_socios' => 'required|numeric',
            'sede_meta_iniciativas' => 'required|numeric', */
        ], [
            'sede_nombre.required' => 'El campo Nombre de la sede es requerido.',
            'sede_meta_estudiantes.required' => 'El campo Estudiantes es requerido.',
            'sede_meta_docentes.required' => 'El campo Docentes es requerido.',
            /* 'sede_meta_socios.required' => 'El campo Socios es requerido.',
            'sede_meta_iniciativas.required' => 'El campo Iniciativas es requerido.', */
            'sede_meta_estudiantes.numeric' => 'El campo Estudiantes debe ser numérico.',
            'sede_meta_docentes.numeric' => 'El campo Docentes debe ser numérico.',
            /* 'sede_meta_socios.numeric' => 'El campo Socios debe ser numérico.',
            'sede_meta_iniciativas.numeric' => 'El campo Iniciativas debe ser numérico.', */
        ]);

        $sede->sede_nombre = $request->input('sede_nombre');
        $sede->sede_descripcion = $request->input('sede_descripcion');
        $sede->sede_direccion = $request->input('direccion');
        $sede->sede_meta_estudiantes = $request->input('sede_meta_estudiantes');
        $sede->sede_meta_docentes = $request->input('sede_meta_docentes');
        $sede->sede_meta_socios = $request->input('sede_meta_socios');
        $sede->sede_meta_iniciativas = $request->input('sede_meta_iniciativas');

        // Resto de la lógica para actualizar la sede
        $sede->save(); // Guardar los cambios en la base de datos

        return redirect()->route('admin.listar.sedes')->with('exitoSede', 'El campus fue actualizado correctamente.');
    }

    //TODO: Parametro Carreras
    public function listarCarreras()
    {
        $carreras = Carreras::orderBy('care_codigo', 'asc')->get();
        $escuelas = Escuelas::orderBy('escu_codigo', 'asc')->get();

        return view('admin.parametros.carreras', [
            'carreras' => $carreras,
            'escuelas' => $escuelas
        ]);
    }

    public function eliminarCarreras(Request $request)
    {
        $verificarDrop = Carreras::where('care_codigo', $request->care_codigo)->first();
        if (!$verificarDrop) {
            return redirect()->route('admin.listar.carreras')->with('errorCarrera', 'La carrera no se encuentra registrada en el sistema.');
        }
        $Drop = Carreras::where('care_codigo', $request->care_codigo)->delete();
        if (!$Drop) {
            return redirect()->back()->with('errorCarrera', 'La carrera no se pudo eliminar, intente más tarde.');
        }

        return redirect()->route('admin.listar.carreras')->with('exitoCarrera', 'La carrera fue eliminada correctamente.');
    }

    public function actualizarCarreras(Request $request, $care_codigo)
    {
        // Obtener la carrera por su código
        $carrera = Carreras::where('care_codigo', $care_codigo)->first();

        // Verificar si la carrera existe
        if (!$carrera) {
            return redirect()->back()->with('errorCarrera', 'La carrera no se encuentra registrada en el sistema.');
        }

        $validacion = $request->validate([
            'care_nombre' => 'required|max:255',
            /* 'care_director' => 'required|max:100', */
            /* 'care_institucion' => 'required|max:100', */
            'escu_codigo' => 'required',
        ], [
            'care_nombre.required' => 'El nombre es requerido.',
            'care_nombre.max' => 'El nombre excede el máximo de caracteres permitidos (255).',
            /* 'care_director.required' => 'El nombre del director es requerido.',
            'care_director.max' => 'El nombre del director excede el máximo de caracteres permitidos (100).', */
            /* 'care_institucion.required' => 'El nombre de la institución es requerido.',
            'care_institucion.max' => 'El nombre de la institución excede el máximo de caracteres permitidos (100).', */
            'escu_codigo.required' => 'Seleccione una escuela.',
        ]);

        if (!$validacion) {
            return redirect()->back()->with('errorCarrera', 'Problemas al actualizar la carrera.');
        }

        // Actualizar los campos de la carrera con los valores del formulario
        $carrera->care_nombre = $request->input('care_nombre');
        $carrera->care_descripcion = $request->input('care_descripcion');
        $carrera->care_director = $request->input('care_director');
        $carrera->care_institucion = $request->input('care_institucion',1);
        $carrera->escu_codigo = $request->input('escu_codigo');

        // Guardar los cambios en la carrera
        $carrera->save();

        return redirect()->back()->with('exitoCarrera', 'La carrera ha sido actualizada correctamente.');
    }


    public function crearCarreras(Request $request)
    {
        $validacion = $request->validate([
            'care_nombre' => 'required|max:255',
            /* 'care_director' => 'required|max:100', */
            /* 'care_institucion' => 'required|max:100', */
            'escu_codigo' => 'required',
        ], [
            'care_nombre.required' => 'El nombre es requerido.',
            'care_nombre.max' => 'El nombre excede el máximo de caracteres permitidos (255).',
            /* 'care_director.required' => 'El nombre del director es requerido.',
            'care_director.max' => 'El nombre del director excede el máximo de caracteres permitidos (100).', */
            /* 'care_institucion.required' => 'El nombre de la institución es requerido.',
            'care_institucion.max' => 'El nombre de la institución excede el máximo de caracteres permitidos (100).', */
            'escu_codigo.required' => 'Seleccione una escuela.',
        ]);

        if (!$validacion) {
            return redirect()->route('admin.listar.escuelas')->with('errorEscuela', 'Problemas al crear la escuela.');
        }

        $carrera = new Carreras();
        $carrera->care_nombre = $request->input('care_nombre');
        $carrera->care_descripcion = $request->input('care_descripcion');
        $carrera->care_director = $request->input('care_director');
        /* $carrera->care_institucion = $request->input('care_institucion'); */
        $carrera->escu_codigo = $request->input('escu_codigo');

        // Guardar la carrera en la base de datos
        $carrera->save();

        return redirect()->back()->with('exitoCarrera', 'Carrera creada exitosamente');
    }


    //TODO: Parametro Escuelas
    public function listarEscuelas()
    {
        return view('admin.parametros.escuelas', [
            'escuelas' => Escuelas::orderBy('escu_codigo', 'asc')->get()
        ]);
    }

    public function eliminarEscuelas(Request $request)
    {
        $verificarDrop = Escuelas::where('escu_codigo', $request->escu_codigo)->first();
        if (!$verificarDrop) {
            return redirect()->route('admin.listar.escuelas')->with('errorEscuela', 'La escuela no se encuentra registrada en el sistema.');
        }
        $Drop = Escuelas::where('escu_codigo', $request->escu_codigo)->delete();
        if (!$Drop) {
            return redirect()->back()->with('errorEscuela', 'La escuela no se pudo eliminar, intente más tarde.');
        }

        return redirect()->route('admin.listar.escuelas')->with('exitoEscuela', 'La escuela fue eliminada correctamente.');
    }

    public function actualizarEscuelas(Request $request, $escu_codigo)
    {
        // Obtener la escuela por su código
        $escuela = Escuelas::where('escu_codigo', $escu_codigo)->first();

        // Verificar si la escuela existe
        if (!$escuela) {
            return redirect()->back()->with('errorEscuela', 'La escuela no se encuentra registrada en el sistema.');
        }

        // Validar los campos del formulario
        $validacion = $request->validate([
            'escu_nombre' => 'required|max:255',
            'escu_director' => 'required|max:255',
        ], [
            'escu_nombre.required' => 'El nombre de la escuela es requerido.',
            'escu_nombre.max' => 'El nombre de la escuela excede el máximo de caracteres permitidos (255).',
            'escu_director.required' => 'El nombre del director es requerido.',
            'escu_director.max' => 'El nombre del director excede el máximo de caracteres permitidos (255).',
        ]);

        // Actualizar los campos de la escuela con los valores del formulario
        $escuela->escu_nombre = $request->input('escu_nombre');
        $escuela->escu_descripcion = $request->input('descripcion');
        $escuela->escu_director = $request->input('escu_director');

        // Guardar los cambios en la escuela
        $escuela->save();

        return redirect()->back()->with('exitoEscuela', 'La escuela ha sido actualizada correctamente.');
    }


    public function crearEscuelas(Request $request)
    {
        $validacion = $request->validate(
            [
                'nombre' => 'required|max:255',
                'director' => 'required|max:100',
            ],
            [
                'nombre.required' => 'El nombre es requerido.',
                'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (255).',
                'director.required' => 'El nombre del director es requerido.',
                'director.max' => 'El nombre del director excede el máximo de caracteres permitidos (100).',
            ]
        );
        if (!$validacion) return redirect()->route('admin.listar.escuelas')->with('errorEscuela', 'Problemas al crear la escuela.');

        $escuela = new Escuelas();
        /* $escuela->escu_codigo = Escuelas::count() + 1; */ //TODO: ERROR DE ESCUELA
        $escuela->escu_nombre = $request->input('nombre');
        $escuela->escu_descripcion = $request->input('descripcion');
        $escuela->escu_director = $request->input('director');
        /* $escuela->escu_intitucion = $request->input('institucion',1); */

        $escuela->escu_visible = $request->input('care_visible', 1);
        //TODO: SI NO QUEREMOS MORIR, CAMBIAR ESTO
        $escuela->escu_creado = now();
        $escuela->escu_actualizado = now();

        $escuela->escu_nikcname_mod = Session::get('admin')->usua_nickname;
        $escuela->escu_rol_mod = Session::get('admin')->rous_codigo;

        $escuela->save();

        return redirect()->back()->with('exitoEscuela', 'Escuela creada existosamente');
    }

    //TODO: Parametro Sociso COmunitarios
    public function listarSocios()
    {
        $socios = SociosComunitarios::orderBy('soco_codigo', 'asc')->get();
        $sedesT = Sedes::orderBy('sede_codigo', 'asc')->get();
        $SedeSocios = SedesSocios::all();
        $grupos = GruposInteres::orderBy('grin_codigo', 'asc')->get();

        return view('admin.parametros.socios', compact('sedesT', 'socios', 'SedeSocios','grupos'));

    }

    public function eliminarSocios(Request $request)
    {
        $verificarDrop = SociosComunitarios::where('soco_codigo', $request->soco_codigo)->first();
        if (!$verificarDrop) {
            return redirect()->route('admin.listar.socios')->with('errorSocio', 'El socio comunitario no se encuentra registrado en el sistema.');
        }
        /* $Drop = SedesSocios::where('soco_codigo', $request->soco_codigo)->delete(); */
        $Drop = SociosComunitarios::where('soco_codigo', $request->soco_codigo)->delete();
        if (!$Drop) {
            return redirect()->back()->with('errorSocio', 'El socio comunitario no se pudo eliminar, intente más tarde.');
        }
        return redirect()->route('admin.listar.socios')->with('exitoSocio', 'El socio comunitario fue eliminado correctamente.');
    }

    public function actualizarSocios(Request $request, $soco_codigo)
    {
        // Obtener la escuela por su código
        $socio = SociosComunitarios::where('soco_codigo', $soco_codigo)->first();

        // Verificar si la escuela existe
        if (!$socio) {
            return redirect()->back()->with('errorSocio', 'El socio comunitario no se encuentra registrado en el sistema.');
        }

        // Validar los campos del formulario
        $validacion = $request->validate(
            [
                'nombre' => 'required|max:255',
                'nombre_contraparte' => 'required|max:255',
                /* 'domicilio' => 'required|max:255', */
                /* 'telefono' => 'required|max:255', */
                /* 'email' => 'required|max:255', */
                /* 'sedesT' => 'required_without_all:nacional', // 'sedesT' es requerido si 'nacional' no está marcado
                'nacional' => 'required_without_all:sedesT', // 'nacional' es requerido si no se selecciona ninguna sede */

            ],
            [
                'nombre.required' => 'El nombre del socio comunitario es requerido.',
                'nombre.max' => 'El nombre del socio comunitario excede el máximo de caracteres permitidos (255).',
                'nombre_contraparte.required' => 'El nombre de la contraparte es requerido.',
                'nombre_contraparte.max' => 'El nombre de la contraparte excede el máximo de caracteres permitidos (255).',
                /* 'domicilio.required' => 'El domicilio de la contraparte es requerido.',
                'domicilio.max' => 'El domicilio de la contraparte excede el máximo de caracteres permitidos (255).',
                'telefono.required' => 'El teléfono de la contraparte del director es requerido.',
                'telefono.max' => 'El teléfono de la contraparte excede el máximo de caracteres permitidos (255).',
                'email.required' => 'El email de la contraparte es requerido.',
                'email.max' => 'El email de la contraparte excede el máximo de caracteres permitidos (255).', */
                /* 'sedesT.required_without_all' => 'Es necesario que seleccione al menos una sede a la cual este asociada el socio comunitario.',
                'nacional.required_without_all' => 'Es necesario que seleccione al menos una sede a la cual este asociada el socio comunitario.', */

            ]
        );

        /* $Drop = SedesSocios::where('soco_codigo', $soco_codigo)->delete(); */
        /* if (!$Drop) {
            return redirect()->back()->with('errorSocio', $soco_codigo);
        } */
        $socio = SociosComunitarios::where(['soco_codigo' => $soco_codigo])->update([
            'grin_codigo' => $request->input('grupo'),
            'soco_nombre_socio' => $request->input('nombre'),
            'soco_nombre_contraparte' => $request->input('nombre_contraparte'),
            'soco_domicilio_socio' => $request->input('domicilio'),
            'soco_telefono_contraparte' => $request->input('telefono'),
            'soco_email_contraparte' => $request->input('email'),
        ]);

        /* $seso = [];

        if ($request->has('nacional')) {
            $sedes = Sedes::select('sede_codigo')->orderBy('sede_codigo', 'asc')->get();
            foreach ($sedes as $sede) {
                array_push($seso, [
                    'sede_codigo' => $sede->sede_codigo,
                    'soco_codigo' => $soco_codigo,
                    'seso_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                    'seso_nickname_mod' => Session::get('admin')->usua_nickname,
                    'seso_rol_mod' => Session::get('admin')->rous_codigo,
                ]);
            }
        } else {
            $sedes = $request->input('sedesT', []);
            foreach ($sedes as $sede) {
                array_push($seso, [
                    'sede_codigo' => $sede,
                    'soco_codigo' => $soco_codigo,
                    'seso_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                    'seso_nickname_mod' => Session::get('admin')->usua_nickname,
                    'seso_rol_mod' => Session::get('admin')->rous_codigo,
                ]);
            }
        } */



        /* $sesoCrear = SedesSocios::insert($seso);
        if (!$sesoCrear) {
            SedesSocios::where('soco_codigo', $soco_codigo)->delete();
            return redirect()->back()->with('socoError', 'Ocurrió un error durante el registro de las sedes, intente más tarde.')->withInput();
        } */

        return redirect()->back()->with('exitoSocio', 'El socio comunitario ha sido actualizado correctamente.')->withInput();
    }


    public function crearSocios(Request $request)
    {
        $validacion = $request->validate(
            [
                'nombre' => 'required|max:255',
                'nombre_contraparte' => 'required|max:255',
                /* 'domicilio' => 'required|max:255', */
                /* 'telefono' => 'required|max:255', */
                /* 'email' => 'required|max:255', */
                /* 'sedesT' => 'required_without_all:nacional', // 'sedesT' es requerido si 'nacional' no está marcado
                'nacional' => 'required_without_all:sedesT', // 'nacional' es requerido si no se selecciona ninguna sede */

            ],
            [
                'nombre.required' => 'El nombre del socio comunitario es requerido.',
                'nombre.max' => 'El nombre del socio comunitario excede el máximo de caracteres permitidos (255).',
                'nombre_contraparte.required' => 'El nombre de la contraparte es requerido.',
                'nombre_contraparte.max' => 'El nombre de la contraparte excede el máximo de caracteres permitidos (255).',
                /* 'domicilio.required' => 'El domicilio de la contraparte es requerido.',
                'domicilio.max' => 'El domicilio de la contraparte excede el máximo de caracteres permitidos (255).',
                'telefono.required' => 'El teléfono de la contraparte del director es requerido.',
                'telefono.max' => 'El teléfono de la contraparte excede el máximo de caracteres permitidos (255).',
                'email.required' => 'El email de la contraparte es requerido.',
                'email.max' => 'El email de la contraparte excede el máximo de caracteres permitidos (255).', */
                /* 'sedesT.required_without_all' => 'Es necesario que seleccione al menos una sede a la cual este asociada el socio comunitario.',
                'nacional.required_without_all' => 'Es necesario que seleccione al menos una sede a la cual este asociada el socio comunitario.', */

            ]
        );
        if (!$validacion) return redirect()->route('admin.listar.socios')->with('errorSocio', 'Problemas al crear el socio comunitario.');

        $socoCrear = SociosComunitarios::insertGetId([
            'soco_nombre_socio' => $request->nombre,
            'soco_nombre_contraparte' => $request->nombre_contraparte,
            'soco_domicilio_socio' => $request->domicilio,
            'soco_telefono_contraparte' => $request->telefono,
            'soco_email_contraparte' => $request->email,
            'grin_codigo' => $request->grupo,
        ]);

        /* if (!$socoCrear) {
            return redirect()->back()->with('socoError', 'Ocurrió un error al ingresar al socio, intente más tarde.')->withInput();
        }


        $soco_codigo = $socoCrear;
        $seso = [];

        if ($request->has('nacional')) {
            $sedes = Sedes::select('sede_codigo')->orderBy('sede_codigo', 'asc')->get();
            foreach ($sedes as $sede) {
                array_push($seso, [
                    'sede_codigo' => $sede->sede_codigo,
                    'soco_codigo' => $soco_codigo,
                    'seso_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                    'seso_nickname_mod' => Session::get('admin')->usua_nickname,
                    'seso_rol_mod' => Session::get('admin')->rous_codigo,
                ]);
            }
        } else {
            $sedes = $request->input('sedesT', []);
            foreach ($sedes as $sede) {
                array_push($seso, [
                    'sede_codigo' => $sede,
                    'soco_codigo' => $soco_codigo,
                    'seso_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                    'seso_nickname_mod' => Session::get('admin')->usua_nickname,
                    'seso_rol_mod' => Session::get('admin')->rous_codigo,
                ]);
            }
        }

        $sesoCrear = SedesSocios::insert($seso);
        if (!$sesoCrear) {
            SedesSocios::where('inic_codigo', $soco_codigo)->delete();
            return redirect()->back()->with('socoError', 'Ocurrió un error durante el registro de las sedes, intente más tarde.')->withInput();
        } */

        return redirect()->back()->with('socoExito', 'Se agregó el socio comunitario correctamente.')->withInput();
    }


    //TODO: funciones de mecanismos para parametrizar
    public function listarMecanismos()
    {
        $mecanismos = Mecanismos::join('tipo_iniciativa', 'mecanismos.tmec_codigo', '=', 'tipo_iniciativa.tmec_codigo')
            ->select('mecanismos.*', 'tipo_iniciativa.tmec_nombre')
            ->orderBy('mecanismos.meca_codigo', 'asc')
            ->get();

        $tipos = TipoIniciativas::orderBy('tmec_codigo', 'asc')->get();

        return view('admin.parametros.mecanismos', compact('mecanismos', 'tipos'));
    }

    public function crearMecanismos(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'meca_nombre' => 'required|max:255',
            'tipo' => 'required',
        ], [
            'meca_nombre.required' => 'El nombre del mecanismo es requerido.',
            'meca_nombre.max' => 'El nombre del mecanismo excede el máximo de caracteres permitidos (255).',
            'tipo.required' => 'Seleccione un tipo de iniciativa.',
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.mecanismos.listar')->withErrors($validacion)->withInput();
        }

        Mecanismos::create([
            'meca_nombre' => $request->input('meca_nombre'),
            'tmec_codigo' => $request->input('tipo'),
            // Añade el resto de los campos del modelo si son necesarios.
        ]);

        return redirect()->route('admin.listar.mecanismos')
            ->with('exitoMecanismo', 'Mecanismo creado exitosamente.');
    }

    public function eliminarMecanismos(Request $request)
    {
        $mecanismo = Mecanismos::where('meca_codigo', $request->meca_codigo)->first();

        if (!$mecanismo) {
            return redirect()->route('admin.listar.mecanismos')->with('errorMecanismo', 'El mecanismo no se encuentra registrado en el sistema.');
        }

        $mecanismo->delete();

        return redirect()->route('admin.listar.mecanismos')->with('exitoMecanismo', 'El mecanismo fue eliminado correctamente.');
    }

    public function actualizarMecanismos(Request $request, $meca_codigo)
    {
        $validacion = Validator::make($request->all(), [
            'meca_nombre' => 'required|max:255',
            'tipo' => 'required',
        ], [
            'meca_nombre.required' => 'El nombre del mecanismo es requerido.',
            'meca_nombre.max' => 'El nombre del mecanismo excede el máximo de caracteres permitidos (255).',
            'tipo.required' => 'Seleccione un tipo de iniciativa.',
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.mecanismos')->withErrors($validacion)->withInput();
        }

        $mecanismo = Mecanismos::find($meca_codigo);

        if (!$mecanismo) {
            return redirect()->route('admin.listar.mecanismos')->with('errorMecanismo', 'El mecanismo no se encuentra registrado en el sistema.');
        }

        $mecanismo->meca_nombre = $request->input('meca_nombre');
        $mecanismo->tmec_codigo = $request->input('tipo');
        // Añade el resto de los campos del modelo si son necesarios.
        $mecanismo->save();

        return redirect()->route('admin.listar.mecanismos')->with('exitoMecanismo', 'Mecanismo actualizado exitosamente.');
    }


    //TODO: funciones de grupos interes
    public function listarGrupos()
    {
        $grupos_int = GruposInteres::all();
        return view('admin.parametros.grupos', compact('grupos_int'));
    }

    public function crearGrupo(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'grin_nombre' => 'required|max:255',
        ], [
            'grin_nombre.required' => 'El nombre del grupo es requerido.',
            'grin_nombre.max' => 'El nombre del grupo excede el máximo de caracteres permitidos (255).',
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.grupos_int')->withErrors($validacion)->withInput();
        }

        $grupo = new GruposInteres();
        $grupo->grin_nombre = $request->input('grin_nombre');
        // Añade el resto de los campos del modelo si son necesarios.
        $grupo->save();

        return redirect()->route('admin.listar.grupos_int')->with('exitoGrupo', 'Grupo de interes creado exitosamente.');
    }

    public function eliminarGrupo(Request $request)
    {
        $grupo = GruposInteres::where('grin_codigo', $request->grin_codigo)->first();

        if (!$grupo) {
            return redirect()->route('admin.listar.grupos_int')->with('errorGrupo', 'El grupo de interes no se encuentra registrado en el sistema.');
        }

        $grupo->delete();

        return redirect()->route('admin.listar.grupos_int')->with('exitoGrupo', 'El grupo de interes fue eliminado correctamente.');
    }

    public function actualizarGrupos(Request $request, $grin_codigo)
    {
        $validacion = Validator::make($request->all(), [
            'grin_nombre' => 'required|max:255',
        ], [
            'grin_nombre.required' => 'El nombre del grupo es requerido.',
            'grin_nombre.max' => 'El nombre del grupo excede el máximo de caracteres permitidos (255).',
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.grupos_int')->withErrors($validacion)->withInput();
        }

        $grupo = GruposInteres::find($grin_codigo);

        if (!$grupo) {
            return redirect()->route('admin.listar.grupos_int')->with('errorGrupo', 'El grupo de interes no se encuentra registrado en el sistema.');
        }

        $grupo->grin_nombre = $request->input('grin_nombre');
        // Añade el resto de los campos del modelo si son necesarios.
        $grupo->save();

        return redirect()->route('admin.listar.grupos_int')->with('exitoGrupo', 'Grupo de interes actualizado exitosamente.');
    }

    //TODO: funciones para el tipo de actividad
    public function listarTipoact()
    {
        // Obtener todos los tipos de actividad desde la base de datos
        $tipoact = TipoActividades::all();
        return view('admin.parametros.tipoactividad', compact('tipoact'));
    }


    public function crearTipoact(Request $request)
    {
        $request->validate([
            'tiac_nombre' => 'required|max:255',
        ]);

        TipoActividades::create([
            'tiac_nombre' => $request->input('tiac_nombre'),

        ]);

        return redirect()->route('admin.listar.tipoact')->with('exitoTipoact', 'El Tipo de actividad se creó correctamente.');
    }

    public function actualizarTipoact(Request $request, $tiac_codigo)
    {
        $request->validate([
            'tiac_nombre' => 'required|max:255',
        ]);

        $tipoact = TipoActividades::find($tiac_codigo);
        if (!$tipoact) {
            return redirect()->route('admin.listar.tipoact')->with('errorTipoact', 'Tipo de actividad no encontrado.');
        }

        $tipoact->update([
            'tiac_nombre' => $request->input('tiac_nombre'),
        ]);

        return redirect()->route('admin.listar.tipoact')->with('exitoTipoact', 'El Tipo de actividad se actualizó correctamente.');
    }

    public function eliminarTipoact(Request $request)
    {
        $request->validate([
            'tiac_codigo' => 'required|numeric',
        ]);

        $tipoact = TipoActividades::find($request->input('tiac_codigo'));
        if (!$tipoact) {
            return redirect()->route('admin.listar.tipoact')->with('errorTipoact', 'Tipo de actividad no encontrado.');
        }

        $tipoact->delete();

        return redirect()->route('admin.listar.tipoact')->with('exitoTipoact', 'El Tipo de actividad se eliminó correctamente.');
    }

    //TODO: funciones de tematicas
    public function listarTematica()
    {
        $tematica = Tematicas::all();
        return view('admin.parametros.tematica', compact('tematica'));
    }

    public function crearTematica(Request $request)
    {
        $request->validate([
            'tema_nombre' => 'required|max:255|unique:tematicas'
        ]);

        $tematica = new Tematicas();
        $tematica->tema_nombre = $request->tema_nombre;
        $tematica->save();

        return redirect()->route('admin.listar.tematica')->with('exitoTematica', 'Tematica creada exitosamente.');
    }

    public function actualizarTematica(Request $request, $tema_codigo)
    {
        $request->validate([
            'tema_nombre' => 'required|max:255|unique:tematicas,tema_nombre,' . $tema_codigo . ',tema_codigo'
        ]);

        $tematica = Tematicas::find($tema_codigo);
        if ($tematica) {
            $tematica->tema_nombre = $request->tema_nombre;
            $tematica->save();
            return redirect()->route('admin.listar.tematica')->with('exitoTematica', 'Tematica actualizada exitosamente.');
        }

        return redirect()->route('admin.listar.tematica')->with('errorTematica', 'La Tematica no fue encontrada.');
    }

    public function eliminarTematica(Request $request)
    {
        $tema_codigo = $request->tema_codigo;
        $tematica = Tematicas::find($tema_codigo);
        if ($tematica) {
            $tematica->delete();
            return redirect()->route('admin.listar.tematica')->with('exitoTematica', 'Tematica eliminada exitosamente.');
        }

        return redirect()->route('admin.listar.tematica')->with('errorTematica', 'La Tematica no fue encontrada.');
    }

        /* $socio = new SociosComunitarios();
        $socio->sugr_codigo = $request->input('grupo',1);
        $socio->soco_nombre_socio = $request->input('nombre');
        $socio->soco_nombre_contraparte = $request->input('nombre_contraparte');
        $socio->soco_domicilio_socio = $request->input('domicilio');
        $socio->soco_telefono_contraparte = $request->input('telefono');
        $socio->soco_email_contraparte = $request->input('email'); */

        /* $socio->soco_visible = $request->input('care_visible', 1);
        //TODO: SI NO QUEREMOS MORIR, CAMBIAR ESTO
        $socio->soco_creado = now();
        $socio->soco_actualizado = now();

        $socio->soco_nikcname_mod = Session::get('admin')->usua_nickname;
        $socio->soco_rol_mod = Session::get('admin')->rous_codigo; */

    //TODO: Unidad
//--------------------------------------
//CAMBIAR NOMBRE MODELO POR: Unidades
//--------------------------------------

public function listarUnidades()
{

    $REGISTROS = Unidades::orderBy('unid_codigo', 'asc')->get();
    $REGISTROS2 = TipoUnidades::orderBy('tuni_codigo', 'asc')->get();

    return view('admin.parametros.unidades', [
        'REGISTROS' => $REGISTROS,
        'REGISTROS2' => $REGISTROS2
    ]);
}

public function crearUnidades(Request $request)
{
    $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:100',
        /* 'idcampo1' => 'required', */
    ], [
        'nombre.required' => 'El nombre es requerido.',
        'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
        /* 'idcampo1.required' => 'El idcampo1 es requerido.', */
    ]);

    if ($validacion->fails()) {
        return redirect()->route('admin.listar.unidades')->withErrors($validacion)->withInput();
    }

    $nuevo = new Unidades();
    $nuevo->unid_nombre = $request->input('nombre');
    $nuevo->tuni_codigo = $request->input('select_join');
    $nuevo->unid_descripcion = $request->input('descripcion');
    $nuevo->unid_responsable = $request->input('responsable');
    $nuevo->unid_nombre_cargo = $request->input('nombre_cargo');
    $nuevo->unid_creado = Carbon::now()->format('Y-m-d H:i:s');
    $nuevo->unid_actualizado = Carbon::now()->format('Y-m-d H:i:s');
    $nuevo->unid_visible = 1;
    $nuevo->unid_nickname_mod = Session::get('admin')->usua_nickname;
    $nuevo->unid_rol_mod = Session::get('admin')->rous_codigo;

    $nuevo->save();

    return redirect()->back()->with('exito', 'Unidad creada exitosamente');
}

public function eliminarUnidades(Request $request)
{
    $eliminado = Unidades::where('unid_codigo', $request->unid_codigo)->first();
    if (!$eliminado) {return redirect()->route('admin.listar.unidades')->with('error', 'La Unidad no se encuentra registrada en el sistema.');}

    $eliminado = Unidades::where('unid_codigo', $request->unid_codigo)->delete();
    return redirect()->route('admin.listar.unidades')->with('exito', 'La Unidad fue eliminada correctamente.');
}

public function actualizarUnidades(Request $request, $unid_codigo)
{
    $validacion = Validator::make($request->all(), [
        'nombre' => 'required|max:100',
        /* 'idcampo1' => 'required', */
    ], [
        'nombre.required' => 'El nombre es requerido.',
        'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
        /* 'idcampo1.required' => 'El idcampo1 es requerido.', */
    ]);

    if ($validacion->fails()) {return redirect()->route('admin.listar.unidades')->withErrors($validacion)->withInput();}

    $editado = Unidades::find($unid_codigo);
    //return redirect()->route('admin.listar.ambitos')->with('errorAmbito', $amb_codigo);
    if (!$ambito) {return redirect()->route('admin.listar.unidades')->with('error', 'La Unidad no se encuentra registrada en el sistema.')->withInput();}

    $editado->unid_nombre = $request->input('nombre');
    $editado->tuni_codigo = $request->input('select_join');
    $editado->unid_descripcion = $request->input('descripcion');
    $editado->unid_responsable = $request->input('responsable');
    $editado->unid_nombre_cargo = $request->input('nombre_cargo');
    $editado->unid_actualizado = Carbon::now()->format('Y-m-d H:i:s');
    $editado->unid_visible = 1;
    $editado->unid_nickname_mod = Session::get('admin')->usua_nickname;
    $editado->unid_rol_mod = Session::get('admin')->rous_codigo;
    $editado->save();

    return redirect()->back()->with('exito', 'Unidad actualizada exitosamente')->withInput();;
}
    //TODO: SubUnidad
    //--------------------------------------
    //CAMBIAR NOMBRE MODELO POR: SubUnidades
    //--------------------------------------

    public function listarSubUnidades()
        {

            $REGISTROS = SubUnidades::orderBy('suni_codigo', 'asc')->get();
            $REGISTROS2 = Unidades::orderBy('unid_codigo', 'asc')->get();

            return view('admin.parametros.subunidades', [
                'REGISTROS' => $REGISTROS,
                'REGISTROS2' => $REGISTROS2
            ]);
        }

    public function crearSubUnidades(Request $request)
        {
            $validacion = Validator::make($request->all(), [
                'nombre' => 'required|max:100',
                'select_join' => 'required',
                /* 'idcampo1' => 'required', */
            ], [
                'nombre.required' => 'El nombre es requerido.',
                'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
                'select_join.required' => 'La unidad es requerida.',
            ]);

            if ($validacion->fails()) {
                return redirect()->route('admin.listar.subunidades')->withErrors($validacion)->withInput();
            }

            $nuevo = new SubUnidades();
            $nuevo->suni_nombre = $request->input('nombre');
            $nuevo->unid_codigo = $request->input('select_join');
            $nuevo->suni_responsable = $request->input('responsable');
            $nuevo->suni_descripcion = $request->input('descripcion');
            /* $nuevo->suni_idcampo1 = $request->input('idcampo1'); */
            $nuevo->suni_creado = Carbon::now()->format('Y-m-d H:i:s');
            $nuevo->suni_actualizado = Carbon::now()->format('Y-m-d H:i:s');
            $nuevo->suni_visible = 1;
            $nuevo->suni_nickname_mod = Session::get('admin')->usua_nickname;
            $nuevo->suni_rol_mod = Session::get('admin')->rous_codigo;

            $nuevo->save();

            return redirect()->back()->with('exito', 'SubUnidad creada exitosamente');
        }

    public function eliminarSubUnidades(Request $request)
        {
            $eliminado = SubUnidades::where('suni_codigo', $request->suni_codigo)->first();
            if (!$eliminado) {return redirect()->route('admin.listar.subunidades')->with('error', 'La SubUnidad no se encuentra registrada en el sistema.');}

            $eliminado = SubUnidades::where('suni_codigo', $request->suni_codigo)->delete();
            return redirect()->route('admin.listar.subunidades')->with('exito', 'La SubUnidad fue eliminada correctamente.');
        }

    public function actualizarSubUnidades(Request $request, $suni_codigo)
        {
            $validacion = Validator::make($request->all(), [
                'nombre' => 'required|max:100',
                'select_join' => 'required',
                /* 'idcampo1' => 'required', */
            ], [
                'nombre.required' => 'El nombre es requerido.',
                'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
                'select_join.required' => 'La unidad es requerida.',
            ]);


            if ($validacion->fails()) {return redirect()->route('admin.listar.subunidades')->withErrors($validacion)->withInput();}

            $editado = SubUnidades::find($suni_codigo);
            //return redirect()->route('admin.listar.ambitos')->with('errorAmbito', $amb_codigo);
            if (!$editado) {return redirect()->route('admin.listar.subunidades')->with('error', 'La SubUnidad no se encuentra registrada en el sistema.')->withInput();}

            $editado->suni_nombre = $request->input('nombre');
            $editado->unid_codigo = $request->input('select_join');
            $editado->suni_responsable = $request->input('responsable');
            $editado->suni_descripcion = $request->input('descripcion');
            $editado->suni_actualizado = Carbon::now()->format('Y-m-d H:i:s');
            $editado->suni_visible = 1;
            $editado->suni_nickname_mod = Session::get('admin')->usua_nickname;
            $editado->suni_rol_mod = Session::get('admin')->rous_codigo;
            $editado->save();

            return redirect()->back()->with('exito', 'SubUnidad actualizada exitosamente')->withInput();;
        }
        //TODO: Tipo de iniciativa
//--------------------------------------
//CAMBIAR NOMBRE MODELO POR: TipoIniciativas
//--------------------------------------

    public function listarTipoIniciativa()
    {
        return view('admin.parametros.tipoiniciativas', ['REGISTROS' => TipoIniciativas::orderBy('tmec_codigo', 'asc')->get()]);
    }

    public function crearTipoIniciativa(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            /* 'idcampo1' => 'required', */
        ], [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
            /* 'idcampo1.required' => 'El idcampo1 es requerido.', */
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.tipoiniciativa')->withErrors($validacion)->withInput();
        }

        $nuevo = new TipoIniciativas();
        $nuevo->tmec_nombre = $request->input('nombre');
        $nuevo->tmec_creado = Carbon::now()->format('Y-m-d H:i:s');
        $nuevo->tmec_actualizado = Carbon::now()->format('Y-m-d H:i:s');
        $nuevo->tmec_visible = 1;
        $nuevo->tmec_nickname_mod = Session::get('admin')->usua_nickname;
        $nuevo->tmec_rol_mod = Session::get('admin')->rous_codigo;

        $nuevo->save();

        return redirect()->back()->with('exito', 'Tipo de iniciativa creado exitosamente');
    }

    public function eliminarTipoIniciativa(Request $request)
    {
        $eliminado = TipoIniciativas::where('tmec_codigo', $request->tmec_codigo)->first();
        if (!$eliminado) {return redirect()->route('admin.listar.tipoiniciativa')->with('error', 'El Tipo de iniciativa no se encuentra registrado en el sistema.');}

        $eliminado = TipoIniciativas::where('tmec_codigo', $request->tmec_codigo)->delete();
        return redirect()->route('admin.listar.tipoiniciativa')->with('exito', 'El Tipo de iniciativa fue eliminado correctamente.');
    }

    public function actualizarTipoIniciativa(Request $request, $tmec_codigo)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            /* 'idcampo1' => 'required', */
        ], [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
            /* 'idcampo1.required' => 'El idcampo1 es requerido.', */
        ]);

        if ($validacion->fails()) {return redirect()->route('admin.listar.tipoiniciativa')->withErrors($validacion)->withInput();}

        $editado = TipoIniciativas::find($tmec_codigo);
        //return redirect()->route('admin.listar.ambitos')->with('errorAmbito', $amb_codigo);
        if (!$editado) {return redirect()->route('admin.listar.tipoiniciativa')->with('error', 'El Tipo de iniciativa no se encuentra registrado en el sistema.')->withInput();}

        $editado->tmec_nombre = $request->input('nombre');
        $editado->tmec_actualizado = Carbon::now()->format('Y-m-d H:i:s');
        $editado->tmec_visible = 1;
        $editado->tmec_nickname_mod = Session::get('admin')->usua_nickname;
        $editado->tmec_rol_mod = Session::get('admin')->rous_codigo;
        $editado->save();

        return redirect()->back()->with('exito', 'Tipo de iniciativa actualizado exitosamente')->withInput();;
    }
    }
