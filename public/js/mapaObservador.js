const csrftoken = document.head.querySelector(
    "[name~=csrf-token][content]"
).content;
var map = L.map("map");
map.setView([-35.675147, -71.542969], 5);

L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 18,
    attribution: "Map data &copy; OpenStreetMap contributors",
}).addTo(map);

var sidebar = L.control.sidebar("sidebar", {
    closeButton: true,
    position: "right",
});
map.addControl(sidebar);
const legend = L.control.Legend({
    position: "bottomleft",
    collapsed: false,
    symbolWidth: 24,
    opacity: 1,
    column: 1,
    title:"Índice de Criticidad",
    legends: [{
        label: "Sin datos disponibles",
        type: "rectangle",
        color: "#9A9A9A",
        fillColor: "#9A9A9A",
        weight: 10
    },{
        label: "Criticidad alta",
        type: "rectangle",
        color: "#FF0000",
        fillColor: "#FF0000",
        weight: 10
    },{
        label: "Criticidad media",
        type: "rectangle",
        color: "#FCFC02",
        fillColor: "#FCFC02",
        weight: 10
    },{
        label: "Criticidad baja",
        type: "rectangle",
        color: "#20FC02",
        fillColor: "#20FC02",
        weight: 10
    }]
})
.addTo(map);
var selectRegion = document.getElementById("region");

selectRegion.addEventListener("change", function () {
    var codigo = selectRegion.value;
    if (codigo == "TPCA") {
        map.setView([-20.05800242483127, -69.6016620019451], 8);
    }
    if (codigo == "ANTOF") {
        map.setView([-23.622948005880826, -70.38653400188454], 8);
    }
    if (codigo == "ATCMA") {
        map.setView([-27.360943768381176, -70.21231254414171], 8);
    }
    if (codigo == "COQ") {
        map.setView([-29.964971614033693, -71.30276740916332], 8);
    }
    if (codigo == "VALPO") {
        map.setView([-32.67610482667941, -70.97993181519182], 8);
    }
    if (codigo == "LGBO") {
        map.setView([-34.39256174095372, -71.50276110351031], 8);
    }
    if (codigo == "MAULE") {
        map.setView([-35.55199787816966, -71.58025873046742], 8);
    }
    if (codigo == "BBIO") {
        map.setView([-37.33128467390922, -72.50630268253872], 8);
    }
    if (codigo == "ARAUC") {
        map.setView([-38.60414186054545, -72.39314201897861], 8);
    }
    if (codigo == "LAGOS") {
        map.setView([-41.84071943384987, -72.99956719597715], 8);
    }
    if (codigo == "AYSEN") {
        map.setView([-46.92970078731946, -73.50556554876012], 8);
    }
    if (codigo == "MAG") {
        map.setView([-46.92970078731946, -73.50556554876012], 6);
    }
    if (codigo == "RM") {
        map.setView([-33.50495444696879, -70.64304486253128], 8);
    }
    if (codigo == "RIOS") {
        map.setView([-39.89818766954952, -72.61076139605444], 8);
    }
    if (codigo == "AYP") {
        map.setView([-18.503321206562635, -69.76088125287234], 8);
    }
    if (codigo == "NUBLE") {
        map.setView([-36.582966574576375, -72.08890327576118], 8);
    }
});

function cargarComunas() {
    var region = $("#region").val();
    sidebar.hide();
    fetch(`${window.location.origin}/observador/mapa/obtener/regiones`, {
        method: "POST",
        body: JSON.stringify({
            region: region,
        }),
        headers: {
            "Content-Type": "aplication/json",
            "X-CSRF-TOKEN": csrftoken,
        },
    })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            var opciones = "<option value=''>Seleccione...</option>";
            for (let i in data.comunas) {
                opciones += `<option value='${data.comunas[i].comu_codigo}'>${data.comunas[i].comu_nombre}</option>`;
            }
            $("#comunas").html(opciones);
            $("#tipo_orga").html(
                "<option value = '' disable selected>Seleccione...</option>"
            );
            $("#organizacion").html(
                "<option value = '' disable selected>Seleccione...</option>"
            );
            $('#div-alert-undifined').hide();
        });
}

