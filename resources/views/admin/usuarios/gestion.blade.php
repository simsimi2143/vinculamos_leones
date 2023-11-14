@extends('admin.panel')

@section('contenido')
    <section class="section" style="font-size: 115%;">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if (Session::has('errorUsuario'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorUsuario') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('exitoUsuario'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoUsuario') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('errorRegistro'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorRegistro') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('exitoRegistro'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoRegistro') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('exitoClave'))
                            <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <strong>{{ Session::get('exitoClave') }}</strong>
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            </div>
                        @endif
                        @if (Session::has('errorClave'))
                        <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                            <div class="alert-body">
                                <strong>{{ Session::get('errorClave') }}</strong>
                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        </div>
                    @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de usuarios administradores</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearUsuario"><i class="fas fa-plus"></i> Nuevo usuario</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1" style="font-size: 110%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Username</th>
                                            <th>Correo</th>
                                            <th>Fecha registro</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contadorUsuarios = 0;
                                        ?>
                                        @foreach ($usuarios as $usuario)
                                            <?php
                                            $contadorUsuarios = $contadorUsuarios + 1;
                                            ?>
                                            <tr>
                                                <td>{{ $contadorUsuarios }}</td>
                                                <td>{{ $usuario->usua_nombre . ' ' . $usuario->usua_apellido }}</td>
                                                <td>{{ $usuario->usua_nickname }}</td>
                                                <td>{{ $usuario->usua_email }}</td>
                                                <td>
                                                    <?php
                                                    setlocale(LC_TIME, 'spanish');
                                                    $fecha = ucwords(strftime('%d-%m-%Y', strtotime($usuario->usua_creado)));
                                                    echo $fecha;
                                                    ?>
                                                </td>
                                                <td>
                                                    @if ($usuario->usua_vigente == 0)
                                                        <div class="badge badge-danger badge-shadow" data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="El usuario no puede iniciar sesión en el sistema">
                                                            Inactivo</div>
                                                    @else
                                                        <div class="badge badge-success badge-shadow" data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="El usuario puede iniciar sesión en el sistema">Activo
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($usuario->usua_nickname == Session::get('admin')->usua_nickname)
                                                        <div class="card-header-action">
                                                            <a href="javascript:void(0)" class="btn btn-icon btn-primary"
                                                                onclick="editarClaveUsuario('{{ $usuario->usua_nickname }}')"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Cambiar contraseña"><i
                                                                    class="fas fa-user-lock"></i></a>
                                                            <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                                onclick="editarUsuario('{{ $usuario->usua_nickname }}')"
                                                                data-toggle="tooltip" data-placement="top" title="Editar"><i
                                                                    class="fas fa-edit"></i></a>
                                                        </div>
                                                    @endif
                                                    @if (
                                                        $usuario->usua_usuario_mod == Session::get('admin')->usua_nickname &&
                                                            $usuario->usua_nickname != Session::get('admin')->usua_nickname)
                                                        <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                            onclick="editarUsuario('{{ $usuario->usua_nickname }}')"
                                                            data-toggle="tooltip" data-placement="top" title="Editar"><i
                                                                class="fas fa-edit"></i></a>

                                                        @if ($usuario->usua_vigente == 0)
                                                            <form
                                                                action="{{ route('admin.habilitar.usuarios', $usuario->usua_nickname) }}"
                                                                method="POST" style="display: inline-block">
                                                                @method('PUT')
                                                                @csrf
                                                                <button type="submit" class="btn btn-icon btn-primary"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Habilitar usuario"><i
                                                                        class="fas fa-user-plus"></i></button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('admin.deshabilitar.usuarios', $usuario->usua_nickname) }}"
                                                                method="POST" style="display: inline-block">
                                                                @method('PUT')
                                                                @csrf
                                                                <button type="submit" class="btn btn-icon btn-warning"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Deshabilitar usuario"><i
                                                                        class="fas fa-user-slash"></i></button>
                                                            </form>
                                                        @endif
                                                        <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                            onclick="eliminarUsuario('{{ $usuario->usua_nickname }}')"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Eliminar usuario"><i class="fas fa-trash"></i></a>
                                                    @endif
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

    <div class="modal fade" id="modalCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true" style="font-size: 115%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.usuarios') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="{{ old('nombre') }}" autocomplete="off">
                                    </div>
                                    @if ($errors->has('nombre'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="apellido" name="apellido"
                                            value="{{ old('apellido') }}" autocomplete="off">
                                    </div>
                                    @if ($errors->has('apellido'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('apellido') }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Nombre de usuario</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-sort-numeric-down"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control"
                                            placeholder="Ingresar nombre de usuario" id="nickname" name="nickname"
                                            value="{{ old('nickname') }}" autocomplete="off">
                                    </div>
                                    @if ($errors->has('nickname'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('nickname') }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Correo electrónico</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}" autocomplete="off">
                                    </div>
                                    @if ($errors->has('email'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control" id="clave" name="clave"
                                            value="{{ old('clave') }}" autocomplete="off">
                                    </div>
                                    @if ($errors->has('clave'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('clave') }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Confirmar contraseña</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control" id="confirmarclave"
                                            name="confirmarclave" value="" autocomplete="off">
                                    </div>
                                    @if ($errors->has('confirmarclave'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('confirmarclave') }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary waves-effect"><i class="fa fa-save"></i>
                                Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($usuarios as $usuario)
        <div class="modal fade" id="modalEditarUsuario-{{ $usuario->usua_nickname }}" tabindex="-1" role="dialog"
            aria-labelledby="modalEditarUsuario" aria-hidden="true" style="font-size: 115%;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarUsuario">Editar usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualizar.usuarios', $usuario->usua_nickname) }}" method="POST">
                            @method('post')
                            @csrf
                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                value="{{ old('nombre') ?? @$usuario->usua_nombre }}" autocomplete="off">
                                        </div>
                                        @if ($errors->has('nombre'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close"
                                                        data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('nombre') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user-tie"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="apellido" name="apellido"
                                                value="{{ old('apellido') ?? @$usuario->usua_apellido }}"
                                                autocomplete="off">
                                        </div>
                                        @if ($errors->has('apellido'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close"
                                                        data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('apellido') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre de usuario</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-sort-numeric-down"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="Ingrese nombre de usuarios" id="nickname" name="nickname"
                                                value="{{ @$usuario->usua_nickname }}" autocomplete="off" disabled>
                                        </div>
                                        @if ($errors->has('nickname'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close"
                                                        data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('nickname') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Correo electrónico</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email') ?? @$usuario->usua_email }}" autocomplete="off">
                                        </div>
                                        @if ($errors->has('email'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close"
                                                        data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
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

    <div class="modal fade" id="modalEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true" style="font-size: 115%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.eliminar.usuarios') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">El usuario dejará de tener acceso al sistema de forma permanente. <br> ¿Desea
                            continuar de todos modos?</h6>
                        <input type="hidden" id="usua_nickname" name="usua_nickname" value="">
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Continuar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($usuarios as $usuario)
        @if ($usuario->usua_nickname == Session::get('admin')->usua_nickname)
            <div class="modal fade" id="modalEditarClaveUsuario-{{ $usuario->usua_nickname }}" tabindex="-1"
                role="dialog" aria-labelledby="modalEditarClaveUsuario" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarClaveUsuario">Cambiar contraseña</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.actualizar.claveusuario', $usuario->usua_nickname) }}"
                                method="POST">
                                @method('post')
                                @csrf
                                <div class="row">
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Nueva contraseña</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lock"></i>
                                                    </div>
                                                </div>
                                                <input type="password" class="form-control" id="nueva"
                                                    name="nueva" value="{{ old('nueva') }}"
                                                    autocomplete="off">
                                            </div>
                                            @if ($errors->has('nueva'))
                                                <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                    <div class="alert-body">
                                                        <button class="close"
                                                            data-dismiss="alert"><span>&times;</span></button>
                                                        <strong>{{ $errors->first('nueva') }}</strong>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Repetir nueva contraseña</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lock"></i>
                                                    </div>
                                                </div>
                                                <input type="password" class="form-control" id="repetir"
                                                    name="repetir"
                                                    value="{{ old('repetir') }}"
                                                    autocomplete="off">
                                            </div>
                                            @if ($errors->has('repetir'))
                                                <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                    <div class="alert-body">
                                                        <button class="close"
                                                            data-dismiss="alert"><span>&times;</span></button>
                                                        <strong>{{ $errors->first('repetir') }}</strong>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
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
        @endif
    @endforeach


    <script>
        function eliminarUsuario(usua_nickname) {
            $('#usua_nickname').val(usua_nickname);
            $('#modalEliminarUsuario').modal('show');
        }

        function editarUsuario(usua_nickname) {
            $('#modalEditarUsuario-' + usua_nickname).modal('show');
        }

        function editarClaveUsuario(usua_nickname) {
            $('#modalEditarClaveUsuario-' + usua_nickname).modal('show');
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
