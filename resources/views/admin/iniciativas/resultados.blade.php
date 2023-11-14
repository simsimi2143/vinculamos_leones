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
                            @if (Session::has('exitoExterno'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoExterno') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $iniciativa->inic_nombre }} - Registro de resultados finales</h4>
                            <div class="card-header-action">
                                <div class="dropdown d-inline">
                                    <a href="{{ route('admin.iniciativas.detalles', $iniciativa->inic_codigo) }}"
                                        class="btn btn-icon btn-warning icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Ver detalles de la iniciativa"><i
                                            class="fas fa-eye"></i>Ver detalle</a>

                                    <a href="{{ route('admin.editar.paso1', $iniciativa->inic_codigo) }}"
                                        class="btn btn-icon btn-primary icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Editar iniciativa"><i
                                            class="fas fa-edit"></i>Editar Iniciativa</a>

                                    <a href="javascript:void(0)" class="btn btn-icon btn-info icon-left"
                                        data-toggle="tooltip" data-placement="top" title="Calcular INVI"
                                        onclick="calcularIndice({{ $iniciativa->inic_codigo }})"><i
                                            class="fas fa-tachometer-alt"></i>INVI</a>

                                    <a href="{{ route('admin.evidencias.listar', $iniciativa->inic_codigo) }}"
                                        class="btn btn-icon btn-success icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Adjuntar evidencia"><i
                                            class="fas fa-paperclip"></i>Evidencias</a>

                                    <a href="{{ route('admin.cobertura.index', $iniciativa->inic_codigo) }}"
                                        class="btn btn-icon btn-success icon-left" data-toggle="tooltip" data-placement="top"
                                        title="Ingresar cobertura"><i class="fas fa-users"></i>Cobertura</a>

                                    {{-- <a href="{{ route('admin.resultados.listado', $iniciativa[0]->inic_codigo) }}"
                                        class="btn btn-icon btn-success icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Ingresar resultado"><i
                                            class="fas fa-flag"></i>Resultado/s</a> --}}

                                    <a href="{{ route($role . '.evaluar.iniciativa', $iniciativa->inic_codigo) }}"
                                        class="btn btn-icon btn-success icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Evaluar iniciativa"><i
                                            class="fas fa-file-signature"></i>Evaluar</a>

                                    <a href="{{ route('admin.iniciativa.listar') }}"
                                        class="btn btn-primary mr-1 waves-effect icon-left" type="button">
                                        <i class="fas fa-angle-left"></i> Volver a listado
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <form action="" method="post"> --}}
                            <form action="{{ route('admin.resultados.actualizar', $iniciativa->inic_codigo) }}"
                                method="post">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-md">
                                                        <thead>
                                                            <tr>
                                                                <th>Resultado esperado</th>
                                                                <th>Cantidad Inicial</th>
                                                                <th>Cantidad Final</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($participantes as $participante)
                                                                <tr>
                                                                    <td>{{ $participante->resu_nombre }}</td>
                                                                    <td>
                                                                        @if ($participante->resu_cuantificacion_inicial > 0)
                                                                            {{ $participante->resu_cuantificacion_inicial }}
                                                                        @else
                                                                            No registrado.
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <input type="number"
                                                                            name="resultados[{{ $participante->resu_codigo }}]"
                                                                            class="form-control"
                                                                            value="{{ $participante->resu_cuantificacion_final }}">
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
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12 text-right">
                                        <input type="hidden" id="inic_codigo" name="inic_codigo"
                                            value="{{ $iniciativa->inic_codigo }}">
                                        <a href="{{ route('admin.iniciativa.listar') }}"
                                            class="btn btn-primary mr-1 waves-effect" type="button">
                                            <i class="fas fa-angle-left"></i> Volver a listado
                                        </a>
                                        <button type="submit" class="btn btn-primary mr-1 waves-effect"><i
                                                class="fas fa-save"></i> Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <script src="{{ asset('/js/admin/iniciativas/INVI.js') }}"></script>
@endsection
