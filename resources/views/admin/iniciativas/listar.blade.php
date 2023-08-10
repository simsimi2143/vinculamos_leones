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
                            {{-- {{$iniciativas}} --}}

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>

                                            <th>Nombre</th>
                                            <th>Mecanismo</th>
                                            <th>Escuelas</th>
                                            <th>Carreras</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($iniciativas as $iniciativa)
                                            <tr>
                                                <td>{{ $iniciativa->inic_nombre }}</td>
                                                <td>{{ $iniciativa->meca_nombre }}</td>
                                                <td>{{ $iniciativa->escuelas }}</td>
                                                <td>{{ $iniciativa->carreras }}</td>
                                                <td>
                                                    @if ($iniciativa->inic_estado == 1)
                                                        <div class="badge badge-light badge-shadow">
                                                            <i class="fas fa-history"></i> En revisión
                                                        </div>
                                                    @elseif ($iniciativa->inic_estado == 2)
                                                        <div class="badge badge-info badge-shadow">
                                                            <i class="fas fa-play-circle"></i> En ejecución
                                                        </div>
                                                    @elseif ($iniciativa->inic_estado == 3)
                                                        <div class="badge badge-success badge-shadow">
                                                            <i class="fas fa-lock"></i> Aceptada
                                                        </div>
                                                    @elseif ($iniciativa->inic_estado == 4)
                                                        <div class="badge badge-info badge-shadow">
                                                            <i class="fas fa-info-circle"></i> Falta info
                                                        </div>
                                                    @elseif ($iniciativa->inic_estado == 5)
                                                        <div class="badge badge-primary badge-shadow">
                                                            <i class="fas fa-pause-circle"></i> Cerrada
                                                        </div>
                                                    @elseif ($iniciativa->inic_estado == 6)
                                                        <div class="badge badge-success badge-shadow">
                                                            <i class="fas fa-check-double"></i> Finalizada
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-primary dropdown-toggle"
                                                            id="dropdownMenuButton2"
                                                            data-toggle="dropdown">Opciones</button>
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

                                                    <a href="{{route('admin.iniciativas.detalles',$iniciativa->inic_codigo)}}" class="btn btn-icon btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Ver detalles"><i
                                                            class="fas fa-eye"></i></a>

                                                    {{-- <a href="" class="btn btn-icon btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Calcular INVI"><i
                                                            class="fas fa-tachometer-alt"></i></a> --}}

                                                    <a href="{{route('admin.evidencias.listar',$iniciativa->inic_codigo)}}" class="btn btn-icon btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="Adjuntar evidencia"><i
                                                            class="fas fa-paperclip"></i></a>

                                                    <a href="" class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Ingresar resultado"><i
                                                            class="fas fa-flag"></i></a>

                                                    <a href="" class="btn btn-icon btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="Evaluar iniciativa"><i
                                                            class="fas fa-file-signature"></i></a>


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
        function eliminarIniciativa(inic_codigo) {
            $('#inic_codigo').val(inic_codigo);
            $('#modalEliminaIniciativa').modal('show');
        }
    </script>

@endsection
