{{--
TEMPLATE PARA VISTA PARAMETROS:

(Seleccionar, ctrl + F2 y cregistroar por el nombre deseado)
______________________________________________________________________________________________
NOMBRE DEL PARAMETRO (plural, primera letra mayuscula): SubUnidades
NOMBRE DEL PARAMETRO (singular): SubUnidad
______________________________________________________________________________________________
NOMBRE DE LA RUTA (ej: admin.listar.NOMBRE, en plural): subunidades
______________________________________________________________________________________________
ARREGLAR SINTAXIS (Seleccionar toda la linea y arreglar tras el ctrl + F2):
______________________________________________
Nuevo SubUnidad
Nombre de la SubUnidad
La SubUnidad dejará de existir
SubUnidad actualizada
SubUnidad creada exitosamente
La SubUnidad fue eliminada
La SubUnidad no se encuentra registrada
______________________________________________
______________________________________________________________________________________________
NOMBRE DEL PREFIJO DE LA TABLA (ej: NOMBRE_codigo, recuerda agregar el "_"): suni_
______________________________________________________________________________________________
NOMBRE DEL CAMPO (en editar y crear): CAMPO1
---NOMBRE DE LA ID DEL CAMPO (ej: id="nomnbre"): idcampo1

consejo: Primero, copie y pegue a la par (en crear y editar) los campos
    a utilizar, y cambie el numero a los nuevos campos (CAMPO2 ,
    CAMPO3 ...) y a los idcampo (idcampo2, idcampo3 ....), Al final,
    en ésta zona ir cambiando los nombres, o al mismo tiempo, nose,
    ahí ves tu :P, Lo decia por el suni_ mas que nada.
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
                            @if (Session::has('errorSubUnidad'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorSubUnidad') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('exitoSubUnidad'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoSubUnidad') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de SubUnidades</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearregistroto"><i class="fas fa-plus"></i> Nuevo SubUnidad</button>
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
                                                <td>{{ $registro->suni_nombre }}</td>
                                                {{-- <td> {{ $registro->suni_idcampo1 }} </td> --}}
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editarRegistro({{ $registro->suni_codigo }})" data-toggle="tooltip"
                                                        data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarRegistro({{ $registro->suni_codigo }})"
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
        <div class="modal fade" id="modaleditarRegistro-{{ $registro->suni_codigo }}" tabindex="-1" role="dialog"
            aria-labelledby="modaleditarRegistro" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaleditarRegistroto">Editar SubUnidad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualizar.subunidades', $registro->suni_codigo) }} " method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label>Nombre de la SubUnidad</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i> {{-- ICONO --}}
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="{{ $registro->suni_nombre }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Unidad a la que pertenece</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i>
                                        </div>
                                    </div>
                                    <select class="form-control" id="select_join" name="select_join">
                                        @foreach ($REGISTROS2 as $dato)
                                            <option value="{{ $dato->unid_codigo }}" {{ $registro->unid_codigo == $dato->unid_codigo ? 'selected' : '' }}>
                                                {{ $dato->unid_nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>Descripción de la subunidad</label>
                                <div class="input-group">
                                    <textarea rows="6" class="formbold-form-input" id="descripcion" name="descripcion" autocomplete="off"
                                    style="width:100%">{{ $registro->unid_descripcion }}</textarea>
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
                            </div> --}}
                            <div class="form-group">
                                <label>Responsable de la subunidad</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="responsable" name="responsable"
                                        value="{{ $registro->unid_responsable }}" autocomplete="off">
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
                                        value="{{ $registro->suni_idcampo1 }}" autocomplete="off">
                                </div>
                            </div>

                            EN CASO DE NECESITAR UN SELECT DE OTRA TABLA
                            _________________________________________________________
                            PREFIJO DE LA COLUMNA JOIN (agregar "_"): unid_
                            _________________________________________________________

                            <select class="form-control" id="select_join" name="select_join">
                                    @foreach ($REGISTROS2 as $dato)
                                        <option value="{{ $dato->unid_codigo }}" {{ $registro->unid_codigo == $dato->unid_codigo ? 'selected' : '' }}>
                                            {{ $dato->unid_nombre }}
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


    <div class="modal fade" id="modalCrearregistroto" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Nuevo SubUnidad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.subunidades') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre de la SubUnidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>  {{-- ICONO --}}
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="" autocomplete="off">
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
                            <label>Unidad a la que pertenece</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <select class="form-control" id="select_join" name="select_join">
                                    @foreach ($REGISTROS2 as $dato)
                                        <option value="{{ $dato->unid_codigo }}">
                                            {{ $dato->unid_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Descripción de la subunidad</label>
                            <div class="input-group">
                                <textarea rows="6" class="formbold-form-input" id="descripcion" name="descripcion" autocomplete="off"
                                style="width:100%"></textarea>
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
                        </div> --}}
                        <div class="form-group">
                            <label>Responsable de la subunidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="responsable" name="responsable"
                                     autocomplete="off">
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
                        PREFIJO DE LA COLUMNA JOIN (agregar "_"): unid_
                        _________________________________________________________
                        <select class="form-control" id="select_join" name="select_join">
                                @foreach ($REGISTROS2 as $dato)
                                    <option value="{{ $dato->unid_codigo }}" {{ $registro->unid_codigo == $dato->unid_codigo ? 'selected' : '' }}>
                                        {{ $dato->unid_nombre }}
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
                <form action="{{ route('admin.eliminar.subunidades') }} " method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar SubUnidad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">La SubUnidad dejará de existir dentro del sistema. <br> ¿Desea continuar de todos
                            modos?</h6>
                        <input type="hidden" id="suni_codigo" name="suni_codigo" value="">
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
        function eliminarRegistro(suni_codigo) {
            $('#suni_codigo').val(suni_codigo);
            $('#modalEliminaRegistro').modal('show');
        }

        function editarRegistro(suni_codigo) {
            $('#modaleditarRegistro-' + suni_codigo).modal('show');
        }
    </script>

@endsection
