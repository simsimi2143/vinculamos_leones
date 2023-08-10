@extends('admin.panel')
@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    @if (Session::has('exitoPaso1'))
                        <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                            <div class="alert-body">
                                <strong>{{ Session::get('exitoPaso1') }}</strong>
                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('ExisteSocio'))
                        <div class="alert alert-warning alert-dismissible show fade mb-4 text-center">
                            <div class="alert-body">
                                <strong>{{ Session::get('ExisteSocio') }}</strong>
                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        </div>
                    @endif

                    @if (Session::has('errorPaso2'))
                        <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                            <div class="alert-body">
                                <strong>{{ Session::get('errorPaso2') }}</strong>
                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        </div>
                    @endif

                    @if (Session::has('socoError'))
                        <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                            <div class="alert-body">
                                <strong>{{ Session::get('socoError') }}</strong>
                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('socoExito'))
                        <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                            <div class="alert-body">
                                <strong>{{ Session::get('socoExito') }}</strong>
                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 id="idIniciativa">{{ $iniciativa->inic_codigo }}</h2>
                            <h4>Iniciativa: {{ $iniciativa->inic_nombre }}</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearSocio"><i class="fas fa-plus"></i> Crear Socio</button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <h5>Sección 2 - Participantes externos</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 col-md-2 col-lg-3">
                                    <div class="form-group">
                                        <label style="font-size: 110%">Subgrupos</label> <label for=""
                                            style="color: red;">*</label>
                                        <select class="form-control select2" id="subgrupo" name="subgrupo"
                                            style="width: 100%">
                                            <option value="">Seleccione...</option>
                                            @forelse ($subgrupos as $subgrupo)
                                                <option value="{{ $subgrupo->sugr_codigo }}">{{ $subgrupo->sugr_nombre }}
                                                </option>
                                            @empty
                                                <option value="-1">No existen registros</option>
                                            @endforelse
                                        </select>

                                        @if ($errors->has('subgrupo'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close"
                                                        data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('subgrupo') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label style="font-size: 110%">Socio comunitario</label> <label for=""
                                            style="color: red;">*</label>
                                        <select class="form-control select2" id="socio" name="socio"
                                            style="width: 100%">
                                            <option value="">Seleccione...</option>
                                            @forelse ($socios as $socio)
                                                <option value="{{ $socio->soco_codigo }}">{{ $socio->soco_nombre_socio }}
                                                </option>
                                            @empty
                                                <option value="-1">No existen registros</option>
                                            @endforelse
                                        </select>

                                        @if ($errors->has('socio'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close"
                                                        data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('socio') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label style="font-size: 110%">Personas beneficiarias</label>
                                        <input type="number" class="form-control" id="npersonas" name="npersonas"
                                            value="{{ old('npersonas') }}">

                                        @if ($errors->has('npersonas'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close"
                                                        data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('npersonas') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-2 col-md-2 col-lg-2" style="position: relative;">

                                    <button style="position: absolute; top: 52%; transform: translateY(-50%);"
                                        class="btn btn-primary mr-1 waves-effect"
                                        onclick="AgregarParticipantesExternos()"><i class="fas fa-plus"></i>
                                        Agregar</button>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bored table-md">
                                                    <thead>
                                                        <th>Subgrupo</th>
                                                        <th>Socio Comunitario</th>
                                                        <th>Personas beneficiarias</th>
                                                        <th>Acción</th>
                                                    </thead>
                                                    <tbody id="body-tabla-externos">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <h5>Sección 3 - Participantes internos</h5>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-4 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label style="font-size: 110%">Escuela</label> <label for=""
                                            style="color: red;">*</label>
                                        <select class="form-control select2" id="escuelas" name="escuelas"
                                            style="width: 100%">
                                            <option value="" selected disabled>Seleccione...</option>
                                            @forelse ($escuelas as $escuela)
                                                <option value="{{ $escuela->escu_codigo }}">
                                                    {{ $escuela->escu_nombre }}
                                                </option>
                                            @empty
                                                <option value="-1">No existen registros</option>
                                            @endforelse

                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 div-col-md-2 col-lg-3">
                                    <div class="form-group">
                                        <label style="font-size: 110%">Carreras</label> <label for=""
                                            style="color: red;">*</label>
                                        <select class="form-control select2" id="carreras" name="carreras"
                                            style="width: 100%">
                                            <option value="" selected disabled>Seleccione...</option>
                                            @forelse ($carreras as $carrera)
                                                <option value="{{ $carrera->care_codigo }}">
                                                    {{ $carrera->care_nombre }}
                                                </option>
                                            @empty
                                                <option value="-1">No existen registros</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div> --}}


                                 {{-- <div class="col-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label>N° de participantes totales</label> <label for=""
                                            style="color: red;">*</label>
                                        <input type="number" class="form-control" id="ntotal" name="ntotal">

                                        @if ($errors->has('ntotal'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close"
                                                        data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('ntotal') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>  --}}

                                {{-- <div class="col-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label style="font-size: 110%">Estudiantes</label> <label for=""
                                            style="color: red;">*</label>
                                        <input type="number" class="form-control" id="nestudiantes"
                                            name="nestudiantes">

                                        @if ($errors->has('nestudiantes'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close"
                                                        data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('nestudiantes') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label style="font-size: 110%">Docentes</label> <label for=""
                                            style="color: red;">*</label>
                                        <input type="number" class="form-control" id="ndocentes" name="ndocentes">

                                        @if ($errors->has('ndocentes'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close"
                                                        data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('ndocentes') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-2 col-md-2 col-lg-2" style="position: relative;">

                                    <button style="position: absolute; top: 50%; transform: translateY(-50%);"
                                        onclick="modificar()" class="btn btn-primary mr-1 waves-effect"><i
                                            class="fas fa-plus"></i> Agregar
                                    </button>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bored table-md">
                                                    <thead>
                                                        <th>Escuelas</th>
                                                        <th>Carreras</th>
                                                        <th>Estudiantes</th>
                                                        <th>Docentes</th>
                                                        <th>Total</th>
                                                    </thead>
                                                    <tbody id="body-tabla-internos">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <form action="{{ route('admin.paso2.verificar', $iniciativa->inic_codigo) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <h4 class="font-weight-light">¿La iniciativa se desarrolla con <br>alguno de
                                                los siguientes grupos?</h4>
                                        </div>

                                        <div class="row" style="margin-top: 5%">
                                            <div class="col-2"></div>
                                            <div class="form-grup">
                                                {{$grupos}}
                                                @foreach ($grupos as $grupo)
                                                    <div class="form-check">
                                                        <input type="checkbox" name=grupos[] class="form-check-input"
                                                            id="check{{ $grupo->grup_codigo }}"
                                                            value="{{ $grupo->grup_codigo }}"
                                                            @if (in_array($grupo->grup_codigo, $gruposSec)) checked @endif>
                                                        <label for="check{{ $grupo->grup_codigo }}"
                                                            class="form-check-label">
                                                            <h6 class="font-weight-light">{{ $grupo->grup_nombre }}</h6>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <h4 class="font-weight-light"class="font-weight-light">¿La iniciativa aborda
                                                alguna de <br>las siguientes temáticas?</h4>
                                        </div>

                                        <div class="row" style="margin-top: 5%">
                                            <div class="col-2"></div>
                                            <div class="form-grup">
                                                @foreach ($tematicas as $tematica)
                                                    <div class="form-check">
                                                        <input type="checkbox" name=tematicas[] class="form-check-input"
                                                            id="check{{ $tematica->tema_codigo }}t"
                                                            value="{{ $tematica->tema_codigo }}"
                                                            @if (in_array($tematica->tema_codigo, $tematicasSec)) checked @endif>
                                                        <label for="check{{ $tematica->tema_codigo }}t"
                                                            class="form-check-label">
                                                            <h6 class="font-weight-light">{{ $tematica->tema_nombre }}
                                                            </h6>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-12 col-log-12">
                                        <div class="text-right">
                                            <strong>
                                                <a href="{{ route('admin.editar.paso1', $iniciativa->inic_codigo) }}"
                                                    type="button" class="btn mr-1 waves-effect"
                                                    style="background-color:#042344; color:white"><i
                                                        class="fas fa-chevron-left"></i>
                                                    Paso anterior</a>
                                            </strong>
                                            <button type="submit" class="btn btn-primary mr-1 waves-effect"><i
                                                    class="fas fa-save"></i> Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form> --}}

                        </div>
                    </div>
                </div>

            </div>
    </section>

    <div class="modal fade" id="modalCrearSocio" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Nuevo Socio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.iniciativas.crear.socio') }} " method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Nombre del socio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""
                                    autocomplete="off">
                                @if ($errors->has('nombre'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <label>Nombre de contraparte</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="nombrec" name="nombrec" placeholder=""
                                    autocomplete="off">
                                @if ($errors->has('nombrec'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('nombrec') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <label>Teléfono contraparte</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    placeholder="" autocomplete="off">
                                @if ($errors->has('telefono'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <label>Email contraparte</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="email" class="form-control" id="emailc" name="emailc" placeholder=""
                                    autocomplete="off">
                                @if ($errors->has('emailc'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('emailc') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <label>Subgrupo</label>
                            <div class="input-group">
                                <select class="form-control select2" style="width: 100%" id="subgrupo" name="subgrupo"
                                    style="width: 100%">
                                    <option value="" selected disabled>Seleccione...</option>
                                    @foreach ($subgrupos as $subgrupo)
                                        <option value="{{ $subgrupo->sugr_codigo }}">{{ $subgrupo->sugr_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('subgrupo'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('subgrupo') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <label>Sedes Asociadas</label>
                            <div class="input-group">
                                <select class="form-control select2" style="width: 100%" id="sedesT" name="sedesT[]"
                                    style="width: 100%" multiple>
                                    <option value="" disabled>Seleccione...</option>
                                    @foreach ($sedesT as $sede)
                                        <option value="{{ $sede->sede_codigo }}">{{ $sede->sede_nombre }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sedesT'))
                                    <div class="alert alert-warning alert-dismissible show fade mt-2 text-center"
                                        style="width:100%">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ $errors->first('sedesT') }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary waves-effect"><i class="fas fa-save"></i>
                                Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#idIniciativa').hide();
            escuelasBySedesPaso2();
            listarInterno();
            modificar();
            sociosBySubgrupos();
            listarExterno();
        });

        function getURLParams(url) {
            let params = {};
            new URLSearchParams(url.replace(/^.*?\?/, '?')).forEach(function(value, key) {
                params[key] = value
            });
            return params;
        }



        function escuelasBySedesPaso2() {
            $('#sedes').on('change', function() {
                var sedesId = $(this).val();
                if (sedesId) {
                    $.ajax({
                        url: window.location.origin + '/admin/iniciativas/obtener-escuelas/paso2',
                        type: 'POST',
                        dataType: 'json',

                        data: {
                            _token: '{{ csrf_token() }}',
                            sedes: sedesId,
                            inic_codigo: $('#idIniciativa').text()
                        },
                        success: function(data) {
                            $('#escuelas').empty();
                            $.each(data, function(key, value) {
                                $('#escuelas').append(
                                    `<option value="${value.escu_codigo}">${value.escu_nombre}</option>`
                                );
                            });
                        }
                    });
                } else {
                    $('#escuelas').empty();
                }
            })
        }

        function sociosBySubgrupos() {
            $('#subgrupo').on('change', function() {
                var subgrupoId = $(this).val();
                if (subgrupoId) {
                    $.ajax({
                        url: window.location.origin + '/admin/iniciativas/obtener-socio/paso2',
                        type: 'POST',
                        dataType: 'json',

                        data: {
                            _token: '{{ csrf_token() }}',
                            sugr_codigo: subgrupoId,
                            // inic_codigo: $('#idIniciativa').text()
                        },
                        success: function(data) {
                            $('#socio').empty();
                            $.each(data, function(key, value) {
                                $('#socio').append(
                                    `<option value="${value.soco_codigo}">${value.soco_nombre_socio}</option>`
                                );
                            });
                        }
                    });
                } else {
                    $('#socio').empty();
                }
            })
        }

        function modificar() {
            console.log($("#idIniciativa").text())
            console.log( $("#escuelas").val())
            console.log($("#carreras").val())
            console.log($("#ndocentes").val())
            console.log($("#nestudiantes").val())
       
            $.ajax({
                type: 'POST',
                url: `${window.location.origin}/admin/actualizar/participantes-internos`,
                data: {
                    _token: '{{ csrf_token() }}',
                    inic_codigo: $("#idIniciativa").text(),
                    escu_codigo: $("#escuelas").val(),
                    care_codigo: $("#carreras").val(),
                    pain_docentes: $("#ndocentes").val(),
                    pain_estudiantes: $("#nestudiantes").val(),
                    
                    // pain_total: $("#ntotal").val()
                },
                success: function(resConsultar) {
                    respuesta = JSON.parse(resConsultar);
                    console.log(respuesta)
                    $('#body-tabla-internos').empty();

                    datosInternos = respuesta.resultado;
                    datosInternos.forEach(registro => {
                        if (registro.pain_docentes == null) {
                            registro.pain_docentes = 0
                        }

                        if (registro.pain_estudiantes == null) {
                            registro.pain_estudiantes = 0
                        }

                        // if (registro.pain_total == null) {
                        //     registro.pain_total = 0
                        // }

                        // <td>${registro.pain_total}</td>
                        fila = `<tr>
                                <td>${registro.escu_nombre}</td>
                                <td>${registro.care_nombre}</td>
                                <td>${registro.pain_estudiantes}</td>
                                <td>${registro.pain_docentes}</td>
                                </tr>`
                        $('#body-tabla-internos').append(fila)
                        listarInterno()
                    })
                }
               

            })
        }

        function AgregarParticipantesExternos() {
            $.ajax({
                type: 'POST',
                url: `${window.location.origin}/admin/iniciativas/agregar/participantes-externos`,
                data: {
                    _token: '{{ csrf_token() }}',
                    inic_codigo: $("#idIniciativa").text(),
                    sugr_codigo: $("#subgrupo").val(),
                    soco_codigo: $("#socio").val(),
                    inpr_total: $("#npersonas").val(),

                },
                success: function(resConsultar) {
                    respuesta = JSON.parse(resConsultar);
                    $('#body-tabla-externos').empty();

                    datosInternos = respuesta.resultado;
                    listarExterno();
                }

            })
        }

        function listarExterno() {

            $.ajax({
                type: 'GET',
                url: `${window.location.origin}/admin/crear/iniciativa/listar-externos`,
                data: {
                    _token: '{{ csrf_token() }}',
                    inic_codigo: $('#idIniciativa').text()
                },

                success: function(resConsultar) {
                    respuesta = JSON.parse(resConsultar);
                    $('#body-tabla-externos').empty();

                    datosInternos = respuesta.resultado;
                    datosInternos.forEach(registro => {

                        fila = `<tr>
                                <td>${registro.sugr_nombre}</td>
                                <td>${registro.soco_nombre_socio}</td>
                                <td>${registro.inpr_total}</td>
                                <td>
                                    <button type='button' onclick=eliminarExterno(${registro.inic_codigo},${registro.sugr_codigo},${registro.soco_codigo}) class= 'btn btn-icon btn-danger' ><i class="fas fa-trash"></i></button>
                                </td>
                                </tr>`
                        $('#body-tabla-externos').append(fila)
                    })
                }
            })
        }

        function eliminarExterno(inic_codigo, sugr_codigo, soco_codigo) {
            $.ajax({
                type: 'POST',
                url: `${window.location.origin}/admin/inicitiativa/eliminar-externo`,
                data: {
                    _token: '{{ csrf_token() }}',
                    inic_codigo: inic_codigo,
                    sugr_codigo: sugr_codigo,
                    soco_codigo: soco_codigo
                },
                success: function(resEliminar) {
                    respuesta = JSON.parse(resEliminar);
                    listarExterno();
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function listarInterno() {
            console.log($('#idIniciativa').text())

            $.ajax({
                type: 'GET',
                url: `${window.location.origin}/admin/crear/iniciativa/listar-internos`,
                data: {
                    _token: '{{ csrf_token() }}',
                    inic_codigo: $('#idIniciativa').text()
                },

                success: function(resConsultar) {
                    respuesta = JSON.parse(resConsultar);
                    console.log(respuesta);
                    $('#body-tabla-internos').empty();

                    datosInternos = respuesta.resultado;
                    datosInternos.forEach(registro => {
                        if (registro.pain_docentes == null) {
                            registro.pain_docentes = 0
                        }

                        if (registro.pain_estudiantes == null) {
                            registro.pain_estudiantes = 0
                        }
                        // if (registro.pain_total == null) {
                        //     registro.pain_total = 0
                        // }
                        // <td>${registro.pain_total}</td>
                        fila = `<tr>
                                    <td>${registro.escu_nombre}</td>
                                    <td>${registro.care_nombre}</td>
                                    <td>${registro.pain_estudiantes}</td>
                                    <td>${registro.pain_docentes}</td>
                                </tr>`
                        $('#body-tabla-internos').append(fila)
                    })
                }
            })
        }
    </script>
@endsection
