<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticationController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\IniciativasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\BitacoraController;

use App\Http\Controllers\Auth\ForgotPasswordController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Todo: rutas de acceso global.



Route::get('/', [AutenticationController::class, 'ingresar'])->name('ingresar.formulario')->middleware('verificar.sesion');
Route::get('ingresar', [AutenticationController::class, 'ingresar'])->name('ingresar.formulario')->middleware('verificar.sesion');
Route::post('ingresar', [AutenticationController::class, 'validarIngreso'])->name('auth.ingresar');
Route::get('salir', [AutenticationController::class, 'cerrarSesion'])->name('auth.cerrar');
Route::get('registrarSuperadmin', [AutenticationController::class, 'registrarSuperadmin'])->name('registrarsuperadmin.formulario');
Route::post('registrarSuperadmin', [AutenticationController::class, 'guardarSuperadmin'])->name('auth.registrar.superadmin');



// Reset password routes
// Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



Route::middleware('verificar.superadmin')->group(function () {
    // inicio rutas para gestionar usuarios
    Route::get('superadmin/listar-usuarios', [SuperadminController::class, 'listarUsuarios'])->name('superadmin.listar.usuarios');
    Route::get('superadmin/crear-usuario', [SuperadminController::class, 'crearUsuario'])->name('superadmin.crear.usuario');
    Route::post('superadmin/listar-usuarios', [SuperadminController::class, 'guardarAdmin'])->name('superadmin.registrar.admin');
    Route::get('superadmin/editar-usuario/{usua_nickname}', [SuperadminController::class, 'editarUsuario'])->name('superadmin.usuario.editar');
    Route::post('superadmin/editar-usuario/{usua_nickname}', [SuperadminController::class, 'actualizarUsuario'])->name('superadmin.usuario.actualizar');
    Route::put('superadmin/habilitar-usuario/{usua_nickname}', [SuperadminController::class, 'habilitarAdmin'])->name('superadmin.habilitar.admin');
    Route::put('superadmin/deshabilitar-usuario/{usua_nickname}', [SuperadminController::class, 'deshabilitarAdmin'])->name('superadmin.deshabilitar.admin');
    Route::delete('superadmin/eliminar-usuario/', [SuperadminController::class, 'eliminarAdmin'])->name('superadmin.eliminar.admin');
    Route::get('superadmin/clave-usuario/{usua_nickname}', [SuperadminController::class, 'editarClaveUsuario'])->name('superadmin.claveusuario.cambiar');
    Route::post('superadmin/clave-usuario/{usua_nickname}', [SuperadminController::class, 'actualizarClaveUsuario'])->name('superadmin.claveusuario.actualizar');
    // fin rutas para gestionar usuarios
});

