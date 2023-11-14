@if (Session::has('admin'))
    @php
        $role = 'admin';
    @endphp
@elseif (Session::has('digitador'))
    @php
        $role = 'digitador';
    @endphp
@elseif (Session::has('observador'))
    @php
        $role = 'observador';
    @endphp
@elseif (Session::has('supervisor'))
    @php
        $role = 'supervisor';
    @endphp
@endif

@extends('admin.panel')

@section('contenido')
    <div class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if (Session::has('exito'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoAmbito') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6 alert-container" id="exito_ingresar" style="display: none;">
                            <div class="alert alert-success show fade mb-4 text-center">
                                <div class="alert-body">
                                    <strong>Evaluación ingresada correctamente</strong>
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 alert-container" id="exito_crear" style="display: none;">
                            <div class="alert alert-success show fade mb-4 text-center">
                                <div class="alert-body">
                                    <strong>Evaluación creada correctamente</strong>
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            @if (Session::has('exito'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exito') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('error') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                        <div class="col-6 alert-container" id="error">

                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">

                            <h4>Evaluación de la iniciativa: <span class="badge badge-primary"
                                    style="font-size: 120%">{{ $iniciativa[0]->inic_nombre }}</span> </h4>
                            <input type="hidden" name="iniciativa_codigo" id="iniciativa_codigo"
                                value="{{ $iniciativa[0]->inic_codigo }}">

                            <div class="card-header-action">
                                <div class="dropdown d-inline">
                                    <a href="{{ route('admin.iniciativas.detalles', $iniciativa[0]->inic_codigo) }}"
                                        class="btn btn-icon btn-warning icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Ver detalles de la iniciativa"><i
                                            class="fas fa-eye"></i>Ver detalle</a>

                                    <a href="{{ route('admin.editar.paso1', $iniciativa[0]->inic_codigo) }}"
                                        class="btn btn-icon btn-primary icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Editar iniciativa"><i class="fas fa-edit"></i>Editar
                                        Iniciativa</a>

                                    <a href="javascript:void(0)" class="btn btn-icon btn-info icon-left"
                                        data-toggle="tooltip" data-placement="top" title="Calcular INVI"
                                        onclick="calcularIndice({{ $iniciativa[0]->inic_codigo }})"><i
                                            class="fas fa-tachometer-alt"></i>INVI</a>

                                    <a href="{{ route('admin.evidencias.listar', $iniciativa[0]->inic_codigo) }}"
                                        class="btn btn-icon btn-success icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Adjuntar evidencia"><i
                                            class="fas fa-paperclip"></i>Evidencias</a>

                                    <a href="{{ route('admin.cobertura.index', $iniciativa[0]->inic_codigo) }}"
                                        class="btn btn-icon btn-success icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Ingresar cobertura"><i
                                            class="fas fa-users"></i>Cobertura</a>

                                    <a href="{{ route('admin.resultados.listado', $iniciativa[0]->inic_codigo) }}"
                                        class="btn btn-icon btn-success icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Ingresar resultado"><i
                                            class="fas fa-flag"></i>Resultado/s</a>

                                    {{-- <a href="{{ route($role . '.evaluar.iniciativa', $iniciativa[0]->inic_codigo) }}"
                                            class="btn btn-icon btn-success icon-left" data-toggle="tooltip"
                                            data-placement="top" title="Evaluar iniciativa"><i
                                                class="fas fa-file-signature"></i>Evaluar</a> --}}

                                    <a href="{{ route('admin.iniciativa.listar') }}"
                                        class="btn btn-primary mr-1 waves-effect icon-left" type="button">
                                        <i class="fas fa-angle-left"></i> Volver a listado
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-xl-1 col-lg-1"></div>
                            <div class="col-xl-5 col-lg-6">
                                <div class="card l-bg-green">
                                    <div class="card-statistic-3">
                                        <div class="card-icon card-icon-large"><i class="fa fa-user"></i></div>
                                        <div class="card-content">
                                            <h4 class="card-title">Crear evaluación</h4>
                                            <span>Tipo de Evaluador</span>
                                            <select class="form-control select2" name="tipo" id="tipo"
                                                onchange="mostrarOcultar()">
                                                <option value="" disabled selected>Seleccione...</option>
                                                <option value="1">Evaluador interno - Estudiante</option>
                                                <option value="2">Evaluador interno - Docente/Directivo</option>
                                                <option value="3">Evaluador externo</option>
                                                {{-- <option value="4">Limpiar</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $currentYear = now()->year;
                            @endphp

                            {{-- @if (intval($iniciativa[0]->inic_anho) < $currentYear) --}}
                            <div class="col-xl-5 col-lg-6">
                                <div class="card l-bg-cyan">
                                    <div class="card-statistic-3">
                                        <div class="card-icon card-icon-large"><i class="fa fa-calendar-times"></i></div>
                                        <div class="card-content">
                                            <h4 class="card-title">Ingresar evaluación</h4>
                                            <span>Tipo de Evalaución</span>
                                            <select class="form-control select2" name="ingresar" id="ingresar"
                                                onchange="ingresarEVAL()">
                                                <option value="" disabled selected>Seleccione...</option>
                                                <option value="2">Evaluación interno</option>
                                                <option value="3">Evaluación externa</option>
                                                {{-- <option value="4">Limpiar</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @endif --}}
                        </div>

                        <div id="AllForm" style="display: none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card card-primary">
                                            <div class="card-header" style="background-color: rgb(103,119,239);">
                                                <h4 style="color:aliceblue">Conocimiento de la evaluación</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <th>¿Sabía usted que el propósito de ésta
                                                                    actividad
                                                                    era?</th>
                                                                <th>¿Sí o No?</th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $iniciativa[0]->inic_descripcion }}
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="conocimiento_1_SINO_1"
                                                                                id="conocimiento_1_SINO_1_si"
                                                                                value="100" checked>
                                                                            <label class="form-check-label"
                                                                                for="conocimiento_1_SINO_1_si">
                                                                                SI</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="conocimiento_1_SINO_1"
                                                                                id="conocimiento_1_SINO_1_no"
                                                                                value="0">
                                                                            <label class="form-check-label"
                                                                                for="conocimiento_1_SINO_1_no">NO</label>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <th>¿Sabía usted que los resultados esperados de
                                                                    la
                                                                    actividad eran?</th>
                                                                <th>¿Sí o No?</th>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <ul>
                                                                        @foreach ($resultados as $resultado)
                                                                            <li>{{ $resultado->resu_cuantificacion_inicial }}
                                                                                x {{ $resultado->resu_nombre }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="conocimiento_2_SINO"
                                                                                id="conocimiento_2_SINO_si" value="100"
                                                                                checked>
                                                                            <label class="form-check-label"
                                                                                for="conocimiento_2_SINO_si">
                                                                                SI </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="conocimiento_2_SINO"
                                                                                id="conocimiento_2_SINO_no"
                                                                                value="0">
                                                                            <label class="form-check-label"
                                                                                for="conocimiento_2_SINO_no">
                                                                                NO </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                        <tbody>
                                                            <tr>
                                                                <th>¿Sabía usted que las contribuciones
                                                                    esperadas
                                                                    eran?</th>
                                                                <th>¿Sí o No?</th>
                                                                {{-- <th>¿En qué % cree usted que se cumplirán las contribuciones?</th> --}}
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <ul>
                                                                        @foreach ($ambitos as $ambito)
                                                                            <li>{{ $ambito->amb_nombre }}</li>
                                                                        @endforeach
                                                                    </ul>

                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="conocimiento_3_SINO"
                                                                                id="conocimiento_3_SINO_si" value="100"
                                                                                checked>
                                                                            <label class="form-check-label"
                                                                                for="conocimiento_3_SINO_si">
                                                                                SI </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="conocimiento_3_SINO"
                                                                                id="conocimiento_3_SINO_no"
                                                                                value="0">
                                                                            <label class="form-check-label"
                                                                                for="conocimiento_3_SINO_no">
                                                                                NO </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card card-primary">
                                            <div class="card-header" style="background-color: rgb(103,119,239);">
                                                <h4 style="color:aliceblue">Cumplimiento de la Iniciativa</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped" id="table-1">
                                                        <tbody>
                                                            <tr>
                                                                <th>¿En qué % cree usted que se cumplió el
                                                                    objetivo?
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_1"
                                                                                id="cumplimiento_1_0" value="0"
                                                                                checked>
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_1_0">
                                                                                No se cumplió </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_1"
                                                                                id="cumplimiento_1_25" value="25">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_1_25">
                                                                                25 % </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_1"
                                                                                id="cumplimiento_1_50" value="50">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_1_50">
                                                                                50 % </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_1"
                                                                                id="cumplimiento_1_75" value="75">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_1_75">
                                                                                75 % </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_1"
                                                                                id="cumplimiento_1_100" value="100">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_1_100">
                                                                                100 % </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <th>¿En qué % cree usted que se cumplió el
                                                                    resultado
                                                                    esperado?</th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_2"
                                                                                id="cumplimiento_2_0" value="0"
                                                                                checked>
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_2_0">
                                                                                No se cumplió </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_2"
                                                                                id="cumplimiento_2_25" value="25">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_2_25">
                                                                                25 % </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_2"
                                                                                id="cumplimiento_2_50" value="50">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_2_50">
                                                                                50 % </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_2"
                                                                                id="cumplimiento_2_75" value="75">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_2_75">
                                                                                75 % </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_2"
                                                                                id="cumplimiento_2_100" value="100">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_2_100">
                                                                                100 % </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                        <tbody>
                                                            <tr>
                                                                <th>¿En qué % cree usted que se cumplirán las
                                                                    contribuciones?</th>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_3"
                                                                                id="cumplimiento_3_0" value="0"
                                                                                checked>
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_3_0">
                                                                                No se cumplirán </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_3"
                                                                                id="cumplimiento_3_25" value="25">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_3_25">
                                                                                25 % </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_3"
                                                                                id="cumplimiento_3_50" value="50">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_3_50">
                                                                                50 % </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_3"
                                                                                id="cumplimiento_3_75" value="75">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_3_75">
                                                                                75 % </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="cumplimiento_3"
                                                                                id="cumplimiento_3_100" value="100">
                                                                            <label class="form-check-label"
                                                                                for="cumplimiento_3_100">
                                                                                100 % </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card card-info">
                                            <div class="card-header" style="background-color: rgb(58,186,244);">
                                                <h4 style="color:aliceblue">Calidad de ejecución</h4>
                                            </div>
                                            <div class="card-body">
                                                <label name="etiquetasEstudiante">A continuación te pedimos que
                                                    evalúes de 0 a 3 la calidad
                                                    en la ejecución de la actividad, según los compromisos
                                                    asumidos por la institución, en que
                                                    <ol>
                                                        <li>0= no cumple.</li>
                                                        <li>1= cumple mínimamente.</li>
                                                        <li>2= cumple medianamente.</li>
                                                        <li>3= cumple totalmente.</li>
                                                    </ol>
                                                    Si considera que algunos ítemes no estaban
                                                    comprometidos,
                                                    marque <b>No Aplica.</b>
                                                </label>

                                                <label name="etiquetasOtras">A continuación le pedimos que
                                                    evalúe de 0 a 3 la calidad
                                                    en la ejecución de la actividad, según los compromisos
                                                    asumidos por la institución, en que
                                                    <ol>
                                                        <li>0= no cumple.</li>
                                                        <li>1= cumple mínimamente.</li>
                                                        <li>2= cumple medianamente.</li>
                                                        <li>3= cumple totalmente.</li>
                                                    </ol>
                                                    Si considera que algunos ítemes no estaban
                                                    comprometidos,
                                                    marque <b>No Aplica.</b>
                                                </label>

                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th>Con qué nota evalúa usted la calidad en la
                                                                ejecución de la actividad, en las siguientes
                                                                dimensiones:</th>
                                                            <th>Cumplimiento</th>
                                                        </tr>
                                                        <tbody>
                                                            @for ($i = 1; $i <= 4; $i++)
                                                                <tr>
                                                                    @if ($i === 1)
                                                                        <td>
                                                                            Plazo y horarios
                                                                        </td>
                                                                    @endif
                                                                    @if ($i === 2)
                                                                        <td>
                                                                            Equipamiento y/o infraestructura
                                                                        </td>
                                                                    @endif
                                                                    @if ($i === 3)
                                                                        <td>
                                                                            Conexión Digital y/ logística
                                                                        </td>
                                                                    @endif
                                                                    @if ($i === 4)
                                                                        <td>
                                                                            Presentación y/o desarrollo de la
                                                                            actividad
                                                                        </td>
                                                                    @endif
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="calidad_{{ $i }}"
                                                                                    id="calidad_{{ $i }}_0"
                                                                                    value="0">
                                                                                <label class="form-check-label"
                                                                                    for="calidad_{{ $i }}_0">
                                                                                    0 </label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="calidad_{{ $i }}"
                                                                                    id="calidad_{{ $i }}_1"
                                                                                    value="33">
                                                                                <label class="form-check-label"
                                                                                    for="calidad_{{ $i }}_1">
                                                                                    1 </label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="calidad_{{ $i }}"
                                                                                    id="calidad_{{ $i }}_2"
                                                                                    value="66">
                                                                                <label class="form-check-label"
                                                                                    for="calidad_{{ $i }}_2">
                                                                                    2 </label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="calidad_{{ $i }}"
                                                                                    id="calidad_{{ $i }}_3"
                                                                                    value="100">
                                                                                <label class="form-check-label"
                                                                                    for="calidad_{{ $i }}_3">
                                                                                    3 </label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="calidad_{{ $i }}"
                                                                                    id="calidad_{{ $i }}_NO"
                                                                                    checked value="">
                                                                                <label class="form-check-label"
                                                                                    for="calidad_{{ $i }}_NO">
                                                                                    No Aplica </label>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div id="divAMostrar" name="divAMostrar">
                                            <div class="card card-secondary">
                                                <div class="card-header" style="background-color: rgb(55,60,97);">
                                                    <h4 style="color:aliceblue">Competencia de estudiantes</h4>
                                                </div>
                                                <div class="card-body">
                                                    <label name="etiquetasEstudiante">Ahora, siguiendo la misma
                                                        escala de 0 a 3, te pedimos que evalúes si te sirvió la
                                                        actividad para desarrollar
                                                        algunas de las siguientes dimensiones de las competencias
                                                        comprometidas.</label>

                                                    <label name="etiquetasOtras"> Ahora, siguiendo la misma escala
                                                        de 0 a 3, le pedimos que evalúe si la actividad le sirvió a
                                                        los estudiantes para
                                                        desarrollar algunas de las siguientes dimensiones de las
                                                        competencias comprometidas.</label>

                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Te sirvió la actividad para desarrollar
                                                                        algunas
                                                                        de las siguientes dimensiones de las
                                                                        competencias comprometidas?</th>
                                                                    <th>Cumplimiento</th>
                                                                </tr>

                                                                @for ($i = 1; $i <= 3; $i++)
                                                                    <tr>
                                                                        @if ($i === 1)
                                                                            <td>
                                                                                Capacidad para ejecutar las
                                                                                actividades.
                                                                            </td>
                                                                        @endif
                                                                        @if ($i === 2)
                                                                            <td>
                                                                                Actitud positiva para ejecutar
                                                                                actividades.
                                                                            </td>
                                                                        @endif
                                                                        @if ($i === 3)
                                                                            <td>
                                                                                Habilidad para resolver problemas.
                                                                            </td>
                                                                        @endif
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="competencia_{{ $i }}"
                                                                                        id="competencia_{{ $i }}_0"
                                                                                        value="0">
                                                                                    <label class="form-check-label"
                                                                                        for="competencia_{{ $i }}_0">
                                                                                        0 </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="competencia_{{ $i }}"
                                                                                        id="competencia_{{ $i }}_1"
                                                                                        value="33">
                                                                                    <label class="form-check-label"
                                                                                        for="competencia_{{ $i }}_1">
                                                                                        1 </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="competencia_{{ $i }}"
                                                                                        id="competencia_{{ $i }}_2"
                                                                                        value="66">
                                                                                    <label class="form-check-label"
                                                                                        for="competencia_{{ $i }}_2">
                                                                                        2 </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="competencia_{{ $i }}"
                                                                                        id="competencia_{{ $i }}_3"
                                                                                        value="100">
                                                                                    <label class="form-check-label"
                                                                                        for="competencia_{{ $i }}_3">
                                                                                        3 </label>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endfor
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <a href="#" class="btn btn-icon icon-left btn-success"
                                                onclick="enviarDatos()">
                                                <i class="fas fa-check"></i>
                                                <span style="font-size: 150%">FINALIZAR EVALUACIÓN</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="AllTable" style="display: none">
                            <div class="card-body">

                                <div class="row mt-3">
                                    <div class="col-3"></div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-md">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Item</th>
                                                                <th scope="col">Año de la Iniciativa</th>
                                                                <th scope="col">Puntaje</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="body-tabla-participantes">
                                                            {{-- {{$resultados}} --}}

                                                            <tr>
                                                                <td name="Eval_Interna">Evaluación Interna</td>
                                                                <td name="Eval_Externa">Evaluación Externa</td>
                                                                <td>{{ $iniciativa[0]->inic_anho }}</td>
                                                                <td>
                                                                    <input type="number" class="form-control"
                                                                        id="puntaje_obtenido" name="puntaje_obtenido"
                                                                        value="" min="0" max="100">
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-12 text-right">
                                                <input type="hidden" id="inic_codigo" name="inic_codigo"
                                                    value="">
                                                <button type="submit" class="btn btn-primary mr-1 waves-effect"
                                                    onclick="enviarEval()"><i class="fas fa-save"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary collapsed" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample" onclick="listarEval({{ $iniciativa[0]->inic_codigo }})">
                        Evaluaciones creadas
                    </a>
                </div>
                <div class="card-body">
                    <div class="collapse" id="collapseExample">
                        <?php
                        $totalEvaluaciones = count($evaluaciones);
                        $promedioPuntajes = $totalEvaluaciones > 0 ? round($evaluaciones->sum('eval_puntaje') / $totalEvaluaciones) : 0;
                        ?>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <div class="card card-statistic-2">
                                    <div class="card-icon l-bg-green">
                                        <i class="fas fa-file-signature"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="padding-20">
                                            <div class="text-right">
                                                <h3 class="font-light mb-0">
                                                    <i class="ti-arrow-up text-success"></i> <label id="N_evaluacion"></label>
                                                </h3>
                                                <span class="text-muted">Evaluaciones</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <div class="card card-statistic-2">
                                    <div class="card-icon l-bg-cyan">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="padding-20">
                                            <div class="text-right">
                                                <h3 class="font-light mb-0">
                                                    <i class="ti-arrow-up text-success"></i> <label id="P_evaluacion"></label>
                                                </h3>
                                                <span class="text-muted">Puntaje Promedio</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1" style="font-size: 110%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ingresada por</th>
                                        <th>Tipo de evaluación</th>
                                        <th>Puntaje de la evaluación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                {{-- {{}} --}}
                                <tbody id="body-tabla-evaluaciones">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>













    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true" id="myModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Datos Guardados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Redirigiendo al listado de Iniciativas....
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalINVI" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Índice de vinculación INVI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md" id="table-1"
                            style="border-top: 1px ghostwhite solid;">
                            <tbody>
                                <tr>
                                    <td><strong>Mecanismo</strong></td>
                                    <td id="mecanismo-nombre"></td>
                                    <td id="mecanismo-puntaje"></td>
                                </tr>
                                <tr>
                                    <td><strong>Frecuencia</strong></td>
                                    <td id="frecuencia-nombre"></td>
                                    <td id="frecuencia-puntaje"></td>
                                </tr>
                                <tr>
                                    <td><strong>Resultados</strong></td>
                                    <td id="resultados-nombre"></td>
                                    <td id="resultados-puntaje"></td>
                                </tr>
                                <tr>
                                    <td><strong>Cobertura</strong></td>
                                    <td id="cobertura-nombre"></td>
                                    <td id="cobertura-puntaje"></td>
                                </tr>
                                <tr>
                                    <td><strong>Evaluación</strong></td>
                                    <td id="evaluacion-nombre"></td>
                                    <td id="evaluacion-puntaje"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6>Índice de vinculación INVI</h6>
                                    </td>
                                    <td id="valor-indice"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminaEvaluacion" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.eliminar.evaluacion') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Evaluación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">La evaluación dejará de existir dentro del sistema. <br> ¿Desea continuar de
                            todos modos? <br> Considere que su decición influirá en el valor del indicador INVI</h6>
                        <input type="hidden" id="eval_codigo" name="eval_codigo" value="">
                        <input type="hidden" id="inic_codigo" name="inic_codigo" value="{{ $iniciativa[0]->inic_codigo }}">
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Continuar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/admin/iniciativas/INVI.js') }}"></script>
    <script>
        var token = '{{ csrf_token() }}';

        function eliminarEval(eval_codigo) {
            $('#modalEliminaEvaluacion').find('#eval_codigo').val(eval_codigo);
            $('#modalEliminaEvaluacion').modal('show');
        }

        function ingresarEVAL() {
            var selectBox = document.getElementById("ingresar");
            var etiquetasInterna = document.getElementsByName('Eval_Interna');
            var etiquetasExterna = document.getElementsByName('Eval_Externa');
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            /* Mostrar Tabla */
            var MostrarTabla = document.getElementById("AllTable");
            MostrarTabla.style.display = "block";
            /* Ocultar Formulario */
            var MostrarSiempre = document.getElementById("AllForm");
            MostrarSiempre.style.display = "none";

            /* Interna */
            if (selectedValue === "2") {
                mostrarEtiquetas(etiquetasInterna);
                ocultarEtiquetas(etiquetasExterna);
            }
            /* Externa */
            if (selectedValue === "3") {
                ocultarEtiquetas(etiquetasInterna);
                mostrarEtiquetas(etiquetasExterna);
            }
            /* Limpiar */
            if (selectedValue === "4") {
                MostrarTabla.style.display = "none";
                MostrarSiempre.style.display = "none";
            }

        }

        function mostrarOcultar() {
            var selectBox = document.getElementById("tipo");

            var etiquetasEstudiante = document.getElementsByName('etiquetasEstudiante');
            var etiquetasOtras = document.getElementsByName('etiquetasOtras');


            var selectedValue = selectBox.options[selectBox.selectedIndex].value;

            // Obtén el div por su ID
            var divAMostrar = document.getElementById("divAMostrar");
            /* Mostrar Formulario */
            var MostrarSiempre = document.getElementById("AllForm");
            MostrarSiempre.style.display = "block";
            /* Ocultar Tabla */
            var MostrarTabla = document.getElementById("AllTable");
            MostrarTabla.style.display = "none";


            ocultarEtiquetas(etiquetasEstudiante);
            ocultarEtiquetas(etiquetasOtras);

            // Oculta el div si la opción seleccionada es "Evaluador externo", de lo contrario, muéstralo
            if (selectedValue === "1") {
                mostrarEtiquetas(etiquetasEstudiante);
            } else {
                mostrarEtiquetas(etiquetasOtras);
            }

            if (selectedValue === "3") {
                divAMostrar.style.display = "none";
            } else {
                divAMostrar.style.display = "block";
            }
            if (selectedValue === "4") {
                MostrarSiempre.style.display = "none";
                MostrarTabla.style.display = "none";
            }
        }

        function ocultarEtiquetas(etiquetas) {
            for (let i = 0; i < etiquetas.length; i++) {
                etiquetas[i].style.display = 'none';
            }
        }

        function mostrarEtiquetas(etiquetas) {
            for (let i = 0; i < etiquetas.length; i++) {
                etiquetas[i].style.display = 'block';
            }
        }

        function enviarDatos() {
            var tipo_data = $("#tipo").val();
            var competencia1Seleccionada = false;
            var competencia2Seleccionada = false;
            var competencia3Seleccionada = false;
            // Recopilar los datos
            var Validation1 = document.querySelectorAll('input[name="competencia_1"]');
            var Validation2 = document.querySelectorAll('input[name="competencia_2"]');
            var Validation3 = document.querySelectorAll('input[name="competencia_3"]');

            Validation1.forEach(function(Validatio) {
                if (Validatio.checked) {
                    competencia1Seleccionada = true;
                }
            });

            Validation2.forEach(function(Validatio) {
                if (Validatio.checked) {
                    competencia2Seleccionada = true;
                }
            });

            Validation3.forEach(function(Validatio) {
                if (Validatio.checked) {
                    competencia3Seleccionada = true;
                }
            });

            if (tipo_data === "1" || tipo_data === "2") {
                if (competencia1Seleccionada === false || competencia2Seleccionada === false || competencia3Seleccionada ===
                    false) {
                    alert('No olvides evaluar TODAS las competencias');
                    return false;
                }
            }


            var datos = {
                iniciativa_codigo: $("#iniciativa_codigo").val(),
                tipo_data: $("#tipo").val(),
                conocimiento_1_data: $("input[name='conocimiento_1_SINO_1']:checked").val(),
                conocimiento_2_data: $("input[name='conocimiento_2_SINO']:checked").val(),
                conocimiento_3_data: $("input[name='conocimiento_3_SINO']:checked").val(),
                cumplimiento_1_data: $("input[name='cumplimiento_1']:checked").val(),
                cumplimiento_2_data: $("input[name='cumplimiento_2']:checked").val(),
                cumplimiento_3_data: $("input[name='cumplimiento_3']:checked").val(),
                calidad_1_data: $("input[name='calidad_1']:checked").val(),
                calidad_2_data: $("input[name='calidad_2']:checked").val(),
                calidad_3_data: $("input[name='calidad_3']:checked").val(),
                calidad_4_data: $("input[name='calidad_4']:checked").val(),
                competencia_1_data: $("input[name='competencia_1']:checked").val(),
                competencia_2_data: $("input[name='competencia_2']:checked").val(),
                competencia_3_data: $("input[name='competencia_3']:checked").val(),
            };

            $.ajax({
                type: "GET",
                url: window.location.origin + '/admin/iniciativas/evaluar',
                data: datos,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    /* Mostrar Formulario */
                    var MostrarSiempre = document.getElementById("AllForm");
                    MostrarSiempre.style.display = "none";
                    /* Ocultar Tabla */
                    var MostrarTabla = document.getElementById("AllTable");
                    MostrarTabla.style.display = "none";

                    var alerta = document.getElementById("exito_crear");
                    alerta.style.display = "block";

                    reiniciarRadios();

                    $("#puntaje_obtenido").val("");
                    setTimeout(function() {
                        alerta.style.display = "none";
                    }, 2000);
                },
                error: function(error) {
                    console.error(error);
                    /* $('.alert-container').hide();
                    $('#error').show(); */
                }
            });
        }

        function enviarEval() {
            var tipo_data = $("#tipo").val();
            // Recopilar los datos

            var datos = {
                iniciativa_codigo: $("#iniciativa_codigo").val(),
                tipo_data: $("#ingresar").val(),
                puntaje: $("#puntaje_obtenido").val(),
            };

            $.ajax({
                type: "GET",
                url: window.location.origin + '/admin/iniciativas/ingresoEvaluacion',
                data: datos,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    /* Mostrar Formulario */
                    var MostrarSiempre = document.getElementById("AllForm");
                    MostrarSiempre.style.display = "none";
                    /* Ocultar Tabla */
                    var MostrarTabla = document.getElementById("AllTable");
                    MostrarTabla.style.display = "none";

                    var alerta = document.getElementById("exito_ingresar");
                    alerta.style.display = "block";
                    $("#puntaje_obtenido").val("");



                    setTimeout(function() {
                        alerta.style.display = "none";
                    }, 2000);

                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        function reiniciarRadios() {
            // Cambia 'conocimiento_1_SINO_1_si' y 'conocimiento_1_SINO_1_no' a los IDs reales de tus radio buttons
            $('#conocimiento_1_SINO_1_si').prop('checked', true);
            $('#conocimiento_2_SINO_si').prop('checked', true);
            $('#conocimiento_3_SINO_si').prop('checked', true);
            $('#cumplimiento_1_0').prop('checked', true);
            $('#cumplimiento_2_0').prop('checked', true);
            $('#cumplimiento_3_0').prop('checked', true);
            $('#calidad_1_NO').prop('checked', true);
            $('#calidad_2_NO').prop('checked', true);
            $('#calidad_3_NO').prop('checked', true);
            $('#calidad_4_NO').prop('checked', true);
            $('#competencia_1_0').prop('checked', false);
            $('#competencia_1_1').prop('checked', false);
            $('#competencia_1_2').prop('checked', false);
            $('#competencia_1_3').prop('checked', false);
            $('#competencia_2_0').prop('checked', false);
            $('#competencia_2_1').prop('checked', false);
            $('#competencia_2_2').prop('checked', false);
            $('#competencia_2_3').prop('checked', false);
            $('#competencia_3_0').prop('checked', false);
            $('#competencia_3_1').prop('checked', false);
            $('#competencia_3_2').prop('checked', false);
            $('#competencia_3_3').prop('checked', false);
            $('#conocimiento_1_SINO_1_si').prop('checked', true);
        }

        function listarEval(inic_code) {
            $.ajax({
                type: 'GET',
                url: `${window.location.origin}/admin/iniciativa/listar-evaluaciones`,
                data: {
                    _token: '{{ csrf_token() }}',
                    inic_codigo: inic_code
                },

                success: function(resConsultar) {
                    respuesta = JSON.parse(resConsultar);
                    $('#body-tabla-evaluaciones').empty();
                    $('#N_evaluacion').empty();
                    $('#P_evaluacion').empty();

                    datos_evaluaciones = respuesta.resultado;
                    let contador = 0;
                    let ptj = 0;

                    datos_evaluaciones.forEach(registro => {
                        contador = contador + 1;
                        ptj = ptj + registro.eval_puntaje;
                        let evaluacionTipo = registro.eval_evaluador === 2 ? 'Evaluación Interna' : 'Evaluación Externa';

                        fila = `<tr>
                            <td>${contador}</td>
                            <td>${registro.eval_nickname_mod}</td>
                            <td>${evaluacionTipo}</td>
                            <td>${registro.eval_puntaje}</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                    onclick="eliminarEval(${registro.eval_codigo})"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Eliminar mecanismo"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>`

                        $('#body-tabla-evaluaciones').append(fila);
                    });

                    $('#N_evaluacion').text(contador);
                    $('#P_evaluacion').text(Math.round(ptj / contador));
                }
            })
        }

        // Llamas a la función para reiniciar los radio buttons cuando sea necesario


        /* $(document).ready(function() {
            var urlParams = new URLSearchParams(window.location.search);
            var exito = urlParams.get('exito');
            if (exito) {
                // Aquí puedes mostrar tu alerta de éxito
                alert(exito);
            }
        }); */
    </script>
@endsection
