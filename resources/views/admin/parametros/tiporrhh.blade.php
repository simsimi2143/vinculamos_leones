{{--
TEMPLATE PARA VISTA PARAMETROS:

(Seleccionar, ctrl + F2 y cregistroar por el nombre deseado)
______________________________________________________________________________________________
NOMBRE DEL PARAMETRO (plural, primera letra mayuscula): RecursosHumanos
NOMBRE DEL PARAMETRO (singular): Recurso Humano
______________________________________________________________________________________________
NOMBRE DE LA RUTA (ej: admin.listar.NOMBRE, en plural): rrhh
______________________________________________________________________________________________
ARREGLAR SINTAXIS (Seleccionar toda la linea y arreglar tras el ctrl + F2):
______________________________________________
Nuevo Recurso Humano
Nombre del Recurso Humano
El Recurso Humano dejará de existir
Recurso Humano actualizado
Recurso Humano creado exitosamente
El Recurso Humano fue eliminado
El Recurso Humano no se encuentra registrado
______________________________________________
______________________________________________________________________________________________
NOMBRE DEL PREFIJO DE LA TABLA (ej: NOMBRE_codigo, recuerda agregar el "_"): trrhh_
______________________________________________________________________________________________
______________________________________________________________________________________________

RECUERDA AGREGAR A PANEL CON SU RESPECTIVA RUTA (href) Y ARREGLAR EL CONTROLLER

--}}


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
                            @if (Session::has('errorRecurso Humano'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorRecurso Humano') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('exitoRecurso Humano'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoRecurso Humano') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de Recursos Humanos</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearregistro"><i class="fas fa-plus"></i> Nuevo Recurso Humano</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1" style="font-size: 110%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            {{-- <th> idcampo1  </th> --}}
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $contador = 0; ?>
                                        @foreach ($REGISTROS as $registro)
                                            <?php $contador = $contador + 1; ?>
                                            <tr>
                                                <td>{{ $contador }}</td>
                                                <td>{{ $registro->trrhh_nombre }}</td>
                                                {{-- <td> {{ $registro->trrhh_idcampo1 }} </td> --}}
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editarRegistro({{ $registro->trrhh_codigo }})" data-toggle="tooltip"
                                                        data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarRegistro({{ $registro->trrhh_codigo }})"
                                                        data-toggle="tooltip" data-placement="top" title="Eliminar registro"><i
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

    @foreach ($REGISTROS as $registro)
        <div class="modal fade" id="modaleditarRegistro-{{ $registro->trrhh_codigo }}" tabindex="-1" role="dialog"
            aria-labelledby="modaleditarRegistro" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaleditarRegistroto">Editar Recurso Humano</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualizar.rrhh', $registro->trrhh_codigo) }} " method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label>Nombre del Recurso Humano</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i> {{-- ICONO --}}
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="{{ $registro->trrhh_nombre }}" autocomplete="off">
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
                                <label>Valorización</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-usd"></i> {{-- ICONO --}}
                                        </div>
                                    </div>
                                    <input type="number" class="form-control" id="valor" name="valor"
                                        value="{{ $registro->trrhh_valor }}" autocomplete="off">
                                    @if ($errors->has('valor'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                            style="width:100%">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('valor') }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- CAMPO TEMPLATE PARA COPIAR Y PEGAR (es en texto, asi que cambiar segun necesidad) --}}
                            {{--
                            <div class="form-group">
                                <label>CAMPO1</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i> ICONO
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="idcampo1" name="idcampo1"
                                        value="{{ $registro->trrhh_idcampo1 }}" autocomplete="off">
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

                            EN CASO DE NECESITAR UN SELECT DE OTRA TABLA
                            _________________________________________________________
                            PREFIJO DE LA COLUMNA JOIN (agregar "_"): prefijojoin_
                            _________________________________________________________

                            <select class="form-control" id="select_join" name="select_join">
                                    @foreach ($REGISTROS2 as $dato)
                                        <option value="{{ $dato->prefijojoin_codigo }}" {{ $registro->prefijojoin_codigo == $dato->prefijojoin_codigo ? 'selected' : '' }}>
                                            {{ $dato->prefijojoin_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            --}}

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary waves-effect">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="modal fade" id="modalCrearregistro" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Nuevo Recurso Humano</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.rrhh') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre del Recurso Humano</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>  {{-- ICONO --}}
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="" autocomplete="off" value="{{ old('care_nombre') }}">
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
                            <label>Valorización</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-usd"></i> {{-- ICONO --}}
                                    </div>
                                </div>
                                <input type="number" class="form-control" id="valor" name="valor"
                                    value="{{ old('valor') }}" autocomplete="off">
                                @if ($errors->has('valor'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('valor') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- CAMPO TEMPLATE PARA COPIAR Y PEGAR (es en texto, asi que cambiar segun necesidad) --}}
                        {{--
                        <div class="form-group">
                            <label>CAMPO1</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>  ICONO
                                    </div>
                                </div>
                                <input type="text" class="form-control @error('idcampo1') is-invalid @enderror" id="idcampo1" name="idcampo1"
                                    placeholder="" autocomplete="off" value="{{ old('idcampo1') }}">
                                @error('idcampo1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        EN CASO DE NECESITAR UN SELECT DE OTRA TABLA (va en vez del input)
                        _________________________________________________________
                        PREFIJO DE LA COLUMNA JOIN (agregar "_"): prefijojoin_
                        _________________________________________________________
                        <select class="form-control" id="select_join" name="select_join">
                                @foreach ($REGISTROS2 as $dato)
                                    <option value="{{ $dato->prefijojoin_codigo }}" {{ $registro->prefijojoin_codigo == $dato->prefijojoin_codigo ? 'selected' : '' }}>
                                        {{ $dato->prefijojoin_nombre }}
                                    </option>
                                @endforeach
                            </select>
                        --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminaRegistro" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.eliminar.rrhh') }} " method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Recurso Humano</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">El Recurso Humano dejará de existir dentro del sistema. <br> ¿Desea continuar de todos
                            modos?</h6>
                        <input type="hidden" id="trrhh_codigo" name="trrhh_codigo" value="">
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
        function eliminarRegistro(trrhh_codigo) {
            $('#trrhh_codigo').val(trrhh_codigo);
            $('#modalEliminaRegistro').modal('show');
        }

        function editarRegistro(trrhh_codigo) {
            $('#modaleditarRegistro-' + trrhh_codigo).modal('show');
        }
    </script>



@endsection