Route::middleware('verificar.admin')->group(function () {

    Route::get('admin/home', function () {
        return view('admin.home');
    })->name('admin.home');
    // TODO: inicio rutas para gestionar parametros

    //Ambito de COntribucion
    Route::get('admin/listar-ambito', [ParametrosController::class, 'listarAmbitos'])->name('admin.listar.ambitos');
    Route::delete('admin/eliminar-ambito/', [ParametrosController::class, 'eliminarAmbitos'])->name('admin.eliminar.ambitos');
    Route::put('admin/editar-ambito/{amb_codigo}', [ParametrosController::class, 'actualizarAmbitos'])->name('admin.actualizar.ambitos');
    Route::post('admin/crear-ambito/', [ParametrosController::class, 'crearAmbitos'])->name('admin.crear.ambitos');

    //Ambito de Acción
    Route::get('admin/listar-ambitosaccion', [ParametrosController::class, 'listarAmbitosAccion'])->name('admin.listar.ambitosaccion');
    Route::delete('admin/eliminar-ambitosaccion/', [ParametrosController::class, 'eliminarAmbitosAccion'])->name('admin.eliminar.ambitosaccion');
    Route::put('admin/editar-ambitosaccion/{amac_codigo}', [ParametrosController::class, 'actualizarAmbitosAccion'])->name('admin.actualizar.ambitosaccion');
    Route::post('admin/crear-ambitosaccion/', [ParametrosController::class, 'crearAmbitosAccion'])->name('admin.crear.ambitosaccion');

    //Programas
    Route::get('admin/listar-programas', [ParametrosController::class, 'listarProgramas'])->name('admin.listar.programas');
    Route::delete('admin/eliminar-programas/', [ParametrosController::class, 'eliminarProgramas'])->name('admin.eliminar.programas');
    Route::put('admin/editar-programas/{prog_codigo}', [ParametrosController::class, 'actualizarProgramas'])->name('admin.actualizar.programas');
    Route::post('admin/crear-programas/', [ParametrosController::class, 'crearProgramas'])->name('admin.crear.programas');

    //Convenios
    Route::get('admin/listar-convenios', [ParametrosController::class, 'listarConvenios'])->name('admin.listar.convenios');
    Route::delete('admin/eliminar-convenios/', [ParametrosController::class, 'eliminarConvenios'])->name('admin.eliminar.convenios');
    Route::post('admin/convenios/crear', [ParametrosController::class, 'crearConvenios'])->name('admin.crear.convenios');
    Route::post('admin/convenios/{conv_codigo}/actualizar', [ParametrosController::class, 'actualizarConvenios'])->name('admin.actualizar.convenios');

    //Sedes
    Route::get('admin/listar-sedes', [ParametrosController::class, 'listarSedes'])->name('admin.listar.sedes');
    Route::post('/admin/crear/sedes', [ParametrosController::class, 'crearSede'])->name('admin.crear.sedes');
    Route::delete('admin/eliminar-sedes', [ParametrosController::class, 'eliminarSedes'])->name('admin.eliminar.sedes');
    Route::get('admin/editar/sedes/{sede_codigo}', [ParametrosController::class, 'editarSedes'])->name('admin.editar.sedes');
    Route::put('admin/actualizar/sedes/{sede_codigo}', [ParametrosController::class, 'actualizarSedes'])->name('admin.actualizar.sedes');

    //Carreras
    Route::get('admin/listar-carreras', [ParametrosController::class, 'listarCarreras'])->name('admin.listar.carreras');
    Route::delete('admin/eliminar-carreras/', [ParametrosController::class, 'eliminarCarreras'])->name('admin.eliminar.carreras');
    Route::put('admin/editar-carreras/{care_codigo}', [ParametrosController::class, 'actualizarCarreras'])->name('admin.actualizar.carreras');
    Route::post('admin/crear-carreras/', [ParametrosController::class, 'crearCarreras'])->name('admin.crear.carreras');

    //Escuelas
    Route::get('admin/listar-escuelas', [ParametrosController::class, 'listarEscuelas'])->name('admin.listar.escuelas');
    Route::delete('admin/eliminar-escuelas/', [ParametrosController::class, 'eliminarEscuelas'])->name('admin.eliminar.escuelas');
    Route::put('escuelas/{escu_codigo}/actualizar', [ParametrosController::class, 'actualizarEscuelas'])->name('admin.actualizar.escuelas');
    Route::post('admin/crear-escuelas/', [ParametrosController::class, 'crearEscuelas'])->name('admin.crear.escuelas');

    //Socios Comunitarios
    Route::get('admin/listar-socios', [ParametrosController::class, 'listarSocios'])->name('admin.listar.socios');
    Route::delete('admin/eliminar-socios/', [ParametrosController::class, 'eliminarSocios'])->name('admin.eliminar.socios');
    Route::put('socios/{escu_codigo}/actualizar', [ParametrosController::class, 'actualizarSocios'])->name('admin.actualizar.socios');
    Route::post('admin/crear-socios/', [ParametrosController::class, 'crearSocios'])->name('admin.crear.socios');
    Route::post('admin/socios/listar-subgrupos', [ParametrosController::class, 'subgruposBygrupos']);

    //Mecanismos
    Route::get('admin/mecanismos/listar', [ParametrosController::class, 'listarMecanismos'])->name('admin.listar.mecanismos');
    Route::post('admin/mecanismos/crear', [ParametrosController::class, 'crearMecanismos'])->name('admin.crear.mecanismos');
    Route::delete('admin/mecanismos/eliminar', [ParametrosController::class, 'eliminarMecanismos'])->name('admin.eliminar.mecanismos');
    Route::put('admin/mecanismos/actualizar/{meca_codigo}', [ParametrosController::class, 'actualizarMecanismos'])->name('admin.actualizar.mecanismos');

    //Grupos Interes
    Route::get('admin/grupos/listar', [ParametrosController::class, 'listarGrupos'])
        ->name('admin.listar.grupos_int');
    Route::post('admin/grupos/crear', [ParametrosController::class, 'crearGrupo'])
        ->name('admin.crear.grupos_int');
    Route::delete('admin/grupos/eliminar', [ParametrosController::class, 'eliminarGrupo'])
        ->name('admin.eliminar.grupo');
    Route::put('admin/grupos/actualizar/{grin_codigo}', [ParametrosController::class, 'actualizarGrupos'])
        ->name('admin.actualizar.grupos');

    // SubGrupoInteres
    Route::get('admin/listar-subgrupos', [ParametrosController::class, 'listarSubGrupoInteres'])->name('admin.listar.subgrupos');
    Route::delete('admin/eliminar-subgrupos/', [ParametrosController::class, 'eliminarSubGrupoInteres'])->name('admin.eliminar.subgrupos');
    Route::put('admin/editar-subgrupos/{sugr_codigo}', [ParametrosController::class, 'actualizarSubGrupoInteres'])->name('admin.actualizar.subgrupos');
    Route::post('admin/crear-subgrupos/', [ParametrosController::class, 'crearSubGrupoInteres'])->name('admin.crear.subgrupos');

    //Tipos de actividad
    Route::get('/admin/listar/tipoact', [ParametrosController::class, 'listarTipoact'])
        ->name('admin.listar.tipoact');
    Route::post('/admin/crear/tipoact', [ParametrosController::class, 'crearTipoact'])
        ->name('admin.crear.tipoact');
    Route::put('/admin/actualizar/tipoact/{tiac_codigo}', [ParametrosController::class, 'actualizarTipoact'])
        ->name('admin.actualizar.tipoact');
    Route::delete('/admin/eliminar/tipoact', [ParametrosController::class, 'eliminarTipoact'])
        ->name('admin.eliminar.tipoact');

    //Tematicas
    Route::get('/admin/listar/tematica', [ParametrosController::class, 'listarTematica'])
        ->name('admin.listar.tematica');
    Route::post('/admin/crear/tematica', [ParametrosController::class, 'crearTematica'])
        ->name('admin.crear.tematica');
    Route::put('/admin/actualizar/tematica/{tema_codigo}', [ParametrosController::class, 'actualizarTematica'])
        ->name('admin.actualizar.tematica');
    Route::delete('/admin/eliminar/tematica', [ParametrosController::class, 'eliminarTematica'])
        ->name('admin.eliminar.tematica');

    // Unidades
    Route::get('admin/listar-unidades', [ParametrosController::class, 'listarUnidades'])->name('admin.listar.unidades');
    Route::delete('admin/eliminar-unidades/', [ParametrosController::class, 'eliminarUnidades'])->name('admin.eliminar.unidades');
    Route::put('admin/editar-unidades/{unid_codigo}', [ParametrosController::class, 'actualizarUnidades'])->name('admin.actualizar.unidades');
    Route::post('admin/crear-unidades/', [ParametrosController::class, 'crearUnidades'])->name('admin.crear.unidades');

    // SubUnidades
    Route::get('admin/listar-subunidades', [ParametrosController::class, 'listarSubUnidades'])->name('admin.listar.subunidades');
    Route::delete('admin/eliminar-subunidades/', [ParametrosController::class, 'eliminarSubUnidades'])->name('admin.eliminar.subunidades');
    Route::put('admin/editar-subunidades/{suni_codigo}', [ParametrosController::class, 'actualizarSubUnidades'])->name('admin.actualizar.subunidades');
    Route::post('admin/crear-subunidades/', [ParametrosController::class, 'crearSubUnidades'])->name('admin.crear.subunidades');

    // Tipo Iniciativa
    Route::get('admin/listar-tipoiniciativa', [ParametrosController::class, 'listarTipoIniciativa'])->name('admin.listar.tipoiniciativa');
    Route::delete('admin/eliminar-tipoiniciativa/', [ParametrosController::class, 'eliminarTipoIniciativa'])->name('admin.eliminar.tipoiniciativa');
    Route::put('admin/editar-tipoiniciativa/{tmec_codigo}', [ParametrosController::class, 'actualizarTipoIniciativa'])->name('admin.actualizar.tipoiniciativa');
    Route::post('admin/crear-tipoiniciativa/', [ParametrosController::class, 'crearTipoIniciativa'])->name('admin.crear.tipoiniciativa');

    // actividad
    Route::get('admin/listar-actividad', [BitacoraController::class, 'listarActividad'])->name('admin.listar.actividades');
    Route::delete('admin/eliminar-actividad/', [BitacoraController::class, 'eliminarActividad'])->name('admin.eliminar.actividades');
    Route::put('admin/editar-actividad/{nombreprefijo_codigo}', [BitacoraController::class, 'actualizarActividad'])->name('admin.actualizar.actividades');
    Route::post('admin/crear-actividad/', [BitacoraController::class, 'crearActividad'])->name('admin.crear.actividades');

    // RecursosHumanos
    Route::get('admin/listar-rrhh', [ParametrosController::class, 'listarRecursosHumanos'])->name('admin.listar.rrhh');
    Route::delete('admin/eliminar-rrhh/', [ParametrosController::class, 'eliminarRecursosHumanos'])->name('admin.eliminar.rrhh');
    Route::put('admin/editar-rrhh/{trrhh_codigo}', [ParametrosController::class, 'actualizarRecursosHumanos'])->name('admin.actualizar.rrhh');
    Route::post('admin/crear-rrhh/', [ParametrosController::class, 'crearRecursosHumanos'])->name('admin.crear.rrhh');

    // TipoInfraestructuras
    Route::get('admin/listar-tipoinfra', [ParametrosController::class, 'listarTipoInfraestructuras'])->name('admin.listar.tipoinfra');
    Route::delete('admin/eliminar-tipoinfra/', [ParametrosController::class, 'eliminarTipoInfraestructuras'])->name('admin.eliminar.tipoinfra');
    Route::put('admin/editar-tipoinfra/{tinf_codigo}', [ParametrosController::class, 'actualizarTipoInfraestructuras'])->name('admin.actualizar.tipoinfra');
    Route::post('admin/crear-tipoinfra/', [ParametrosController::class, 'crearTipoInfraestructuras'])->name('admin.crear.tipoinfra');



    // fin rutas para gestionar parametros


    //TODO: Inicio de rutas para iniciativas
    Route::get('admin/iniciativas/listar', [IniciativasController::class, 'listarIniciativas'])->name('admin.iniciativa.listar');
    Route::get('admin/iniciativas/{inic_codigo}/detalles', [IniciativasController::class, 'mostrarDetalles'])->name('admin.iniciativas.detalles');
    Route::get('admin/iniciativas/{inic_codigo}/listar/resultado',[IniciativasController::class,'listadoResultados'])->name('admin.resultados.listado');
    Route::post('admin/iniciativas/{inic_codigo}/resultados', [IniciativasController::class, 'actualizarResultados'])->name('admin.resultados.actualizar');
    Route::get('admin/iniciativas/crear/paso1', [IniciativasController::class, 'crearPaso1'])->name('admin.inicitiativas.crear.primero');
    Route::get('admin/iniciativas/{inic_codigo}/editar/paso1', [IniciativasController::class, 'editarPaso1'])->name('admin.editar.paso1');
    Route::put('admin/iniciativas/{inic_codigo}/paso1', [IniciativasController::class, 'actualizarPaso1'])->name('admin.actualizar.paso1');
    // Route::get('admin/iniciativas/crear/paso1',[IniciativasController::class,'crearPaso1'])->name('admin.inicitiativas.crear.primero');
    Route::post('admin/iniciativas/crear/paso1', [IniciativasController::class, 'verificarPaso1'])->name('admin.paso1.verificar');
    Route::post('admin/iniciativas/crear/{inic_codigo}/paso2', [IniciativasController::class, 'verificarPaso2'])->name('admin.paso2.verificar');
    Route::get('admin/iniciativas/{inic_codigo}/paso2', [IniciativasController::class, 'editarPaso2'])->name('admin.editar.paso2');
    Route::post('admin/iniciativa/guardar-resultado', [IniciativasController::class, 'guardarResultado'])->name('admin.resultado.guardar');
    Route::get('admin/iniciativa/listar-resultados', [IniciativasController::class, 'listarResultados'])->name('admin.resultados.listar');
    Route::post('admin/iniciativa/eliminar-resultado', [IniciativasController::class, 'eliminarResultado'])->name('admin.resultado.eliminar');
    // TODO: PASO 3
    Route::get('admin/iniciativa/{inic_codigo}/editar/paso3', [IniciativasController::class, 'editarPaso3'])->name('admin.editar.paso3');
    Route::post('admin/crear-iniciativa/guardar-dinero', [IniciativasController::class, 'guardarDinero'])->name('admin.dinero.guardar');
    Route::get('admin/crear-iniciativa/consultar-dinero', [IniciativasController::class, 'consultarDinero'])->name('admin.dinero.consultar');
    Route::get('admin/crear-iniciativa/buscar-tipoinfra', [IniciativasController::class, 'buscarTipoInfra'])->name('admin.tipoinfra.buscar');
    Route::get('admin/crear-iniciativa/listar-tipoinfra', [IniciativasController::class, 'listarTipoInfra'])->name('admin.tipoinfra.listar');
    Route::post('admin/crear-iniciativa/guardar-infraestructura', [IniciativasController::class, 'guardarInfraestructura'])->name('admin.infra.guardar');
    Route::get('admin/crear-iniciativa/listar-infraestructura', [IniciativasController::class, 'listarInfraestructura'])->name('admin.infra.listar');
    Route::post('admin/crear-iniciativa/eliminar-infraestructura', [IniciativasController::class, 'eliminarInfraestructura'])->name('admin.infra.eliminar');
    Route::get('admin/crear-iniciativa/consultar-infraestructura', [IniciativasController::class, 'consultarInfraestructura'])->name('admin.infra.consultar');
    Route::get('admin/crear-iniciativa/listar-tiporrhh', [IniciativasController::class, 'listarTipoRrhh'])->name('admin.tiporrhh.listar');
    Route::get('admin/crear-iniciativa/recursos', [IniciativasController::class, 'listarRecursos'])->name('admin.recursos.listar');
    Route::get('admin/crear-iniciativa/listar-rrhh', [IniciativasController::class, 'listarRrhh'])->name('admin.rrhh.listar');
    Route::get('admin/crear-iniciativa/buscar-tiporrhh', [IniciativasController::class, 'buscarTipoRrhh'])->name('admin.tiporrhh.buscar');
    Route::post('admin/crear-iniciativa/guardar-rrhh', [IniciativasController::class, 'guardarRrhh'])->name('admin.rrhh.guardar');
    Route::post('admin/crear-iniciativa/eliminar-rrhh', [IniciativasController::class, 'eliminarRRHH']);
    Route::get('admin/crear-iniciativa/consultar-rrhh', [IniciativasController::class, 'consultarRrhh'])->name('admin.rrhh.consultar');



    Route::post('admin/iniciativas/crear/socio', [IniciativasController::class, 'guardarSocioComunitario'])->name('admin.iniciativas.crear.socio');
    Route::get('admin/crear/iniciativa/listar-internos', [IniciativasController::class, 'listarInternos']);
    Route::get('admin/crear/iniciativa/listar-externos', [IniciativasController::class, 'listarExternos']);
    Route::post('admin/actualizar/participantes-internos', [IniciativasController::class, 'actualizarInternos']);
    Route::post('admin/iniciativas/agregar/participantes-externos', [IniciativasController::class, 'agregarExternos']);

    //todo: Update state iniciativa
    Route::post('/admin/iniciativas/update-state', [IniciativasController::class, 'updateState'])->name('admin.iniciativas.updateState');
    //todo: Add result iniciativa
    Route::get('admin/iniciativa/{inic_codigo}/cobertura', [IniciativasController::class, 'completarCobertura'])->name('admin.cobertura.index');
    Route::post('admin/iniciativa/{inic_codigo}/cobertura-interna', [IniciativasController::class, 'actualizarCobertura'])->name('admin.cobertura.interna.update');
    Route::post('admin/iniciativa/{inic_codigo}/cobertura-externa', [IniciativasController::class, 'actualizarCoberturaEx'])->name('admin.cobertura.externa.update');

    //todo:evidencias de iniciativas

    Route::get('admin/iniciativas/{inic_codigo}/listar-evidencias', [IniciativasController::class, 'listarEvidencia'])->name('admin.evidencias.listar');
    Route::post('admin/iniciativas/{inic_codigo}/guardar-evidencias', [IniciativasController::class, 'guardarEvidencia'])->name('admin.evidencia.guardar');
    Route::put('admin/iniciativa/evidencia/{inev_codigo}', [IniciativasController::class, 'actualizarEvidencia'])->name('admin.evidencia.actualizar');
    Route::post('admin/iniciativas/{inic_codigo}/descargar-evidencia', [IniciativasController::class, 'descargarEvidencia'])->name('admin.evidencia.descargar');
    Route::delete('admin/iniciativa/evidencia/{inev_codigo}', [IniciativasController::class, 'eliminarEvidencia'])->name('admin.evidencia.eliminar');
    // Route::get('admin/inicicativas/{inic_codigo}/cobertura',[IniciativasController::class,'ingresarCobertura'])->name('admin.cobertura.listar');

    //todo:fin evidencias de iniciativas

    Route::delete('admin/iniciativas/eliminar', [IniciativasController::class, 'eliminarIniciativas'])->name('admin.iniciativa.eliminar');
    // Route::post('admin/iniciativas/obtener-escuelas',[IniciativasController::class,'escuelasBySede']);
    Route::post('admin/iniciativas/obtener-escuelas/paso2', [IniciativasController::class, 'escuelasBySedesPaso2']);
    Route::post('admin/iniciativas/obtener-actividades', [IniciativasController::class, 'actividadesByMecanismos']);
    Route::post('admin/iniciativas/obtener-socio/paso2', [IniciativasController::class, 'sociosBySubgrupos']);
    Route::post('admin/iniciativas/obtener-pais', [IniciativasController::class, 'paisByTerritorio']);
    Route::post('admin/iniciativas/obtener-comunas', [IniciativasController::class, 'comunasByRegiones']);
    Route::post('admin/inicitiativa/eliminar-externo', [IniciativasController::class, 'eliminarExterno']);


    //fin de rutas para iniciativas

    // TODO: inicio rutas para gestionar usuarios
    Route::get('admin/listar-usuarios', [UsuariosController::class, 'listarUsuarios'])->name('admin.listar.usuarios');
    Route::post('admin/crear-usuario', [UsuariosController::class, 'crearUsuario'])->name('admin.crear.usuarios');
    Route::delete('admin/eliminar-usuario/', [UsuariosController::class, 'eliminarUsuario'])->name('admin.eliminar.usuarios');
    Route::post('admin/editar-usuario/{usua_nickname}', [UsuariosController::class, 'editarUsuario'])->name('admin.actualizar.usuarios');
    Route::put('admin/habilitar-usuario/{usua_nickname}', [UsuariosController::class, 'habilitarUsuario'])->name('admin.habilitar.usuarios');
    Route::put('admin/deshabilitar-usuario/{usua_nickname}', [UsuariosController::class, 'deshabilitarUsuario'])->name('admin.deshabilitar.usuarios');
    Route::post('admin/clave-usuario/{usua_nickname}', [UsuariosController::class, 'actualizarClaveUsuario'])->name('admin.actualizar.claveusuario');
    //fin de rutas para administrar usuarios

    // TODO: inicio rutas ODS
    Route::get('admin/ods', function () {
        return view('admin.ods.listar');
    })->name('admin.listar.ods');

    //fin de rutas para ODS
});
