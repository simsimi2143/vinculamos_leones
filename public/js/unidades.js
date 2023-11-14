const csrftoken = document.head.querySelector(
    "[name~=csrf-token][content]"
).content;

var map = L.map("map").setView([-33.42486299783035, -70.68914200046231], 4);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

function cargarCoordenadas() {
    var comuna = document.getElementById("comu_codigo").value;

    fetch(window.location.origin + "/admin/organizaciones/comuna", {
        method: "POST",
        body: JSON.stringify({
            comuna: comuna,
        }),
        headers: {
            "Content-Type": "aplication/json",
            "X-CSRF-TOKEN": csrftoken,
        },
    }).then(response => {
        return response.json();
    }).then(data => {
        for (let i in data.comuna) {
            var coords = JSON.parse(data.comuna[i].comu_geoubicacion);
            // map.flyTo([coords.lat,coords.lng],14);
            map.setView([coords.lat, coords.lng], 14);
        }
    })
}
var marcador = L.marker();

function cargarUbicaicon(e) {
    var eliminarMarcador = () => map.removeLayer(marcador);
    eliminarMarcador;
    marcador.setLatLng(e.latlng).addTo(map);
    var coordendas = marcador.getLatLng();
    document.getElementById("lat").value = coordendas.lat;
    document.getElementById("lng").value = coordendas.lng;

}

map.on('click', cargarUbicaicon);
