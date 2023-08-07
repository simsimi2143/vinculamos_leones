@extends('admin.panel')

@section('contenido')
    <section class="section" style="font-size: 115%;">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if (
                                $errors->has('nombre') ||
                                $errors->has('director') ||
                                $errors->has('nombrearchivo')
                                )
                            <div class="alert alert-warning alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    @if ($errors->has('nombre'))
                                        <strong>{{ $errors->first('nombre') }}</strong><br>
                                    @endif
                                    @if ($errors->has('director'))
                                        <strong>{{ $errors->first('director') }}</strong><br>
                                    @endif
                                    @if ($errors->has('nombrearchivo'))
                                        <strong>{{ $errors->first('nombrearchivo') }}</strong><br>
                                    @endif
                                </div>
                            </div>
                            @endif
                            @if (Session::has('exitoConvenio'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoConvenio') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de documentos de colaboración</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearConvenio"><i class="fas fa-plus"></i> Nuevo documento de colaboración</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1" style="font-size: 110%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Documento de colaboración</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        ?>
                                        @foreach ($convenios as $conv)
                                            <?php
                                            $contador = $contador + 1;
                                            ?>
                                            <tr>
                                                <td>{{ $contador }}</td>
                                                <td>{{ $conv->conv_nombre }}</td>
                                                <td>{{ $conv->conv_descripcion }}</td>
                                                <td>{{ $conv->conv_nombre_archivo }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editarConv({{ $conv->conv_codigo }})" data-toggle="tooltip"
                                                        data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarConv({{ $conv->conv_codigo }})"
                                                        data-toggle="tooltip" data-placement="top" title="Eliminar conv"><i
                                                            class="fas fa-trash"></i></a>
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

    @foreach ($convenios as $conv)
        <div class="modal fade" id="modalEditarConvenio-{{ $conv->conv_codigo }}" tabindex="-1" role="dialog"
            aria-labelledby="modalEditarConvenio" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarConvenio">Editar documento de colaboración</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualizar.convenios', $conv->conv_codigo) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Nombre del convenio</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="{{ $conv->conv_nombre }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Descripción del documento de colaboración</label>
                                <div class="input-group">
                                    <textarea rows="6" class="formbold-form-input" id="descripcion" name="descripcion" autocomplete="off"
                                        style="width:100%">{{ $conv->conv_descripcion }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tipo del documento de colaboración</label>
                                <div class="input-group">
                                    <select class="form-control" id="tipo" name="tipo">
                                        <option value="Convenio" {{ "Convenio" == $dato->unid_codigo ? 'selected' : '' }}>
                                            Convenio
                                        </option>
                                        <option value="CartaAdhesion" {{ "CartaAdhesion" == $dato->unid_codigo ? 'selected' : '' }}>
                                            Carta de adhesión
                                        </option>
                                    </select>
                                    @if ($errors->has('tipo'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                            style="width:100%">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('tipo') }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nombre del archivo de colaboración</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-file"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombrearchivo" name="nombrearchivo"
                                        value="{{ $conv->conv_nombre_archivo }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ruta del archivo de colaboración</label>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="alert alert-info">
                                            <div class="alert-title">{{ $conv->conv_ruta_archivo }}</div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>Cambiar archivo del convenio</label>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="fallback">
                                            <input name="archivo" id="archivo" type="file" accept="*/*" multiple />
                                            @if ($errors->has('archivo'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                            style="width:100%">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('archivo') }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary waves-effect">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="modal fade" id="modalCrearConvenio" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Nuevo documento de colaboración</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.convenios') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nombre del documento de colaboración</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""
                                    autocomplete="off">
                                @if ($errors->has('nombre'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipo del documento de colaboración</label>
                            <div class="input-group">
                                <select class="form-control" id="tipo" name="tipo">
                                    <option value="Convenio">
                                        Convenio
                                    </option>
                                    <option value="CartaAdhesion">
                                        Carta de adhesión
                                    </option>
                                </select>
                                @if ($errors->has('tipo'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('tipo') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descripción del documento de colaboración</label>
                            <div class="input-group">
                                <textarea rows="6" class="formbold-form-input" id="descripcion" name="descripcion" autocomplete="off"
                                    style="width:100%">{{ old('descripcion') }}</textarea>
                                @if ($errors->has('descripcion'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                                <label>Tipo del documento de colaboración</label>
                                <div class="input-group">
                                    <select class="form-control" id="select_join" name="select_join">
                                        <option value="Convenio">
                                            Convenio
                                        </option>
                                        <option value="CartaAdhesion">
                                            Carta de adhesión
                                        </option>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group">
                            <label>Nombre del archivo del documento de colaboración</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-file"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="nombrearchivo" name="nombrearchivo"
                                    placeholder="" autocomplete="off">
                                @if ($errors->has('nombrearchivo'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('nombrearchivo') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Archivo del colaboración</label>
                            <div class="card">
                                <div class="card-body">
                                    <div class="fallback">
                                        <input name="archivo" id="archivo" type="file" accept="*/*" multiple />
                                        @if ($errors->has('archivo'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('archivo') }}</strong>
                                        </div>
                                    </div>
                                @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminaConvenio" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.eliminar.convenios') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Convenio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">El documento de colaboración dejará de existir dentro del sistema. <br> ¿Desea continuar de todos
                            modos?</h6>
                        <input type="hidden" id="conv_codigo" name="conv_codigo" value="">
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Continuar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function eliminarConv(conv_codigo) {
            $('#conv_codigo').val(conv_codigo);
            $('#modalEliminaConvenio').modal('show');
        }

        function editarConv(conv_codigo) {
            $('#modalEditarConvenio-' + conv_codigo).modal('show');
        }
    </script>

    {{-- <link rel="stylesheet" href="{{ asset('/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/page/datatables.js') }}"></script> --}}
@endsection
