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
                                $errors->has('nombre')
                                )
                            <div class="alert alert-warning alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    @if ($errors->has('nombre'))
                                        <strong>{{ $errors->first('nombre') }}</strong><br>
                                    @endif

                                </div>
                            </div>
                            @endif
                            @if (Session::has('exitoAmbito'))
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

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de ámbitos de acción</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearAmbito"><i class="fas fa-plus"></i> Nuevo ámbito de acción</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1" style="font-size: 110%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            {{-- <th>Descripción</th>
                                            <th>Director</th> --}}
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        ?>
                                        @foreach ($ambitos as $ambi)
                                            <?php
                                            $contador = $contador + 1;
                                            ?>
                                            <tr>
                                                <td>{{ $contador }}</td>
                                                <td>{{ $ambi->amac_nombre }}</td>
                                                {{-- <td>{{ $ambi->amac_descripcion }}</td>
                                                <td>{{ $ambi->amac_director }}</td> --}}
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editarAmbi({{ $ambi->amac_codigo }})" data-toggle="tooltip"
                                                        data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarAmbi({{ $ambi->amac_codigo }})"
                                                        data-toggle="tooltip" data-placement="top" title="Eliminar"><i
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

    @foreach ($ambitos as $ambi)
        <div class="modal fade" id="modalEditarAmbito-{{ $ambi->amac_codigo }}" tabindex="-1" role="dialog"
            aria-labelledby="modalEditarAmbito" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarAmbito">Editar ámbito de acción</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualizar.ambitosaccion', $ambi->amac_codigo) }} " method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label>Nombre del ámbito de acción</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre_aa" name="nombre_aa"
                                        value="{{ $ambi->amac_nombre }}" autocomplete="off">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>Descripción del ámbito de acción</label>
                                <div class="input-group">
                                    <textarea rows="6" class="formbold-form-input" id="descripcion_aa" name="descripcion_aa" autocomplete="off"
                                        style="width:100%">{{ $ambi->amac_descripcion }}</textarea>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Director/a del ámbito de acción</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="director_aa" name="director_aa"
                                        value="{{ $ambi->amac_director }}" autocomplete="off">
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


    <div class="modal fade" id="modalCrearAmbito" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Nuevo ámbito de acción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.ambitosaccion') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre del ámbito de acción</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="nombre_aa" name="nombre_aa"
                                    placeholder="" autocomplete="off">
                                @if ($errors->has('nombre_aa'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('nombre_aa') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Descripción del ámbito de acción</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <textarea rows="6" class="formbold-form-input" id="descripcion_aa" name="descripcion_aa"
                                    autocomplete="off" style="width:100%">{{ old('descripcion_aa') }}</textarea>
                                @if ($errors->has('descripcion_aa'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('descripcion_aa') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Director/a del ámbito de acción</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="director_aa" name="director_aa"
                                    placeholder="" autocomplete="off">
                                @if ($errors->has('director_aa'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('director_aa') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div> --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminaAmbito" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.eliminar.ambitosaccion') }} " method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar ámbito de acción</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">El ámbito de acción dejará de existir dentro del sistema. <br> ¿Desea continuar de todos
                            modos?</h6>
                        <input type="hidden" id="amac_codigo" name="amac_codigo" value="">
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
        function eliminarAmbi(amac_codigo) {
            $('#amac_codigo').val(amac_codigo);
            $('#modalEliminaAmbito').modal('show');
        }

        function editarAmbi(amac_codigo) {
            $('#modalEditarAmbito-' + amac_codigo).modal('show');
        }
    </script>
{{--
    <link rel="stylesheet" href="{{ asset('/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/page/datatables.js') }}"></script> --}}
@endsection
