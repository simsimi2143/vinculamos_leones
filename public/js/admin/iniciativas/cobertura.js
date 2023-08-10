$(document).ready(function() {
    listarParticipantes();
});

function cargarCantidad() {
    let participante = $('#participante').val();
    let inic_codigo = $('#codigo').val();
    let sube_codigo;
    let alertError, respuesta;
    $('#button-agregar-participantes').prop('disabled', false);
    if ($('#checkgenero').is(':checked')) $('#checkgenero').click();
    if ($('#checketario').is(':checked')) $('#checketario').click();
    if ($('#checkprocedencia').is(':checked')) $('#checkprocedencia').click();
    if ($('#checknacion').is(':checked')) $('#checknacion').click();
    if ($('#checkpueblo').is(':checked')) $('#checkpueblo').click();
    
    if (participante != '' && participante != null) {
        participante = $('#participante').val().split('-');
        //inic_codigo = participante[0];
        sube_codigo = participante[1];
        $('#div-alert-participante').html('');
        $('#cantidadfinal').val('');
    
        // petición para obtener la cantidad de participantes registrados en un subentorno específico
        $.ajax({
            type: 'GET',
            url: window.location.origin+'/admin/iniciativa/cobertura/consultar-cantidad',
            data: {
                iniciativa: inic_codigo,
                subentorno: sube_codigo
            },
            success: function(resConsultar) {
                respuesta = JSON.parse(resConsultar);
                if (!respuesta.estado) {
                    if (respuesta.resultado != '') {
                        alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                        $('#div-alert-participante').html(alertError);
                    }
                    alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>No existen subentornos registrados para la iniciativa.</strong></div></div>`;
                    $('#div-alert-participante').html(alertError);
                    return;
                }
                if (respuesta.resultado.part_cantidad_final == null) {
                    alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>No existen registros de participantes finales para este subentorno. Debe registrar los datos en el apartado superior.</strong></div></div>`;
                    $('#div-alert-participante').html(alertError);
                    $('#button-agregar-participantes').prop('disabled', true);
                    return;
                }
                $('#cantidadfinal').val(respuesta.resultado.part_cantidad_final);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
}

function actualizarParticipante() {
    let inic_codigo, sube_codigo, part_cantidad, part_total, alertError, alertExito, respuesta;
    let participante = $('#participante').val();
    let part_hombre = $('#generohombre').val();
    let part_mujer = $('#generomujer').val();
    let part_genero_otro = $('#generootro').val();
    let part_ninhos = $('#etarioninhos').val();
    let part_jovenes = $('#etariojovenes').val();
    let part_adultos = $('#etarioadultos').val();
    let part_mayores = $('#etariomayores').val();
    let part_rural = $('#procedenciarural').val();
    let part_urbano = $('#procedenciaurbano').val();
    let part_discapacidad = $('#vulneradiscapacidad').val();
    let part_pobreza = $('#vulnerapobreza').val();
    let part_chilena = $('#nacionchilena').val();
    let part_migrante = $('#nacionmigrante').val();
    let part_mapuche = $('#pueblomapuche').val();
    let part_pueblo_otro = $('#pueblootra').val();
    $('#div-alert-participante').html('');
    
    if ((participante == null) || (participante == '')) {
        alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>Debe seleccionar un subentorno para continuar.</strong></div></div>`;
        $('#div-alert-participante').html(alertError);
        return;
    }

    participante = $('#participante').val().split('-');
    inic_codigo = participante[0];
    sube_codigo = participante[1];
    part_cantidad = parseInt($('#cantidadfinal').val());
    
    if ($('#checkgenero').is(':checked')) {
        if (part_hombre == '' || part_mujer == '' || part_genero_otro == '') {
            alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>Debe completar los datos para la característica <em>Género</em>.</strong></div></div>`;
            $('#div-alert-participante').html(alertError);
            return;
        }
        part_total = parseInt(part_hombre)+parseInt(part_mujer)+parseInt(part_genero_otro);
        if (part_total != part_cantidad) {
            alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>La cantidad de participantes según <em>Género</em> no coincide con el total registrado (${part_cantidad}).</strong></div></div>`;
            $('#div-alert-participante').html(alertError);
            return;
        }
    }

    if ($('#checketario').is(':checked')) {
        if (part_ninhos == '' || part_jovenes == '' || part_adultos == '' || part_mayores == '') {
            alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>Debe completar los datos para la característica <em>Segmento etario</em>.</strong></div></div>`;
            $('#div-alert-participante').html(alertError);
            return;
        }
        part_total = parseInt(part_ninhos)+parseInt(part_jovenes)+parseInt(part_adultos)+parseInt(part_mayores);
        if (part_total != part_cantidad) {
            alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>La cantidad de participantes según <em>Segmento etario</em> no coincide con el total registrado (${part_cantidad}).</strong></div></div>`;
            $('#div-alert-participante').html(alertError);
            return;
        }
    }

    if ($('#checkprocedencia').is(':checked')) {
        if (part_rural == '' || part_urbano == '') {
            alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>Debe completar los datos para la característica <em>Procedencia</em>.</strong></div></div>`;
            $('#div-alert-participante').html(alertError);
            return;
        }
        part_total = parseInt(part_rural)+parseInt(part_urbano);
        if (part_total != part_cantidad) {
            alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>La cantidad de participantes según <em>Procedencia</em> no coincide con el total registrado (${part_cantidad}).</strong></div></div>`;
            $('#div-alert-participante').html(alertError);
            return;
        }
    }
    
    if ($('#checknacion').is(':checked')) {
        if (part_chilena == '' || part_migrante == '') {
            alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>Debe completar los datos para la característica <em>Nacionalidad</em>.</strong></div></div>`;
            $('#div-alert-participante').html(alertError);
            return;
        }
        part_total = parseInt(part_chilena)+parseInt(part_migrante);
        if (part_total != part_cantidad) {
            alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>La cantidad de participantes según <em>Nacionalidad</em> no coincide con el total registrado (${part_cantidad}).</strong></div></div>`;
            $('#div-alert-participante').html(alertError);
            return;
        }
    }

    if ($('#checkpueblo').is(':checked')) {
        if (part_mapuche == '' || part_pueblo_otro == '') {
            alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>Debe completar los datos para la característica <em>Pueblos originarios</em>.</strong></div></div>`;
            $('#div-alert-participante').html(alertError);
            return;
        }
        part_total = parseInt(part_mapuche)+parseInt(part_pueblo_otro);
        if (part_total != part_cantidad) {
            alertError = `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>La cantidad de participantes según <em>Pueblos originarios</em> no coincide con el total registrado (${part_cantidad}).</strong></div></div>`;
            $('#div-alert-participante').html(alertError);
            return;
        }
    }    
    
    // petición para actualizar un subentorno participante asociado a la iniciativa
    $.ajax({
        type: 'POST',
        url: window.location.origin+'/admin/iniciativa/cobertura/actualizar-participante',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            iniciativa: inic_codigo,
            subentorno: sube_codigo,
            hombre: (part_hombre==null ? 0 : part_hombre),
            mujer: (part_mujer==null ? 0 : part_mujer),
            generootro : (part_genero_otro==null ? 0 : part_genero_otro),
            ninhos: (part_ninhos==null ? 0 : part_ninhos),
            jovenes: (part_jovenes==null ? 0 : part_jovenes),
            adultos: (part_adultos==null ? 0 : part_adultos),
            mayores: (part_mayores==null ? 0 : part_mayores),
            rural: (part_rural==null ? 0 : part_rural),
            urbano: (part_urbano==null ? 0 : part_urbano),
            discapacidad: (part_discapacidad==null ? 0 : part_discapacidad),
            pobreza: (part_pobreza==null ? 0 : part_pobreza),
            chilena: (part_chilena==null ? 0 : part_chilena),
            migrante: (part_migrante==null ? 0 : part_migrante),
            mapuche: (part_mapuche==null ? 0 : part_mapuche),
            pueblootro: (part_pueblo_otro==null ? 0 : part_pueblo_otro)
        },
        success: function(resActualizar) {
            respuesta = JSON.parse(resActualizar);
            if (!respuesta.estado) {
                alertError = `<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-participante').html(alertError);
                return;
            }
            alertExito = `<div class="alert alert-success alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            
            $('#participante').val('').change();
            $('#cantidadfinal').val('');
            if ($('#checkgenero').is(':checked')) $('#checkgenero').click();
            if ($('#checketario').is(':checked')) $('#checketario').click();
            if ($('#checkprocedencia').is(':checked')) $('#checkprocedencia').click();
            if ($('#checknacion').is(':checked')) $('#checknacion').click();
            if ($('#checkpueblo').is(':checked')) $('#checkpueblo').click();
            listarParticipantes();
            $('#div-alert-participante').html(alertExito);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function listarParticipantes() {
    let inic_codigo = $('#codigo').val();
    let datosParticipantes, fila, respuesta;
    $('#div-alert-participante').html('');

    // petición para listar los subentornos participantes asociados a la iniciativa
    $.ajax({
        type: 'GET',
        url: window.location.origin+'/admin/iniciativa/cobertura/listar-participantes',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resListar) {
            respuesta = JSON.parse(resListar);
            $('#body-tabla-participantes').empty();

            if (!respuesta.estado) {
                $('#row-tabla-participantes').hide();
                return;
            }
            
            datosParticipantes = respuesta.resultado;
            datosParticipantes.forEach(registro => {
                fila =  '<tr>'+
                            '<td>'+registro.sube_nombre+'</td>'+
                            '<td>'+registro.part_cantidad_inicial+'</td>'+
                            '<td>'+registro.part_cantidad_final+'</td>'+
                            '<td>'+(registro.part_genero_hombre==null ? 0 : registro.part_genero_hombre)+'</td>'+
                            '<td>'+(registro.part_genero_mujer==null ? 0 : registro.part_genero_mujer)+'</td>'+
                            '<td>'+(registro.part_genero_otro==null ? 0 : registro.part_genero_otro)+'</td>'+
                            '<td>'+(registro.part_etario_ninhos==null ? 0 : registro.part_etario_ninhos)+'</td>'+
                            '<td>'+(registro.part_etario_jovenes==null ? 0 : registro.part_etario_jovenes)+'</td>'+
                            '<td>'+(registro.part_etario_adultos==null ? 0 : registro.part_etario_adultos)+'</td>'+
                            '<td>'+(registro.part_etario_adumayores==null ? 0 : registro.part_etario_adumayores)+'</td>'+
                            '<td>'+(registro.part_procedencia_rural==null ? 0 : registro.part_procedencia_rural)+'</td>'+
                            '<td>'+(registro.part_procedencia_urbano==null ? 0 : registro.part_procedencia_urbano)+'</td>'+
                            '<td>'+(registro.part_nacionalidad_chilena==null ? 0 : registro.part_nacionalidad_chilena)+'</td>'+
                            '<td>'+(registro.part_nacionalidad_migrante==null ? 0 : registro.part_nacionalidad_migrante)+'</td>'+
                            '<td>'+(registro.part_adscrito_pueblos==null ? 0 : registro.part_adscrito_pueblos)+'</td>'+
                            '<td>'+(registro.part_no_adscrito_pueblos==null ? 0 : registro.part_no_adscrito_pueblos)+'</td>'+                            
                            '<td>'+
                                '<button type="button" class="btn btn-icon btn-sm btn-danger" onclick="eliminarParticipante('+registro.inic_codigo+', '+registro.sube_codigo+')"><i class="fas fa-trash"></i></button>'+
                            '</td>'+
                        '</tr>';
                $('#body-tabla-participantes').append(fila);
            });
            $('#row-tabla-participantes').show();
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function eliminarParticipante(inic_codigo, sube_codigo) {
    let alertError, alertExito, respuesta;
    $('#div-alert-participante').html('');

    // petición para eliminar un subentorno participante asociado a la iniciativa
    $.ajax({
        type: 'POST',
        url: window.location.origin+'/admin/iniciativa/cobertura/eliminar-participante',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            iniciativa: inic_codigo,
            subentorno: sube_codigo
        },
        success: function(resEliminar) {
            respuesta = JSON.parse(resEliminar);
            if (!respuesta.estado) {
                alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-participante').html(alertError);
                return;
            }
            alertExito = `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            listarParticipantes();
            $('#div-alert-participante').html(alertExito);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

$('#checkgenero').change(function () {
    if(this.checked) {
        $('#generohombre').prop("disabled", false);
        $('#generomujer').prop("disabled", false);
        $('#generootro').prop("disabled", false);
    } else {
        $('#generohombre').val('');
        $('#generohombre').prop("disabled", true);
        $('#generomujer').val('');
        $('#generomujer').prop("disabled", true);
        $('#generootro').val('');
        $('#generootro').prop("disabled", true);
    }
});

$('#checketario').change(function () {
    if(this.checked) {
        $('#etarioninhos').prop("disabled", false);
        $('#etariojovenes').prop("disabled", false);
        $('#etarioadultos').prop("disabled", false);
        $('#etariomayores').prop("disabled", false);
    } else {
        $('#etarioninhos').val('');
        $('#etarioninhos').prop("disabled", true);
        $('#etariojovenes').val('');
        $('#etariojovenes').prop("disabled", true);
        $('#etarioadultos').val('');
        $('#etarioadultos').prop("disabled", true);
        $('#etariomayores').val('');
        $('#etariomayores').prop("disabled", true);        
    }
});

$('#checkprocedencia').change(function () {
    if(this.checked) {
        $('#procedenciarural').prop("disabled", false);
        $('#procedenciaurbano').prop("disabled", false);
    } else {
        $('#procedenciarural').val('');
        $('#procedenciarural').prop("disabled", true);
        $('#procedenciaurbano').val('');
        $('#procedenciaurbano').prop("disabled", true);        
    }
});

$('#checknacion').change(function () {
    if(this.checked) {
        $('#nacionchilena').prop("disabled", false);
        $('#nacionmigrante').prop("disabled", false);
    } else {
        $('#nacionchilena').val('');
        $('#nacionchilena').prop("disabled", true);
        $('#nacionmigrante').val('');
        $('#nacionmigrante').prop("disabled", true);        
    }
});

$('#checkpueblo').change(function () {
    if(this.checked) {
        $('#pueblomapuche').prop("disabled", false);
        $('#pueblootra').prop("disabled", false);
    } else {
        $('#pueblomapuche').val('');
        $('#pueblomapuche').prop("disabled", true);
        $('#pueblootra').val('');
        $('#pueblootra').prop("disabled", true);        
    }
});