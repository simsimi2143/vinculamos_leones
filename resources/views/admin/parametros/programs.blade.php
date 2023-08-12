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
                                            {{-- <th>Descripción</th> --}}
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
                                                <option value="{{ $tip->amac_codigo }}">
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
                            {{-- <div class="form-group">
                            <label>Mecanismo del programa</label>
                            <div class="input-group">

                                <select class="form-control @error('mecanismo') is-invalid @enderror" id="mecanismo"
                                    name="mecanismo">
                                    <option value="" selected disable d>Seleccione...</option>
                                    @forelse ($mecanismos as $mecani)
                                        <option value="{{ $mecani->meca_codigo }}">
                                            {{ $mecani->meca_nombre }}</option>
                                    @empty
                                        <option value="-1">No existen registros</option>
                                    @endforelse
                                </select>
                                @error('mecanismo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                            <div class="col-5 col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label>Año de inicio del Programa</label>
                                    <div class="input-group">
                                        <select class="form-control @error('ano') is-invalid @enderror" id="ano"
                                            name="ano">
                                            <option value="" selected disable d>Seleccione...</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
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
                        <div class="form-group" style="align-items: center;" id="actiAsociadasContainer">
                            <label>Tipo de Actividades Asociadas</label>
                            <div class="input-group">
                                <select class="form-control select2" style="width: 100%" id="actividades"
                                    name="actividades[]" multiple @error('actividades') is-invalid @enderror>
                                    <option value="" disabled>Seleccione...</option>
                                    @foreach ($ACTIVIDADES as $acti)
                                        <option value="{{ $acti->tiac_codigo }}">
                                            {{ $acti->tiac_nombre }}</option>
                                    @endforeach
                                </select>
                                @error('actividades')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group" style="width: 100%">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" id="nacional" name="nacional"/>
                                    <div class="state p-success">
                                        <label><strong>Asociar a todas las actis (Socio nacional)</strong></label>
                                    </div>
                                </div>
                            </div>

                        {{-- <div class="form-group">
                            <label>Descripción del programa</label>
                            <div class="input-group">
                                <textarea rows="6" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" autocomplete="off" style="width:100%">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Director/a del programa</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control @error('director') is-invalid @enderror" id="director" name="director"
                                    placeholder="" autocomplete="off" value="{{ old('director') }}">
                                @error('director')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Meta Socios</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_socios" name="meta_socios"
                                            value="{{ old('meta_socios') }}" autocomplete="off">
                                    </div>
                                    @error('meta_socios')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Meta Iniciativas</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_iniciativas"
                                            name="meta_iniciativas" value="{{ old('meta_iniciativas') }}"
                                            autocomplete="off">
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
                                    <label>Meta Estudiantes</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_estudiantes"
                                            name="meta_estudiantes" value="{{ old('meta_estudiantes') }}"
                                            autocomplete="off">
                                    </div>
                                    @error('meta_estudiantes')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Meta Docentes</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_docentes"
                                            name="meta_docentes" value="{{ old('meta_docentes') }}" autocomplete="off">
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
                                    <label>Meta Beneficiarios</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" id="meta_beneficiarios"
                                            name="meta_beneficiarios" value="{{ old('meta_beneficiarios') }}"
                                            autocomplete="off">
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
                                                    <option value="{{ $tipo->amac_codigo }}"
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
                                                <option value="" selected disable d>Seleccione...</option>
                                                <option value="2022" {{ '2022' == $prog->prog_ano ? 'selected' : '' }}>
                                                    2022
                                                </option>
                                                <option value="2023" {{ '2023' == $prog->prog_ano ? 'selected' : '' }}>
                                                    2023
                                                </option>
                                                <option value="2024" {{ '2024' == $prog->prog_ano ? 'selected' : '' }}>
                                                    2024
                                                </option>
                                                <option value="2025" {{ '2025' == $prog->prog_ano ? 'selected' : '' }}>
                                                    2025
                                                </option>
                                                <option value="2026" {{ '2026' == $prog->prog_ano ? 'selected' : '' }}>
                                                    2026
                                                </option>
                                                <option value="2027" {{ '2027' == $prog->prog_ano ? 'selected' : '' }}>
                                                    2027
                                                </option>
                                                <option value="2028" {{ '2028' == $prog->prog_ano ? 'selected' : '' }}>
                                                    2028
                                                </option>
                                                <option value="2029" {{ '2029' == $prog->prog_ano ? 'selected' : '' }}>
                                                    2029
                                                </option>
                                                <option value="2030" {{ '2030' == $prog->prog_ano ? 'selected' : '' }}>
                                                    2030
                                                </option>
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
                            {{-- <div class="form-group">
                                <label>Mecanismo del programa</label>
                                <div class="input-group">

                                    <select class="form-control @error('mecanismo') is-invalid @enderror" id="mecanismo"
                                        name="mecanismo">
                                        <option value="" selected disable d>Seleccione...</option>
                                        @forelse ($mecanismos as $mecani)
                                            <option value="{{ $mecani->meca_codigo }}"
                                                {{ $mecani->meca_codigo == $prog->meca_codigo ? 'selected' : '' }}>
                                                {{ $mecani->meca_nombre }}</option>
                                        @empty
                                            <option value="-1">No existen registros</option>
                                        @endforelse
                                    </select>
                                    @error('mecanismo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div> --}}

                            {{-- <div class="form-group">
                            <label>Descripción</label>
                            <div class="input-group">
                                <textarea rows="6" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" autocomplete="off"
                                    style="width:100%">{{ $prog->prog_descripcion }}</textarea>
                                @error('descripcion')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                            {{-- <div class="form-group">
                            <label>Director/a</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control @error('director') is-invalid @enderror" id="director" name="director"
                                    value="{{ $prog->prog_director }}" autocomplete="off">
                                @error('director')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                            <div class="form-group" style="align-items: center;" id="actiAsociadasContainer">
                                <label>Tipo de Actividades Asociadas</label>
                                <div class="input-group">
                                    <select class="form-control select2" style="width: 100%" id="actividades"
                                        name="actividades[]" multiple>
                                        <option value="" disabled>Seleccione...</option>
                                        @foreach ($ACTIVIDADES as $acti)
                                            @php
                                                $selected = false;
                                            @endphp

                                            @foreach ($PROGRA_ACTI as $proacti)
                                                @if ($proacti->tiac_codigo === $acti->tiac_codigo && $proacti->prog_codigo === $prog->prog_codigo)
                                                    @php
                                                        $selected = true;
                                                        break; // Salir del bucle interno si ya se encontró la actividad seleccionada
                                                    @endphp
                                                @endif
                                            @endforeach

                                            <option value="{{ $acti->tiac_codigo }}" {{ $selected ? 'selected' : '' }}>
                                                {{ $acti->tiac_nombre }}
                                            </option>
                                        @endforeach
                                    </select>


                                    @if ($errors->has('actividades'))
                                        <div class="alert alert-warning alert-dismissible show fade mt-2">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                <strong>{{ $errors->first('actividades') }}</strong>
                                            </div>
                                        </div>
                                    @endif


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta Socios</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_socios"
                                                name="meta_socios" value="{{ $prog->prog_meta_socios }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta Iniciativas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_iniciativas"
                                                name="meta_iniciativas" value="{{ $prog->prog_meta_iniciativas }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta Estudiantes</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_estudiantes"
                                                name="meta_estudiantes" value="{{ $prog->prog_meta_estudiantes }}"
                                                autocomplete="off">
                                        </div>
                                        @error('meta_estudiantes')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Meta Docentes</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_docentes"
                                                name="meta_docentes" value="{{ $prog->prog_meta_docentes }}"
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
                                        <label>Meta Beneficiarios</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="meta_beneficiarios"
                                                name="meta_beneficiarios" value="{{ $prog->prog_meta_beneficiarios }}"
                                                autocomplete="off">
                                        </div>
                                        @error('meta_beneficiarios')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary waves-effect">Actualizar</button>
                                </div>
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
