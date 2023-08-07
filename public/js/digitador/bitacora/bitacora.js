$(document).ready(function() {
    listarParticipantes();
});

function listarParticipantes() {
    let acti_codigo = $('#codigo_actividad').val();
    let datoAsistentes, fila, alertError;
    $('#diri_codigo').val('').change();
    
    $.ajax({
        type: 'GET',
        url: window.location.origin+'/digitador/actividad/listar-participantes',
        data: {
            actividad: acti_codigo
        },
        success: function(resListar){
            respuesta = JSON.parse(resListar);
            $('#body-tabla-participantes').empty();

            if (!respuesta.estado){
                if (respuesta.resultado != ''){
                    alertError = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                    $('#div-alert-participantes').html(alertError);
                }
                return;
            }

            datoAsistentes = respuesta.resultado;
            datoAsistentes.forEach(registro => {
                fila = '<tr>'+
                            '<td>'+registro.asis_nombre+'</td>'+
                            '<td>'+registro.asis_apellido+'</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-icon btn-danger" onclick="eliminarParticipante('+registro.asis_codigo+')"><i class="fas fa-trash"></i></button>'+
                            '</td>'+
                        '</tr>';
                $('#body-tabla-participantes').append(fila);
            });
        },
        error: function(error){
            console.log(error);
        }
    });
}

function agregarParticipantes() {
    let asis_nombre = $('#asis_nombre').val();
    let asis_apellido = $('#asis_apellido').val();
    let acti_codigo = $('#codigo_actividad').val();
    let alert;
    $('#div-alert-participantes').html('');
    $.ajax({
        type:'POST',
        url:window.location.origin+'/digitador/actividad/agregar-participante',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            nombre: asis_nombre,
            apellido: asis_apellido,
            codigo: acti_codigo,
            dirigente: 0,
            diricodigo: 0,
        },
        success: function(asisGuardar){
            respuesta = JSON.parse(asisGuardar);
            if (!respuesta.estado){
                alert = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-participantes').html(alert);
            }
            alert = `<div class="alert alert-success alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            $('#asis_nombre').val('');
            $('#asis_apellido').val('');
            $('#modalCrearParticipante').modal('hide');
            listarParticipantes();
            $('#div-alert-participantes').html(alert);
        },
        error: function(error){
            console.log(error);
        }
    });
}

function agregarDirigente() {
    let diri_codigo = $('#diri_codigo').val();
    let asis_nombre = '';
    let asis_apellido = '';
    let acti_codigo = $('#codigo_actividad').val();
    let alert;
    $('#div-alert-participantes').html('');
    if (diri_codigo != '' && diri_codigo != null) {
        $.ajax({
            type: 'GET',
            url: window.location.origin+'/digitador/actividad/obtener-dirigente',
            data: {
                codigo: diri_codigo
            },
            success: function(resListar){
                respuesta = JSON.parse(resListar);
                asis_nombre = respuesta.diri_nombre;
                asis_apellido = respuesta.diri_apellido;
                $.ajax({
                    type:'POST',
                    url:window.location.origin+'/digitador/actividad/agregar-participante',
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        diricodigo: diri_codigo,
                        nombre: asis_nombre,
                        apellido: asis_apellido,
                        codigo: acti_codigo,
                        dirigente: 1,
                    },
                    success: function(asisGuardar){
                        respuesta = JSON.parse(asisGuardar);
                        if(!respuesta.estado){
                            alert = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                            $('#div-alert-participantes').html(alert);
                        }
                        alert = `<div class="alert alert-success alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                        listarParticipantes();
                        $('#div-alert-participantes').html(alert);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            },
            error: function(error){
                console.log(error);
            }
        });
    }
}

function eliminarParticipante(asis_codigo) {
    let alert ;
    $('#div-alert-participantes').html('');

    $.ajax({
        type: 'POST',
        url: window.location.origin+'/digitador/actividad/eliminar-participante',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            codigo: asis_codigo,
        },
        success: function(resEliminar) {
            respuesta = JSON.parse(resEliminar);
            if (!respuesta.estado) {
                alert = `<div class="alert alert-danger alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
                $('#div-alert-participantes').html(alert);
                return;
            }
            alert = `<div class="alert alert-success alert-dismissible show fade mb-3"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>${respuesta.resultado}</strong></div></div>`;
            listarParticipantes();
            $('#div-alert-participantes').html(alert);
        },
        error: function(error) {
            console.log(error);
        }
    });
}
