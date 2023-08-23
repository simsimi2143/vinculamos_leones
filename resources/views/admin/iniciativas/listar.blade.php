@extends('admin.panel')

@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if (Session::has('exitoIniciativa'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoIniciativa') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-6">
                            @if (Session::has('errorIniciativa'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorIniciativa') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de Iniciativas</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.iniciativa.listar') }}" method="GET">
                                <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Filtrar por Mecanismo</label>
                                            <select class="form-control select2" id="mecanismo" name="mecanismo" onchange="filtrarTablaxMecanismo()">
                                                <option value="" selected>TODOS</option>
                                                @forelse ($mecanismos as $mecanismo)
                                                    <option value="{{ $mecanismo->meca_nombre }}" {{ Request::get('mecanismo') == $mecanismo->meca_nombre ? 'selected' : '' }}>{{ $mecanismo->meca_nombre }}</option>
                                                @empty
                                                    <option value="-1">No existen registros</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Filtrar por Año</label>
                                            <select class="form-control select2" id="ano" name="ano" onchange="filtrarTablaxMecanismo()">
                                                <option value="" selected>TODOS</option>
                                                @forelse ($anhos as $ann)
                                                    <option value="{{ $ann->inic_anho }}" {{ Request::get('mecanismo') == $ann->inic_anho ? 'selected' : '' }}>{{ $ann->inic_anho }}</option>
                                                @empty
                                                    <option value="-1">No existen registros</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-4 col-md-4 col-lg-4  mb-4">
                                        <a href="{{ route('admin.iniciativa.listar') }}" type="button" class="btn btn-primary mr-1 waves-effect"><i class="fas fa-broom"></i> Limpiar</a>
                                    </div> --}}
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>

                                            <th>Nombre</th>
                                            <th>Mecanismo</th>
                                            <th>Año</th>
                                            <th>Escuelas</th>
                                            <th>Carreras</th>
                                            <th>Estado</th>
                                            <th>Fecha de creación</th>
                                            <th style="width: 250px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla-iniciativas">
                                        @foreach ($iniciativas as $iniciativa)
                                            <tr data-meca="{{ $iniciativa->meca_nombre }}" data-ano="{{ $iniciativa->inic_anho }}">
                                                <td>{{ $iniciativa->inic_nombre }}</td>
                                                <td>{{ $iniciativa->meca_nombre }}</td>
                                                <td>{{ $iniciativa->inic_anho }}</td>
                                                <td>
                                                    @php
                                                        $escuelasArray = explode(',', $iniciativa->escuelas);
                                                    @endphp
                                                    @if (count($escuelasArray) > 3)
                                                        Todas
                                                    @else
                                                        {{ $iniciativa->escuelas }}
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $iniciativa->carreras }}</td> --}}
                                                <td>
                                                    @php
                                                        $carrerasArray = explode(',', $iniciativa->carreras);
                                                    @endphp
                                                    @if (count($carrerasArray) > 29)
                                                        Todas
                                                    @else
                                                        {{ $iniciativa->carreras }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $estadoBadges = [
                                                            1 => ['class' => 'light', 'icon' => 'history', 'text' => 'En revisión'],
                                                            2 => ['class' => 'info', 'icon' => 'play-circle', 'text' => 'En ejecución'],
                                                            3 => ['class' => 'success', 'icon' => 'lock', 'text' => 'Aceptada'],
                                                            4 => ['class' => 'info', 'icon' => 'info-circle', 'text' => 'Falta info'],
                                                            5 => ['class' => 'primary', 'icon' => 'pause-circle', 'text' => 'Cerrada'],
                                                            6 => ['class' => 'success', 'icon' => 'check-double', 'text' => 'Finalizada'],
                                                        ];
                                                    @endphp

                                                    <div
                                                        class="badge badge-{{ $estadoBadges[$iniciativa->inic_estado]['class'] }} badge-shadow">
                                                        <i
                                                            class="fas fa-{{ $estadoBadges[$iniciativa->inic_estado]['icon'] }}"></i>
                                                        {{ $estadoBadges[$iniciativa->inic_estado]['text'] }}
                                                    </div>
                                                </td>
                                                <td>{{ $iniciativa->inic_creado }}</td>
                                                <td>
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-primary dropdown-toggle"
                                                            id="dropdownMenuButton2" data-toggle="dropdown"title="Opciones">
                                                            <i class="fas fa-cog"></i> </button>
                                                        <div class="dropdown-menu dropright">

                                                            <a href="{{ route('admin.editar.paso1', $iniciativa->inic_codigo) }}"
                                                                class="dropdown-item has-icon"><i
                                                                    class="fas fa-edit"></i>Editar Iniciativa</a>
                                                            <a href="javascript:void(0)" class="dropdown-item has-icon"
                                                                onclick="eliminarIniciativa({{ $iniciativa->inic_codigo }})"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Eliminar">Eliminar Iniciativa<i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>
                                                    </div>

                                                    <a href="{{ route('admin.iniciativas.detalles', $iniciativa->inic_codigo) }}"
                                                        class="btn btn-icon btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Ver detalles"><i
                                                            class="fas fa-eye"></i></a>


                                                    <a href="{{ route('admin.evidencias.listar', $iniciativa->inic_codigo) }}"
                                                        class="btn btn-icon btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Adjuntar evidencia"><i
                                                            class="fas fa-paperclip"></i></a>

                                                    <a href="{{ route('admin.cobertura.index', $iniciativa->inic_codigo) }}"
                                                        class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Ingresar cobertura"><i
                                                            class="fas fa-users"></i></a>
                                                    <a href="{{ route('admin.resultados.listado', $iniciativa->inic_codigo) }}"
                                                        class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Ingresar resultado"><i
                                                            class="fas fa-flag"></i></a>

                                                    {{-- <a href="" class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Ingresar resultado"><i
                                                            class="fas fa-flag"></i></a>

                                                    <a href="" class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Evaluar iniciativa"><i
                                                            class="fas fa-file-signature"></i></a> --}}


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
    <div class="modal fade" id="modalEliminaIniciativa" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.iniciativa.eliminar') }} " method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Iniciativa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">La iniciativa dejará de existir dentro del sistema. <br> ¿Desea continuar de
                            todos
                            modos?</h6>
                        <input type="hidden" id="inic_codigo" name="inic_codigo" value="">
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
        window.onload = function () {
        // Inicializar tabla
        filtrarTabla();

        // Agregar listeners para cada filtro
        const mecanismoSelect = document.getElementById('mecanismo');
        mecanismoSelect.addEventListener('change', filtrarTabla);

        const estadoSelect = document.getElementById('estado');
        estadoSelect.addEventListener('change', filtrarTabla);
        };

        function eliminarIniciativa(inic_codigo) {
            $('#inic_codigo').val(inic_codigo);
            $('#modalEliminaIniciativa').modal('show');
        }


        function filtrarTablaxMecanismo() {
            const selectElement = document.querySelector('select[name="table-1_length"]');
            selectElement.selectedIndex = 3;
            const changeEvent = new Event('change', { bubbles: true });
            selectElement.dispatchEvent(changeEvent);
            const mecaSeleccionado = document.getElementById('mecanismo').value;
            const anoSeleccionado = document.getElementById('ano').value;
            const filasTabla = document.querySelectorAll('#tabla-iniciativas tr');


            filasTabla.forEach(function (fila) {
                const mecaFila = fila.getAttribute('data-meca');
                const anoFila = fila.getAttribute('data-ano');

                const filtroMeca = mecaSeleccionado === '' || mecaSeleccionado === mecaFila;
                const filtroEstado = anoSeleccionado === '' || anoSeleccionado === anoFila;

                if (filtroMeca && filtroEstado) {
                    fila.style.display = ''; // Mostrar la fila
                } else {
                    fila.style.display = 'none'; // Ocultar la fila
                }
                /* if (mecaSeleccionado === '' && anoSeleccionado === '') {
                    selectElement.selectedIndex = 0;
                    selectElement.dispatchEvent(changeEvent);
                    fila.style.display = 'table-row'; // Mostrar la fila

                }else if(mecaSeleccionado === mecaFila && anoSeleccionado === anoFila){
                    fila.style.display = 'table-row'; // Mostrar la fila
                }
                else {
                    fila.style.display = 'none'; // Ocultar la fila
                } */
                if (mecaSeleccionado === '' && anoSeleccionado === '' ) {
                    selectElement.selectedIndex = 0;
                    selectElement.dispatchEvent(changeEvent);
                    fila.style.display = 'table-row';
                }
            });
            }

            /* function filtrarTablaxAno() {
            const selectElement = document.querySelector('select[name="table-1_length"]');
            selectElement.selectedIndex = 3;
            const changeEvent = new Event('change', { bubbles: true });
            selectElement.dispatchEvent(changeEvent);
            const anoSeleccionado = document.getElementById('ano').value;
            const filasTabla = document.querySelectorAll('#tabla-iniciativas tr');


            filasTabla.forEach(function (fila) {
                const mecaFila = fila.getAttribute('data-meca');
                if (anoSeleccionado === '') {
                    selectElement.selectedIndex = 0;
                    selectElement.dispatchEvent(changeEvent);
                    fila.style.display = 'table-row'; // Mostrar la fila

                }else if(anoSeleccionado === mecaFila){
                    fila.style.display = 'table-row'; // Mostrar la fila
                }
                else {
                    fila.style.display = 'none'; // Ocultar la fila
                }
            });
            } */
        // Llamar a la función cuando se carga la página
    </script>
@endsection
