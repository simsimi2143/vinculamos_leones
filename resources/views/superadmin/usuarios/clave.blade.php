@extends('superadmin.panel')
@section('contenido-principal')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if(Session::has('errorClave'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorClave') }}</strong>
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
                            <h4>Cambiar contraseña de usuario administrador</h4>
                        </div>
                        <div class="card-body">
                            <form
                                action="{{ route('superadmin.claveusuario.actualizar', $usuario->usua_nickname) }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nueva">Nombre de usuario</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $usuario->usua_nickname }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nueva">Nueva contraseña</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-lock-open"></i></div>
                                                </div>
                                                <input type="password" class="form-control" id="nueva" name="nueva" value="{{ old('nueva') }}" autocomplete="off">
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

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="repetir">Repetir nueva contraseña</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                                </div>
                                                <input type="password" id="repetir" name="repetir" class="form-control" autocomplete="off">
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
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary waves-effect"><i class="fas fa-save"></i> Guardar cambios</button>
                                    <a href="{{ route('superadmin.usuario.editar', $usuario->usua_nickname) }}" type="button" class="btn btn-warning mr-1 waves-effect"><i class="fas fa-angle-left"></i> Regresar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
