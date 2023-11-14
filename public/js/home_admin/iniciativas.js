$(document).ready(function() {
	iniciativasUnidades();
    participantesEntornos();
    inversionPilares();
    iniciativasOds();
    indiceInvi();
});

function dynamicColors() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgba(" + r + "," + g + "," + b + ", 1)";
}

function poolColors(a) {
    var pool = [];
    for(i = 0; i < a; i++) {
        pool.push(dynamicColors());
    }
    return pool;
}

function iniciativasUnidades() {
	let region = getURLParams(window.location.href)['region'];
	let comuna = getURLParams(window.location.href)['comuna'];
    
	$.ajax({
		type: 'GET',
		url: window.location.origin+'/admin/dashboard/iniciativas/inic-unid',
		data: { 
			regi_codigo: region,
			comu_codigo: comuna
		},
		success: function(resConsultar) {
			respuesta = JSON.parse(resConsultar);
			nombresUnidades = respuesta[0];
			totalUnidades = respuesta[1];

            let colorBarra = poolColors(totalUnidades.length);
            let ctx = document.getElementById("chartUnidades").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: nombresUnidades,
                    datasets: [{
                        label: 'Iniciativas',
                        data: totalUnidades,
                        borderWidth: 2,
                        backgroundColor: colorBarra,
                        borderColor: colorBarra,
                        borderWidth: 2.5,
                        pointBackgroundColor: '#ffffff',
                        pointRadius: 4
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
                            ticks: {
                                beginAtZero: true,
                                stepSize: 5,
                                fontColor: "#9aa0ac",
                            },
                        }],
                        xAxes: [{
                            barThickness : 25,
                            ticks: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            },
                        }]
                    },
                }
            });
		},
		error: function(error) {
			console.log(error);
		}
	});
}

function participantesEntornos() {
	let region = getURLParams(window.location.href)['region'];
	let comuna = getURLParams(window.location.href)['comuna'];
    let unidad = getURLParams(window.location.href)['unidad'];
    
	$.ajax({
		type: 'GET',
		url: window.location.origin+'/admin/dashboard/iniciativas/part-ento',
		data: { 
			regi_codigo: region,
			comu_codigo: comuna,
            unid_codigo: unidad
		},
		success: function(resConsultar) {
			respuesta = JSON.parse(resConsultar);
            resEntornos = respuesta[0];
            totalParticipantes = respuesta[1];
            
            nombreEntornos = [];
            resEntornos.forEach(registro => {
                nombreEntornos.push(registro.ento_nombre);
            });
			
            let colorBarra = poolColors(totalParticipantes.length);
            let ctx = document.getElementById("chartEntornos").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'horizontalBar',
                data: {
                    labels: nombreEntornos,
                    datasets: [{
                        label: 'Participantes',
                        data: totalParticipantes,
                        borderWidth: 2,
                        backgroundColor: colorBarra,
                        borderColor: colorBarra,
                        borderWidth: 2.5,
                        pointBackgroundColor: '#ffffff',
                        pointRadius: 4
                    }]
                },
                options: {
                    indexAxis: "y",
                    legend: {
                        display: false,
                    },

                    scales: {
                        yAxes: [
                            {
                                barThickness : 25,
                                gridLines: {
                                    drawBorder: true,
                                    color: "#f2f2f2",
                                },
                            },
                        ],
                        xAxes: [
                            {
                                ticks: {
                                    display: true,
                                    beginAtZero: true,
                                    stepSize: 200,
                                    fontColor: "#9aa0ac",
                                },
                                gridLines: {
                                    display: true,
                                },
                            },
                        ],
                    },
                    responsive: true,
                }
            });
		},
		error: function(error) {
			console.log(error);
		}
	});
}

