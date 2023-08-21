$(document).ready(function() {
    cargarRecursos();
    cargarDinero();
    // listarEspecies();
    listarInfraestructura();
    listarRrhh();
})

function cargarRecursos() {
    let inic_codigo = $('#codigo').val();
    let dinero, infraestructura, rrhh
    let totalEmpresa = 0;
    let totalExterno = 0;

    // petición que trae la suma total de todos los recursos organizados por entidad
    $.ajax({
        type: 'GET',
        url: '/admin/crear-iniciativa/recursos',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resListar) {
            respuesta = JSON.parse(resListar);
            if (!respuesta.estado) {
                if (respuesta.resultado != '') {
                    alertError =
                        `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                    $('#div-alert-recursos').html(alertError);
                }
                return;
            }

            dinero = respuesta.resultado.dinero;
            infraestructura = respuesta.resultado.infraestructura;
            rrhh = respuesta.resultado.rrhh;

            if (dinero.length > 0) {
                dinero.forEach(registro => {
                    if (registro.enti_codigo == 1) totalEmpresa = totalEmpresa + parseInt(
                        registro.suma_dinero);
                    else totalExterno = totalExterno + parseInt(registro.suma_dinero);
                });
            }
            if (infraestructura.length > 0) {
                infraestructura.forEach(registro => {
                    if (registro.enti_codigo == 1) totalEmpresa = totalEmpresa + parseInt(
                        registro.suma_infraestructura);
                    else totalExterno = totalExterno + parseInt(registro.suma_infraestructura);
                });
            }
            if (rrhh.length > 0) {
                rrhh.forEach(registro => {
                    if (registro.enti_codigo == 1) totalEmpresa = totalEmpresa + parseInt(
                        registro.suma_rrhh);
                    else totalExterno = totalExterno + parseInt(registro.suma_rrhh);
                });
            }
            $('#empresa-total').text('$' + new Intl.NumberFormat('es-CL', {
                maximumSignificantDigits: 3
            }).format(totalEmpresa));
            $('#externo-total').text('$' + new Intl.NumberFormat('es-CL', {
                maximumSignificantDigits: 3
            }).format(totalExterno));
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function cargarDinero() {
    let inic_codigo = $('#codigo').val();
    let respuesta, dinero;
    let totalEmpresa = 0;
    let totalExterno = 0;
    $('#aporteempresa').val('');
    $('#aporteexterno').val('');

    // petición que trae la suma total del recurso dinero organizado por entidad
    $.ajax({
        type: 'GET',
        url: '/admin/crear-iniciativa/consultar-dinero',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resListar) {
            respuesta = JSON.parse(resListar);
            if (!respuesta.estado) {
                if (respuesta.resultado != '') {
                    alertError =
                        `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                    $('#div-alert-recursos').html(alertError);
                }
                return;
            }
            dinero = respuesta.resultado;
            if (dinero.length > 0) {
                dinero.forEach(registro => {
                    if (registro.enti_codigo == 1) totalEmpresa = totalEmpresa + parseInt(
                        registro.suma_dinero);
                    else totalExterno = totalExterno + parseInt(registro.suma_dinero);
                });
            }
            $('#empresadinero').text('$' + new Intl.NumberFormat('es-CL', {
                maximumSignificantDigits: 3
            }).format(totalEmpresa));
            $('#externodinero').text('$' + new Intl.NumberFormat('es-CL', {
                maximumSignificantDigits: 3
            }).format(totalExterno));
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function cargarEspecies() {
    let inic_codigo = $('#codigo').val();
    let respuesta, especies;
    let totalEmpresa = 0;
    let totalExterno = 0;

    // petición que trae la suma total del recurso especies organizado por entidad
    $.ajax({
        type: 'GET',
        url: window.location.origin + '/admin/crear-iniciativa/consultar-especies',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resListar) {
            respuesta = JSON.parse(resListar);
            if (!respuesta.estado) {
                if (respuesta.resultado != '') {
                    alertError =
                        `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                    $('#div-alert-recursos').html(alertError);
                }
                return;
            }
            especies = respuesta.resultado;
            if (especies.length > 0) {
                especies.forEach(registro => {
                    if (registro.enti_codigo == 1) totalEmpresa = totalEmpresa + parseInt(
                        registro.suma_especies);
                    else totalExterno = totalExterno + parseInt(registro.suma_especies);
                });
            }
            $('#empresa-especies-total').text('$' + new Intl.NumberFormat('es-CL', {
                maximumSignificantDigits: 3
            }).format(totalEmpresa));
            $('#externo-especies-total').text('$' + new Intl.NumberFormat('es-CL', {
                maximumSignificantDigits: 3
            }).format(totalExterno));
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function cargarInfraestructura() {
    let inic_codigo = $('#codigo').val();
    let respuesta, infraestructura;
    let totalEmpresa = 0;
    let totalExterno = 0;


    // petición que trae la suma total del recurso infraestructura organizado por entidad
    $.ajax({
        type: 'GET',
        url: '/admin/crear-iniciativa/consultar-infraestructura',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resListar) {
            respuesta = JSON.parse(resListar);
            if (!respuesta.estado) {
                if (respuesta.resultado != '') {
                    alertError =
                        `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                    $('#div-alert-recursos').html(alertError);
                }
                return;
            }
            infraestructura = respuesta.resultado;
            if (infraestructura.length > 0) {
                infraestructura.forEach(registro => {
                    if (registro.enti_codigo == 1) totalEmpresa = totalEmpresa + parseInt(
                        registro.suma_infraestructura);
                    else totalExterno = totalExterno + parseInt(registro.suma_infraestructura);
                });
            }
            $('#empresa-infra-total').text('$' + new Intl.NumberFormat('es-CL', {
                maximumSignificantDigits: 3
            }).format(totalEmpresa));
            $('#externo-infra-total').text('$' + new Intl.NumberFormat('es-CL', {
                maximumSignificantDigits: 3
            }).format(totalExterno));
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function cargarRrhh() {
    let inic_codigo = $('#codigo').val();
    let respuesta, rrhh;
    let totalEmpresa = 0;
    let totalExterno = 0;

    // petición que trae la suma total del recurso humano organizado por entidad
    $.ajax({
        type: 'GET',
        url: window.location.origin + '/admin/crear-iniciativa/consultar-rrhh',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resListar) {
            respuesta = JSON.parse(resListar);
            if (!respuesta.estado) {
                if (respuesta.resultado != '') {
                    alertError =
                        `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                    $('#div-alert-recursos').html(alertError);
                }
                return;
            }
            rrhh = respuesta.resultado;
            if (rrhh.length > 0) {
                rrhh.forEach(registro => {
                    if (registro.enti_codigo == 1) totalEmpresa = totalEmpresa + parseInt(
                        registro.suma_rrhh);
                    else totalExterno = totalExterno + parseInt(registro.suma_rrhh);
                });
            }
            $('#empresa-rrhh-total').text('$' + new Intl.NumberFormat('es-CL', {
                maximumSignificantDigits: 3
            }).format(totalEmpresa));
            $('#externo-rrhh-total').text('$' + new Intl.NumberFormat('es-CL', {
                maximumSignificantDigits: 3
            }).format(totalExterno));
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function guardarDinero(enti_codigo) {
    let inic_codigo = $('#codigo').val();
    let aporteEmpresa = $('#aporteempresa').val();
    let aporteExterno = $('#aporteexterno').val();
    let dinero, alertError, alertExito
    $('#div-alert-recursos').html('');

    if (enti_codigo == 1) {
        if (aporteEmpresa == '' || aporteEmpresa == null) {
            alertError =
                `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>Debe ingresar el monto de dinero aportado por la empresa.</strong></div></div>`;
            $('#div-alert-recursos').html(alertError);
            return;
        }
        dinero = aporteEmpresa;
    } else {
        if (aporteExterno == '' || aporteExterno == null) {
            alertError =
                `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>Debe ingresar el monto de dinero aportado por externos.</strong></div></div>`;
            $('#div-alert-recursos').html(alertError);
            return;
        }
        dinero = aporteExterno;
    }

    // petición para guardar/actualizar el monto de dinero aportado por la entidad
    $.ajax({
        type: 'POST',
        url: '/admin/crear-iniciativa/guardar-dinero',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            iniciativa: inic_codigo,
            entidad: enti_codigo,
            valorizacion: dinero
        },
        success: function(resGuardar) {
            respuesta = JSON.parse(resGuardar);
            if (!respuesta.estado) {
                alertError =
                    `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-recursos').html(alertError);
                return;
            }
            alertExito =
                `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            $('#div-alert-recursos').html(alertExito);
            cargarDinero();
            cargarRecursos();
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function crearEspecie(enti_codigo) {
    $('#div-alert-especie').html('');
    $('#nombreespecie').val('');
    $('#valorespecie').val('');
    $('#entidadespecie').val(enti_codigo);
    $('#modalEspecies').modal('show');
}


function crearInfra(enti_codigo) {
    let datosInfra;
    $('#div-alert-infraestructura').html('');
    $('#codigoinfra').val('');
    $('#horasinfra').val('')
    $('#valorinfra').val('');
    $('#entidadinfra').val(enti_codigo);

    // petición para consultar los tipos de infraestructura disponibles
    $.ajax({
        type: 'GET',
        url: '/admin/crear-iniciativa/listar-tipoinfra',
        success: function(resListar) {
            $('#codigoinfra').find('option').not(':first').remove();
            $('#codigoinfra').prop('selectedIndex', 0);
            datosInfra = JSON.parse(resListar);
            if (datosInfra.length == 0) {
                $('#codigoinfra').append(new Option('No existen registros', '-1'));
            } else {
                datosInfra.forEach(registro => {
                    $('#codigoinfra').append(new Option(registro.tinf_nombre, registro
                        .tinf_codigo));
                });
            }
        },
        error: function(error) {
            //console.error(error);
        }
    });
    $('#modalInfraestructura').modal('show');
}

function buscarTipoInfra() {
    let coin_horas = $('#horasinfra').val();
    let tinf_codigo = $('#codigoinfra').val();
    let respuesta;

    // petición para consultar información del tipo infraestructura seleccionada
    $.ajax({
        type: 'GET',
        url: '/admin/crear-iniciativa/buscar-tipoinfra',
        data: {
            tipoinfra: tinf_codigo
        },
        success: function(resConsultar) {
            respuesta = JSON.parse(resConsultar);
            console.log(respuesta);
            if (respuesta.tinf_codigo == tinf_codigo) {
                if (coin_horas != '') $('#valorinfra').val(coin_horas * respuesta.tinf_valor);
                else $('#valorinfra').val(respuesta.tinf_valor);
            } else {
                $('#valorinfra').val('-1');
            }
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function guardarInfra() {
    let inic_codigo = $('#codigo').val();
    let enti_codigo = $('#entidadinfra').val();
    let tinf_codigo = $('#codigoinfra').val();
    let coin_horas = $('#horasinfra').val();
    let coin_cantidad = $('#cantidadinfra').val();
    let respuesta, alertError, alertExito;
    $('#div-alert-infraestructura').html('');
    $('#div-alert-recursos').html('');
    console.log(inic_codigo, enti_codigo, tinf_codigo, coin_horas);

    // petición para guardar infraestructura aportada por la entidad
    $.ajax({
        type: 'POST',
        url: '/admin/crear-iniciativa/guardar-infraestructura',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            iniciativa: inic_codigo,
            entidad: enti_codigo,
            tipoinfra: tinf_codigo,
            horas: coin_horas,
            cantidad: coin_cantidad,
        },
        success: function(resGuardar) {
            respuesta = JSON.parse(resGuardar);
            if (!respuesta.estado) {
                alertError =
                    `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-infraestructura').html(alertError);
                return;
            }
            alertExito =
                `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            $('#modalInfraestructura').modal('hide');
            $('#div-alert-recursos').html(alertExito);
            listarInfraestructura();
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function listarInfraestructura() {
    let inic_codigo = $('#codigo').val();
    let datosInfra, fila, alertError;

    // petición para listar las infraestructuras aportadas por las entidades
    $.ajax({
        type: 'GET',
        url: '/admin/crear-iniciativa/listar-infraestructura',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resListar) {
            respuesta = JSON.parse(resListar);
            $('#tabla-empresa-infra').empty();
            $('#tabla-externo-infra').empty();
            cargarInfraestructura();
            cargarRecursos();

            if (!respuesta.estado) {
                if (respuesta.resultado != '') {
                    alertError =
                        `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                    $('#div-alert-recursos').html(alertError);
                }
                return;
            }

            datosInfra = respuesta.resultado;
            datosInfra.forEach(registro => {
                fila = '<tr>' +
                    '<td>' + registro.tinf_nombre + '</td>' +
                    '<td>' + registro.coin_horas + '</td>' +
                    '<td>' + registro.coin_cantidad + '</td>' +
                    '<td>' + '$' + new Intl.NumberFormat('es-CL', {
                        maximumSignificantDigits: 3
                    }).format(registro.coin_valorizacion) + '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-icon btn-sm btn-danger" onclick="eliminarInfraestructura(' +
                    registro.inic_codigo + ', ' + registro.enti_codigo + ', ' + registro
                    .tinf_codigo + ')"><i class="fas fa-trash"></i></button>' +
                    '</td>' +
                    '</tr>';
                if (registro.enti_codigo == 1) $('#tabla-empresa-infra').append(fila);
                else $('#tabla-externo-infra').append(fila);
            });
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function eliminarInfraestructura(inic_codigo, enti_codigo, tiin_codigo) {
    let alertError, alertExito;
    $('#div-alert-recursos').html('');

    // petición para eliminar una infraestructura aportada por la entidad
    $.ajax({
        type: 'POST',
        url: '/admin/crear-iniciativa/eliminar-infraestructura',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            iniciativa: inic_codigo,
            entidad: enti_codigo,
            tipoinfra: tiin_codigo
        },
        success: function(resEliminar) {
            respuesta = JSON.parse(resEliminar);
            if (!respuesta.estado) {
                alertError =
                    `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-recursos').html(alertError);
                return;
            }
            alertExito =
                `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            listarInfraestructura();
            $('#div-alert-recursos').html(alertExito);
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function crearRrhh(enti_codigo) {
    let datosRrhh;
    $('#div-alert-rrhh').html('');
    $('#codigorrhh').val('');
    $('#horasrrhh').val('')
    $('#valorrrhh').val('');
    $('#entidadrrhh').val(enti_codigo);

    // petición para consultar los tipos de recursos humanos disponibles
    $.ajax({
        type: 'GET',
        url: '/admin/crear-iniciativa/listar-tiporrhh',
        success: function(resListar) {
            console.log(resListar);
            $('#codigorrhh').find('option').not(':first').remove();
            $('#codigorrhh').prop('selectedIndex', 0);
            datosRrhh = JSON.parse(resListar);
            if (datosRrhh.length == 0) {
                $('#codigorrhh').append(new Option('No existen registros', '-1'));
            } else {
                datosRrhh.forEach(registro => {
                    $('#codigorrhh').append(new Option(registro.trrhh_nombre, registro
                        .trrhh_codigo));
                });
            }
        },
        error: function(error) {
            //console.error(error);
        }
    });
    $('#modalRrhh').modal('show');
}

function buscarTipoRrhh() {
    let corh_horas = $('#horasrrhh').val();
    let trrhh_codigo = $('#codigorrhh').val();
    let respuesta;

    // petición para consultar información del tipo de RRHH seleccionado
    $.ajax({
        type: 'GET',
        url:  '/admin/crear-iniciativa/buscar-tiporrhh',
        data: {
            tiporrhh: trrhh_codigo
        },
        success: function(resConsultar) {
            respuesta = JSON.parse(resConsultar);
            if (respuesta.trrhh_codigo == trrhh_codigo) {
                if (corh_horas != '') $('#valorrrhh').val(corh_horas * respuesta.trrhh_valor);
                else $('#valorrrhh').val(respuesta.trrhh_valor);
            } else {
                $('#valorrrhh').val('-1');
            }
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function guardarRrhh() {
    let inic_codigo = $('#codigo').val();
    let enti_codigo = $('#entidadrrhh').val();
    let trrhh_codigo = $('#codigorrhh').val();
    let corh_horas = $('#horasrrhh').val();
    let corh_cantidad = $('#cantidadhh').val();
    let respuesta, alertError, alertExito;
    $('#div-alert-rrhh').html('');
    $('#div-alert-recursos').html('');

    // petición para guardar RRHH aportado por la entidad
    $.ajax({
        type: 'POST',
        url: window.location.origin + '/admin/crear-iniciativa/guardar-rrhh',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            iniciativa: inic_codigo,
            entidad: enti_codigo,
            tiporrhh: trrhh_codigo,
            horas: corh_horas,
            cantidad: corh_cantidad,
        },
        success: function(resGuardar) {
            respuesta = JSON.parse(resGuardar);
            if (!respuesta.estado) {
                alertError =
                    `<div class="alert alert-warning alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-rrhh').html(alertError);
                return;
            }
            alertExito =
                `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            $('#modalRrhh').modal('hide');
            $('#div-alert-recursos').html(alertExito);
            listarRrhh();
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function listarRrhh() {
    let inic_codigo = $('#codigo').val();
    let datosRrhh, fila, alertError;

    // petición para listar los RRHH aportados por las entidades
    $.ajax({
        type: 'GET',
        url:  '/admin/crear-iniciativa/listar-rrhh',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resListar) {
            respuesta = JSON.parse(resListar);
            $('#tabla-empresa-rrhh').empty();
            $('#tabla-externo-rrhh').empty();
            cargarRrhh();
            cargarRecursos();

            if (!respuesta.estado) {
                if (respuesta.resultado != '') {
                    alertError =
                        `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                    $('#div-alert-recursos').html(alertError);
                }
                return;
            }

            datosRrhh = respuesta.resultado;
            console.log(datosRrhh);
            datosRrhh.forEach(registro => {
                fila = '<tr>' +
                    '<td>' + registro.trrhh_nombre + '</td>' +
                    '<td>' + registro.corh_horas + '</td>' +
                    '<td>' + registro.corh_cantidad + '</td>' +
                    '<td>' + '$' + new Intl.NumberFormat('es-CL', {
                        maximumSignificantDigits: 3
                    }).format(registro.corh_valorizacion) + '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-icon btn-sm btn-danger" onclick="eliminarRrhh(' +
                    registro.inic_codigo + ', ' + registro.enti_codigo + ', ' + registro
                    .trrhh_codigo + ')"><i class="fas fa-trash"></i></button>' +
                    '</td>' +
                    '</tr>';
                if (registro.enti_codigo == 1) $('#tabla-empresa-rrhh').append(fila);
                else $('#tabla-externo-rrhh').append(fila);
            });
        },
        error: function(error) {
            //console.error(error);
        }
    });
}

function eliminarRrhh(inic_codigo, enti_codigo, trrhh_codigo) {
    let alertError, alertExito;
    $('#div-alert-recursos').html('');

    // petición para eliminar un RRHH aportado por la entidad
    $.ajax({
        type: 'POST',
        url: window.location.origin + '/admin/crear-iniciativa/eliminar-rrhh',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            iniciativa: inic_codigo,
            entidad: enti_codigo,
            tiporrhh: trrhh_codigo
        },
        success: function(resEliminar) {
            respuesta = JSON.parse(resEliminar);
            if (!respuesta.estado) {
                alertError =
                    `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-recursos').html(alertError);
                return;
            }
            alertExito =
                `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            listarRrhh();
            $('#div-alert-recursos').html(alertExito);
        },
        error: function(error) {
            //console.error(error);
        }
    });
}
