const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;

$(document).ready(function(){
   $("#dirigente").hide();
   $("#organizacion").hide();
   $("#div-select-dirigentes").hide();
});

function cargarDirigentes(){
    let selectOrganizacion = $('#orga_codigo').val();
    $("#organizacion").val(null)
    fetch(window.location.origin+"/digitador/donaciones/obtener-dirigentes",{
        method:'POST',
        body: JSON.stringify({
            organizacion:selectOrganizacion
        }),
        headers:{
            'Content-Type': 'aplication/json',
            'X-CSRF-TOKEN': csrftoken
        }
    }).then(response =>{
        return response.json()
    }).then(data => {
        $("#organizacion").val(selectOrganizacion);
        var opciones = '<option value="" selected disabled>Seleccione...</option>';
        for(let i in data.resultado){
            opciones += '<option value="'+data.resultado[i].diri_codigo+'">'+data.resultado[i].diri_nombre+' '+data.resultado[i].diri_apellido+'</option>';
        }
        // document.getElementById('diri_codigo').innerHTML = opciones;
        $("#diri_codigo").html(opciones);
    });
}

function MostrarDirigentes(){
    if($("#esdirigente").prop('checked') == true){
        $("#div-select-dirigentes").show();
    }else if($("#esdirigente").prop('checked') == false){
        $("#div-select-dirigentes").hide();
        $("#dirigente").val(null);
        $("#dona_nombre_solicitante").val(null);
        $("#dona_cargo_solicitante").val(null);
    }
}

function CargarDatosDirigente(){
    var nombre = null;
    var diri_codigo = null;
    $("#dona_nombre_solicitante").empty();
    if($("#diri_codigo").val() != null){
        diri_codigo = $("#diri_codigo").val();
        nombre = $("#diri_codigo").find("option:selected").text();
        $("#dona_nombre_solicitante").val(nombre);
        $("#dirigente").val(diri_codigo);
        $("#dona_cargo_solicitante").val("Dirigente");
    }

}
