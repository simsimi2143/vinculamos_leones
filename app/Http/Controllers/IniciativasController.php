<?php

namespace App\Http\Controllers;

use App\Models\Grupos;
use App\Models\IniciativasComunas;
use App\Models\IniciativasEvidencias;
use App\Models\IniciativasGrupos;
use App\Models\IniciativasPais;
use App\Models\IniciativasParticipantes;
use App\Models\IniciativasRegiones;
use App\Models\IniciativasTematicas;
use App\Models\ParticipantesInternos;
use App\Models\SedesSocios;
use App\Models\SociosComunitarios;
use App\Models\SubGruposInteres;
use App\Models\Tematicas;
use App\Models\TipoActividades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Escuelas;
use App\Models\Carreras;
use App\Models\Iniciativas;
use App\Models\Mecanismos;
use App\Models\MecanismosActividades;
use App\Models\Pais;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Sedes;
use App\Models\Convenios;
use App\Models\SedesEscuelas;
use App\Models\Region;
use App\Models\Comuna;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class IniciativasController extends Controller
{
    public function listarIniciativas()
    {
        $iniciativas = Iniciativas::join('mecanismos', 'mecanismos.meca_codigo', 'iniciativas.meca_codigo')
            ->join('participantes_internos', 'participantes_internos.inic_codigo', 'iniciativas.inic_codigo')
            ->join('sedes', 'sedes.sede_codigo', 'participantes_internos.sede_codigo')
            ->join('escuelas', 'escuelas.escu_codigo', 'participantes_internos.escu_codigo')
            ->select(
                'iniciativas.inic_codigo',
                'iniciativas.inic_nombre',
                'iniciativas.inic_estado',
                'mecanismos.meca_nombre',
                DB::raw('GROUP_CONCAT(DISTINCT sedes.sede_nombre SEPARATOR ", ") as sedes'),
                DB::raw('GROUP_CONCAT(DISTINCT escuelas.escu_nombre SEPARATOR ", ") as escuelas')
            )
            ->groupBy('iniciativas.inic_codigo', 'iniciativas.inic_nombre', 'iniciativas.inic_estado', 'mecanismos.meca_nombre')
            ->get();

        return view('admin.iniciativas.listar', ["iniciativas" => $iniciativas]);
    }

    public function mostrarDetalles($inic_codigo)
    {

        $iniciativa = Iniciativas::join('convenios', 'convenios.conv_codigo', 'iniciativas.conv_codigo')
            ->join('tipo_actividades', 'tipo_actividades.tiac_codigo', 'iniciativas.tiac_codigo')
            ->join('mecanismos', 'mecanismos.meca_codigo', 'iniciativas.meca_codigo')
            ->select(
                'iniciativas.inic_codigo',
                'iniciativas.inic_nombre',
                'iniciativas.inic_pertinencia_local',
                'iniciativas.inic_pertinencia_territorial',
                'iniciativas.inic_anho',
                'iniciativas.inic_estado',
                'mecanismos.meca_nombre',
                'tipo_actividades.tiac_nombre',
                'convenios.conv_nombre'
            )
            ->where('iniciativas.inic_codigo', $inic_codigo)
            ->get();

        $participantes = ParticipantesInternos::join('sedes', 'sedes.sede_codigo', 'participantes_internos.sede_codigo')
            ->join('escuelas', 'escuelas.escu_codigo', 'participantes_internos.escu_codigo')
            ->select(
                'participantes_internos.inic_codigo',
                'participantes_internos.pain_docentes',
                'participantes_internos.pain_docentes_final',
                'participantes_internos.pain_estudiantes',
                'participantes_internos.pain_estudiantes_final',
                'sedes.sede_nombre',
                'escuelas.escu_nombre'
            )
            ->where('participantes_internos.inic_codigo', $inic_codigo)
            ->get();

        $ubicaciones = IniciativasComunas::join('comunas', 'comunas.comu_codigo', 'iniciativas_comunas.comu_codigo')
            ->join('regiones', 'regiones.regi_codigo', 'comunas.regi_codigo')
            ->select(
                'iniciativas_comunas.inic_codigo',
                'regiones.regi_codigo',
                'regiones.regi_nombre',
                DB::raw('GROUP_CONCAT(comunas.comu_nombre SEPARATOR ", ") as comunas')
            )
            ->groupBy('iniciativas_comunas.inic_codigo', 'regiones.regi_nombre', 'regiones.regi_codigo')
            ->where('iniciativas_comunas.inic_codigo', $inic_codigo)
            ->get();

        $grupos = IniciativasGrupos::join('grupos', 'grupos.grup_codigo', 'iniciativas_grupos.grup_codigo')
            // ->select(DB::raw('GROUP_CONCAT(grupos.grup_nombre SEPARATOR ", " ) as grupos'))
            // ->groupBy('iniciativas_grupos.inic_codigo')
            ->where('iniciativas_grupos.inic_codigo', $inic_codigo)->get();

        $tematicas = IniciativasTematicas::join('tematicas', 'tematicas.tema_codigo', 'iniciativas_tematicas.tema_codigo')
            ->where('inic_codigo', $inic_codigo)->get();

        $participantes_externos = IniciativasParticipantes::join('sub_grupos_interes', 'sub_grupos_interes.sugr_codigo', 'iniciativas_participantes.sugr_codigo')
            ->join('socios_comunitarios', 'socios_comunitarios.soco_codigo', 'iniciativas_participantes.soco_codigo')
            ->join('grupos_interes', 'grupos_interes.grin_codigo', 'sub_grupos_interes.grin_codigo')
            ->where('iniciativas_participantes.inic_codigo', $inic_codigo)->get();


        return view('admin.iniciativas.mostrar', [
            'iniciativa' => $iniciativa,
            'ubicaciones' => $ubicaciones,
            'grupos' => $grupos,
            'tematicas' => $tematicas,
            'externos' => $participantes_externos,
            'internos' => $participantes
        ]);
    }

    public function listarEvidencia($inic_codigo)
    {
        $inicVerificar = Iniciativas::where('inic_codigo', $inic_codigo)->first();
        if (!$inicVerificar)
            return redirect()->route('admin.iniciativa.listar')->with('errorIniciativa', 'La iniciativa no se encuentra registrada en el sistema.');

        $inevListar = IniciativasEvidencias::where(['inic_codigo' => $inic_codigo])->get();
        return view('admin.iniciativas.evidencias', [
            'iniciativas' => $inicVerificar,
            'evidencias' => $inevListar
        ]);
    }

    public function guardarEvidencia(Request $request, $inic_codigo)
    {

        $inicVerificar = Iniciativas::where('inic_codigo', $inic_codigo)->first();
        if (!$inicVerificar)
            return redirect()->route('admin.iniciativa.listar')->with('errorIniciativa', 'La iniciativa no se encuentra registrada en el sistema.');

        $validarEntradas = Validator::make(
            $request->all(),
            [
                'inev_nombre' => 'required|max:50',
                // 'inev_descripcion' => 'required|max:500',
                'inev_archivo' => 'required|mimes:png,jpg,jpeg,pdf,xls,xlsx,ppt,pptx,doc,docx,csv,mp3,mp4,avi|max:10000',
            ],
            [
                'inev_nombre.required' => 'El nombre de la evidencia es requerido.',
                'inev_nombre.max' => 'El nombre de la evidencia excede el máximo de caracteres permitidos (50).',
                // 'inev_descripcion.required' => 'La descripción de la evidencia es requerida.',
                // 'inev_descripcion.max' => 'La descripción de la evidencia excede el máximo de caracteres permitidos (500).',
                'inev_archivo.required' => 'El archivo de la evidencia es requerido.',
                'inev_archivo.mimes' => 'El tipo de archivo no está permitido, intente con un formato de archivo tradicional.',
                'inev_archivo.max' => 'El archivo excede el tamaño máximo permitido (10 MB).'
            ]
        );
        if ($validarEntradas->fails())
            return redirect()->route('admin.evidencia.listar', $inic_codigo)->with('errorValidacion', $validarEntradas->errors()->first());

        $inevGuardar = IniciativasEvidencias::insertGetId([
            'inic_codigo' => $inic_codigo,
            'inev_nombre' => $request->inev_nombre,
            'inev_descripcion' => $request->inev_descripcion,
            'inev_creado' => Carbon::now()->format('Y-m-d H:i:s'),
            'inev_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'inev_rol_mod' => Session::get('admin')->rous_codigo,
            'inev_nickname_mod' => Session::get('admin')->usua_nickname
        ]);
        if (!$inevGuardar)
            redirect()->back()->with('errorEvidencia', 'Ocurrió un error al registrar la evidencia, intente más tarde.');

        $archivo = $request->file('inev_archivo');
        $rutaEvidencia = 'files/evidencias/' . $inevGuardar;
        if (File::exists(public_path($rutaEvidencia)))
            File::delete(public_path($rutaEvidencia));
        $moverArchivo = $archivo->move(public_path('files/evidencias'), $inevGuardar);
        if (!$moverArchivo) {
            IniciativasEvidencias::where('inev_codigo', $inevGuardar)->delete();
            return redirect()->back()->with('errorEvidencia', 'Ocurrió un error al registrar la evidencia, intente más tarde.');
        }

        $inevActualizar = IniciativasEvidencias::where('inev_codigo', $inevGuardar)->update([
            'inev_ruta' => 'files/evidencias/' . $inevGuardar,
            'inev_mime' => $archivo->getClientMimeType(),
            'inev_nombre_origen' => $archivo->getClientOriginalName(),
            'inev_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'inev_rol_mod' => Session::get('admin')->rous_codigo,
            'inev_nickname_mod' => Session::get('admin')->usua_nickname
        ]);
        if (!$inevActualizar)
            return redirect()->back()->with('errorEvidencia', 'Ocurrió un error al registrar la evidencia, intente más tarde.');
        return redirect()->route('admin.evidencias.listar', $inic_codigo)->with('exitoEvidencia', 'La evidencia fue registrada correctamente.');

    }

    public function actualizarEvidencia(Request $request, $inev_codigo)
    {
        try {
            $evidencia = IniciativasEvidencias::where('inev_codigo', $inev_codigo)->first();
            if (!$evidencia)
                return redirect()->back()->with('errorEvidencia', 'La evidencia no se encuentra registrada o vigente en el sistema.');

            $validarEntradas = Validator::make(
                $request->all(),
                [
                    'inev_nombre_edit' => 'required|max:50',
                    // 'inev_descripcion_edit' => 'required|max:500',
                ],
                [
                    'inev_nombre_edit.required' => 'El nombre de la evidencia es requerido.',
                    'inev_nombre_edit.max' => 'El nombre de la evidencia excede el máximo de caracteres permitidos (50).',
                    // 'inev_descripcion_edit.required' => 'La descripción de la evidencia es requerida.',
                    // 'inev_descripcion_edit.max' => 'La descripción de la evidencia excede el máximo de caracteres permitidos (500).'
                ]
            );
            if ($validarEntradas->fails())
                return redirect()->route('admin.evidencias.listar', $evidencia->inic_codigo)->with('errorValidacion', $validarEntradas->errors()->first());

            $inevActualizar = IniciativasEvidencias::where('inev_codigo', $inev_codigo)->update([
                'inev_nombre' => $request->inev_nombre_edit,
                'inev_descripcion' => $request->inev_descripcion_edit,
                'inev_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
                'inev_rol_mod' => Session::get('admin')->rous_codigo,
                'inev_nickname_mod' => Session::get('admin')->usua_nickname
            ]);
            if (!$inevActualizar)
                return redirect()->back()->with('errorEvidencia', 'Ocurrió un error al actualizar la evidencia, intente más tarde.');
            return redirect()->route('admin.evidencias.listar', $evidencia->inic_codigo)->with('exitoEvidencia', 'La evidencia fue actualizada correctamente.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorEvidencia', 'Ocurrió un problema al actualizar la evidencia, intente más tarde.');
        }
    }


    public function descargarEvidencia($inev_codigo)
    {
        try {
            $evidencia = IniciativasEvidencias::where('inev_codigo', $inev_codigo)->first();
            if (!$evidencia)
                return redirect()->back()->with('errorEvidencia', 'La evidencia no se encuentra registrada o vigente en el sistema.');

            $archivo = public_path($evidencia->inev_ruta);
            $cabeceras = array(
                'Content-Type: ' . $evidencia->inev_mime,
                'Cache-Control: no-cache, no-store, must-revalidate',
                'Pragma: no-cache'
            );
            return Response::download($archivo, $evidencia->inev_nombre_origen, $cabeceras);
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorEvidencia', 'Ocurrió un problema al descargar la evidencia, intente más tarde.');
        }
    }

    public function eliminarEvidencia($inev_codigo)
    {
        try {
            $evidencia = IniciativasEvidencias::where('inev_codigo', $inev_codigo)->first();
            if (!$evidencia)
                return redirect()->back()->with('errorEvidencia', 'La evidencia no se encuentra registrada o vigente en el sistema.');

            if (File::exists(public_path($evidencia->inev_ruta)))
                File::delete(public_path($evidencia->inev_ruta));
            $inevEliminar = IniciativasEvidencias::where('inev_codigo', $inev_codigo)->delete();
            if (!$inevEliminar)
                return redirect()->back()->with('errorEvidencia', 'Ocurrió un error al eliminar la evidencia, intente más tarde.');
            return redirect()->route('admin.evidencias.listar', $evidencia->inic_codigo)->with('exitoEvidencia', 'La evidencia fue eliminada correctamente.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorEvidencia', 'Ocurrió un problema al eliminar la evidencia, intente más tarde.');
        }
    }

    public function crearPaso1()
    {
        $convenios = Convenios::all();
        $mecanismo = Mecanismos::all();
        $paises = Pais::all();
        $regiones = Region::all();
        $escuelas = Escuelas::all();
        $comunas = Comuna::all();
        $carreras = Carreras::all();
        $tipoActividad = TipoActividades::all();
        return view('admin.iniciativas.paso1', [
            'convenios' => $convenios,
            'mecanismo' => $mecanismo,
            'paises' => $paises,
            'regiones' => $regiones,
            'escuelas' => $escuelas,
            'comunas' => $comunas,
            'carreras' => $carreras,
            'tipoActividad' => $tipoActividad
        ]);
    }

    public function verificarPaso1(Request $request)
    {

        $request->validate([
            'nombre' => 'required|max:255',
            'anho' => 'required',
            'description' => 'required',
            'carreras' => 'required',
            'escuelas' => 'required',
            'mecanismo' => 'required',
            'tactividad' => 'required',
            'convenio' => 'required',
            'territorio' => 'required',
            'pais' => 'required'
        ], [
            'nombre.required' => 'El nombre de la iniciativa es requerido.',
            'nombre.max' => 'El nombre de la iniciativa no puede superar los 250 carácteres.',
            'anho.required' => 'Es necesario ingresar un año para la iniciativa.',
            'description.required' => 'La Descripción es requerida.',
            'carreras.required' => 'Es necesario que seleccione al menos una Carrera en donde se ejecutará la iniciativa.',
            'escuelas.required' => 'Es necesario que seleccione al menos una Escuela en donde se ejecutará la iniciativa.',
            'mecanismo.required' => 'Es necesario que seleccione un mecanismo.',
            'tactividad.required' => 'Es necesario que seleccione el tipo de actividad a realizar.',
            'convenio.required' => 'Es necesario que escoja un convenio para asociar la iniciativa.',
            'territorio.required' => 'Especifique si la iniciativa es a nivel nacional o internacional.',
            'pais.required' => 'Seleccione el país en donde se ejecutará la iniciativa.'
        ]);

        $inicCrear = Iniciativas::insertGetId([
            'inic_nombre' => $request->nombre,
            'conv_codigo' => $request->convenio,
            'tiac_codigo' => $request->tactividad,
            'meca_codigo' => $request->mecanismo,
            'inic_territorio' => $request->territorio,
            'inic_descripcion' => $request->description,
            'inic_visible' => 1,
            'inic_anho' => $request->anho,
            'inic_creado' => Carbon::now()->format('Y-m-d H:i:s'),
            'inic_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'inic_nickname_mod' => Session::get('admin')->usua_nickname,
            'inic_rol_mod' => Session::get('admin')->rous_codigo,
        ]);

        if (!$inicCrear)
            return redirect()->back()->with('errorPaso1', 'Ocurrió un error durante el registro de los datos de la iniciativa, intente más tarde.')->withInput();

        $inic_codigo = $inicCrear;
        $pain = [];
        $sedes = $request->input('sedes', []);
        $escuelas = $request->input('escuelas', []);
        $carreras = $request->input('carreras', []);

        IniciativasPais::create([
            'inic_codigo' => $inic_codigo,
            'pais_codigo' => $request->pais,
            'pain_creado' => Carbon::now()->format('Y-m-d H:i:s'),
            'pain_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'pais_nickname_mod' => Session::get('admin')->usua_nickname,
            'pain_rol_mod' => Session::get('admin')->rous_codigo,
        ]);

        $regi = [];
        $regiones = $request->input('region', []);

        foreach ($regiones as $region) {
            array_push(
                $regi,
                [
                    'inic_codigo' => $inic_codigo,
                    'regi_codigo' => $region,
                    'rein_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                    'rein_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
                    'rein_nickname_rol' => Session::get('admin')->usua_nickname,
                    'rein_rol_mod' => Session::get('admin')->rous_codigo,
                ]
            );
        }

        $regiCrear = IniciativasRegiones::insert($regi);

        if (!$regiCrear) {
            IniciativasRegiones::where('inic_codigo', $inic_codigo)->delete();
            return redirect()->back()->with('regiError', 'Ocurrió un error durante el registro de las regiones, intente más tarde.')->withInput();
        }

        $comu = [];
        $comunas = $request->input('comuna', []);

        foreach ($comunas as $comuna) {
            array_push($comu, [
                'inic_codigo' => $inic_codigo,
                'comu_codigo' => $comuna,
                'coin_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                'coin_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
                'coin_nickname_mod' => Session::get('admin')->usua_nickname,
                'coin_rol_mod' => Session::get('admin')->rous_codigo,
            ]);
        }

        $comuCrear = IniciativasComunas::insert($comu);

        if (!$comuCrear) {
            IniciativasComunas::where('inic_codigo', $inic_codigo)->delete();
            return redirect()->back()->with('comuError', 'Ocurrió un error durante el registro de las comunas, intente más tarde.')->withInput();
        }

        foreach ($escuelas as $escuela) {
            foreach ($carreras as $carrera) {
                $sede_carrera = Carreras::where('care_codigo', $carrera)
                    ->where('escu_codigo', $escuela)
                    ->exists();
                if ($sede_carrera) {
                    array_push($pain, [
                        'inic_codigo' => $inic_codigo,
                        'escu_codigo' => $escuela,
                        'care_codigo' => $carrera,
                    ]);
                }

            }
        }


        $painCrear = ParticipantesInternos::insert($pain);
        if (!$painCrear) {
            ParticipantesInternos::where('inic_codigo', $inic_codigo)->delete();
            return redirect()->back()->with('errorPaso1', 'Ocurrió un error durante el registro de las unidades, intente más tarde.')->withInput();
        }

        return redirect()->route('admin.editar.paso2', $inic_codigo)->with('exitoPaso1', 'Los datos de la iniciativa se registraron correctamente');
    }

    public function editarPaso1($inic_codigo)
    {
        $iniciativa = Iniciativas::where('inic_codigo', $inic_codigo)->first();

        $iniciativaData = Iniciativas::join('mecanismos', 'mecanismos.meca_codigo', '=', 'iniciativas.meca_codigo')
            ->where('inic_codigo', $inic_codigo)
            ->get();

        $sedes = Sedes::all();
        $convenios = Convenios::all();
        $mecanismo = Mecanismos::all();
        $paises = Pais::all();
        $regiones = Region::all();
        $comunas = Comuna::all();
        $escuelas = Escuelas::all();
        $sedesSec = ParticipantesInternos::select('sede_codigo')->where('inic_codigo', $inic_codigo)->get();
        $escuSec = ParticipantesInternos::select('escu_codigo')->where('inic_codigo', $inic_codigo)->get();
        $iniciativaPais = IniciativasPais::where('inic_codigo', $inic_codigo)->get();
        $iniciativaRegion = IniciativasRegiones::select('regi_codigo')->where('inic_codigo', $inic_codigo)->get();
        $iniciativaComuna = IniciativasComunas::select('comu_codigo')->where('inic_codigo', $inic_codigo)->get();

        $regiSec = [];
        $comuSec = [];
        $sedesSecCod = [];
        $escuSecCod = [];

        foreach ($sedesSec as $registro) {
            array_push($sedesSecCod, $registro->sede_codigo);
        }

        foreach ($escuSec as $registro) {
            array_push($escuSecCod, $registro->escu_codigo);
        }

        foreach ($iniciativaRegion as $registro) {
            array_push($regiSec, $registro->regi_codigo);
        }

        foreach ($iniciativaComuna as $registro) {
            array_push($comuSec, $registro->comu_codigo);
        }



        $tipoActividades = TipoActividades::all();

        return view('admin.iniciativas.paso1', [
            'iniciativa' => $iniciativa,
            'iniciativaData' => $iniciativaData[0],
            'iniciativaPais' => $iniciativaPais,
            'iniciativaRegion' => $regiSec,
            'iniciativaComuna' => $comuSec,
            'sedes' => $sedes,
            'comunas' => $comunas,
            'convenios' => $convenios,
            'mecanismo' => $mecanismo,
            'paises' => $paises,
            'regiones' => $regiones,
            'escuelas' => $escuelas,
            'tipo_actividad' => $tipoActividades,
            'sedesSec' => $sedesSecCod,
            'escuSec' => $escuSecCod,
        ]);

    }

    public function actualizarPaso1(Request $request, $inic_codigo)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'anho' => 'required',
            'pertinencial' => 'required',
            'pertinenciat' => 'required',
            'sedes' => 'required',
            'escuelas' => 'required',
            'mecanismo' => 'required',
            'tactividad' => 'required',
            'convenio' => 'required',
            'territorio' => 'required',
            'pais' => 'required'
        ], [
            'nombre.required' => 'El nombre de la iniciativa es requerido.',
            'nombre.max' => 'El nombre de la iniciativa no puede superar los 250 carácteres.',
            'anho.required' => 'Es necesario ingresar una año para la iniciativa.',
            'pertinencial.required' => 'La pertinencia local es requerida.',
            'pertinenciat.required' => 'La pertinencia territorial es requerida.',
            'sedes.required' => 'Es necesario que seleccione al menos una sede en donde se ejecutará la iniciativa.',
            'escuelas.required' => 'Es necesario que seleccione al menos una escuela en donde se ejecutará la iniciativa.',
            'mecanismo.required' => 'Es necesario que seleccione un mecanismo.',
            'tactividad.required' => 'Es necesario que seleccione el tipo de actividad a realizar.',
            'convenio.required' => 'Es necesario que escoja un convenio para asociar la iniciativa.',
            'territorio.required' => 'Especifique si la iniciativa es a nivel nacional o internacional.',
            'pais.required' => 'Seleccione el país en donde se ejecutará la iniciativa.'
        ]);

        $inicActualizar = Iniciativas::where('inic_codigo', $inic_codigo)->update([
            'inic_nombre' => $request->nombre,
            'conv_codigo' => $request->convenio,
            'tiac_codigo' => $request->tactividad,
            'meca_codigo' => $request->mecanismo,
            'inic_territorio' => $request->territorio,
            'inic_pertinencia_local' => $request->pertinencial,
            'inic_pertinencia_territorial' => $request->pertinenciat,
            'inic_visible' => 1,
            'inic_anho' => $request->anho,
            'inic_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'inic_nickname_mod' => Session::get('admin')->usua_nickname,
            'inic_rol_mod' => Session::get('admin')->rous_codigo,
        ]);

        if (!$inicActualizar)
            return redirect()->back()->with('errorPaso1', 'Ocurrió un error durante la actualización de los datos de la iniciativa, intente más tarde.')->withInput();

        // ParticipantesInternos::where('inic_codigo', $inic_codigo)->delete();
        $pain = [];
        $sedes = $request->input('sedes', []);
        $escuelas = $request->input('escuelas', []);



        foreach ($sedes as $sede) {
            foreach ($escuelas as $escuela) {
                $sede_escuela = SedesEscuelas::where('sede_codigo', $sede)
                    ->where('escu_codigo', $escuela)
                    ->exists();
                $escuela_sede = ParticipantesInternos::where(['sede_codigo' => $sede, 'escu_codigo' => $escuela, 'inic_codigo' => $inic_codigo])
                    ->exists();
                if ($sede_escuela && !$escuela_sede) {
                    array_push($pain, [
                        'inic_codigo' => $inic_codigo,
                        'sede_codigo' => $sede,
                        'escu_codigo' => $escuela,
                    ]);
                }

            }
        }

        $painCrear = ParticipantesInternos::insert($pain);
        if (!$painCrear) {
            ParticipantesInternos::where('inic_codigo', $inic_codigo)->delete();
            return redirect()->back()->with('errorPaso1', 'Ocurrió un error durante el registro de las unidades, intente más tarde.')->withInput();
        }

        IniciativasPais::where('inic_codigo', $inic_codigo)->delete();
        IniciativasRegiones::where('inic_codigo', $inic_codigo)->delete();
        IniciativasComunas::where('inic_codigo', $inic_codigo)->delete();

        IniciativasPais::create([
            'inic_codigo' => $inic_codigo,
            'pais_codigo' => $request->pais,
            'pain_creado' => Carbon::now()->format('Y-m-d H:i:s'),
            'pain_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
            'pais_nickname_mod' => Session::get('admin')->usua_nickname,
            'pain_rol_mod' => Session::get('admin')->rous_codigo,
        ]);

        $regi = [];
        $regiones = $request->input('region', []);

        foreach ($regiones as $region) {
            array_push(
                $regi,
                [
                    'inic_codigo' => $inic_codigo,
                    'regi_codigo' => $region,
                    'rein_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                    'rein_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
                    'rein_nickname_rol' => Session::get('admin')->usua_nickname,
                    'rein_rol_mod' => Session::get('admin')->rous_codigo,
                ]
            );
        }

        $regiCrear = IniciativasRegiones::insert($regi);

        if (!$regiCrear) {
            IniciativasRegiones::where('inic_codigo', $inic_codigo)->delete();
            return redirect()->back()->with('regiError', 'Ocurrió un error durante el registro de las regiones, intente más tarde.')->withInput();
        }

        $comu = [];
        $comunas = $request->input('comuna', []);

        foreach ($comunas as $comuna) {
            array_push($comu, [
                'inic_codigo' => $inic_codigo,
                'comu_codigo' => $comuna,
                'coin_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                'coin_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
                'coin_nickname_mod' => Session::get('admin')->usua_nickname,
                'coin_rol_mod' => Session::get('admin')->rous_codigo,
            ]);
        }

        $comuCrear = IniciativasComunas::insert($comu);

        if (!$comuCrear) {
            IniciativasComunas::where('inic_codigo', $inic_codigo)->delete();
            return redirect()->back()->with('comuError', 'Ocurrió un error durante el registro de las comunas, intente más tarde.')->withInput();
        }


        return redirect()->route('admin.editar.paso2', $inic_codigo)->with('exitoPaso1', 'Los datos de la iniciativa se actualizaron correctamente');

    }


    public function editarPaso2($inic_codigo)
    {
        $iniciativaActual = Iniciativas::where('inic_codigo', $inic_codigo)->first();
        $sedes = ParticipantesInternos::where('inic_codigo', $inic_codigo)
            ->join('sedes', 'sedes.sede_codigo', '=', 'participantes_internos.sede_codigo')
            ->select('sedes.sede_codigo', 'sedes.sede_nombre')
            ->distinct()->get();
        $sedesTotal = Sedes::all();
        $subGrupos = SubGruposInteres::all();
        $grupos = Grupos::all();
        $gruposIni = IniciativasGrupos::select('grup_codigo')->where('inic_codigo', $inic_codigo)->get();
        // $socios = SociosComunitarios::all();
        $grupoIniCod = [];

        $tematicas = Tematicas::all();
        $tematicasIni = IniciativasTematicas::select('tema_codigo')->where('inic_codigo', $inic_codigo)->get();
        $temaIniCod = [];

        foreach ($gruposIni as $registro) {
            array_push($grupoIniCod, $registro->grup_codigo);
        }
        foreach ($tematicasIni as $registro) {
            array_push($temaIniCod, $registro->tema_codigo);
        }

        // return $grupoIniCod;

        return view('admin.iniciativas.paso2', [
            'iniciativa' => $iniciativaActual,
            'subgrupos' => $subGrupos,
            'grupos' => $grupos,
            'tematicas' => $tematicas,
            'sedes' => $sedes,
            'sedesT' => $sedesTotal,
            'gruposSec' => $grupoIniCod,
            'tematicasSec' => $temaIniCod,
            // 'socios' => $socios,

        ]);

    }

    public function verificarPaso2(Request $request, $inic_codigo)
    {
        $ingr = [];
        $inte = [];
        $grupos = $request->input('grupos', []);
        $tematicas = $request->input('tematicas', []);

        IniciativasGrupos::where('inic_codigo', $inic_codigo)->delete();
        IniciativasTematicas::where('inic_codigo', $inic_codigo)->delete();

        foreach ($grupos as $grupo) {
            array_push($ingr, [
                'inic_codigo' => $inic_codigo,
                'grup_codigo' => $grupo,
                'ingr_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                'ingr_nickname_mod' => Session::get('admin')->usua_nickname,
                'ingr_rol_mod' => Session::get('admin')->rous_codigo,
            ]);
        }

        foreach ($tematicas as $tematica) {
            array_push($inte, [
                'inic_codigo' => $inic_codigo,
                'tema_codigo' => $tematica,
                'inte_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                'inte_nickname_mod' => Session::get('admin')->usua_nickname,
                'inte_rol_mod' => Session::get('admin')->rous_codigo,
            ]);
        }

        //todo:falta hacer validaciones
        IniciativasGrupos::insert($ingr);
        IniciativasTematicas::insert($inte);

        return redirect()->route('admin.iniciativa.listar')->with('exitoIniciativa', 'La iniciativa se registró correctamente');
    }

    public function eliminarIniciativas(Request $request)
    {
        $iniciativa = Iniciativas::where('inic_codigo', $request->inic_codigo)->first();

        if (!$iniciativa) {
            return redirect()->route('admin.iniciativa.listar')->with('errorIniciativa', 'La iniciativa no se encuentra registrado en el sistema.');
        }

        IniciativasComunas::where('inic_codigo', $request->inic_codigo)->delete();
        IniciativasGrupos::where('inic_codigo', $request->inic_codigo)->delete();
        IniciativasPais::where('inic_codigo', $request->inic_codigo)->delete();
        IniciativasParticipantes::where('inic_codigo', $request->inic_codigo)->delete();
        IniciativasRegiones::where('inic_codigo', $request->inic_codigo)->delete();
        IniciativasTematicas::where('inic_codigo', $request->inic_codigo)->delete();
        ParticipantesInternos::where('inic_codigo', $request->inic_codigo)->delete();
        Iniciativas::where('inic_codigo', $request->inic_codigo)->delete();

        return redirect()->route('admin.iniciativa.listar')->with('exitoIniciativa', 'La iniciativa fue eliminado correctamente.');
    }


    public function guardarSocioComunitario(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required',
            'nombrec' => 'required',
            'subgrupo' => 'required',
            'sedesT' => 'required',
        ], [
            'nombre.required' => 'El nombre del socio es un parametro requerido.',
            'nombrec.required' => 'El nombre de la contraparte es un parámetro requerido.',
            'subgrupo.required' => 'El socio tiene que formar parte de un subgrupo.',
            'sudesT.required' => 'Es necesario que seleccione al menos una sede a la cual este asociada el socio comunitario.',

        ]);

        if (!$validacion) {

            return redirect()->back()->withErrors($validacion)->withInput();
        }

        $socoCrear = SociosComunitarios::insertGetId([
            'soco_nombre_socio' => $request->nombre,
            'soco_nombre_contraparte' => $request->nombrec,
            'soco_telefono_contraparte' => $request->telefono,
            'soco_email_contraparte' => $request->emailc,
            'sugr_codigo' => $request->subgrupo
        ]);

        if (!$socoCrear) {
            return redirect()->back()->with('socoError', 'Ocurrió un error al ingresar al socio, intente más tarde.')->withInput();
        }

        $soco_codigo = $socoCrear;

        $seso = [];
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

        $sesoCrear = SedesSocios::insert($seso);
        if (!$sesoCrear) {
            SedesSocios::where('soco_codigo', $soco_codigo)->delete();
            return redirect()->back()->with('socoError', 'Ocurrió un error durante el registro de las sedes, intente más tarde.')->withInput();
        }

        return redirect()->back()->with('socoExito', 'Se agregó el socio comunitario correctamente.')->withInput();
    }


    public function escuelasBySedesPaso2(Request $request)
    {
        $escuelas = ParticipantesInternos::where(['sede_codigo' => $request->sedes, 'inic_codigo' => $request->inic_codigo])
            ->join('escuelas', 'escuelas.escu_codigo', '=', 'participantes_internos.escu_codigo')
            ->get();
        return response()->json($escuelas);
    }

    public function agregarExternos(Request $request)
    {
        $validar = IniciativasParticipantes::where(["inic_codigo" => $request->inic_codigo, "sugr_codigo" => $request->sugr_codigo, "soco_codigo" => $request->soco_codigo])->first();
        if (!$validar) {
            $externosCrear = IniciativasParticipantes::insertGetId([
                'inic_codigo' => $request->inic_codigo,
                'sugr_codigo' => $request->sugr_codigo,
                'soco_codigo' => $request->soco_codigo,
                'inpr_total' => $request->inpr_total,
                'inpr_creado' => Carbon::now()->format('Y-m-d H:i:s'),
                'inpr_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
                'inpr_nickname_mod' => Session::get('admin')->usua_nickname,
                'inpr_rol_mod' => Session::get('admin')->rous_codigo,
            ]);

        } else {

            IniciativasParticipantes::where(["inic_codigo" => $request->inic_codigo, "sugr_codigo" => $request->sugr_codigo, "soco_codigo" => $request->soco_codigo])->update([
                'inpr_total' => $request->inpr_total,
                'inpr_actualizado' => Carbon::now()->format('Y-m-d H:i:s'),
                'inpr_nickname_mod' => Session::get('admin')->usua_nickname,
                'inpr_rol_mod' => Session::get('admin')->rous_codigo,
            ]);

        }

        $externos = IniciativasParticipantes::join('sub_grupos_interes', 'sub_grupos_interes.sugr_codigo', '=', 'iniciativas_participantes.sugr_codigo')
            ->join('socios_comunitarios', 'socios_comunitarios.soco_codigo', '=', 'iniciativas_participantes.soco_codigo')
            ->where('iniciativas_participantes.inic_codigo', $request->inic_codigo)
            ->get();

        //todo:falta hacer validación



        return json_encode(["estado" => true, "resultado" => $externos]);
    }

    public function listarExternos(Request $request)
    {
        $externos = IniciativasParticipantes::join('sub_grupos_interes', 'sub_grupos_interes.sugr_codigo', '=', 'iniciativas_participantes.sugr_codigo')
            ->join('socios_comunitarios', 'socios_comunitarios.soco_codigo', '=', 'iniciativas_participantes.soco_codigo')
            ->where('iniciativas_participantes.inic_codigo', $request->inic_codigo)
            ->get();

        return json_encode(["estado" => true, "resultado" => $externos]);
    }

    public function eliminarExterno(Request $request)
    {
        $externo = IniciativasParticipantes::where(['inic_codigo' => $request->inic_codigo, 'sugr_codigo' => $request->sugr_codigo, 'soco_codigo' => $request->soco_codigo])->first();

        if (!$externo) {
            return json_encode(['estado' => false, 'resultado' => 'El socio o subgrupo no estan asociados a las iniciativa']);
        }

        $externoEliminar = IniciativasParticipantes::where(['inic_codigo' => $request->inic_codigo, 'sugr_codigo' => $request->sugr_codigo, 'soco_codigo' => $request->soco_codigo])->delete();
        if (!$externoEliminar) {
            return json_encode(['estado' => false, 'resultado' => 'Ocurrio un error al eliminar el registro seleccionado']);
        }

        return json_encode(['estado' => true, 'resultado' => 'El registro se elimino correctamente']);
    }
    public function listarInternos(Request $request)
    {

        $internos = ParticipantesInternos::join('sedes', 'sedes.sede_codigo', '=', 'participantes_internos.sede_codigo')
            ->join('escuelas', 'escuelas.escu_codigo', '=', 'participantes_internos.escu_codigo')
            ->where('inic_codigo', $request->inic_codigo)
            ->get();
        return json_encode(["estado" => true, "resultado" => $internos]);
    }

    public function actualizarInternos(Request $request)
    {
        $actualizarInternos = ParticipantesInternos::where(['inic_codigo' => $request->inic_codigo, 'sede_codigo' => $request->sede_codigo, 'escu_codigo' => $request->escu_codigo])->update([
            'pain_docentes' => $request->pain_docentes,
            'pain_estudiantes' => $request->pain_estudiantes,
            'pain_total' => $request->pain_total
        ]);

        $internos = ParticipantesInternos::join('sedes', 'sedes.sede_codigo', '=', 'participantes_internos.sede_codigo')
            ->join('escuelas', 'escuelas.escu_codigo', '=', 'participantes_internos.escu_codigo')
            ->where('inic_codigo', $request->inic_codigo)
            ->get();
        return json_encode(["estado" => true, "resultado" => $internos]);
    }

    public function escuelasBySede(Request $request)
    {

        $sedeIds = $request->input('sedes', []);
        $escuelas = SedesEscuelas::whereIn('sede_codigo', $sedeIds)
            ->join('escuelas', 'escuelas.escu_codigo', '=', 'sedes_escuelas.escu_codigo')
            ->select('escuelas.escu_nombre', 'escuelas.escu_codigo')
            ->distinct()
            ->get();

        return response()->json($escuelas);
    }

    public function comunasByRegiones(Request $request)
    {

        $regionesIds = $request->input('regiones', []);
        $comunas = Comuna::whereIn('regi_codigo', $regionesIds)
            ->select('comunas.comu_nombre', 'comunas.comu_codigo')
            ->get();

        return response()->json($comunas);
    }

    public function sociosBySubgrupos(Request $request)
    {

        $socio = SociosComunitarios::where('sugr_codigo', $request->sugr_codigo)->get();
        return response()->json($socio);
    }

    public function actividadesByMecanismos(Request $request)
    {
        $actividades = MecanismosActividades::join('tipo_actividades', 'tipo_actividades.tiac_codigo', '=', 'mecanismos_actividades.tiac_codigo')
            ->where('mecanismos_actividades.meca_codigo', '=', $request->mecanismo)
            ->get();
        return response()->json($actividades);
    }

    public function paisByTerritorio(Request $request)
    {
        $pais = '';
        if ($request->pais == 'nacional') {
            $pais = Pais::where('pais_codigo', 1)->get();
        } else {
            $pais = Pais::where('pais_codigo', '!=', 1)->get();
        }
        return response()->json($pais);
    }
}