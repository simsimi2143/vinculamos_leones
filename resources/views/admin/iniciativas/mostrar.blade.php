@extends('admin.panel')
@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row"></div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Información de la iniciativa</h4>
                            <div class="card-header-action">
                                <div class="dropdown d-inline">
                                    <button class="btn btn-primary dropdown-toggle" id="dropdownMenuButton2"
                                        data-toggle="dropdown">Iniciativa</button>
                                    <div class="dropdown-menu dropright">

                                        <a href="{{ route('admin.cobertura.index', $iniciativa->inic_codigo) }}"
                                            class="dropdown-item has-icon"><i class="fas fa-users"></i>Ingresar
                                            cobertura</a>
                                        {{-- <a href="" class="dropdown-item has-icon"><i class="fas fa-flag"></i>Ingresar
                                            resultados</a>
                                        <a href="" class="dropdown-item has-icon"><i
                                                class="fas fa-file-signature"></i>Ingresar evaluación</a> --}}
                                    </div>
                                </div>

                                <div class="dropdown d-inline">

                                    <button class="btn btn-primary dropdown-toggle" id="dropdownMenuButton2"
                                        data-toggle="dropdown">Estados</button>
                                    <div class="dropdown-menu dropright">
                                        <form method="POST"
                                            action="{{ route('admin.iniciativas.updateState', ['inic_codigo' => $iniciativa->inic_codigo]) }}">
                                            @csrf
                                            <input type="hidden" name="state" value="3">
                                            <a href="javascript:void(0);" onclick="this.closest('form').submit();"
                                                class="dropdown-item has-icon" style="display: flex; align-items: center;">
                                                <i class="fas fa-check" style="margin-right: 8px;"></i> Aprobar iniciativa
                                            </a>
                                        </form>

                                        <form method="POST"
                                            action="{{ route('admin.iniciativas.updateState', ['inic_codigo' => $iniciativa->inic_codigo]) }}">
                                            @csrf
                                            <input type="hidden" name="state" value="2">
                                            <a href="javascript:void(0);" onclick="this.closest('form').submit();"
                                                class="dropdown-item has-icon" style="display: flex; align-items: center;">
                                                <i class="fas fa-cog" style="margin-right: 8px;"></i> En ejecución
                                            </a>
                                        </form>

                                        <form method="POST"
                                            action="{{ route('admin.iniciativas.updateState', ['inic_codigo' => $iniciativa->inic_codigo]) }}">
                                            @csrf
                                            <input type="hidden" name="state" value="4">
                                            <a href="javascript:void(0);" onclick="this.closest('form').submit();"
                                                class="dropdown-item has-icon" style="display: flex; align-items: center;">
                                                <i class="fas fa-info-circle" style="margin-right: 8px;"></i> Falta
                                                información
                                            </a>
                                        </form>

                                        <form method="POST"
                                            action="{{ route('admin.iniciativas.updateState', ['inic_codigo' => $iniciativa->inic_codigo]) }}">
                                            @csrf
                                            <input type="hidden" name="state" value="5">
                                            <a href="javascript:void(0);" onclick="this.closest('form').submit();"
                                                class="dropdown-item has-icon" style="display: flex; align-items: center;">
                                                <i class="fas fa-lock" style="margin-right: 8px;"></i> Cerrar iniciativa
                                            </a>
                                        </form>

                                        <form method="POST"
                                            action="{{ route('admin.iniciativas.updateState', ['inic_codigo' => $iniciativa->inic_codigo]) }}">
                                            @csrf
                                            <input type="hidden" name="state" value="6">
                                            <a href="javascript:void(0);" onclick="this.closest('form').submit();"
                                                class="dropdown-item has-icon" style="display: flex; align-items: center;">
                                                <i class="fas fa-times" style="margin-right: 8px;"></i> Finalizar Iniciativa
                                            </a>
                                        </form>



                                    </div>
                                </div>

                                <a href="{{ route('admin.iniciativa.listar') }}" data-toggle="tooltip" data-placemet="top"
                                    type="button" class="btn btn-primary" title="Ir a iniciativas">
                                    <i class="fas fa-backward"></i>
                                </a>

                                {{-- <a href="" type="button" data-toggle="tooltip" class="btn btn-primary"
                                    data-placemet="top" title="Adjuntar evidencia">
                                    <i class="fas fa-paperclip"></i>
                                </a> --}}

                                <a href="{{ route('admin.editar.paso1', $iniciativa->inic_codigo) }}" type="button"
                                    data-toggle="tooltip" class="btn btn-warning" data-placemet="top"
                                    title="Editar iniciativa">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)" class="btn btn-danger" data-toggle="tooltip"
                                    data-placement="top" title="Eliminar iniciativa"><i class="fas fa-trash"></i></a>
                                {{-- <a href="javascript:void(0)" class="dropdown-item has-icon"
                                    onclick="eliminarIniciativa({{ $iniciativa->inic_codigo }})" data-toggle="tooltip"
                                    data-placement="top" title="Eliminar">Eliminar Iniciativa<i
                                        class="fas fa-trash"></i></a> --}}

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-strip table-md">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Nombre de la iniciativa</strong>
                                                </td>
                                                <td>
                                                    {{ $iniciativa->inic_nombre }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <strong>Año</strong>
                                                </td>
                                                <td>
                                                    {{ $iniciativa->inic_anho }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <strong>Descripción</strong>
                                                </td>
                                                <td>
                                                    {{ $iniciativa->inic_descripcion }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><strong>Programas</strong></td>
                                                <td>{{ $iniciativa->meca_nombre }}</td>
                                            </tr>

                                            <tr>
                                                <td><strong>Tipo de actividad</strong></td>
                                                <td>
                                                    {{$iniciativa->tiac_nombre}}
                                                </td>

                                            </tr>

                                            <tr>
                                                <td><strong>Convenio</strong></td>
                                                <td>{{ $iniciativa->conv_nombre }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Ubicaciones</strong></td>
                                                <td>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-sm">
                                                            <thead>
                                                                <th>Región</th>
                                                                <th>Comunas</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($ubicaciones as $ubicacion)
                                                                    <tr style="background-color: inherit;">
                                                                        <td>{{ $ubicacion->regi_nombre }}</td>
                                                                        <td>{{ $ubicacion->comunas }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- <tr> --}}
                                            {{-- Todo: incluir el caso en el que no existan grupos implicados --}}
                                            {{-- <td><strong>Grupos incluidos</strong></td>
                                                <td>
                                                    <ol>
                                                    @foreach ($grupos as $grupo)
                                                    <li>{{$grupo->grup_nombre}}</li>
                                                    @endforeach
                                                    </ol>
                                                </td>
                                            </tr> --}}

                                            {{-- <tr> --}}
                                            {{-- Todo: incluir el caso en el que no existan grupos implicados --}}
                                            {{-- <td><strong>Grupos y temáticas <br> relacionadas</strong></td>
                                                <td>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-sm small">
                                                            <thead>
                                                                <th>Grupos</th>
                                                                <th>Temáticas</th>
                                                            </thead>
                                                            <tbody>
                                                                <td>
                                                                    <ol>
                                                                        @foreach ($grupos as $grupo)
                                                                            <li>{{ $grupo->grup_nombre }}</li>
                                                                        @endforeach
                                                                    </ol>
                                                                </td>
                                                                <td>
                                                                    <ol>
                                                                        @foreach ($tematicas as $tematica)
                                                                            <li>{{ $tematica->tema_nombre }}</li>
                                                                        @endforeach
                                                                    </ol>
                                                                </td>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td> --}}
                                            {{-- </tr> --}}

                                            <tr>
                                                <td><strong>Participantes externos</strong></td>
                                                <td>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-sm ">
                                                            <thead>
                                                                <th>Grupos</th>
                                                                <th>Subgrupos</th>
                                                                <th>Nombre del socio</th>
                                                                <th>Beneficiarios</th>
                                                                <th>Beneficiarios final</th>
                                                            </thead>

                                                            <tbody>
                                                                @foreach ($externos as $externo)
                                                                    <tr>
                                                                        <td>{{ $externo->grin_nombre }}</td>
                                                                        <td>{{ $externo->sugr_nombre }}</td>
                                                                        <td>{{ $externo->soco_nombre_socio }}</td>
                                                                        <td>{{ $externo->inpr_total }}</td>
                                                                        <td>{{ $externo->inpr_total_final }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><strong>Participantes internos</strong></td>
                                                <td>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-sm">
                                                            <thead>
                                                                <th>Escuelas</th>
                                                                <th>Carreras</th>
                                                                <th>Docentes</th>
                                                                <th>Docentes final</th>
                                                                <th>Estudiantes</th>
                                                                <th>Estudiantes final</th>
                                                            </thead>

                                                            <tbody>
                                                                @foreach ($internos as $interno)
                                                                    <tr>
                                                                        <td>{{ $interno->escu_nombre }}</td>
                                                                        <td>{{ $interno->care_nombre }}</td>
                                                                        <td>
                                                                            @if ($interno->pain_docentes != null)
                                                                                {{ $interno->pain_docentes }}
                                                                            @else
                                                                                No registrado
                                                                            @endif
                                                                        </td>

                                                                        <td>
                                                                            @if ($interno->pain_docentes_final != null)
                                                                                {{ $interno->pain_docentes_final }}
                                                                            @else
                                                                                No registrado
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($interno->pain_estudiantes != null)
                                                                                {{ $interno->pain_estudiantes }}
                                                                            @else
                                                                                No registrado
                                                                            @endif
                                                                        </td>

                                                                        <td>
                                                                            @if ($interno->pain_estudiantes_final != null)
                                                                                {{ $interno->pain_estudiantes_final }}
                                                                            @else
                                                                                No registrado
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><strong>Total de recursos invertidos</strong></td>
                                                <td>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-sm">
                                                            <thead>
                                                                <th></th>
                                                                <th>Dinero</th>
                                                                <th>Infraestructura</th>
                                                                <th>Recursos humanos</th>
                                                            </thead>

                                                            <tbody>
                                                                @php
                                                                    $totalDinero = 0;
                                                                    $totalInfraestructura = 0;
                                                                    $totalRrhh = 0;
                                                                @endphp
                                                                @foreach ($entidades as $entidad)
                                                                    @php
                                                                        $entidadDinero = 0;
                                                                        $entidadInfraestructura = 0;
                                                                        $entidadRrhh = 0;
                                                                    @endphp

                                                                    <tr>
                                                                        <td>{{ $entidad->enti_nombre }}</td>
                                                                        <td>
                                                                            @if (sizeof($recursoDinero) == 0)
                                                                                $0
                                                                            @else
                                                                                @foreach ($recursoDinero as $dinero)
                                                                                    @if ($entidad->enti_codigo == $dinero->enti_codigo)
                                                                                        @php
                                                                                            $entidadDinero = $dinero->suma_dinero;
                                                                                        @endphp
                                                                                        ${{ number_format($dinero->suma_dinero, 0, ',', '.') }}
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if (sizeof($recursoInfraestructura) == 0)
                                                                                $0
                                                                            @else
                                                                                @foreach ($recursoInfraestructura as $infraestructura)
                                                                                    @if ($entidad->enti_codigo == $infraestructura->enti_codigo)
                                                                                        @php
                                                                                            $entidadInfraestructura = $infraestructura->suma_infraestructura;
                                                                                        @endphp
                                                                                        ${{ number_format($infraestructura->suma_infraestructura, 0, ',', '.') }}
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if (sizeof($recursoRrhh) == 0)
                                                                                $0
                                                                            @else
                                                                                @foreach ($recursoRrhh as $rrhh)
                                                                                    @if ($entidad->enti_codigo == $rrhh->enti_codigo)
                                                                                        @php
                                                                                            $entidadRrhh = $rrhh->suma_rrhh;
                                                                                        @endphp
                                                                                        ${{ number_format($rrhh->suma_rrhh, 0, ',', '.') }}
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    @php
                                                                        $totalDinero += $entidadDinero;
                                                                        $totalInfraestructura += $entidadInfraestructura;
                                                                        $totalRrhh += $entidadRrhh;
                                                                    @endphp
                                                                @endforeach
                                                                <tr>
                                                                    <td>Total General</td>
                                                                    <td>${{ number_format($totalDinero, 0, ',', '.') }}</td>
                                                                    <td>${{ number_format($totalInfraestructura, 0, ',', '.') }}
                                                                    </td>
                                                                    <td>${{ number_format($totalRrhh, 0, ',', '.') }}</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
