{{--
TEMPLATE PARA VISTA PARAMETROS:

(Seleccionar, ctrl + F2 y cregistroar por el nombre deseado)
______________________________________________________________________________________________
NOMBRE DEL PARAMETRO (plural, primera letra mayuscula): nombreparametros
NOMBRE DEL PARAMETRO (singular): nombreparametro
______________________________________________________________________________________________
NOMBRE DE LA RUTA (ej: admin.listar.NOMBRE, en plural): nombreruta
______________________________________________________________________________________________
ARREGLAR SINTAXIS (Seleccionar toda la linea y arreglar tras el ctrl + F2):
______________________________________________
Nuevo nombreparametro
Nombre del nombreparametro
El nombreparametro dejará de existir
nombreparametro actualizado
nombreparametro creado exitosamente
El nombreparametro fue eliminado
El nombreparametro no se encuentra registrado
______________________________________________
______________________________________________________________________________________________
NOMBRE DEL PREFIJO DE LA TABLA (ej: NOMBRE_codigo, recuerda agregar el "_"): nombreprefijo_
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
                            @if (Session::has('errornombreparametro'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errornombreparametro') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('exitonombreparametro'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitonombreparametro') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de nombreparametros</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearregistro"><i class="fas fa-plus"></i> Nuevo nombreparametro</button>
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
                                                <td>{{ $registro->nombreprefijo_nombre }}</td>
                                                {{-- <td> {{ $registro->nombreprefijo_idcampo1 }} </td> --}}
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editarRegistro({{ $registro->nombreprefijo_codigo }})" data-toggle="tooltip"
                                                        data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarRegistro({{ $registro->nombreprefijo_codigo }})"
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
        <div class="modal fade" id="modaleditarRegistro-{{ $registro->nombreprefijo_codigo }}" tabindex="-1" role="dialog"
            aria-labelledby="modaleditarRegistro" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaleditarRegistroto">Editar nombreparametro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualizar.nombreruta', $registro->nombreprefijo_codigo) }} " method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label>Nombre del nombreparametro</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i> {{-- ICONO --}}
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="{{ $registro->nombreprefijo_nombre }}" autocomplete="off">
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
                                        value="{{ $registro->nombreprefijo_idcampo1 }}" autocomplete="off">
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
                    <h5 class="modal-title" id="formModal">Nuevo nombreparametro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.nombreruta') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre del nombreparametro</label>
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
                <form action="{{ route('admin.eliminar.nombreruta') }} " method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar nombreparametro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">El nombreparametro dejará de existir dentro del sistema. <br> ¿Desea continuar de todos
                            modos?</h6>
                        <input type="hidden" id="nombreprefijo_codigo" name="nombreprefijo_codigo" value="">
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
        function eliminarRegistro(nombreprefijo_codigo) {
            $('#nombreprefijo_codigo').val(nombreprefijo_codigo);
            $('#modalEliminaRegistro').modal('show');
        }

        function editarRegistro(nombreprefijo_codigo) {
            $('#modaleditarRegistro-' + nombreprefijo_codigo).modal('show');
        }
    </script>

<script>
/*
######################            CORTAR Y PEGAR EN PARAMETROCONTROLLER       #################################
*/
//TODO: nombreparametro
//--------------------------------------
//CAMBIAR NOMBRE MODELO POR: MODELO1
//--------------------------------------

public function listarnombreparametros()
    {
        return view('admin.parametros.nombreruta', ['REGISTROS' => MODELO1::orderBy('nombreprefijo_codigo', 'asc')->get()]);
        /* // EN CASO DE NECESITAR OTROS DATOS AL ENRUTAR
        $REGISTROS = MODELO1::orderBy('nombreprefijo_codigo', 'asc')->get();
        $REGISTROS2 = MODELO2::orderBy('prefijojoin_codigo', 'asc')->get();

        return view('admin.parametros.nombreruta', [
            'REGISTROS' => $REGISTROS,
            'REGISTROS2' => $REGISTROS2
        ]); */
    }

public function crearnombreparametros(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            /* 'idcampo1' => 'required', */
        ], [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
            /* 'idcampo1.required' => 'El idcampo1 es requerido.', */
        ]);

        if ($validacion->fails()) {
            return redirect()->route('admin.listar.nombreruta')->withErrors($validacion)->withInput();
        }

        $nuevo = new MODELO1();
        $nuevo->nombreprefijo_nombre = $request->input('nombre');
        /*  #########################################################  */
        /* --------------- INGRESAR LOS NUEVOS CAMPOS -------------- */

        $nuevo->nombreprefijo_idcampo1 = $request->input('idcampo1');

        /*  ----------------------------------------------------------  */
        /*  #########################################################  */
        $nuevo->nombreprefijo_creado = Carbon::now()->format('Y-m-d H:i:s');
        $nuevo->nombreprefijo_actualizado = Carbon::now()->format('Y-m-d H:i:s');
        $nuevo->nombreprefijo_visible = 1;
        $nuevo->nombreprefijo_nickname_mod = Session::get('admin')->usua_nickname;
        $nuevo->nombreprefijo_rol_mod = Session::get('admin')->rous_codigo;

        // Guardar el programa en la base de datos
        $nuevo->save();

        return redirect()->back()->with('exito', 'nombreparametro creado exitosamente');
    }

public function eliminarnombreparametros(Request $request)
    {
        $eliminado = MODELO1::where('nombreprefijo_codigo', $request->nombreprefijo_codigo)->first();
        if (!$eliminado) {return redirect()->route('admin.listar.nombreruta')->with('error', 'El nombreparametro no se encuentra registrado en el sistema.');}

        $eliminado = MODELO1::where('nombreprefijo_codigo', $request->nombreprefijo_codigo)->delete();
        return redirect()->route('admin.listar.nombreruta')->with('exito', 'El nombreparametro fue eliminado correctamente.');
    }

public function actualizarnombreparametros(Request $request, $nombreprefijo_codigo)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            /* 'idcampo1' => 'required', */
        ], [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre excede el máximo de caracteres permitidos (100).',
            /* 'idcampo1.required' => 'El idcampo1 es requerido.', */
        ]);

        if ($validacion->fails()) {return redirect()->route('admin.listar.nombreruta')->withErrors($validacion)->withInput();}

        $editado = MODELO1::find($nombreprefijo_codigo);
        //return redirect()->route('admin.listar.ambitos')->with('errorAmbito', $amb_codigo);
        if (!$editado) {return redirect()->route('admin.listar.nombreruta')->with('error', 'El nombreparametro no se encuentra registrado en el sistema.')->withInput();}

        $editado->nombreprefijo_nombre = $request->input('nombre');

        /*  #########################################################  */
        /* --------------- INGRESAR LOS NUEVOS CAMPOS -------------- */

        $nuevo->nombreprefijo_idcampo1 = $request->input('idcampo1');

        /*  ----------------------------------------------------------  */
        /*  #########################################################  */
        $editado->nombreprefijo_actualizado = Carbon::now()->format('Y-m-d H:i:s');
        $editado->nombreprefijo_visible = 1;
        $editado->nombreprefijo_nickname_mod = Session::get('admin')->usua_nickname;
        $editado->nombreprefijo_rol_mod = Session::get('admin')->rous_codigo;
        $editado->save();

        return redirect()->back()->with('exito', 'nombreparametro actualizado exitosamente')->withInput();;
    }

</script>


{{-- ######################            CORTAR Y PEGAR EN WEB.php       ################################# --}}

// nombreparametros
Route::get('admin/listar-nombreruta', [ParametrosController::class, 'listarnombreparametros'])->name('admin.listar.nombreruta');
Route::delete('admin/eliminar-nombreruta/', [ParametrosController::class, 'eliminarnombreparametros'])->name('admin.eliminar.nombreruta');
Route::put('admin/editar-nombreruta/{nombreprefijo_codigo}', [ParametrosController::class, 'actualizarnombreparametros'])->name('admin.actualizar.nombreruta');
Route::post('admin/crear-nombreruta/', [ParametrosController::class, 'crearnombreparametros'])->name('admin.crear.nombreruta');


@endsection
