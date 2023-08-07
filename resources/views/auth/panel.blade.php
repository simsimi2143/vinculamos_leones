@extends('layout.index')

@section('acceso')
    <ul class="sidebar-menu">
    <li class="menu-header">Administrador</li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="book-open"></i><span>Iniciativas</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="">Registro de iniciativas</a></li>
                <li><a class="nav-link" href="">Crear iniciativa</a></li>
            </ul>
        </li>
        <li class="dropdown">
        <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Usuarios</span></a>
        <ul class="dropdown-menu">
            <li><a href="">Usuarios creados</a></li>
        </ul>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="command"></i><span>Parámetros</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="">Sedes</a></li>
                <li><a class="nav-link" href="">Escuelas</a></li>
                <li><a class="nav-link" href="">Carreras</a></li>
                <li><a class="nav-link" href="">Ambitos de Contribución</a></li>
                <li><a class="nav-link" href="">Programas</a></li>
                <li><a class="nav-link" href="">Convenios</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="star"></i><span>Objetivos</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="">ODS</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="bar-chart-2"></i><span>Análisis de datos</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="arrow-left-circle"></i><span>Extracción de datos</span></a>
        </li>
        </li>
    </ul>
    </aside>
    </div>
@endsection

@section('contenido')
