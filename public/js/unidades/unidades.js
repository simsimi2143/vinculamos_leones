const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;

$(document).ready(function(){
    cargarTipoUnidades();
})

function getURLParams(url) {
    let params = {};
    new URLSearchParams(url.replace(/^.*?\?/, '?')).forEach(function(value, key) {
      params[key] = value
    });
    return params;
}

function cargarTipoUnidades(){
    let selectComuna = $('#comuna').val();
    fetch("obtener-tipo",{
        method: 'POST',
        body: JSON.stringify({
            comuna:selectComuna
        }),
        headers:{
            'Content-Type': 'aplication/json',
            'X-CSRF-TOKEN': csrftoken
        }
    }).then(response => {
        return response.json();
    }).then(data => {
        var datos = data.tuni;
        $('#tipunidad').find('option').not(':first').remove();
        $('#tipunidad').prop('selectedIndex', 0);
        for(let i in datos){
            if(datos[i].comu_codigo == selectComuna){
                $('#tipunidad').append(new Option(datos[i].tuni_nombre, datos[i].tuni_codigo));
            }
        }

        let tuni_codigo = getURLParams(window.location.href)['tipunidad'];

        if (tuni_codigo == undefined || tuni_codigo == null) $('#tipunidad').val('').change();
        else $('#tipunidad').val(tuni_codigo).change();
        if ($('#tipunidad').val() == null) $('#tipunidad').val('').change();


    });


}

