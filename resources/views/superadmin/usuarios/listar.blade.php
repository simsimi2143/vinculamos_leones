@extends('superadmin.panel')

@section('contenido-principal')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        @if(Session::has('errorUsuario'))
                            <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <strong>{{ Session::get('errorUsuario') }}</strong>
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            </div>
                        @endif
                        @if(Session::has('exitoUsuario'))
                            <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <strong>{{ Session::get('exitoUsuario') }}</strong>
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            </div>
                        @endif
                        @if(Session::has('errorRegistro'))
                        <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                            <div class="alert-body">
                                <strong>{{ Session::get('errorRegistro') }}</strong>
                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        </div>
                    @endif
                    @if(Session::has('exitoRegistro'))
                        <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                            <div class="alert-body">
                                <strong>{{ Session::get('exitoRegistro') }}</strong>
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
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
                                            <td>{{ $usuario->usua_nombre.' '.$usuario->usua_apellido }}</td>
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
                                                @if ($usuario->usua_vigente==0)
                                                    <div class="badge badge-danger badge-shadow" data-toggle="tooltip" data-placement="top" title="El usuario no puede iniciar sesión en el sistema">Inactivo</div>
                                                @else
                                                    <div class="badge badge-success badge-shadow"  data-toggle="tooltip" data-placement="top" title="El usuario puede iniciar sesión en el sistema">Activo</div>
                                                @endif
                                            </td>
                                            <td>
                                                 <a href="{{ route('superadmin.usuario.editar', $usuario->usua_nickname) }}" class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Editar usuario"><i class="fas fa-edit"></i></a>
                                                @if ($usuario->usua_vigente==0)
                                                    <form action="{{ route('superadmin.habilitar.admin', $usuario->usua_nickname) }}" method="POST" style="display: inline-block">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="Habilitar usuario"><i class="fas fa-user-plus"></i></button>
                                                    </form>
                                                @else
                                                   <form action="{{ route('superadmin.deshabilitar.admin', $usuario->usua_nickname) }}" method="POST" style="display: inline-block">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit" class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Deshabilitar usuario"><i class="fas fa-user-slash"></i></button>
                                                    </form>
                                                @endif
                                                <a href="javascript:void(0)" class="btn btn-icon btn-danger" onclick="eliminarAdmin('{{ $usuario->usua_nickname }}')" data-toggle="tooltip" data-placement="top" title="Eliminar usuario"><i class="fas fa-trash"></i></a>
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

<div class="modal fade" id="modalEliminarAdmin" tabindex="-1" role="dialog" aria-labelledby="modalEliminar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('superadmin.eliminar.admin') }}" method="POST">
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
                    <h6 class="mt-2">El usuario dejará de tener acceso al sistema de forma permanente. <br> ¿Desea continuar de todos modos?</h6>
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

<script>
    function eliminarAdmin(usua_nickname) {
        $('#usua_nickname').val(usua_nickname);
        $('#modalEliminarAdmin').modal('show');
    }
</script>


<link rel="stylesheet" href="{{ asset('/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{ asset('/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/js/page/datatables.js') }}"></script>

@endsection
