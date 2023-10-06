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
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">

                            <h4>Evaluación de la iniciativa N°: <span class="badge badge-primary"
                                    style="font-size: 120%">{{ $iniciativa[0]->inic_codigo }}</span> </h4>
                            <input type="hidden" name="iniciativa_codigo" id="iniciativa_codigo" value="{{ $iniciativa[0]->inic_codigo }}">

                            <div class="card-header-action">
                                <a href="{{ route($role . '.iniciativa.listar') }}" data-toggle="tooltip" data-placemet="top"
                                    type="button" class="btn btn-info btn-icon icon-left" title="Ir a iniciativas">
                                    <i class="fas fa-bars"></i>
                                    Volver al listado
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            <div class="card l-bg-green">
                                <div class="card-statistic-3">
                                    <div class="card-icon card-icon-large"><i class="fa fa-user"></i></div>
                                    <div class="card-content">
                                        <h4 class="card-title">Tipo de evaluador</h4>
                                        <select class="form-control select2" name="tipo" id="tipo"
                                            onchange="mostrarOcultar()">
                                            <option value="" disabled selected>Seleccione...</option>
                                            <option value="1">Evaluador interno - Estudiante</option>
                                            <option value="2">Evaluador interno - Docente/Directivo</option>
                                            <option value="3">Evaluador externo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                                                                id="conocimiento_1_SINO_1_si" value="100"
                                                                                checked>
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
                                                                                id="conocimiento_2_SINO_no" value="0">
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
                                                                                id="conocimiento_3_SINO_no" value="0">
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
                                                                                    value="1">
                                                                                <label class="form-check-label"
                                                                                    for="calidad_{{ $i }}_1">
                                                                                    1 </label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="calidad_{{ $i }}"
                                                                                    id="calidad_{{ $i }}_2"
                                                                                    value="2">
                                                                                <label class="form-check-label"
                                                                                    for="calidad_{{ $i }}_2">
                                                                                    2 </label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="calidad_{{ $i }}"
                                                                                    id="calidad_{{ $i }}_3"
                                                                                    value="3">
                                                                                <label class="form-check-label"
                                                                                    for="calidad_{{ $i }}_3">
                                                                                    3 </label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio"
                                                                                    name="calidad_{{ $i }}"
                                                                                    id="calidad_{{ $i }}_NO"
                                                                                    checked value="-1">
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
                                                                                        checked value="0">
                                                                                    <label class="form-check-label"
                                                                                        for="competencia_{{ $i }}_0">
                                                                                        0 </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="competencia_{{ $i }}"
                                                                                        id="competencia_{{ $i }}_1"
                                                                                        value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="competencia_{{ $i }}_1">
                                                                                        1 </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="competencia_{{ $i }}"
                                                                                        id="competencia_{{ $i }}_2"
                                                                                        value="2">
                                                                                    <label class="form-check-label"
                                                                                        for="competencia_{{ $i }}_2">
                                                                                        2 </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="competencia_{{ $i }}"
                                                                                        id="competencia_{{ $i }}_3"
                                                                                        value="3">
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
                                                onclick="enviarDatos()" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="fas fa-check"></i>
                                                <span style="font-size: 150%">FINALIZAR EVALUACIÓN</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
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


    <script>
        var token = '{{ csrf_token() }}';

        function mostrarOcultar() {
            var selectBox = document.getElementById("tipo");

            var etiquetasEstudiante = document.getElementsByName('etiquetasEstudiante');
            var etiquetasOtras = document.getElementsByName('etiquetasOtras');


            var selectedValue = selectBox.options[selectBox.selectedIndex].value;

            // Obtén el div por su ID
            var divAMostrar = document.getElementById("divAMostrar");
            var MostrarSiempre = document.getElementById("AllForm");
            MostrarSiempre.style.display = "block";

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
            // Recopilar los datos
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
                    /* console.log(response); */
                    window.location.href = response.redirect;
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    </script>
@endsection
