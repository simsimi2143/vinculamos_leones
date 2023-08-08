@extends('admin.panel')

@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if (
                                $errors->has('nombre') ||
                                $errors->has('grupo') ||
                                $errors->has('domicilio')||
                                $errors->has('nombre_contraparte')||
                                $errors->has('telefono')||
                                $errors->has('email')
                                )
                            <div class="alert alert-warning alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    @if ($errors->has('nombre'))
                                        <strong>{{ $errors->first('nombre') }}</strong><br>
                                    @endif
                                    @if ($errors->has('grupo'))
                                        <strong>{{ $errors->first('grupo') }}</strong><br>
                                    @endif
                                    @if ($errors->has('domicilio'))
                                        <strong>{{ $errors->first('domicilio') }}</strong><br>
                                    @endif
                                    @if ($errors->has('nombre_contraparte'))
                                        <strong>{{ $errors->first('nombre_contraparte') }}</strong><br>
                                    @endif
                                    @if ($errors->has('telefono'))
                                        <strong>{{ $errors->first('telefono') }}</strong><br>
                                    @endif
                                    @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong><br>
                                    @endif
                                </div>
                            </div>
                            @endif
                            @if (Session::has('exitoSocio'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoSocio') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de socios comunitarios</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearSocio"><i class="fas fa-plus"></i> Nuevo socio
                                    comunitario</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1" style="font-size: 110%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre del Socio Comunitario</th>
                                            <th>Nombre de la contraparte</th>
                                            <th>Teléfono de la contraparte</th>
                                            <th>Correo de la contraparte</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        ?>
                                        @foreach ($socios as $soci)
                                            <?php
                                            $contador = $contador + 1;
                                            ?>
                                            <tr>
                                                <td>{{ $contador }}</td>
                                                <td>{{ $soci->soco_nombre_socio }}</td>
                                                <td>{{ $soci->soco_nombre_contraparte }}</td>
                                                <td>{{ $soci->soco_telefono_contraparte }}</td>
                                                <td>{{ $soci->soco_email_contraparte }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editarSocio({{ $soci->soco_codigo }})"
                                                        data-toggle="tooltip" data-placement="top" title="Editar socio"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarSocio({{ $soci->soco_codigo }})"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Eliminar socio comunitario"><i class="fas fa-trash"></i></a>
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

    @foreach ($socios as $soci)
        <div class="modal fade" id="modaleditarSocio-{{ $soci->soco_codigo }}" tabindex="-1" role="dialog"
            aria-labelledby="modaleditarSocio" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaleditarSocio">Editar socio comunitario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualizar.socios', $soci->soco_codigo) }} " method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label>Nombre del socio comunitario</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="{{ $soci->soco_nombre_socio }}" autocomplete="off">
                                </div>
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

                            <div class="form-group" style="">
                                <div class="form-group">
                                    <label>Grupo de interés</label>
                                    <div class="input-group">
                                        <select class="form-control select2" style="width: 100%" id="grupo"
                                            name="grupo">
                                            @foreach ($grupos as $grupo)
                                                <option value="{{ $grupo->grin_codigo }}"
                                                    {{ $soci->grin_codigo == $grupo->grin_codigo ? 'selected' : '' }}>
                                                    {{ $grupo->grin_nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('grupo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="">
                                <label>Domicilio del socio comunitario</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="domicilio" name="domicilio"
                                        value="{{ $soci->soco_domicilio_socio }}" autocomplete="off">
                                </div>
                                @if ($errors->has('domicilio'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('domicilio') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nombre de la contraparte</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre_contraparte"
                                        name="nombre_contraparte" value="{{ $soci->soco_nombre_contraparte }}"
                                        autocomplete="off">
                                </div>
                                @if ($errors->has('nombre_contraparte'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('nombre_contraparte') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Teléfono de la contraparte</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        value="{{ $soci->soco_telefono_contraparte }}" autocomplete="off">
                                </div>
                                @if ($errors->has('telefono'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Correo de la contraparte</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $soci->soco_email_contraparte }}" autocomplete="off">
                                </div>
                                @if ($errors->has('email'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="form-group" style="align-items: center;"
                                id="sedesAsociadasContainer">
                                <label>Sedes Asociadas</label>
                                <div class="input-group">
                                    <select class="form-control select2" style="width: 100%" id="sedesT"
                                        name="sedesT[]" multiple>
                                        <option value="" disabled>Seleccione...</option>
                                        @foreach ($sedesT as $sede)
                                            @php
                                                $selected = false;
                                            @endphp
                                            @foreach ($SedeSocios as $sedeSocio)
                                                @if ($sedeSocio->sede_codigo === $sede->sede_codigo && $sedeSocio->soco_codigo === $soci->soco_codigo)
                                                    @php
                                                        $selected = true;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            <option value="{{ $sede->sede_codigo }}" {{ $selected ? 'selected' : '' }}>
                                                {{ $sede->sede_nombre }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('sedesT'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                            style="width:100%">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('sedesT') }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div> --}}
                            {{-- <div class="form-group" style="width: 100%">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" id="nacional" name="nacional"/>
                                    <div class="state p-success">
                                        <label><strong>Asociar a todas las sedes (Socio nacional)</strong></label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary waves-effect"
                                    style="margin-top: 20px">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="modal fade" id="modalCrearSocio" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Nuevo socio comunitario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.socios') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre del socio comunitario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="nombre" name="nombre" value=""
                                    autocomplete="off">
                            </div>
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
                        <div class="form-group">
                            <label>Grupo de interés</label>
                            <div class="input-group">
                                <select class="form-control select2" style="width: 100%" id="grupo" name="grupo">
                                    <option value="" disabled>Seleccione...</option>
                                    @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->grin_codigo }}">
                                        {{ $grupo->grin_nombre }}
                                    </option>
                                @endforeach
                                </select>
                                @if ($errors->has('grupo'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('grupo') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="">
                            <label>Domicilio del socio comunitario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="domicilio" name="domicilio"
                                    value="" autocomplete="off">
                            </div>
                            @if ($errors->has('domicilio'))
                                <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                    style="width:100%">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <strong>{{ $errors->first('domicilio') }}</strong>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nombre de la contraparte</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="nombre_contraparte"
                                    name="nombre_contraparte" value="" autocomplete="off">
                            </div>
                            @if ($errors->has('nombre_contraparte'))
                                <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                    style="width:100%">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <strong>{{ $errors->first('nombre_contraparte') }}</strong>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Teléfono de la contraparte</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    value="" autocomplete="off">
                            </div>
                            @if ($errors->has('telefono'))
                                <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                    style="width:100%">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Correo de la contraparte</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="email" name="email" value=""
                                    autocomplete="off">
                            </div>
                            @if ($errors->has('email'))
                                <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                    style="width:100%">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- <label>Sedes Asociadas</label>
                        <div class="input-group">
                            <select class="form-control select2" style="width: 100%" id="sedesT" name="sedesT[]"
                                multiple>
                                <option value="" disabled>Seleccione...</option>
                                @foreach ($sedesT as $sede)
                                    <option value="{{ $sede->sede_codigo }}">{{ $sede->sede_nombre }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('sedesT'))
                                <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                    style="width:100%">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <strong>{{ $errors->first('sedesT') }}</strong>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group" style="width: 100%">
                            <div class="pretty p-switch p-fill">
                                <input type="checkbox" id="nacional" name="nacional" />
                                <div class="state p-success">
                                    <label><strong>Asociar a todas las sedes (Socio nacional)</strong></label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary waves-effect"
                                style="margin-top: 20px">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminaSocio" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.eliminar.socios') }} " method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Socio Comunitario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">El socio comunitario dejará de existir dentro del sistema. <br> ¿Desea continuar
                            de todos
                            modos?</h6>
                        <input type="hidden" id="soco_codigo" name="soco_codigo" value="">
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
        function eliminarSocio(soco_codigo) {
            $('#soco_codigo').val(soco_codigo);
            $('#modalEliminaSocio').modal('show');
        }

        function editarSocio(soco_codigo) {
            $('#modaleditarSocio-' + soco_codigo).modal('show');
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
