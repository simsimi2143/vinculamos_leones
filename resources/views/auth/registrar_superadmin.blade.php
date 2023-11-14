<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Registro Superadministrador Viculamos</title>
    <link rel="stylesheet" href="{{ asset('/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/bundles/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    {{-- <link rel='shortcut icon' type='image/x-icon' href='{{ asset('/img/camanchaca.png') }}' /> --}}
</head>

<body class="light light-sidebar theme-white sidebar-gone">
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Registro</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('auth.registrar.superadmin') }}" method="POST">
                                    @csrf

                                    @if(Session::has('errorRegistro'))
                                        <div class="alert alert-danger alert-dismissible show fade text-center">
                                            <div class="alert-body">
                                                <strong>{{ Session::get('errorRegistro') }}</strong>
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" autocomplete="off">
                                            @if($errors->has('nombre'))
                                                <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                    <div class="alert-body">
                                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                        <strong>{{ $errors->first('nombre') }}</strong>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="apellido">Apellido</label>
                                            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" autocomplete="off">
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
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nickname">Nombre de usuario</label>
                                            <input type="text" class="form-control" placeholder="Ingrese nombre de usuario" id="nickname" name="nickname" value="{{ old('nickname') }}" autocomplete="off">
                                            @if($errors->has('nickname'))
                                                <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                    <div class="alert-body">
                                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                        <strong>{{ $errors->first('nickname') }}</strong>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="email">Correo electrónico</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="off">
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
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="clave" class="d-block">Contraseña</label>
                                            <input type="password" class="form-control" id="clave" name="clave" value="{{ old('clave') }}" autocomplete="off">
                                            @if($errors->has('clave'))
                                                <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                    <div class="alert-body">
                                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                        <strong>{{ $errors->first('clave') }}</strong>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="confirmarclave" class="d-block">Confirmar contraseña</label>
                                            <input type="password" class="form-control" id="confirmarclave" name="confirmarclave" autocomplete="off">
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
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i>
                                            Registrar
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-muted text-center">¿Ya estás registrado?<a href="{{ route('ingresar.formulario') }}"> Ingresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('/js/app.min.js') }}"></script>
    <script src="{{ asset('/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('/js/page/auth-register.js') }}"></script>
    <script src="{{ asset('/js/scripts.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>
</body>

</html>
