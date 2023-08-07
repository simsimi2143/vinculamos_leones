@extends('admin.panel')

@section('contenido')
    <section class="section" style="font-size: 115%;">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if ($errors->has('meca_nombre') || $errors->has('tipo'))
                                <div class="alert alert-warning alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                        @if ($errors->has('meca_nombre'))
                                            <strong>{{ $errors->first('meca_nombre') }}</strong><br>
                                        @endif
                                        @if ($errors->has('tipo'))
                                            <strong>{{ $errors->first('tipo') }}</strong><br>
                                        @endif

                                    </div>
                                </div>
                            @endif
                            @if (Session::has('errorMecanismo'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorMecanismo') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('exitoMecanismo'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoMecanismo') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de Mecanismo</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearMecanismo"><i class="fas fa-plus"></i> Nuevo Mecanismo</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1" style="font-size: 110%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        ?>

                                        @foreach ($mecanismos as $meca)
                                            <?php
                                            $contador = $contador + 1;
                                            ?>
                                            <tr>
                                                <td>{{ $contador }}</td>
                                                <td>{{ $meca->meca_nombre }}</td>
                                                <td>{{ $meca->tmec_nombre }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarMeca({{ $meca->meca_codigo }})"
                                                        data-toggle="tooltip" data-placement="top" title="Eliminar mecanismo"><i class="fas fa-trash"></i></a>


                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                    onclick="editarMeca({{ $meca->meca_codigo }})"
                                                    data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>

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

    <div class="modal fade" id="modalCrearMecanismo" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Nuevo Mecanismo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.mecanismos') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre del mecanismo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control @error('meca_nombre') is-invalid @enderror" id="meca_nombre" name="meca_nombre" placeholder=""
                                    autocomplete="off" value="{{ old('meca_nombre') }}">
                                @error('meca_nombre')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipo de iniciativa del Mecanismo</label>
                            <div class="input-group">
                                <select class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo">
                                    <option value="" selected disabled>Seleccione...</option>
                                    @forelse ($tipos as $tip)
                                        <option value="{{ $tip->tmec_codigo }}"
                                            {{ old('tipo') == $tip->tmec_codigo ? 'selected' : '' }}>
                                            {{ $tip->tmec_nombre }}</option>
                                    @empty
                                        <option value="-1">No existen registros</option>
                                    @endforelse
                                </select>
                                @error('tipo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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


    @foreach ($mecanismos as $meca)
    <div class="modal fade" id="modalEditarmecanismos-{{ $meca->meca_codigo }}" tabindex="-1" role="dialog"
        aria-labelledby="modalEditarmecanismos" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarmecanismos">Editar mecanismo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.actualizar.mecanismos', $meca->meca_codigo) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label>Nombre del Mecanismo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control @error('meca_nombre') is-invalid @enderror" id="meca_nombre" name="meca_nombre"
                                    value="{{ $meca->meca_nombre }}" autocomplete="off">
                                @error('mecanombre')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipo de iniciativa del mecanismo</label>
                            <div class="input-group">
                                <select class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo">
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->tmec_codigo }}"
                                            {{ $tipo->tmec_codigo == $meca->tmec_codigo ? 'selected' : '' }}>
                                            {{ $tipo->tmec_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tipo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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




    <div class="modal fade" id="modalEliminaMecanismo" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.eliminar.mecanismos') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Mecanismo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">El Mecanismo dejará de existir dentro del sistema. <br> ¿Desea continuar de todos
                            modos?</h6>
                        <input type="hidden" id="meca_codigo" name="meca_codigo" value="">
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
        function eliminarMeca(meca_codigo) {
            $('#modalEliminaMecanismo').find('#meca_codigo').val(meca_codigo);
            $('#modalEliminaMecanismo').modal('show');
        }

        function editarMeca(meca_codigo) {
            $('#modalEditarmecanismos-' + meca_codigo).modal('show');
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
