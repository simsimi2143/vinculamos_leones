<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Panel Superadministrador LOS LEONES</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    {{-- <link rel='shortcut icon' type='image/x-icon' href='{{ asset('/img/camanchaca.png') }}' /> --}}
                                                                    {{-- TODO: IMAGEN DE LA PESTAÑA --}}
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('/img/logo_chico.png') }}' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>

                <ul class="navbar-nav navbar-right">
                    <div class="sidebar-brand">
                        <a href="javascript:void(0)"> <img alt="image" src="{{ asset('/img/logoleones.png') }}"
                                class="header-logo" style="transform: scale(0.35);transform-origin: right;" />
                            <span class="logo-name" style="font-size: 15px;"></span>
                        </a>
                    </div>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="javascript:void(0)">
                            <figure class="avatar mr-2"
                                data-initial="{{ Session::get('superadmin.usua_nombre')[0] . Session::get('superadmin.usua_apellido')[0] }}">
                            </figure>
                            <span class="logo-name" style="font-size: 12px;">
                                @if (Session::has('superadmin'))
                                    {{ Session::get('superadmin.usua_nombre') }}
                                    {{ Session::get('superadmin.usua_apellido') }}
                                @else
                                    Usuario
                                @endif
                            </span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">PRINCIPAL</li>
                        {{-- <li class="{{
                                Route::is('superadmin.crear.usuario') || Route::is('superadmin.listar.usuarios') ||
                                Route::is('superadmin.usuario.editar') || Route::is('superadmin.claveusuario.cambiar')
                                ? 'dropdown active' : 'dropdown'
                            }}"> --}}
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="users"></i><span>Usuarios</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('superadmin.crear.usuario') }}">Crear</a></li>
                                <li><a class="nav-link" href="{{ route('superadmin.listar.usuarios') }}">Listar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="{{route('auth.cerrar')}}" class="nav-link">
                                <i data-feather="external-link" style="color:red;">exit_to_app</i><span
                                    style="color:red;">Cerrar sessión</span></a>
                        </li>
                        {{-- <li class="{{
                                Route::is('superadmin.categoriacl.listar') ||
                                Route::is('superadmin.categoriapr.listar') ||
                                Route::is('superadmin.frecuencia.listar') ||
                                Route::is('superadmin.formatoim.listar') ||
                                Route::is('superadmin.ods.listar') ||
                                Route::is('superadmin.roles.listar') ||
                                Route::is('superadmin.infra.index') ||
                                Route::is('superadmin.rrhh.listar') ||
                                Route::is('superadmin.unidades.listar')
                                //? 'dropdown active' : 'dropdown'
                            }}">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Parámetros</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('superadmin.categoriacl.listar') }}">Categorías de clima</a></li>
                                <li><a class="nav-link" href="{{ route('superadmin.categoriapr.listar') }}">Categorías de percepción</a></li>
                                <li><a class="nav-link" href="{{ route('superadmin.frecuencia.listar') }}">Frecuencias</a></li>
                                <li><a class="nav-link" href="{{ route('superadmin.formatoim.listar') }}">Formatos de implementación</a></li>
                                <li><a class="nav-link" href="{{ route('superadmin.ods.listar') }}">ODS</a></li>
                                <li><a class="nav-link" href="{{ route('superadmin.roles.listar') }}">Roles</a></li>
                                <li><a class="nav-link" href="{{ route('superadmin.infra.index') }}">Tipos de infraestructura</a></li>
                                <li><a class="nav-link" href="{{ route('superadmin.rrhh.listar') }}">Tipos de RRHH</a></li>
                                <li><a class="nav-link" href="{{ route('superadmin.unidades.listar') }}">Tipos de unidad</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                @yield('contenido-principal')
            </div>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <!--<script src="{{ asset('/bundles/apexcharts/apexcharts.min.js') }}"></script>-->
    <!-- Page Specific JS File -->
    <!--<script src="{{ asset('/js/page/index.js') }}"></script>-->
    <!-- Template JS File -->
    <script src="{{ asset('/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('/js/custom.js') }}"></script>
</body>


</html>