function inversionPilares() {
	let region = getURLParams(window.location.href)['region'];
	let comuna = getURLParams(window.location.href)['comuna'];
    let unidad = getURLParams(window.location.href)['unidad'];
    
	$.ajax({
		type: 'GET',
		url: window.location.origin+'/admin/dashboard/iniciativas/inve-pila',
		data: { 
			regi_codigo: region,
			comu_codigo: comuna,
            unid_codigo: unidad
		},
		success: function(resConsultar) {
			respuesta = JSON.parse(resConsultar);
            resPilares = respuesta[0];
            resInversion = respuesta[1];
            totalInversion = resInversion.reduce((partialSum, a) => partialSum + a, 0);
            
            nombrePilares = [];
            resPilares.forEach(registro => {
                nombrePilares.push(registro.pila_nombre);
            });

            inversion = []
            resInversion.forEach(registro => {
                inversion.push(Math.round((registro/totalInversion)*100));
            });

            let colorZona = poolColors(resPilares.length);
            let ctx = document.getElementById("chartPilares").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: inversion,
                        backgroundColor: colorZona,
                        label: 'Inversión %'
                    }],
                    labels: nombrePilares,
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'right',
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data, inversion) {
                                return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
                            }
                        }
                    }
                }
            });
		},
		error: function(error) {
			console.log(error);
		}
	});
}

function iniciativasOds() {
	let region = getURLParams(window.location.href)['region'];
	let comuna = getURLParams(window.location.href)['comuna'];
    let unidad = getURLParams(window.location.href)['unidad'];
    
	$.ajax({
		type: 'GET',
		url: window.location.origin+'/admin/dashboard/iniciativas/inic-ods',
		data: { 
			regi_codigo: region,
			comu_codigo: comuna,
            unid_codigo: unidad
		},
		success: function(resConsultar) {
			respuesta = JSON.parse(resConsultar);
            respuesta.forEach(registro => {
                $('#img-'+registro.obde_codigo).css({'filter': 'saturate(1) opacity(1)'});
                $('#img-'+registro.obde_codigo).tooltip('hide').attr('data-original-title', 'Iniciativas relacionadas: '+registro.total_ods)
            });
		},
		error: function(error) {
			console.log(error);
		}
	});
}

function indiceInvi() {
    let region = getURLParams(window.location.href)['region'];
	let comuna = getURLParams(window.location.href)['comuna'];
    let unidad = getURLParams(window.location.href)['unidad'];

    $.ajax({
		type: 'GET',
		url: window.location.origin+'/admin/dashboard/iniciativas/invi',
		data: { 
			regi_codigo: region,
			comu_codigo: comuna,
            unid_codigo: unidad
		},
		success: function(resConsultar) {
			promedio = JSON.parse(resConsultar);
            let ctx = document.getElementById("chartInvi").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [promedio, 100-promedio],
                        backgroundColor: [
                            '#6777ef'
                        ],
                        label: ''
                    }],
                    labels: ['Puntaje promedio', 'Puntaje restante'],
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'right',
                    },
                }
            });
		},
		error: function(error) {
			console.log(error);
		}
	});
}

function getURLParams(url) {
    let params = {};
    new URLSearchParams(url.replace(/^.*?\?/, '?')).forEach(function(value, key) {
      params[key] = value
    });
    return params;
}

function consultarComunas() {
    let regi_codigo = $('#region').val();
    let mensaje;
    $('#div-alert-filtros').html('');
    
    if (regi_codigo == -1) {
        mensaje = `<div class="alert alert-warning alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>La región seleccionada no es válida.</strong></div></div>`;
        $('#div-alert-filtros').html(mensaje);
        return;
    }

    $.ajax({
        type: 'GET',
        url: window.location.origin+'/admin/iniciativas/comuna',
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
    $('#div-alert-filtros').html('');

    if (comu_codigo == -1) {
        mensaje = `<div class="alert alert-warning alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>La región seleccionada no es válida.</strong></div></div>`;
        $('#div-alert-filtros').html(mensaje);
        return;
    }

    $.ajax({
        type: 'GET',
        url: window.location.origin+'/admin/iniciativas/unidad',
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