function cargarInfoComuna() {
    var comuna = $("#comunas").val();
    var region = $("#region").val();
    fetch(`${window.location.origin}/observador/mapa/obtener/comuna`, {
        method: "POST",
        body: JSON.stringify({
            comunas: comuna,
            region: region,
        }),
        headers: {
            "Content-Type": "aplication/json",
            "X-CSRF-TOKEN": csrftoken,
        },
    })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            sidebar.hide();
            $("#organizacion").html(
                "<option value = '' disable selected>Seleccione...</option>"
            );
            var percepcion = 0;
            var clima = 0;
            var prensa = 0;
            var operaciones = 0;
            var comu_avg = 0;
            var color_comuna = "";
            var escala = [100, 90, 80, 70, 60, 50, 40, 30, 20, 10, 0];

            var opciones = "<option value=''>Seleccione...</option>";
            for (let i in data.entornos) {
                opciones += `<option value='${data.entornos[i].ento_codigo}'>${data.entornos[i].ento_nombre}</option>`;
            }
            $("#tipo_orga").html(opciones);

            var myIcon = L.icon({
                iconUrl: `${window.location.origin}/public/img/camanchaca.png`,
                iconSize: [25, 25],
                iconAnchor: [12, 24],
            });

            for (let i in data.unidades) {
                if (data.unidades[i].unid_geoubicacion != null) {
                    var coords = JSON.parse(data.unidades[i].unid_geoubicacion);

                    var marker = L.marker([coords.lat, coords.lng], {
                        icon: myIcon,
                    })
                        .addTo(map)
                        .on("click", () => {
                            var info = `<b>Responsable de la unidad:</b><br>${data.unidades[i].unid_responsable}<br>
                            <b>Descripción:</b><br>${data.unidades[i].unid_descripcion}<br>
                            <b>Cargo de la unidad:</b><br> ${data.unidades[i].unid_nombre_cargo}<br>
                            <div class="text-right">
                                <a type=button class='btn btn-icon btn-warning' href='${window.location.origin}/observador/unidades/listar'>Ver Unidades</a>
                            </div>`;
                            document.getElementById("titulo").innerHTML =
                                data.unidades[i].unid_nombre;
                            document.getElementById("informacion").innerHTML =
                                info;
                            sidebar.toggle();
                        });
                }
            }
            
            for (let i in data.operaciones) {
                var indice = data.operaciones[i].evop_valor;
                if (indice >= 0 && indice <= 9) {
                    operaciones += escala[indice];
                } else {
                    operaciones += escala[10];
                }
            }
            if (data.operaciones.length == 0) operaciones = 0;
            else operaciones = Math.round(operaciones / data.operaciones.length);
            
            for (let i in data.percepcion) {
                percepcion += data.percepcion[i].enpe_puntaje;
            }
            percepcion = Math.round(percepcion/3);
            
            for (let i in data.prensa) {
                prensa += data.prensa[i].evpr_valor;
            }
            prensa = Math.round(prensa);
            
            for (let i in data.clima) {
                clima += data.clima[i].encl_puntaje;
            }
            if (data.n_cat_cl == 0) clima = 0;
            else clima = Math.round(clima / data.n_cat_cl);
            
            comu_avg = Math.round(
                percepcion * 0.25 +
                clima * 0.25 +
                prensa * 0.25 +
                operaciones * 0.25
            );


            if (comu_avg > 0 && comu_avg <= 50) {
                color_comuna = "red";
            } else if (comu_avg >= 51 && comu_avg <= 75) {
                color_comuna = "yellow";
            } else if (comu_avg >= 76 && comu_avg <= 100) {
                color_comuna = "green";
            }


            if(color_comuna == "" ){
                mensaje = `<div class="alert alert-warning alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button><strong>No se puede determinar el índice de criticidad porque no se ha informado acerca de las encuestas de clima y percepción, ni de las evaluaciones de operación y prensa.</strong></div></div>`;
                $('#div-alert-undifined').html(mensaje);
                $('#div-alert-undifined').show();
            }else{
                $('#div-alert-undifined').hide();
            }

            for (let i in data.comuna) {
                var coords = JSON.parse(data.comuna[i].comu_geoubicacion);
                map.setView([coords.lat, coords.lng], 14);

                var limites = JSON.parse(data.comuna[i].comu_geolimites);

                var marker = L.marker([coords.lat, coords.lng])
                    .addTo(map)
                    .on("click", function () {
                        var info = `<b>Región:</b> ${
                            data.comuna[i].regi_nombre
                        }<br><b>N° de instalaciones:</b> ${
                            Object.keys(data.unidades).length
                        }
                    <br><b>N° de organizaciones:</b> ${
                        Object.keys(data.organizaciones).length
                    }<br><b>N° de actividades:</b> ${Object.keys(data.actividades).length}
                    <br><b>N° de donaciones:</b> ${Object.keys(data.donaciones).length}
                    <br><b>Índice de criticidad:</b> ${ isNaN(comu_avg) ? 0 : comu_avg }
                    <br><b>Encuesta de clima: </b>${ clima }
                    <br><b>Encuesta de percepción: </b>${ percepcion }
                    <br><b>Evaluación de operaciones: </b>${ operaciones }
                    <br><b>Evaluación de prensa: </b>${ prensa }
                    `;

                        $("#titulo").html(data.comuna[i].comu_nombre);
                        $("#informacion").html(info);
                        sidebar.toggle();
                    });

                var figura = [];
                for (var j = 0; j < limites.clat.length; j++) {
                    figura.push([limites.clat[j], limites.clng[j]]);
                }

                var polygon = L.polygon(figura, {
                    color: color_comuna,
                }).addTo(map);
            }
        });
}

