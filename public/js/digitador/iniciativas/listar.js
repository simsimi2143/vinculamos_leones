function getURLParams(url) {
    let params = {};
    new URLSearchParams(url.replace(/^.*?\?/, '?')).forEach(function(value, key) {
      params[key] = value
    });
    return params;
}

function eliminarIniciativa(inic_codigo) {
    $('#inic_codigo').val(inic_codigo);
    $('#modalEliminarIniciativa').modal('show');
}

function consultarComunas() {
    let regi_codigo = $('#region').val();
    let mensaje;
    $('#div-alert-iniciativas').html('');
    
    if (regi_codigo == -1) {
        mensaje = `<div class="alert alert-warning alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>La región seleccionada no es válida.</strong></div></div>`;
        $('#div-alert-iniciativas').html(mensaje);
        return;
    }

    $.ajax({
        type: 'GET',
        url: window.location.origin+'/digitador/iniciativas/comuna',
        data: {
            region: regi_codigo
        },
        success: function(resConsultar) {            
            respuesta = JSON.parse(resConsultar);
            $('#comuna').find('option').not(':first').remove();
            $('#comuna').prop('selectedIndex', 0);
            consultarUnidades();
            
            if (!respuesta.estado) return; 
            respuesta.resultado.forEach(registro => {
                if (registro.regi_codigo == regi_codigo) $('#comuna').append(new Option(registro.comu_nombre, registro.comu_codigo)); 
            });
            let comu_codigo = getURLParams(window.location.href)['comuna'];
            if (comu_codigo == undefined || comu_codigo == null) $('#comuna').val('').change();
            else $('#comuna').val(comu_codigo).change();
            if ($('#comuna').val() == null) $('#comuna').val('').change();
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function consultarUnidades() {
    let comu_codigo = $('#comuna').val();
    let mensaje;
    $('#div-alert-iniciativas').html('');
    

    if (comu_codigo == -1) {
        mensaje = `<div class="alert alert-warning alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>La región seleccionada no es válida.</strong></div></div>`;
        $('#div-alert-iniciativas').html(mensaje);
        return;
    }

    $.ajax({
        type: 'GET',
        url: window.location.origin+'/digitador/iniciativas/unidad',
        data: {
            comuna: comu_codigo
        },
        success: function(resConsultar) {            
            respuesta = JSON.parse(resConsultar);
            $('#unidad').find('option').not(':first').remove();
            $('#unidad').prop('selectedIndex', 0);

            if (!respuesta.estado) return;              
            respuesta.resultado.forEach(registro => {
                if (registro.comu_codigo == comu_codigo) $('#unidad').append(new Option(registro.unid_nombre, registro.unid_codigo)); 
            });
            let unid_codigo = getURLParams(window.location.href)['unidad'];
            if (unid_codigo == undefined || unid_codigo == null) $('#unidad').val('').change();
            else $('#unidad').val(unid_codigo).change();
            if ($('#unidad').val() == null) $('#unidad').val('').change();
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function calcularIndice(inic_codigo) {
    let datos;
    let mecanismo, frecuencia, cobertura, resultados, evaluacion;
    let partInicial, partFinal;
    let resuInicial, resuFinal;
    let indice;

    $.ajax({
        type: 'GET',
        url: window.location.origin+'/digitador/iniciativa/invi/datos',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resConsultar) {
            respuesta = JSON.parse(resConsultar);
            datos = respuesta.resultado;

            mecanismo = datos.mecanismo.meca_puntaje;
            frecuencia = datos.frecuencia.frec_puntaje;

            cobertura = 0;
            partInicial = 0;
            partFinal = 0;
            if (datos.cobertura.length > 0) {
                datos.cobertura.forEach(registro => {
                    partInicial = partInicial + parseInt(registro.part_cantidad_inicial);
                    partFinal = partFinal + parseInt(registro.part_cantidad_final);
                });
                if (partInicial > 0) cobertura = Math.round((partFinal*100)/partInicial);
                if (cobertura > 100) cobertura = 100;
            }

            resultados = 0;
            resuInicial = 0;
            resuFinal = 0;
            if (datos.resultados.length > 0) {
                datos.resultados.forEach(registro => {
                    resuInicial = resuInicial + parseInt(registro.resu_cuantificacion_inicial);
                    resuFinal = resuFinal + parseInt(registro.resu_cuantificacion_final);
                });
                if (resuInicial > 0) resultados = Math.round((resuFinal*100)/resuInicial);
                if (resultados > 100) resultados = 100;
            }
            
            evaluacion = 0;
            if (datos.evaluacion != null) {
                evaluacion = parseInt(datos.evaluacion.eval_plazos)+parseInt(datos.evaluacion.eval_horarios)+parseInt(datos.evaluacion.eval_infraestructura)+
                        parseInt(datos.evaluacion.eval_equipamiento)+parseInt(datos.evaluacion.eval_conexion_dl)+parseInt(datos.evaluacion.eval_desempenho_responsable)+
                        parseInt(datos.evaluacion.eval_desempenho_participantes)+parseInt(datos.evaluacion.eval_calidad_presentaciones);
                evaluacion = Math.round((evaluacion * 20) / 8);
            }
            
            indice = Math.round(0.2*mecanismo + 0.1*frecuencia + 0.1*cobertura + 0.35*evaluacion + 0.25*resultados);

            $.ajax({
                type: 'POST',
                url: window.location.origin+'/digitador/iniciativa/invi/actualizar',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    inic_codigo: inic_codigo,
                    inic_inrel: indice
                },
                success: function(resActualizar) { },
                error: function(error) {
                    console.log(error);
                }
            });
            
            $('#mecanismo-nombre').text(datos.mecanismo.meca_nombre);
            $('#frecuencia-nombre').text(datos.frecuencia.frec_nombre);
            $('#mecanismo-puntaje').text(mecanismo);
            $('#frecuencia-puntaje').text(frecuencia);
            $('#cobertura-puntaje').text(cobertura);
            $('#resultados-puntaje').text(resultados);
            $('#evaluacion-puntaje').text(evaluacion);
            $('#valor-indice').text(indice);
            $('#modalINVI').modal('show');
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function imprimirIniciativa() {
    let tabla = document.getElementById('tabla-info-iniciativa');
    let ods = document.getElementById('div-ods');
    let ventana = window.open('SISREL Camanchaca');
    let txtImprimir = '' +
        '<style type="text/css">' +
            'table th, table td {' +
                'border: 1px solid #000;' +
            '}' +
            '#div-ods {' +
                'display:flex;' +
                'align-items: center;' +
                'margin: 0 5px;' +
                'margin-top: 20px' +
            '}' +
            '.img-fluid {' +
                'max-width: 150px;' +
                'margin-left: auto;' +
            '}' +
        '</style>';

    ventana.document.write('<html><head><title>Iniciativa - SISREL Camanchaca</title>');
    txtImprimir += tabla.outerHTML;
    txtImprimir += ods.outerHTML;
    ventana.document.write(txtImprimir);
    ventana.focus();
    ventana.print();
    ventana.close();
}