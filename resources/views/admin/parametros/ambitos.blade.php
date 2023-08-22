@extends('admin.panel')

@section('contenido')
    <section class="section" style="font-size: 115%;">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if ($errors->has('nombre'))
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
                            <h4>Listado de Contribuciones</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearAmbito"><i class="fas fa-plus"></i> Nueva contribución</button>
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
                                        @foreach ($ambitos as $ambi)
                                            <?php
                                            $contador = $contador + 1;
                                            ?>
                                            <tr>
                                                <td>{{ $contador }}</td>
                                                <td>{{ $ambi->amb_nombre }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editarAmbi({{ $ambi->amb_codigo }})" data-toggle="tooltip"
                                                        data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarAmbi({{ $ambi->amb_codigo }})"
                                                        data-toggle="tooltip" data-placement="top" title="Eliminar ambi"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td>1</td>
                                            <td>Productivo</td>
                                            <td><a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                onclick="editarAmbi(1)" data-toggle="tooltip"
                                                data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                onclick="eliminarAmbi(1)"
                                                data-toggle="tooltip" data-placement="top" title="Eliminar ambi"><i
                                                    class="fas fa-trash"></i></a></td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Profesional</td>
                                            <td><a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                onclick="editarAmbi(2)" data-toggle="tooltip"
                                                data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                onclick="eliminarAmbi(2)"
                                                data-toggle="tooltip" data-placement="top" title="Eliminar ambi"><i
                                                    class="fas fa-trash"></i></a></td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>Social</td>
                                            <td><a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                onclick="editarAmbi(3)" data-toggle="tooltip"
                                                data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                onclick="eliminarAmbi(3)"
                                                data-toggle="tooltip" data-placement="top" title="Eliminar ambi"><i
                                                    class="fas fa-trash"></i></a></td>
                                        </tr> --}}

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
        <div class="modal fade" id="modalEditarAmbito-{{ $ambi->amb_codigo }}" tabindex="-1" role="dialog"
            aria-labelledby="modalEditarAmbito" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarAmbito">Editar contribución</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualizar.ambitos', $ambi->amb_codigo) }} " method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label>Nombre de la contribución</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="{{ $ambi->amb_nombre }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tipo de contribución</label>
                                <div class="input-group">
                                    <select class="form-control @error('descripcion') is-invalid @enderror" id="descripcion"
                                        name="descripcion">
                                        <option value="" selected disable d>Seleccione...</option>
                                        <option value="Contribución Interna"
                                            {{ 'Contribución Interna' == $ambi->amb_descripcion ? 'selected' : '' }}>Contribución
                                            Interna </option>
                                        <option value="Contribución Externa"
                                            {{ 'Contribución Externa' == $ambi->amb_descripcion ? 'selected' : '' }}>Contribución
                                            Externa </option>
                                    </select>
                                    @error('descripcion')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>Descripción del impacto</label>
                                <div class="input-group">
                                    <textarea rows="6" class="formbold-form-input" id="descripcion" name="descripcion" autocomplete="off"
                                        style="width:100%">{{ $ambi->amb_descripcion }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Director/a del impacto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="director" name="director"
                                        value="{{ $ambi->amb_director }}" autocomplete="off">
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
                    <h5 class="modal-title" id="formModal">Nueva contribución</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.ambitos') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre de la contribución</label>
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
                            <label>Tipo de contribución</label>
                            <div class="input-group">
                                <select class="form-control @error('descripcion') is-invalid @enderror" id="descripcion"
                                    name="descripcion">
                                    <option value="Contribución Interna" selected> Contribución Interna</option>
                                    <option value="Contribución Externa">Contribución Externa</option>
                                </select>
                                @error('descripcion')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Descripción del impacto</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <textarea rows="6" class="formbold-form-input" id="descripcion" name="descripcion"
                                    autocomplete="off" style="width:100%">{{ old('descripcion') }}</textarea>
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
                            <label>Director/a del impacto</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="director" name="director"
                                    placeholder="" autocomplete="off">
                                @if ($errors->has('director'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('director') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div> --}}

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                        </div>
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
                <form action="{{ route('admin.eliminar.ambitos') }} " method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Contribución</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">La Contribución dejará de existir dentro del sistema. <br> ¿Desea continuar de todos
                            modos?</h6>
                        <input type="hidden" id="amb_codigo" name="amb_codigo" value="">
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
        function eliminarAmbi(amb_codigo) {
            $('#amb_codigo').val(amb_codigo);
            $('#modalEliminaAmbito').modal('show');
        }

        function editarAmbi(amb_codigo) {
            $('#modalEditarAmbito-' + amb_codigo).modal('show');
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
