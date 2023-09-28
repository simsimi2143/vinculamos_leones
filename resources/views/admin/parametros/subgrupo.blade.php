{{--
TEMPLATE PARA VISTA PARAMETROS:

(Seleccionar, ctrl + F2 y cregistroar por el nombre deseado)
______________________________________________________________________________________________
NOMBRE DEL PARAMETRO (plural, primera letra mayuscula): SubGrupoInteres
NOMBRE DEL PARAMETRO (singular): Sub-grupo de interés
______________________________________________________________________________________________
NOMBRE DE LA RUTA (ej: admin.listar.NOMBRE, en plural): subgrupos
______________________________________________________________________________________________
ARREGLAR SINTAXIS (Seleccionar toda la linea y arreglar tras el ctrl + F2):
______________________________________________
Nuevo Sub-grupo de interés
Nombre del Sub-grupo de interés
El Sub-grupo de interés dejará de existir
Sub-grupo de interés actualizado
Sub-grupo de interés creado exitosamente
El Sub-grupo de interés fue eliminado
El Sub-grupo de interés no se encuentra registrado
______________________________________________
______________________________________________________________________________________________
NOMBRE DEL PREFIJO DE LA TABLA (ej: NOMBRE_codigo, recuerda agregar el "_"): sugr_
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
                            @if (Session::has('errorSub-grupo de interés'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorSub-grupo de interés') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('exitoSub-grupo de interés'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoSub-grupo de interés') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado sub grupos de interés</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearregistro"><i class="fas fa-plus"></i> Nuevo Sub-grupo de interés</button>
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
                                                <td>{{ $registro->sugr_nombre }}</td>
                                                {{-- <td> {{ $registro->sugr_idcampo1 }} </td> --}}
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editarRegistro({{ $registro->sugr_codigo }})" data-toggle="tooltip"
                                                        data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarRegistro({{ $registro->sugr_codigo }})"
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
        <div class="modal fade" id="modaleditarRegistro-{{ $registro->sugr_codigo }}" tabindex="-1" role="dialog"
            aria-labelledby="modaleditarRegistro" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaleditarRegistroto">Editar Sub-grupo de interés</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualizar.subgrupos', $registro->sugr_codigo) }} " method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label>Nombre del Sub-grupo de interés</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i> {{-- ICONO --}}
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="{{ $registro->sugr_nombre }}" autocomplete="off">
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
                            @error('nombre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label>Nombre del grupo de interés</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i> {{-- ICONO --}}
                                        </div>
                                    </div>
                                    <select class="form-control" id="select_join" name="select_join">
                                        @foreach ($REGISTROS2 as $dato)
                                            <option value="{{ $dato->grin_codigo }}" {{ $registro->grin_codigo == $dato->grin_codigo ? 'selected' : '' }}>
                                                {{ $dato->grin_nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('select_join')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
                    <h5 class="modal-title" id="formModal">Nuevo Sub-grupo de interés</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.subgrupos') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre del Sub-grupo de interés</label>
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
                        @error('select_join')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                        <div class="form-group">
                            <label>Nombre del grupo de interés</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>  {{-- ICONO --}}
                                    </div>
                                </div>
                                <select class="form-control" id="select_join" name="select_join">
                                    @foreach ($REGISTROS2 as $dato)
                                        <option value="{{ $dato->grin_codigo }}">
                                            {{ $dato->grin_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('select_join')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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
                <form action="{{ route('admin.eliminar.subgrupos') }} " method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Sub-grupo de interés</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">El Sub-grupo de interés dejará de existir dentro del sistema. <br> ¿Desea continuar de todos
                            modos?</h6>
                        <input type="hidden" id="sugr_codigo" name="sugr_codigo" value="">
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
        function eliminarRegistro(sugr_codigo) {
            $('#sugr_codigo').val(sugr_codigo);
            $('#modalEliminaRegistro').modal('show');
        }

        function editarRegistro(sugr_codigo) {
            $('#modaleditarRegistro-' + sugr_codigo).modal('show');
        }
    </script>

@endsection
