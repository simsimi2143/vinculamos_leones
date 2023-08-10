const csrftoken = document.head.querySelector(
    "[name~=csrf-token][content]"
).content;

$(document).ready(() => {
    cargarInformacionGraficos();
    cargarComunas();
    cargarOrganizaciones();
    $("#donaChartDiv").hide();
});

function getURLParams(url) {
    let params = {};
    new URLSearchParams(url.replace(/^.*?\?/, "?")).forEach(function (
        value,
        key
    ) {
        params[key] = value;
    });
    return params;
}

function cargarComunas() {
    var regiones = document.getElementById("regi_codigo").value;

    fetch(`${window.location.origin}/admin/dashboard/obtener/comunas`, {
        method: "POST",
        body: JSON.stringify({ region: regiones }),
        headers: {
            "Content-Type": "aplication/json",
            "X-CSRF-TOKEN": csrftoken,
        },
    })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            var comunas = data.comunas;
            var organizaciones = data.organizaciones;

            $("#comu_codigo").find("option").not(":first").remove();
            $("#comu_codigo").prop("selectedIndex", 0);

            $("#orga_codigo").find("option").not(":first").remove();
            $("#orga_codigo").prop("selectedIndex", 0);

            for (let i in comunas) {
                if (comunas[i].regi_codigo == regiones && regiones != "") {
                    $("#comu_codigo").append(
                        new Option(
                            comunas[i].comu_nombre,
                            comunas[i].comu_codigo
                        )
                    );
                } else {
                    $("#comu_codigo").append(
                        new Option(
                            comunas[i].comu_nombre,
                            comunas[i].comu_codigo
                        )
                    );
                }
            }

            for (let i in organizaciones) {
                if (
                    organizaciones[i].regi_codigo == regiones &&
                    regiones != ""
                ) {
                    $("#orga_codigo").append(
                        new Option(
                            organizaciones[i].orga_nombre,
                            organizaciones[i].orga_codigo
                        )
                    );
                } else {
                    $("#orga_codigo").append(
                        new Option(
                            organizaciones[i].orga_nombre,
                            organizaciones[i].orga_codigo
                        )
                    );
                }
            }

            let orgaCodigo = getURLParams(window.location.href)["orga_codigo"];
            let comuCodigo = getURLParams(window.location.href)["comu_codigo"];

            if (comuCodigo == undefined || comuCodigo == null)
                $("#comu_codigo").val("").change();
            else $("#comu_codigo").val(comuCodigo).change();
            if ($("#comu_codigo").val() == null)
                $("#comu_codigo").val("").change();

            if (orgaCodigo == undefined || orgaCodigo == null)
                $("#orga_codigo").val("").change();
            else $("#orga_codigo").val(orgaCodigo).change();
            if ($("#orga_codigo").val() == null)
                $("#orga_codigo").val("").change();
        });
}

function cargarOrganizaciones() {
    var comunas = document.getElementById("comu_codigo").value;
    fetch(`${window.location.origin}/admin/dashboard/obtener/organizaciones`, {
        method: "POST",
        body: JSON.stringify({ comuna: comunas }),
        headers: {
            "Content-Type": "aplication/json",
            "X-CSRF-TOKEN": csrftoken,
        },
    })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            var organizaciones = data.organizaciones;

            $("#orga_codigo").find("option").not(":first").remove();
            $("#orga_codigo").prop("selectedIndex", 0);

            for (let i in organizaciones) {
                if (organizaciones[i].regi_codigo == comunas && comunas != "") {
                    $("#orga_codigo").append(
                        new Option(
                            organizaciones[i].orga_nombre,
                            organizaciones[i].orga_codigo
                        )
                    );
                } else {
                    $("#orga_codigo").append(
                        new Option(
                            organizaciones[i].orga_nombre,
                            organizaciones[i].orga_codigo
                        )
                    );
                }
            }

            let orgaCodigo = getURLParams(window.location.href)["orga_codigo"];

            if (orgaCodigo == undefined || orgaCodigo == null)
                $("#orga_codigo").val("").change();
            else $("#orga_codigo").val(orgaCodigo).change();
            if ($("#orga_codigo").val() == null)
                $("#orga_codigo").val("").change();
        });
}

