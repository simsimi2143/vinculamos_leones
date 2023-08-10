@extends('superadmin.panel')

@section('contenido-principal')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
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
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2 col-md-2 col-lg-2"></div>
            <div class="col-8 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Nuevo administrador</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('superadmin.registrar.admin') }}" method="POST">
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
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" autocomplete="off">
                                        </div>
                                        @if($errors->has('nombre'))
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
                                            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" autocomplete="off">
                                        </div>
                                        @if($errors->has('apellido'))
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
                                            <input type="text" class="form-control" placeholder="Ingresar nombre de usuario" id="nickname" name="nickname" value="{{ old('nickname') }}" autocomplete="off">
                                        </div>
                                        @if($errors->has('nickname'))
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
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="off">
                                        </div>
                                        @if($errors->has('email'))
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
                                            <input type="password" class="form-control" id="clave" name="clave" value="{{ old('clave') }}" autocomplete="off">
                                        </div>
                                        @if($errors->has('clave'))
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
                                            <input type="password" class="form-control" id="confirmarclave" name="confirmarclave" value="" autocomplete="off">
                                        </div>
                                        @if($errors->has('confirmarclave'))
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
                                <button type="submit" class="btn btn-primary waves-effect"><i class="fa fa-save"></i> Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
