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
                            @if (Session::has('errorEvidencia'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorEvidencia') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif

                            @if (Session::has('exitoEvidencia'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoEvidencia') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif

                            @if (Session::has('errorValidacion'))
                                <div class="alert alert-warning alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorValidacion') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif

                            @if (Session::has('errorTipo'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorTipo') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $iniciativas->inic_nombre }} - Listado de evidencias</h4>
                            <div class="card-header-action">
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="agregar()"><i
                                        class="fas fa-plus"></i> Nueva evidencia</a>
                                <div class="dropdown d-inline">
                                    <a href="{{ route('admin.iniciativas.detalles', $iniciativas->inic_codigo) }}"
                                        class="btn btn-icon btn-warning icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Ver detalles de la iniciativa"><i
                                            class="fas fa-eye"></i>Ver detalle</a>

                                    <a href="{{ route('admin.editar.paso1', $iniciativas->inic_codigo) }}"
                                        class="btn btn-icon btn-primary icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Editar iniciativa"><i class="fas fa-edit"></i>Editar
                                        Iniciativa</a>

                                    <a href="javascript:void(0)" class="btn btn-icon btn-info icon-left"
                                        data-toggle="tooltip" data-placement="top" title="Calcular INVI"
                                        onclick="calcularIndice({{ $iniciativas->inic_codigo }})"><i
                                            class="fas fa-tachometer-alt"></i>INVI</a>

                                    {{-- <a href="{{ route('admin.evidencias.listar', $iniciativas->inic_codigo) }}"
                                        class="btn btn-icon btn-success icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Adjuntar evidencia"><i
                                            class="fas fa-paperclip"></i>Evidencias</a> --}}

                                    <a href="{{ route('admin.cobertura.index', $iniciativas->inic_codigo) }}"
                                                    class="btn btn-icon btn-success icon-left" data-toggle="tooltip" data-placement="top"
                                                    title="Ingresar cobertura"><i class="fas fa-users"></i>Cobertura</a>

                                    <a href="{{ route('admin.resultados.listado', $iniciativas->inic_codigo) }}"
                                        class="btn btn-icon btn-success icon-left" data-toggle="tooltip"
                                        data-placement="top" title="Ingresar resultado"><i
                                            class="fas fa-flag"></i>Resultado/s</a>

                                    <a href="{{ route($role . '.evaluar.iniciativa', $iniciativas->inic_codigo) }}"
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Archivo original</th>
                                            <th>Modificado por</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($evidencias as $evidencia)
                                            <tr>

                                                <td>{{ $evidencia->inev_nombre }}</td>
                                                <td>{{ $evidencia->inev_tipo }}</td>
                                                <td>{{ $evidencia->inev_nombre_origen }}</td>
                                                <td>{{ $evidencia->inev_nickname_mod }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('admin.evidencia.descargar', $evidencia->inev_codigo) }}"
                                                        method="POST" style="display: inline-block">
                                                        @csrf
                                                        <button type="submit" class="btn btn-icon btn-primary"
                                                            data-toggle="tooltip" data-placement="top" title="Descargar"><i
                                                                class="fas fa-download"></i></button>
                                                    </form>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editar({{ $evidencia->inev_codigo }}, '{{ $evidencia->inev_nombre }}', '{{ $evidencia->inev_descripcion }}')"
                                                        data-toggle="tooltip" data-placement="top" data-placement="top"
                                                        title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('admin.evidencia.eliminar', $evidencia->inev_codigo) }}"
                                                        method="POST" style="display: inline-block">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-icon btn-danger"
                                                            data-toggle="tooltip" data-placement="top" title="Eliminar"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
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

    <div class="modal fade" id="modalAgregarEvidencia" tabindex="-1" role="dialog" aria-labelledby="agregarEvidencia"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarEvidencia">Nueva evidencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.evidencia.guardar', $iniciativas->inic_codigo) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inev_nombre" name="inev_nombre"
                                    placeholder="" autocomplete="off">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Mecanismo</label>
                            <div class="input-group">
                                <select class="form-control" id="inev_nombre" name="inev_nombre">
                                    <option value="Apoyo a PYMES">Apoyo a PYMES</option>
                                    <option value="Aprendizaje más servicio">Aprendizaje más servicio</option>
                                    <option value="Innovación y emprendimiento">Innovación y emprendimiento</option>
                                    <option value="Fomento a la empleabilidad">Fomento a la empleabilidad</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipo</label>
                            <div class="input-group">
                                <select class="form-control" id="inev_tipo" name="inev_tipo">
                                    <option value="Carta de acuerdo">Carta de acuerdo</option>
                                    <option value="Lista de participantes">Lista de participantes</option>
                                    <option value="Fotografías">Fotografías</option>
                                    <option value="Informe de cierre">Informe de cierre</option>
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label>Archivo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                            </div>
                            <input type="file" id="inev_archivo" name="inev_archivo"><br>
                            <small>Tamaño máximo de archivo: 10 MB</small>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary waves-effect"><i class="fas fa-save"></i>
                                Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditarEvidencia" tabindex="-1" role="dialog" aria-labelledby="editarEvidencia"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarEvidencia">Editar evidencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form-editar-evidencia">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inev_nombre_edit" name="inev_nombre_edit"
                                    placeholder="" autocomplete="off">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Tipo</label>
                            <div class="input-group">
                                <select class="form-control" id="inev_nombre_edit" name="inev_nombre_edit">
                                    <option value="Apoyo a PYMES">Apoyo a PYMES</option>
                                    <option value="Aprendizaje más servicio">Aprendizaje más servicio</option>
                                    <option value="Innovación y emprendimiento">Innovación y emprendimiento</option>
                                    <option value="Fomento a la empleabilidad">Fomento a la empleabilidad</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipo</label>
                            <div class="input-group">
                                <select class="form-control" id="inev_tipo_edit" name="inev_tipo_edit">
                                    <option value="Carta de acuerdo">Carta de acuerdo</option>
                                    <option value="Lista de participantes">Lista de participantes</option>
                                    <option value="Fotografías">Fotografías</option>
                                    <option value="Informe de cierre">Informe de cierre</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary waves-effect"><i class="fas fa-undo-alt"></i>
                                Actualizar</button>
                        </div>
                    </form>
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
    <script src="{{ asset('/js/admin/iniciativas/evidencias.js') }}"></script>
    <script src="{{ asset('/js/admin/iniciativas/INVI.js') }}"></script>
@endsection
