<?php
                                    $contador = 0;
                                    ?>

                                    @foreach ($evaluaciones as $eval)
                                        <?php
                                        $contador = $contador + 1;
                                        ?>
                                        <tr>
                                            <td>{{ $contador }}</td>
                                            <td>{{ $eval->eval_nickname_mod }}</td>
                                            @if ($eval->eval_evaluador == 2)
                                                <td>Evaluación Interna</td>
                                            @else
                                                <td>Evaluación Externa</td>
                                            @endif
                                            <td>{{ $eval->eval_puntaje }}</td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-icon btn-danger"
                                                    onclick="eliminarEval({{ $eval->eval_codigo }})"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Eliminar mecanismo"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
