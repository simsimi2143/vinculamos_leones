@extends('layout.index')

@section('acceso')
    <ul class="sidebar-menu" style="font-size: 110%;">
    <li class="menu-header">Digitador/a</li>

        <li class="dropdown">
            <a href="{{route('digitador.home')}}" class="nav-link">
                <i data-feather="home" id="saludo"></i><span>Inicio</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="book-open"></i><span>Iniciativas</span></a>
            <ul class="dropdown-menu">
                <li><a style="font-size: 90%;" class="nav-link" href="{{route('digitador.iniciativa.listar')}}">Registro de iniciativas</a></li>
                <li><a style="font-size: 90%;" class="nav-link" href="{{route('digitador.inicitiativas.crear.primero')}}">Crear iniciativa</a></li>
            </ul>
        </li>
        {{-- <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="clipboard"></i><span>Bitácora</span></a>
            <ul class="dropdown-menu">
                <li><a style="font-size: 90%;" class="nav-link" href="{{route('admin.listar.actividades')}}">Actividades</a></li>
                <li><a style="font-size: 90%;" class="nav-link" href="{{route('admin.listar.donaciones')}}">Listar donación</a></li>
                <li><a style="font-size: 90%;" class="nav-link" href="{{route('admin.ingresar.donaciones')}}">Ingresar donación</a></li>
            </ul>
        </li> --}}
        {{-- <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="bar-chart-2"></i><span>Análisis de datos</span></a>
        </li> --}}

@endsection

@section('contenido')
