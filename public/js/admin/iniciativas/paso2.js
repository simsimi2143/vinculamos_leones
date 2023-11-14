$(document).ready(function() {
    listarSubentornos();
    listarResultados();
    listarUbicacion();
})

function listarComunas() {
    let inic_codigo = $('#codigo').val();
    let regi_codigo = $('#region').val();
    let aComunas, alertError, respuesta;
    $('#div-alert-territorio').html('');

    if (regi_codigo != '') {
        // petición para listar las comunas que pertenecen a la región seleccionada
        $.ajax({
            type: 'GET',
            url: window.location.origin+'/admin/crear-iniciativa/listar-comunas',
            data: {
                iniciativa: inic_codigo,
                region: regi_codigo            
            },
            success: function(resListar) {
                respuesta = JSON.parse(resListar);
                $('#comuna').find('option').not(':first').remove();
                $('#comuna').prop('selectedIndex', 0);
                if (!respuesta.estado) {
                    if (respuesta.resultado != '') {
                        alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                        $('#div-alert-territorio').html(alertError);
                    }
                    $('#comuna').append(new Option('No existen registros', '-1'));
                    return;
                }                
                aComunas = respuesta.resultado;
                aComunas.forEach(comuna => {
                    $('#comuna').append(new Option(comuna.comu_nombre, comuna.comu_codigo));
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
}

function guardarUbicacion() {
    let inic_codigo = $('#codigo').val();
    let regi_codigo = $('#region').val();
    let comu_codigo = $('#comuna').val();
    let alertError, alertExito, respuesta;
    $('#div-alert-territorio').html('');
    
    if (regi_codigo == '' || regi_codigo == null) {
        alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>Debe seleccionar una región.</strong></div></div>`;
        $('#div-alert-territorio').html(alertError);
        return;
    }
    
    if (comu_codigo == '' || comu_codigo == null || comu_codigo == '-1') {
        alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>Debe seleccionar una comuna.</strong></div></div>`;
        $('#div-alert-territorio').html(alertError);
        return;
    }
    
    // petición para guardar ubicación o ubicaciones asociada(s) a la iniciativa
    $.ajax({
        type: 'POST',
        url: window.location.origin+'/admin/crear-iniciativa/guardar-ubicacion',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            iniciativa: inic_codigo,
            comuna: comu_codigo
        },
        success: function(resGuardar) {
            respuesta = JSON.parse(resGuardar);
            if (!respuesta.estado) {
                alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-territorio').html(alertError);
                return;
            }
            listarUbicacion();
            $('#region').val('').change();
            $('#comuna').val('').change();
            alertExito = `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            $('#div-alert-territorio').html(alertExito);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function listarUbicacion() {
    let inic_codigo = $('#codigo').val();
    let respuesta, datosUbicaciones;
    $('#div-alert-territorio').html('');

    $.ajax({
        type: 'GET',
        url: window.location.origin+'/admin/crear-iniciativa/listar-ubicacion',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resConsultar) {
            respuesta = JSON.parse(resConsultar);
            $('#body-tabla-ubicaciones').empty();
            
            if (!respuesta.estado) {
                $('#row-tabla-ubicaciones').hide();
                return;
            }
            
            datosUbicaciones = respuesta.resultado;
            datosUbicaciones.forEach(registro => {
                fila =  '<tr>'+
                            '<td>'+registro.regi_nombre+'</td>'+
                            '<td>'+registro.comu_nombre+'</td>'+                   
                            '<td>'+
                                '<button type="button" class="btn btn-icon btn-danger" onclick="eliminarUbicacion('+registro.inic_codigo+', `'+registro.comu_codigo+'`)"><i class="fas fa-trash"></i></button>'+
                            '</td>'+
                        '</tr>';
                $('#body-tabla-ubicaciones').append(fila);
            });
            $('#row-tabla-ubicaciones').show();
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function eliminarUbicacion(inic_codigo, comu_codigo) {
    let alertError, alertExito;
    $('#div-alert-territorio').html('');
    
    // petición para eliminar un subentorno-participante asociado a la iniciativa
    $.ajax({
        type: 'POST',
        url: window.location.origin+'/admin/crear-iniciativa/eliminar-ubicacion',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            inic_codigo: inic_codigo,
            comu_codigo: comu_codigo
        },
        success: function(resEliminar) {
            respuesta = JSON.parse(resEliminar);
            if (!respuesta.estado) {
                alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-territorio').html(alertError);
                return;
            }
            alertExito = `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            listarUbicacion();
            $('#div-alert-territorio').html(alertExito);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function mostrarSubentornos() {
    let ento_codigo = $('#entorno').val();
    let aSubentornos;
    let alertError;
    $('#div-alert-subentorno').html('');

    if (ento_codigo == '-1') {
        alertError = `<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>No existen entornos registrados en el sistema.</strong></div></div>`;
        $('#div-alert-subentorno').html(alertError);
        return;
    }
    // petición para listar los subentornos que son parte de un entorno
    $.ajax({
        type: 'POST',
        url: window.location.origin+'/admin/crear-iniciativa/obtener-subentornos',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            ento_codigo: ento_codigo
        },
        success: function(res) {
            $('#subentorno').find('option').not(':first').remove();
            $('#subentorno').prop('selectedIndex', 0);
            aSubentornos = JSON.parse(res);
            if (aSubentornos.length == 0) {
                $('#subentorno').append(new Option('No existen registros', '-1'));
            } else {
                aSubentornos.forEach(subentorno => {
                    $('#subentorno').append(new Option(subentorno.sube_nombre, subentorno.sube_codigo));
                });
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function agregarSubentorno() {
    let inic_codigo = $('#codigo').val();
    let ento_codigo = $('#entorno').val();
    let sube_codigo = $('#subentorno').val();
    let part_cantidad_inicial = $('#cantidad').val();
    let alertError, alertExito;
    $('#div-alert-subentorno').html('');
    
    // petición para guardar un subentorno-participante asociado a la iniciativa
    $.ajax({
        type: 'POST',
        url: window.location.origin+'/admin/crear-iniciativa/guardar-participante',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            iniciativa: inic_codigo,
            entorno: ento_codigo,
            subentorno: sube_codigo,
            cantidad: part_cantidad_inicial
        },
        success: function(resGuardar) {
            respuesta = JSON.parse(resGuardar);
            if (!respuesta.estado) {
                alertError = `<div class="alert alert-warning alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-subentorno').html(alertError);
                return;
            }
            alertExito = `<div class="alert alert-success alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            $('#entorno').val('').change();
            $('#subentorno').val('').change();
            $('#cantidad').val('');
            listarSubentornos();
            $('#div-alert-subentorno').html(alertExito);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function listarSubentornos() {
    let inic_codigo = $('#codigo').val();
    let datosSubentornos, fila, alertError;
    $('#div-alert-subentorno').html('');

    // petición para listar subentornos-participantes asociados a la iniciativa
    $.ajax({
        type: 'GET',
        url: window.location.origin+'/admin/crear-iniciativa/listar-subentornos-participantes',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resListar) {
            respuesta = JSON.parse(resListar);
            $('#body-tabla-subentornos').empty();
            
            if (!respuesta.estado) {
                if (respuesta.resultado != '') {
                    alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                    $('#div-alert-subentorno').html(alertError);
                }
                $('#row-tabla-subentornos').hide();
                return;
            }
            
            datosSubentornos = respuesta.resultado;
            datosSubentornos.forEach(registro => {
                fila =  '<tr>'+
                            '<td>'+registro.ento_nombre+'</td>'+
                            '<td>'+registro.sube_nombre+'</td>'+
                            '<td>'+registro.part_cantidad_inicial+'</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-icon btn-danger" onclick="eliminarSubentorno('+registro.inic_codigo+', '+registro.sube_codigo+')"><i class="fas fa-trash"></i></button>'+
                            '</td>'+
                        '</tr>';
                $('#body-tabla-subentornos').append(fila);
            });
            $('#row-tabla-subentornos').show();

        },
        error: function(error) {
            console.log(error);
        }
    });
}

function eliminarSubentorno(inic_codigo, sube_codigo) {
    let alertError, alertExito;
    $('#div-alert-subentorno').html('');

    // petición para eliminar un subentorno-participante asociado a la iniciativa
    $.ajax({
        type: 'POST',
        url: window.location.origin+'/admin/crear-iniciativa/eliminar-subentorno-participante',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            inic_codigo: inic_codigo,
            sube_codigo: sube_codigo
        },
        success: function(resEliminar) {
            respuesta = JSON.parse(resEliminar);
            if (!respuesta.estado) {
                alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-subentorno').html(alertError);
                return;
            }
            alertExito = `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            listarSubentornos();
            $('#div-alert-subentorno').html(alertExito);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function agregarResultado() {
    let inic_codigo = $('#codigo').val();
    let resu_cantidad = $('#cuantificacion').val();
    let resu_nombre = $('#resultado').val();
    let alertError, alertExito;
    $('#div-alert-resultado').html('');
   
    // petición para guardar un resultado asociado a la iniciativa
    $.ajax({
        type: 'POST',
        url: window.location.origin+'/admin/crear-iniciativa/guardar-resultado',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            iniciativa: inic_codigo,
            cantidad: resu_cantidad,
            nombre: resu_nombre
        },
        success: function(resGuardar) {
            respuesta = JSON.parse(resGuardar);
            if (!respuesta.estado) {
                alertError = `<div class="alert alert-warning alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-resultado').html(alertError);
                return;
            }
            alertExito = `<div class="alert alert-success alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            $('#cuantificacion').val('');
            $('#resultado').val('');
            listarResultados();
            $('#div-alert-resultado').html(alertExito);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function listarResultados() {
    let inic_codigo = $('#codigo').val();
    let datosResultados, fila, alertError;
    $('#div-alert-resultado').html('');

    // petición para listar resultados asociados a la iniciativa
    $.ajax({
        type: 'GET',
        url: window.location.origin+'/admin/crear-iniciativa/listar-resultados',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resListar) {
            respuesta = JSON.parse(resListar);
            $('#body-tabla-resultados').empty();

            if (!respuesta.estado) {
                if (respuesta.resultado != '') {
                    alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                    $('#div-alert-resultado').html(alertError);
                }
                $('#card-tabla-resultados').hide();
                return;
            }
            
            datosResultados = respuesta.resultado;
            datosResultados.forEach(registro => {
                fila =  '<tr>'+
                            '<td>'+registro.resu_cuantificacion_inicial+'</td>'+
                            '<td>'+registro.resu_nombre+'</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-icon btn-danger" onclick="eliminarResultado('+registro.resu_codigo+', '+registro.inic_codigo+')"><i class="fas fa-trash"></i></button>'+
                            '</td>'+
                        '</tr>';
                $('#body-tabla-resultados').append(fila);
            });
            $('#card-tabla-resultados').show();

        },
        error: function(error) {
            console.log(error);
        }
    });
}

function eliminarResultado(resu_codigo, inic_codigo) {
    let alertError, alertExito;
    $('#div-alert-resultado').html('');

    // petición para eliminar un resultado asociada a la iniciativa
    $.ajax({
        type: 'POST',
        url: window.location.origin+'/admin/crear-iniciativa/eliminar-resultado',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            resu_codigo: resu_codigo,
            inic_codigo: inic_codigo
        },
        success: function(resEliminar) {
            respuesta = JSON.parse(resEliminar);
            if (!respuesta.estado) {
                alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-resultado').html(alertError);
                return;
            }
            alertExito = `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            listarResultados();
            $('#div-alert-resultado').html(alertExito);
        },
        error: function(error) {
            console.log(error);
        }
    });
}