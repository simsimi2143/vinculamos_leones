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
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if (Session::has('exitoIniciativa'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoIniciativa') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-6">
                            @if (Session::has('errorIniciativa'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorIniciativa') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de Iniciativas</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.iniciativa.listar') }}" method="GET">
                                <div class="row">
                                    <div class="col-xl-3 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label>Filtrar por Escuela</label>
                                            <select class="form-control select2" style="width: 100%" id="filtro2" name="filtro2" onchange="filtrarTablaxMecanismo()">
                                                <option value="" selected>TODOS</option>
                                                @forelse ($escuelas as $escuela)
                                                    <option value="{{ $escuela->escu_nombre }}" {{ Request::get('escuela') == $escuela->escu_nombre ? 'selected' : '' }}>{{ $escuela->escu_nombre }}</option>
                                                @empty
                                                    <option value="-1">No existen registros</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label>Filtrar por Carreras</label>
                                            <select class="form-control select2" style="width: 100%" id="filtro3" name="filtro3" onchange="filtrarTablaxMecanismo()">
                                                <option value="" selected>TODOS</option>
                                                @forelse ($carreras as $carrera)
                                                    <option value="{{ $carrera->care_nombre }}" {{ Request::get('carrera') == $carrera->care_nombre ? 'selected' : '' }}>{{ $carrera->care_nombre }}</option>
                                                @empty
                                                    <option value="-1">No existen registros</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label>Filtrar por Mecanismo</label>
                                            <select class="form-control select2" style="width: 100%" id="mecanismo" name="mecanismo" onchange="filtrarTablaxMecanismo()">
                                                <option value="" selected>TODOS</option>
                                                @forelse ($mecanismos as $mecanismo)
                                                    <option value="{{ $mecanismo->meca_nombre }}" {{ Request::get('mecanismo') == $mecanismo->meca_nombre ? 'selected' : '' }}>{{ $mecanismo->meca_nombre }}</option>
                                                @empty
                                                    <option value="-1">No existen registros</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label>Filtrar por Año</label>
                                            <select class="form-control select2" style="width: 100%" id="ano" name="ano" onchange="filtrarTablaxMecanismo()">
                                                <option value="" selected>TODOS</option>
                                                @forelse ($anhos as $ann)
                                                    <option value="{{ $ann->inic_anho }}" {{ Request::get('mecanismo') == $ann->inic_anho ? 'selected' : '' }}>{{ $ann->inic_anho }}</option>
                                                @empty
                                                    <option value="-1">No existen registros</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-4 col-md-4 col-lg-4  mb-4">
                                        <a href="{{ route('admin.iniciativa.listar') }}" type="button" class="btn btn-primary mr-1 waves-effect"><i class="fas fa-broom"></i> Limpiar</a>
                                    </div> --}}
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>

                                            <th>Nombre</th>
                                            <th>Mecanismo</th>
                                            <th>Año</th>
                                            <th>Escuelas</th>
                                            <th>Carreras</th>
                                            <th>Estado</th>
                                            <th>Fecha de creación</th>
                                            <th style="width: 250px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla-iniciativas">
                                        @foreach ($iniciativas as $iniciativa)
                                        <tr data-meca="{{ $iniciativa->meca_nombre }}" data-ano="{{ $iniciativa->inic_anho }}"

                                            data-filtro2="{{ json_encode(explode('/ ', $iniciativa->escuelas)) }}"
                                            data-filtro3="{{ json_encode(explode(', ', $iniciativa->carreras)) }}">
                                                <td>{{ $iniciativa->inic_nombre }}</td>
                                                <td>{{ $iniciativa->meca_nombre }}</td>
                                                <td>{{ $iniciativa->inic_anho }}</td>
                                                <td>
                                                    @php
                                                        $escuelasArray = explode('/', $iniciativa->escuelas);
                                                    @endphp
                                                    @if (count($escuelasArray) > 3)
                                                        Todas
                                                    @else
                                                        {{ $iniciativa->escuelas }}
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $iniciativa->carreras }}</td> --}}
                                                <td>
                                                    @php
                                                        $carrerasArray = explode(',', $iniciativa->carreras);
                                                    @endphp
                                                    @if (count($carrerasArray) > 29)
                                                        Todas
                                                    @else
                                                        {{ $iniciativa->carreras }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $estadoBadges = [
                                                            1 => ['class' => 'light', 'icon' => 'history', 'text' => 'En revisión'],
                                                            2 => ['class' => 'info', 'icon' => 'play-circle', 'text' => 'En ejecución'],
                                                            3 => ['class' => 'success', 'icon' => 'lock', 'text' => 'Aceptada'],
                                                            4 => ['class' => 'info', 'icon' => 'info-circle', 'text' => 'Falta info'],
                                                            5 => ['class' => 'primary', 'icon' => 'pause-circle', 'text' => 'Cerrada'],
                                                            6 => ['class' => 'success', 'icon' => 'check-double', 'text' => 'Finalizada'],
                                                        ];
                                                    @endphp

                                                    <div
                                                        class="badge badge-{{ $estadoBadges[$iniciativa->inic_estado]['class'] }} badge-shadow">
                                                        <i
                                                            class="fas fa-{{ $estadoBadges[$iniciativa->inic_estado]['icon'] }}"></i>
                                                        {{ $estadoBadges[$iniciativa->inic_estado]['text'] }}
                                                    </div>
                                                </td>
                                                <td>{{ $iniciativa->inic_creado }}</td>
                                                <td>
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-primary dropdown-toggle"
                                                            id="dropdownMenuButton2" data-toggle="dropdown"title="Opciones">
                                                            <i class="fas fa-cog"></i> </button>
                                                        <div class="dropdown-menu dropright">

                                                            <a href="{{ route('admin.editar.paso1', $iniciativa->inic_codigo) }}"
                                                                class="dropdown-item has-icon"><i
                                                                    class="fas fa-edit"></i>Editar Iniciativa</a>
                                                            <a href="javascript:void(0)" class="dropdown-item has-icon"
                                                                onclick="eliminarIniciativa({{ $iniciativa->inic_codigo }})"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Eliminar">Eliminar Iniciativa<i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>
                                                    </div>

                                                    <a href="{{ route('admin.iniciativas.detalles', $iniciativa->inic_codigo) }}"
                                                        class="btn btn-icon btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Ver detalles"><i
                                                            class="fas fa-eye"></i></a>


                                                    <a href="{{ route('admin.evidencias.listar', $iniciativa->inic_codigo) }}"
                                                        class="btn btn-icon btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Adjuntar evidencia"><i
                                                            class="fas fa-paperclip"></i></a>

                                                    <a href="{{ route('admin.cobertura.index', $iniciativa->inic_codigo) }}"
                                                        class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Ingresar cobertura"><i
                                                            class="fas fa-users"></i></a>
                                                    <a href="{{ route('admin.resultados.listado', $iniciativa->inic_codigo) }}"
                                                        class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Ingresar resultado"><i
                                                            class="fas fa-flag"></i></a>

                                                    {{-- <a href="" class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Ingresar resultado"><i
                                                            class="fas fa-flag"></i></a>

                                                    <a href="" class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Evaluar iniciativa"><i
                                                            class="fas fa-file-signature"></i></a> --}}

                                                    <a href="{{ route($role . '.evaluar.iniciativa', $iniciativa->inic_codigo) }}" class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Evaluar iniciativa"><i
                                                            class="fas fa-file-signature"></i></a>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modalEliminaIniciativa" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.iniciativa.eliminar') }} " method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Iniciativa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">La iniciativa dejará de existir dentro del sistema. <br> ¿Desea continuar de
                            todos
                            modos?</h6>
                        <input type="hidden" id="inic_codigo" name="inic_codigo" value="">
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Continuar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalINVI" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
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
                        <table class="table table-bordered table-md" id="table-1" style="border-top: 1px ghostwhite solid;">
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
                                    <td><strong>Cobertura</strong></td>
                                    <td></td>
                                    <td id="cobertura-puntaje"></td>
                                </tr>
                                <tr>
                                    <td><strong>Resultados</strong></td>
                                    <td></td>
                                    <td id="resultados-puntaje"></td>
                                </tr>
                                <tr>
                                    <td><strong>Evaluación</strong></td>
                                    <td></td>
                                    <td id="evaluacion-puntaje"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h6>Índice de vinculación INVI</h6></td>
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

    <script>


        function eliminarIniciativa(inic_codigo) {
            $('#inic_codigo').val(inic_codigo);
            $('#modalEliminaIniciativa').modal('show');
        }


        function filtrarTablaxMecanismo() {
            const selectElement = document.querySelector('select[name="table-1_length"]');
            selectElement.selectedIndex = 3;
            const changeEvent = new Event('change', { bubbles: true });
            selectElement.dispatchEvent(changeEvent);

            const mecaSeleccionado = document.getElementById('mecanismo').value;
            const anoSeleccionado = document.getElementById('ano').value;
            const filtro2Seleccionado = document.getElementById('filtro2').value;
            const filtro3Seleccionado = document.getElementById('filtro3').value;

            console.log(filtro2Seleccionado);

            const filasTabla = document.querySelectorAll('#tabla-iniciativas tr');


            filasTabla.forEach(function (fila) {
                const mecaFila = fila.getAttribute('data-meca');
                const anoFila = fila.getAttribute('data-ano');
                const data_filtro2 = JSON.parse(fila.getAttribute('data-filtro2')); // Parsea JSON a objeto o array
                const data_filtro3 = JSON.parse(fila.getAttribute('data-filtro3')); // Parsea JSON a objeto o array

                const filtroMeca = mecaSeleccionado === '' || mecaSeleccionado === mecaFila;
                const filtroEstado = anoSeleccionado === '' || anoSeleccionado === anoFila;
                const resultado2 = filtro2Seleccionado === '' || data_filtro2.includes(filtro2Seleccionado);
                const resultado3 = filtro3Seleccionado === '' || data_filtro3.includes(filtro3Seleccionado);

                if (filtroMeca && filtroEstado && resultado2 && resultado3) {
                    fila.style.display = ''; // Mostrar la fila
                } else {
                    fila.style.display = 'none'; // Ocultar la fila
                }
                if (mecaSeleccionado === '' && anoSeleccionado === '' && filtro2Seleccionado === '' && filtro3Seleccionado === '') {
                    selectElement.selectedIndex = 0;
                    selectElement.dispatchEvent(changeEvent);
                    fila.style.display = 'table-row';
                }
            });
        }

        /* function calcularIndice(inic_codigo) {
            let datos;
            let mecanismo, frecuencia, cobertura, resultados, evaluacion;
            let partInicial, partFinal;
            let resuInicial, resuFinal;
            let indice;

$.ajax({
    type: 'GET',
    url: window.location.origin+'/admin/iniciativa/invi/datos',
    data: {
        iniciativa: inic_codigo
    },
    success: function(resConsultar) {
        respuesta = JSON.parse(resConsultar);
        datos = respuesta.resultado;

        mecanismo = datos.mecanismo.meca_puntaje;
        frecuencia = datos.frecuencia.frec_puntaje;

        cobertura = 0;
        partInicial = 0;
        partFinal = 0;
        if (datos.cobertura.length > 0) {
            datos.cobertura.forEach(registro => {
                partInicial = partInicial + parseInt(registro.part_cantidad_inicial);
                partFinal = partFinal + parseInt(registro.part_cantidad_final);
            });
            if (partInicial > 0) cobertura = Math.round((partFinal*100)/partInicial);
            if (cobertura > 100) cobertura = 100;
        }

        resultados = 0;
        resuInicial = 0;
        resuFinal = 0;
        if (datos.resultados.length > 0) {
            datos.resultados.forEach(registro => {
                resuInicial = resuInicial + parseInt(registro.resu_cuantificacion_inicial);
                resuFinal = resuFinal + parseInt(registro.resu_cuantificacion_final);
            });
            if (resuInicial > 0) resultados = Math.round((resuFinal*100)/resuInicial);
            if (resultados > 100) resultados = 100;
        }

        evaluacion = 0;
        if (datos.evaluacion != null) {
            evaluacion = parseInt(datos.evaluacion.eval_plazos)+parseInt(datos.evaluacion.eval_horarios)+parseInt(datos.evaluacion.eval_infraestructura)+
                    parseInt(datos.evaluacion.eval_equipamiento)+parseInt(datos.evaluacion.eval_conexion_dl)+parseInt(datos.evaluacion.eval_desempenho_responsable)+
                    parseInt(datos.evaluacion.eval_desempenho_participantes)+parseInt(datos.evaluacion.eval_calidad_presentaciones);
            evaluacion = Math.round((evaluacion * 20) / 8);
        }

        indice = Math.round(0.2*mecanismo + 0.1*frecuencia + 0.1*cobertura + 0.35*evaluacion + 0.25*resultados);

        $('#mecanismo-nombre').text(datos.mecanismo.meca_nombre);
        $('#frecuencia-nombre').text(datos.frecuencia.frec_nombre);
        $('#mecanismo-puntaje').text(mecanismo);
        $('#frecuencia-puntaje').text(frecuencia);
        $('#cobertura-puntaje').text(cobertura);
        $('#resultados-puntaje').text(resultados);
        $('#evaluacion-puntaje').text(evaluacion);
        $('#valor-indice').text(indice);
        $('#modalINVI').modal('show');
    },
    error: function(error) {
        console.log(error);
    }
}); */


        /* function calcularIndice(inic_codigo) {
            let datos;
            let mecanismo, frecuencia, cobertura, resultados, evaluacion;
            let partInicial, partFinal;
            let resuInicial, resuFinal;
            let indice;

            $.ajax({
                type: 'GET',
                url: window.location.origin+'/admin/iniciativa/invi/datos',
                data: {
                    iniciativa: inic_codigo
                },
                success: function(resConsultar) {
                    respuesta = JSON.parse(resConsultar);
                    datos = respuesta.resultado;

                    mecanismo = datos.mecanismo.meca_puntaje;
                    frecuencia = datos.frecuencia.frec_puntaje;

                    cobertura = 0;
                    partInicial = 0;
                    partFinal = 0;
                    if (datos.cobertura.length > 0) {
                        datos.cobertura.forEach(registro => {
                            partInicial = partInicial + parseInt(registro.part_cantidad_inicial);
                            partFinal = partFinal + parseInt(registro.part_cantidad_final);
                        });
                        if (partInicial > 0) cobertura = Math.round((partFinal*100)/partInicial);
                        if (cobertura > 100) cobertura = 100;
                    }

                    resultados = 0;
                    resuInicial = 0;
                    resuFinal = 0;
                    if (datos.resultados.length > 0) {
                        datos.resultados.forEach(registro => {
                            resuInicial = resuInicial + parseInt(registro.resu_cuantificacion_inicial);
                            resuFinal = resuFinal + parseInt(registro.resu_cuantificacion_final);
                        });
                        if (resuInicial > 0) resultados = Math.round((resuFinal*100)/resuInicial);
                        if (resultados > 100) resultados = 100;
                    }

                    evaluacion = 0;
                    if (datos.evaluacion != null) {
                        evaluacion = parseInt(datos.evaluacion.eval_plazos)+parseInt(datos.evaluacion.eval_horarios)+parseInt(datos.evaluacion.eval_infraestructura)+
                                parseInt(datos.evaluacion.eval_equipamiento)+parseInt(datos.evaluacion.eval_conexion_dl)+parseInt(datos.evaluacion.eval_desempenho_responsable)+
                                parseInt(datos.evaluacion.eval_desempenho_participantes)+parseInt(datos.evaluacion.eval_calidad_presentaciones);
                        evaluacion = Math.round((evaluacion * 20) / 8);
                    }

                    indice = Math.round(0.2*mecanismo + 0.1*frecuencia + 0.1*cobertura + 0.35*evaluacion + 0.25*resultados);

                    $.ajax({
                        type: 'POST',
                        url: window.location.origin+'/admin/iniciativa/invi/actualizar',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            inic_codigo: inic_codigo,
                            inic_inrel: indice
                        },
                        success: function(resActualizar) { },
                        error: function(error) {
                            console.log(error);
                        }
                    });

                    $('#mecanismo-nombre').text(datos.mecanismo.meca_nombre);
                    $('#frecuencia-nombre').text(datos.frecuencia.frec_nombre);
                    $('#mecanismo-puntaje').text(mecanismo);
                    $('#frecuencia-puntaje').text(frecuencia);
                    $('#cobertura-puntaje').text(cobertura);
                    $('#resultados-puntaje').text(resultados);
                    $('#evaluacion-puntaje').text(evaluacion);
                    $('#valor-indice').text(indice);
                    $('#modalINVI').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } */
    </script>
@endsection
