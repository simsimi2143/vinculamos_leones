<!DOCTYPE html>
<html lang="es">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>VINCULAMOS LOS LEONES</title>
    <!-- General CSS Files -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/social.css') }}" rel="stylesheet">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('/bundles/select2/dist/css/select2.min.css') }}">
    <!-- Template CSS -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/components.css') }}" rel="stylesheet">
    <!-- Custom style CSS -->
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet" href="{{ asset('/css/mapa.css') }}" />
    {{-- <script src="{{asset('/js/mapa.js')}}"></script> --}}

    <link rel="stylesheet" href="{{ asset('/css/leaflet.legend.css') }}" />
    <script src="{{ asset('/js/leaflet.legend.js') }}"></script>
    <!-- componentes del formulario -->
    <link rel="stylesheet" href="{{ asset('/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/bundles/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('/bundles/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/bundles/select2/dist/css/select2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">

                                                                    {{-- TODO: IMAGEN DE LA PESTAÑA --}}
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('/img/logo_chico.png') }}' />

</head>

<body>
    <!-- <div class="loader"></div> -->
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- <div class="navbar-bg"></div> --}}
            <nav class="navbar navbar-expand-lg main-navbar sticky" style=" display: flex; margin-top: ;">
                <div class="form-inline mr-auto" style="margin: 0;">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"><i
                                    data-feather="align-justify"></i></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link nav-link-lg fullscreen-btn"><i
                                    data-feather="maximize"></i></a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right" style="margin-top: 0px;">
                    <div class="sidebar-brand">
                        <a href="javascript:void(0)"> <img alt="image" src="{{ asset('/img/logoleones.png') }}" {{-- Logo esquina superior derecha --}}
                                class="header-logo" style="transform: scale(0.35);transform-origin: right;position: fixed;
                                top: -7%;
                                right: 25px;" />
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
                                data-initial="
                                    @if (Session::has('admin')) {{ Str::upper(Session::get('admin.usua_nombre')[0]) . Str::upper(Session::get('admin.usua_apellido')[0]) }}
                                    @elseif (Session::has('digitador'))
                                        {{ Str::upper(Session::get('digitador.usua_nombre')[0]) . Str::upper(Session::get('digitador.usua_apellido')[0]) }}
                                    @elseif(Session::has('observador'))
                                        {{ Str::upper(Session::get('observador.usua_nombre')[0]) . Str::upper(Session::get('observador.usua_apellido')[0]) }}
                                    @elseif(Session::has('supervisor'))
                                        {{ Str::upper(Session::get('supervisor.usua_nombre')[0]) . Str::upper(Session::get('supervisor.usua_apellido')[0]) }} @endif
                                ">
                            </figure>
                            <span class="logo-name" style="font-size: 12px;"id="usuario-nombre">
                                @if (Session::has('admin'))
                                    {{ Session::get('admin.usua_nombre') }}
                                    {{ Session::get('admin.usua_apellido') }}
                                @elseif (Session::has('digitador'))
                                    {{ Session::get('digitador.usua_nombre') }}
                                    {{ Session::get('digitador.usua_apellido') }}
                                @elseif(Session::has('observador'))
                                    {{ Session::get('observador.usua_nombre') }}
                                    {{ Session::get('observador.usua_apellido') }}
                                @elseif(Session::has('supervisor'))
                                    {{ Session::get('supervisor.usua_nombre') }}
                                    {{ Session::get('supervisor.usua_apellido') }}
                                @endif
                            </span>
                        </a>
                    </div>
                    <!-- barra lateral izquierda  -->
                    @yield('acceso')
                    <!-- Main Content -->
                    <li class="dropdown">
                        <a href="{{ route('auth.cerrar') }}" class="nav-link">
                            <i data-feather="external-link" style="color:red;"></i><span style="color:red;">Cerrar
                                sessión</span></a>
                    </li>
                    </ul>
                </aside>
            </div>
            <div class="main-content">
                @yield('contenido')
            </div>
        </div>
    </div>

    <footer class="main-footer">
        <div class="footer-left">
            <p><strong>Copyright &#169; 2023 </strong> <a href="https://www.vinculamos.cl/">Vinculamos</a>. Todos los
                derechos reservados.</p>
        </div>
        <div class="footer-right">
            <p><strong>Versión</strong> 7.0.0-beta</p>
        </div>
    </footer>

    <script>

    </script>
    <link rel="stylesheet" href="{{ asset('/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/page/datatables.js') }}"></script>
    <!-- General JS Scripts -->
    <script src="{{ asset('/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('/js/chart.min.js') }}"></script>
    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('//js/chart-chartjs.js') }}"></script> --}}
    <script src="{{ asset('/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/bundles/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('/js/page/toastr.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('/js/index.js') }}"></script> --}}
    {{-- <!-- General JS Scripts -->
            <script src="{{ asset('/js/app.min.js') }}"></script>
            <!-- JS Libraies -->
            <script src="{{ asset('/js/apex.min.js') }}"></script>
            <!-- Page Specific JS File -->
            <script src="{{ asset('/js/index.js') }}"></script>
            <!-- Template JS File -->
            <script src="{{ asset('/js/scripts.js') }}"></script>
            <!-- Custom JS File -->
            <script src="{{ asset('/js/custom.js') }}"></script> --}}

    <script src="{{ asset('/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('/js/page/auth-register.js') }}"></script>

</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