function cargarInformacionGraficos() {
    fetch(`${window.location.origin}/admin/dashboard/obtener/datos`, {
        method: "POST",
        body: JSON.stringify({
            regi_codigo: $("#regi_codigo").val(),
            comu_codigo: $("#comu_codigo").val(),
            orga_codigo: $("#orga_codigo").val(),
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
            let datos = [];
            let labels = [];

            for (let i in data.pilares) {
                if (labels.indexOf(data.pilares[i].pila_nombre) == -1) {
                    labels.push(data.pilares[i].pila_nombre);
                    datos[labels.indexOf(data.pilares[i].pila_nombre)] = 1;
                } else {
                    datos[labels.indexOf(data.pilares[i].pila_nombre)] += 1;
                }
            }

            graficarPilares(datos, labels);

            if (data.donaciones != undefined) {
                $("#donaChartDiv").show();

                let total = [];
                let nDonacion = [];
                let nombre = "";
                for (let i in data.donaciones) {
                    nDonacion[i] = parseInt(i) + 1;
                    total[i] = data.donaciones[i].dona_monto;
                    nombre = data.donaciones[i].orga_nombre;
                }
                $("#titleDonaChart").html(`Montos aportados para ${nombre}`);
                graficarDonaOrganizacion(nDonacion, total);
            }
        });
}

function graficarDonaOrganizacion(labels, data) {
    var ctx = document.getElementById("donaChart").getContext("2d");

    var myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Donación",
                    data: data,
                    backgroundColor: "rgba(58,222,216,0.5)",
                    borderColor: "rgba(58,222,216,.09)",
                    borderWidth: 1,
                    fill: true,
                },
            ],
        },
        options: {
            legend: {
                display: false,
            },
            responsive: true,
            tooltips: {
                mode: "index",
                intersect: false,
            },
            hover: {
                mode: "nearest",
                intersect: true,
            },
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true,
                            callback: function (value, index, values) {
                                return "$" + value.toLocaleString("es-CL");
                            },
                        },
                    },
                ],
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data, inversion) {
                        var xLabel = data.datasets[tooltipItem.datasetIndex].label;
                        var yLabel = tooltipItem.yLabel >= 1000 ? '$' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : '$' + tooltipItem.yLabel;
                        return xLabel + ': ' + yLabel;
                    }
                }
            }
        },
    });
}

function graficarPilares(data, label) {
    const pilares = document.getElementById("OrgaChart").getContext("2d");
    var myChart1 = new Chart(pilares, {
        type: "horizontalBar",
        data: {
            labels: label,
            datasets: [
                {
                    label: "Cantidad",
                    data: data,
                    borderWidth: 2,
                    backgroundColor: [
                        "rgb(255, 99, 132)",
                        "rgb(255, 159, 64)",
                        "rgb(75, 192, 192)",
                        "rgb(153, 102, 255)",
                    ],
                    borderColor: [
                        "rgb(255, 99, 132)",
                        "rgb(255, 159, 64)",
                        "rgb(75, 192, 192)",
                        "rgb(153, 102, 255)",
                    ],
                    borderWidth: 2.5,
                    pointBackgroundColor: "#ffffff",
                    pointRadius: 4,
                },
            ],
        },
        options: {
            indexAxis: "y",
            legend: {
                display: false,
            },

            scales: {
                yAxes: [
                    {
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
                            stepSize: 2,
                            fontColor: "#9aa0ac",
                        },
                        gridLines: {
                            display: true,
                        },
                    },
                ],
            },
            responsive: true,
        },
    });
}
