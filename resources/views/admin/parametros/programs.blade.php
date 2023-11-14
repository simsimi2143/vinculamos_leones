@extends('admin.panel')

@section('contenido')
    <section class="section" style="font-size: 115%;">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if (
                                $errors->has('nombre') ||
                                    $errors->has('tipo') ||
                                    $errors->has('director') ||
                                    $errors->has('actividades') ||
                                    $errors->has('meta_socios') ||
                                    $errors->has('meta_iniciativas'))
                                <div class="alert alert-warning alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                        @if ($errors->has('nombre'))
                                            <strong>{{ $errors->first('nombre') }}</strong><br>
                                        @endif
                                        @if ($errors->has('tipo'))
                                            <strong>{{ $errors->first('tipo') }}</strong><br>
                                        @endif
                                        @if ($errors->has('director'))
                                            <strong>{{ $errors->first('director') }}</strong><br>
                                        @endif
                                        @if ($errors->has('actividades'))
                                            <strong>{{ $errors->first('actividades') }}</strong><br>
                                        @endif
                                        @if ($errors->has('meta_socios'))
                                            <strong>{{ $errors->first('meta_socios') }}</strong><br>
                                        @endif
                                        @if ($errors->has('meta_iniciativas'))
                                            <strong>{{ $errors->first('meta_iniciativas') }}</strong><br>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('errorPrograma'))
                                <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('errorPrograma') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('exitoPrograma'))
                                <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                    <div class="alert-body">
                                        <strong>{{ Session::get('exitoPrograma') }}</strong>
                                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de Programas</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCrearPrograma"><i class="fas fa-plus"></i> Nuevo Programa</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1" style="font-size: 110%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Año</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        ?>

                                        @foreach ($programas as $prog)
                                            <?php
                                            $contador = $contador + 1;
                                            ?>
                                            <tr>
                                                <td>{{ $contador }}</td>
                                                <td>{{ $prog->prog_nombre }}</td>
                                                {{-- <td>{{ $prog->prog_descripcion }}</td> --}}
                                                <td>{{ $prog->prog_ano }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-icon btn-warning"
                                                        onclick="editarProg('{{ $prog->prog_codigo }}')"
                                                        data-toggle="tooltip" data-placement="top" title="Editar"><i
                                                            class="fas fa-edit"></i></a>

                                                    <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                        onclick="eliminarProg({{ $prog->prog_codigo }})"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Eliminar programa"><i class="fas fa-trash"></i></a>
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

    <div class="modal fade" id="modalCrearPrograma" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Nuevo Programa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.crear.programas') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre del programa</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen-nib"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" placeholder="" autocomplete="off"
                                    value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 col-md-7 col-lg-7">
                                <div class="form-group">
                                    <label>Ámbito de acción del programa</label>
                                    <div class="input-group">
                                        <select class="form-control @error('ambito') is-invalid @enderror" id="ambito"
                                            name="ambito">
                                            <option value="" selected disable d>Seleccione...</option>
                                            @forelse ($tipos as $tip)
                                                <option style="font-size: 120%;" value="{{ $tip->amac_codigo }}">
                                                    {{ $tip->amac_nombre }}</option>
                                            @empty
                                                <option value="-1">No existen registros</option>
                                            @endforelse
                                        </select>
                                        @error('ambito')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label>Año de inicio del Programa</label>
                                    <div class="input-group">
                                        <select class="form-control @error('ano') is-invalid @enderror" id="ano"
                                            name="ano">
                                            <option value="" selected disabled>Seleccione...</option>
                                            @php
                                                $currentYear = date('Y');
                                                $yearsToShow = 10; // Puedes ajustar este valor según cuántos años quieres mostrar
                                            @endphp
                                            @for ($i = -1; $i < $yearsToShow; $i++)
                                                @php $year = $currentYear + $i; @endphp
                                                <option style="font-size: 120%;" value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>

                                        @error('ano')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Frecuencia</label>
                            <div class="input-group">
                                <select class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                    id="descripcion">
                                    <option value="Temporal" style="font-size: 120%;">Temporal</option>
                                    <option value="Permanente" style="font-size: 120%;">Permanente</option>
                                </select>
                                {{-- <select class="form-control @error('tipo') is-invalid @enderror" id="tipo"
                                            name="tipo">
                                            <option value="" selected disabled>Seleccione...</option>
                                            @forelse ($tiposIniciativas as $tip)
                                                <option value="{{ $tip->tmec_codigo }}"
                                                    {{ old('tipo') == $tip->tmec_codigo ? 'selected' : '' }}>
                                                    {{ $tip->tmec_nombre }}</option>
                                            @empty
                                                <option value="-1">No existen registros</option>
                                            @endforelse
                                        </select>
                                        @error('tipo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contribución</label>
                            <div class="input-group">
                                <select class="form-control select2 @error('contribucion') is-invalid @enderror"
                                    id="contribucion" name="contribucion[]" multiple="" style="width: 100%">
                                    @forelse ($CONTRIS as $cont)
                                        <option value="{{ $cont->amb_codigo }}"
                                            {{ old('contribucion') == $cont->amb_codigo ? 'selected' : '' }}>
                                            {{ $cont->amb_nombre }} <label
                                                for="">({{ $cont->amb_descripcion }})</label>
                                        </option>
                                    @empty
                                        <option value="-1">No existen registros</option>
                                    @endforelse
                                </select>
                                @error('contribucion')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <a class="btn btn-primary btn-socios" data-toggle="collapse" href="#div_socios"
                                        role="button" aria-expanded="false" aria-controls="div_socios"
                                        onclick="limpiarInputSocio()">
                                        Aplicar
                                    </a>
                                    <label>Meta de Socios/as</label>
                                    <div class="input-group collapse" id="div_socios" style="margin-top: 10px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_socios" name="meta_socios"
                                            value="{{ old('meta_socios') }}" autocomplete="off"
                                            placeholder="N° de socios/as">
                                    </div>
                                    @error('meta_socios')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <a class="btn btn-primary" data-toggle="collapse" href="#div_iniciativas"
                                        role="button" aria-expanded="false" aria-controls="div_iniciativas"
                                        onclick="limpiarInputIni()">
                                        Aplicar
                                    </a>
                                    <label>Meta de Iniciativas</label>
                                    <div class="input-group collapse" id="div_iniciativas" style="margin-top: 10px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_iniciativas"
                                            name="meta_iniciativas" value="{{ old('meta_iniciativas') }}"
                                            autocomplete="off" placeholder="N° de iniciativas">
                                    </div>
                                    @error('meta_iniciativas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <a class="btn btn-primary" data-toggle="collapse" href="#div_carreras"
                                        role="button" aria-expanded="false" aria-controls="div_carreras"
                                        onclick="limpiarInputCarre()">
                                        Aplicar
                                    </a>
                                    <label>Meta de Carreras</label>
                                    <div class="input-group collapse" id="div_carreras" style="margin-top: 10px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_n_carreras"
                                            name="meta_n_carreras" value="{{ old('meta_n_carreras') }}"
                                            autocomplete="off" placeholder="N° de carreras">
                                    </div>
                                    @error('meta_n_carreras')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <a class="btn btn-primary" data-toggle="collapse" href="#div_asignaturas"
                                        role="button" aria-expanded="false" aria-controls="div_asignaturas"
                                        onclick="limpiarInputAsig()">
                                        Aplicar
                                    </a>
                                    <label>Meta de Asignaturas</label>
                                    <div class="input-group collapse" id="div_asignaturas" style="margin-top: 10px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_n_asignaturas"
                                            name="meta_n_asignaturas" value="{{ old('meta_n_asignaturas') }}"
                                            autocomplete="off" placeholder="N° de asignaturas">
                                    </div>
                                    @error('meta_n_asignaturas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <a class="btn btn-primary" data-toggle="collapse" href="#div_estudiantes"
                                        role="button" aria-expanded="false" aria-controls="div_estudiantes"
                                        onclick="limpiarInputEstu()">
                                        Aplicar
                                    </a>
                                    <label>Meta de Estudiantes</label>
                                    <div class="input-group collapse" id="div_estudiantes" style="margin-top: 10px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_estudiantes"
                                            name="meta_estudiantes" value="{{ old('meta_estudiantes') }}"
                                            autocomplete="off" placeholder="N° de estudiantes">
                                    </div>
                                    @error('meta_estudiantes')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <a class="btn btn-primary" data-toggle="collapse" href="#div_docentes"
                                        role="button" aria-expanded="false" aria-controls="div_docentes"
                                        onclick="limpiarInputDoce()">
                                        Aplicar
                                    </a>
                                    <label>Meta de Docentes</label>
                                    <div class="input-group collapse" id="div_docentes" style="margin-top: 10px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_docentes"
                                            name="meta_docentes" value="{{ old('meta_docentes') }}" autocomplete="off"
                                            placeholder="N° de docentes">
                                    </div>
                                    @error('meta_docentes')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 col-md-8 col-lg-8">
                                <div class="form-group">
                                    <a class="btn btn-primary" data-toggle="collapse" href="#div_beneficiarios"
                                        role="button" aria-expanded="false" aria-controls="div_beneficiarios"
                                        onclick="limpiarInputBene()">
                                        Aplicar
                                    </a>
                                    <label>Meta de Beneficiarios/as</label>
                                    <div class="input-group collapse" id="div_beneficiarios" style="margin-top: 10px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_beneficiarios"
                                            name="meta_beneficiarios" value="{{ old('meta_beneficiarios') }}"
                                            autocomplete="off" placeholder="N° de beneficiarios/as">
                                    </div>
                                    @error('meta_beneficiarios')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="text-center">
                            <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @foreach ($programas as $prog)
        <div class="modal fade" id="modalEditarprogramas-{{ $prog->prog_codigo }}" tabindex="-1" role="dialog"
            aria-labelledby="modalEditarprogramas" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarprogramas">Editar Programa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualizar.programas', $prog->prog_codigo) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label>Nombre del Programa</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-pen-nib"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                        id="nombre" name="nombre" value="{{ $prog->prog_nombre }}"
                                        autocomplete="off">
                                    @error('nombre')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7 col-md-7 col-lg-7">
                                    <div class="form-group">
                                        <label>Ámbito de acción del programa</label>
                                        <div class="input-group">
                                            <select class="form-control @error('ambito') is-invalid @enderror"
                                                id="ambito" name="ambito">
                                                @foreach ($tipos as $tipo)
                                                    <option style="font-size: 120%;" value="{{ $tipo->amac_codigo }}"
                                                        {{ $tipo->amac_codigo == $prog->amac_codigo ? 'selected' : '' }}>
                                                        {{ $tipo->amac_nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('ambito')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="col-5 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label>Año de inicio del Programa</label>
                                        <div class="input-group">
                                            <select class="form-control @error('ano') is-invalid @enderror" id="ano"
                                                name="ano">
                                                <option value="" selected disabled>Seleccione...</option>
                                                @php
                                                    $currentYear = date('Y');
                                                    $yearsToShow = 10;
                                                @endphp
                                                @for ($i = -1; $i < $yearsToShow; $i++)
                                                    @php $year = $currentYear + $i; @endphp
                                                    <option style="font-size: 120%;" value="{{ $year }}"
                                                        {{ $year == $prog->prog_ano ? 'selected' : '' }}>
                                                        {{ $year }}
                                                    </option>
                                                @endfor
                                            </select>

                                            @error('ano')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Frecuencia</label>
                                <select class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                    id="descripcion">
                                    <option style="font-size: 120%;" value="Temporal"
                                        {{ 'Temporal' == $prog->prog_descripcion ? 'selected' : '' }}>Temporal
                                    </option>
                                    <option style="font-size: 120%;" value="Permanente"
                                        {{ 'Permanente' == $prog->prog_descripcion ? 'selected' : '' }}>Permanente
                                    </option>
                                </select>
                                {{-- <div class="input-group">
                                            <select class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo">
                                                @foreach ($tiposIniciativas as $ti)
                                                    <option value="{{ $ti->tmec_codigo }}" {{ $ti->tmec_codigo == $prog->tmec_codigo ? 'selected' : '' }}>
                                                        {{ $ti->tmec_nombre }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('tipo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}
                            </div>
                            <div class="form-group">
                                <label>Contribución</label>
                                <div class="input-group">
                                    <select class="form-control select2 @error('contribuciont') is-invalid @enderror"
                                        id="contribuciont" name="contribuciont[]" multiple="" style="width: 100%">
                                        @forelse ($CONTRIS as $cont){{-- PROCONS --}}
                                            <option value="{{ $cont->amb_codigo }}"
                                            {{ $PROCONS->where('prog_codigo', $prog->prog_codigo)->where('amb_codigo', $cont->amb_codigo)->count() > 0 ? 'selected' : '' }}>
                                                {{ $cont->amb_nombre }}
                                            </option>
                                        @empty
                                            <option value="-1">No existen registros</option>
                                        @endforelse
                                    </select>
                                    @error('contribuciont')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta N° Socios</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_socios"
                                                name="meta_socios" value="{{ $prog->prog_meta_socios }}" placeholder="NO APLICA"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta N° Iniciativas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_iniciativas"
                                                name="meta_iniciativas" value="{{ $prog->prog_meta_iniciativas }}" placeholder="NO APLICA"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group" style="align-items: center;">
                                <div class="form-group">
                                    <label>Meta asignaturas</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="meta_asignaturas"
                                            name="meta_asignaturas" value="{{ $prog->prog_meta_asignaturas }}"
                                            autocomplete="off">
                                    </div>
                                    @error('meta_asignaturas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div> --}}

                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta de Carreras</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_n_carreras"
                                                name="meta_n_carreras" value="{{ $prog->prog_meta_n_carreras }}" placeholder="NO APLICA"
                                                autocomplete="off">
                                        </div>
                                        @error('meta_n_carreras')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta de Asignaturas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_n_asignaturas"
                                                name="meta_n_asignaturas" value="{{ $prog->prog_meta_n_asignaturas }}" placeholder="NO APLICA"
                                                autocomplete="off">
                                        </div>
                                        @error('meta_n_asignaturas')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta de Estudiantes</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_estudiantes"
                                                name="meta_estudiantes" value="{{ $prog->prog_meta_estudiantes }}" placeholder="NO APLICA"
                                                autocomplete="off">
                                        </div>
                                        @error('meta_estudiantes')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta de Docentes</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_docentes"
                                                name="meta_docentes" value="{{ $prog->prog_meta_docentes }}" placeholder="NO APLICA"
                                                autocomplete="off">
                                        </div>
                                        @error('meta_docentes')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta de Beneficiarios/as</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_beneficiarios"
                                                name="meta_beneficiarios" value="{{ $prog->prog_meta_beneficiarios }}" placeholder="NO APLICA"
                                                autocomplete="off">
                                        </div>
                                        @error('meta_beneficiarios')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary waves-effect">Actualizar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="modal fade" id="modalEliminaProgram" tabindex="-1" role="dialog" aria-labelledby="modalEliminar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.eliminar.programas') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminar">Eliminar Programa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-ban text-danger" style="font-size: 50px; color"></i>
                        <h6 class="mt-2">El programa dejará de existir dentro del sistema. <br> ¿Desea continuar de todos
                            modos?</h6>
                        <input type="hidden" id="prog_codigo" name="prog_codigo" value="">
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
        function eliminarProg(prog_codigo) {
            $('#prog_codigo').val(prog_codigo);
            $('#modalEliminaProgram').modal('show');
        }

        function editarProg(prog_codigo) {
            $('#modalEditarprogramas-' + prog_codigo).modal('show');
        }

        function limpiarInputSocio() {
            const inputMetaSocios = document.querySelector('#div_socios input');
            inputMetaSocios.value = '';
        }

        function limpiarInputIni() {
            const inputMetaIniciativas = document.querySelector('#div_iniciativas input');
            inputMetaIniciativas.value = '';
        }

        function limpiarInputCarre() {
            const inputMetaCarreras = document.querySelector('#div_carreras input');
            inputMetaCarreras.value = '';
        }

        function limpiarInputAsig() {
            const inputMetaAsignatura = document.querySelector('#div_asignaturas input');
            inputMetaAsignatura.value = '';
        }

        function limpiarInputEstu() {
            const inputMetaEstudiantes = document.querySelector('#div_estudiantes input');
            inputMetaEstudiantes.value = '';
        }

        function limpiarInputDoce() {
            const inputMetaDocentes = document.querySelector('#div_docentes input');
            inputMetaDocentes.value = '';
        }

        function limpiarInputBene() {
            const inputMetaBeneficiarios = document.querySelector('#div_beneficiarios input');
            inputMetaBeneficiarios.value = '';
        }
    </script>
    {{--
    <link rel="stylesheet" href="{{ asset('/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/page/datatables.js') }}"></script> --}}
@endsection
