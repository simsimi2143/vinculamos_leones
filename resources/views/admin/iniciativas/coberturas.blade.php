@extends('admin.panel')

@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if (Session::has('errorResultados'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorResultados') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif

                            @if (Session::has('exitoExterno'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoExterno') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif

                            @if (Session::has('exitoInterno'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoInterno') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $iniciativa->inic_nombre }} - Registro participantes internos</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.cobertura.interna.update', $iniciativa->inic_codigo)}}" method="POST">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-2"></div>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-md">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Escuela</th>
                                                                <th scope="col">Carrera</th>
                                                                <th scope="col">Docentes inicial</th>
                                                                <th scope="col">Docentes final</th>
                                                                <th scope="col">Estudiantes inicial</th>
                                                                <th scope="col">Estudiantes final</th>
                                                                <th scope="col">Funcionarios/as inicial</th>
                                                                <th scope="col">Funcionarios/as final</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="body-tabla-participantes">
                                                            {{-- {{$resultados}} --}}
                                                            @foreach ($resultados as $resultado)
                                                                <tr>
                                                                    <td>{{ $resultado->escu_nombre }}</td>
                                                                    <td>{{ $resultado->care_nombre }}</td>
                                                                    <td>{{ $resultado->pain_docentes }}</td>
                                                                    <td>
                                                                        <input type="number" class="form-control"
                                                                            id="cantidad-docentes-final-{{ $resultado->pain_codigo }}"
                                                                            name="docentes_final[{{ $resultado->pain_codigo }}]"
                                                                            value="{{ $resultado->pain_docentes_final }}"
                                                                            min="0">
                                                                    </td>
                                                                    <td>{{ $resultado->pain_estudiantes }}</td>
                                                                    <td>
                                                                        <input type="number" class="form-control"
                                                                            id="cantidad-estudiantes-final-{{ $resultado->pain_codigo }}"
                                                                            name="estudiantes_final[{{ $resultado->pain_codigo }}]"
                                                                            value="{{ $resultado->pain_estudiantes_final }}"
                                                                            min="0">
                                                                    </td>
                                                                    <td>{{ $resultado->pain_funcionarios }}</td>
                                                                    <td>
                                                                        <input type="number" class="form-control"
                                                                            id="cantidad-funcionarios-final-{{ $resultado->pain_codigo }}"
                                                                            name="funcionarios_final[{{ $resultado->pain_codigo }}]"
                                                                            value="{{ $resultado->pain_funcionarios_final }}"
                                                                            min="0">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-12 text-right">
                                                <input type="hidden" id="inic_codigo" name="inic_codigo"
                                                    value="{{ $iniciativa->inic_codigo }}">
                                                <button type="submit" class="btn btn-primary mr-1 waves-effect"><i
                                                        class="fas fa-save"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $iniciativa->inic_nombre }} - Registro de participantes externos</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.cobertura.externa.update', $iniciativa->inic_codigo) }}"
                                method="post">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-md">

                                                        @if (count($participantes) > 0)
                                                            <thead>
                                                                <tr>
                                                                    <th>Socios/as</th>
                                                                    <th>Subgrupos</th>
                                                                    <th>Beneficiarios/as</th>
                                                                    <th>Beneficiarios/as final</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>

                                                                @foreach ($participantes as $participante)
                                                                    <tr>
                                                                        <td>{{ $participante->soco_nombre_socio }}</td>
                                                                        <td>{{ $participante->sugr_nombre }}</td>
                                                                        <td>
                                                                            @if ($participante->inpr_total > 0)
                                                                                {{ $participante->inpr_total }}
                                                                            @else
                                                                                No registrado.
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <input type="number"
                                                                                name="participantes[{{ $participante->inpr_codigo }}]"
                                                                                class="form-control"
                                                                                value="{{ $participante->inpr_total_final }}">
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        @else
                                                            <thead class="text-center">
                                                                <tr>
                                                                    <th>Al parecer no hay registro de participación externa
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        @endif


                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12 text-right">
                                        <input type="hidden" id="inic_codigo" name="inic_codigo"
                                            value="{{ $iniciativa->inic_codigo }}">
                                        <a href="{{ route('admin.iniciativa.listar') }}"
                                            class="btn btn-primary mr-1 waves-effect" type="button">
                                            <i class="fas fa-angle-left"></i> Volver a listado
                                        </a>
                                        <button type="submit" class="btn btn-primary mr-1 waves-effect"><i
                                                class="fas fa-save"></i> Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('/js/admin/iniciativas/listar.js') }}"></script>
@endsection
