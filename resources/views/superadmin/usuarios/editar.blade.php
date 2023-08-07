@extends('superadmin.panel')
@section('contenido-principal')
    <section class="section">
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
                            @if (Session::has('exitoClave'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoClave') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar usuario administrador</h4>
                            <div class="card-header-action">
                                <a href="{{ route('superadmin.claveusuario.cambiar', $usuario->usua_nickname) }}"
                                    class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top"
                                    title="Cambiar contraseña"><i class="fas fa-user-lock"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('superadmin.usuario.actualizar', $usuario->usua_nickname) }}"
                                method="POST">
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
                                                    value="{{ old('nombre') ?? @$usuario->usua_nombre }}"
                                                    autocomplete="off">
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
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary waves-effect"><i
                                            class="fas fa-save"></i> Guardar cambios</button>
                                    <a href="{{ route('superadmin.listar.usuarios') }}" type="button"
                                        class="btn btn-warning mr-1 waves-effect"><i class="fas fa-angle-left"></i> Volver
                                        al listado</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