function cargarOrganizaciones() {
    var entorno = $("#tipo_orga").val();
    var comuna = $("#comunas").val();
    sidebar.hide();

    fetch(`${window.location.origin}/observador/mapa/obtener/orga`, {
        method: "POST",
        body: JSON.stringify({
            entorno: entorno,
            comuna: comuna,
        }),
        headers: {
            "Content-Type": "aplication/json",
            "X-CSRF-TOKEN": csrftoken,
        },
    })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            var opciones = "<option value=''>Seleccione...</option>";
            for (let i in data.organizacion) {
                opciones += `<option value = '${data.organizacion[i].orga_codigo}'>${data.organizacion[i].orga_nombre}</option>`;
            }
            $("#organizacion").html(opciones);
        });
}

function cargarInfoOrganizacion() {
    var entorno = $("#tipo_orga").val();
    var organizacion = $("#organizacion").val();
    sidebar.hide();

    fetch(`${window.location.origin}/observador/mapa/obtener/orga-data`, {
        method: "POST",
        body: JSON.stringify({
            org: organizacion,
            entorno: entorno,
        }),
        headers: {
            "Content-Type": "aplication/json",
            "X-CSRF-TOKEN": csrftoken,
        },
    })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            var coords = "";
            var ico = "";
            var orga_nombre = "";
            var donaciones = "";
            var actividades = "";

            for (let i in data.organizacion) {
                coords = JSON.parse(data.organizacion[i].orga_geoubicacion);
                orga_nombre = data.organizacion[i].orga_nombre;
                orga_descripcion = data.organizacion[i].orga_descripcion;
                orga_direcion = data.organizacion[i].orga_domicilio == null ? "No específicada" : data.organizacion[i].orga_domicilio;
                orga_socios = data.organizacion[i].orga_cantidad_socios == null ? "No específica" : data.organizacion[i].orga_cantidad_socios;
                orga_fecha = data.organizacion[i].orga_fecha_vinculo == null ? "No específica":new Date(data.organizacion[i].orga_fecha_vinculo);
                final_fecha = orga_fecha == "No específica" ? "No específica" :  orga_fecha.getDate()+"/"+(orga_fecha.getMonth() + 1) + "/" + orga_fecha.getFullYear();
            }
            
            for(let i in data.donaciones){
                donaciones += `${parseInt(i)+1}.- ${data.donaciones[i].dona_motivo}<br>`
            }

            for(let i in data.actividades){
                actividades += `${parseInt(i)+1}.- ${data.actividades[i].acti_nombre}<br>`
            }

            for (let i in data.entorno) {
                ico = data.entorno[i].ento_ruta_icono;
                ento_nombre = data.entorno[i].ento_nombre;
            }

            map.setView([coords.lat, coords.lng], 20);
            var mrIcon = L.icon({
                iconUrl: `${window.location.origin}/${ico}`,
                iconSize: [22, 35],
                iconAnchor: [12, 24],
            });
            var marker = L.marker([coords.lat, coords.lng], {
                icon: mrIcon,
            })
                .addTo(map)
                .on("click", function () {
                    var info =`<b>Descripción: </b>${orga_descripcion}<br><b>Dirección: </b>${orga_direcion}<br>
                    <b>N° de socios: </b>${orga_socios}<br><b>Fecha de vinculación: </b>${final_fecha}<br>
                    <b>Últimas donaciones: </b><br>${donaciones}<br><b>Últimas actividades:</b><br>${actividades}`;

                    $("#titulo").html(orga_nombre);
                    $("#informacion").html(info);
                    sidebar.toggle();
                });
        });
}

map.on("click", function () {
    sidebar.hide();
});



L.DomEvent.on(sidebar.getCloseButton(), "click", function () {
    console.log("Close button clicked.");
});
