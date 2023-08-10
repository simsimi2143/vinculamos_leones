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
                                $errors->has('care_nombre') ||
                                $errors->has('care_director') ||
                                $errors->has('escu_codigo')
                                )
                            <div class="alert alert-warning alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    @if ($errors->has('care_nombre'))
                                        <strong>{{ $errors->first('care_nombre') }}</strong><br>
                                    @endif
                                    @if ($errors->has('care_director'))
                                        <strong>{{ $errors->first('care_director') }}</strong><br>
                                    @endif
                                    @if ($errors->has('escu_codigo'))
                                        <strong>{{ $errors->first('escu_codigo') }}</strong><br>
                                    @endif
                                </div>
                            </div>
                            @endif
                            @if (Session::has('exitoCarrera'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoCarrera') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de Carreras</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearCarrera"><i class="fas fa-plus"></i> Nueva Carrera</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1" style="font-size: 110%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        ?>
                                        @foreach ($carreras as $care)
                                            <?php
                                            $contador = $contador + 1;
                                            ?>
                                            <tr>
                                                <td>{{ $contador }}</td>
                                                <td>{{ $care->care_nombre }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editarCare({{ $care->care_codigo }})" data-toggle="tooltip"
                                                        data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarCare({{ $care->care_codigo }})"
                                                        data-toggle="tooltip" data-placement="top" title="Eliminar care"><i
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

    @foreach ($carreras as $care)
    <div class="modal fade" id="modalEditarCarrera-{{ $care->care_codigo }}" tabindex="-1" role="dialog"
        aria-labelledby="modalEditarCarrera" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarCarrera">Editar carrera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.actualizar.carreras', $care->care_codigo) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label>Nombre de la carrera</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="care_nombre" name="care_nombre"
                                    value="{{ $care->care_nombre }}" autocomplete="off">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Descripción de la carrera</label>
                            <div class="input-group">
                                <textarea rows="6" class="formbold-form-input" id="care_descripcion" name="care_descripcion" autocomplete="off"
                                    style="width:100%">{{ $care->care_descripcion }}</textarea>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Jefe/Jefa de la carrera</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="care_director" name="care_director"
                                    value="{{ $care->care_director }}" autocomplete="off">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Institución</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="care_institucion" name="care_institucion"
                                    value="{{ $care->care_institucion }}" autocomplete="off">
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Escuela</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                                <select class="form-control" id="escu_codigo" name="escu_codigo">
                                    @foreach ($escuelas as $escuela)
                                        <option value="{{ $escuela->escu_codigo }}" {{ $care->escu_codigo == $escuela->escu_codigo ? 'selected' : '' }}>
                                            {{ $escuela->escu_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary waves-effect">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <div class="modal fade" id="modalCrearCarrera" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Nueva Carrera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.carreras') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre de la carrera</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="care_nombre" name="care_nombre" placeholder=""
                                    autocomplete="off" value="{{ old('care_nombre') }}">
                                @if ($errors->has('care_nombre'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('ncare_ombre') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Descripción de la carrera</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <textarea rows="6" class="formbold-form-input" id="care_descripcion" name="care_descripcion" autocomplete="off"
                                    style="width:100%">{{ old('care_descripcion') }}</textarea>
                                @if ($errors->has('care_desripcion'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('care_desripcion') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Jefe/Jefa de la carrera</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="care_director" name="care_director"
                                    placeholder="" autocomplete="off" value="{{ old('care_director') }}">
                                @if ($errors->has('care_director'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('care_director') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Institución</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="care_institucion" name="care_institucion"
                                    placeholder="" autocomplete="off">
                                @if ($errors->has('care_institucion'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('care_institucion') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Escuela</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                                <select class="form-control" id="escu_codigo" name="escu_codigo">
                                    @foreach ($escuelas as $escuela)
                                        <option value="{{ $escuela->escu_codigo }}">{{ $escuela->escu_nombre }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('escu_codigo'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center" style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('escu_codigo') }}</strong>
                                        </div>
                                    </div>
                                @endif
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

    <div class="modal fade" id="modalEliminaCarrera" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.eliminar.carreras') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Carrera</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">La carrera dejará de existir dentro del sistema. <br> ¿Desea continuar de todos
                            modos?</h6>
                        <input type="hidden" id="care_codigo" name="care_codigo" value="">
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
        function eliminarCare(care_codigo) {
            $('#care_codigo').val(care_codigo);
            $('#modalEliminaCarrera').modal('show');
        }

        function editarCare(care_codigo) {
            $('#modalEditarCarrera-' + care_codigo).modal('show');
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
