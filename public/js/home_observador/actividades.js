const csrftoken = document.head.querySelector(
    "[name~=csrf-token][content]"
).content;

$(document).ready(() => {
    cargarInfoGraficos();
    cargarComunas();
    cargarOrganizaciones();
    // $("#donaChartDiv").hide();
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

    fetch(`${window.location.origin}/observador/dashboard/obtener/comunas`, {
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
    fetch(`${window.location.origin}/observador/dashboard/obtener/organizaciones`, {
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

function cargarInfoGraficos() {
    fetch(`${window.location.origin}/observador/dashboard/obtener/datos-actividades`, {
        method: "POST",
        body: JSON.stringify({
            regi_codigo: $("#regi_codigo").val(),
            comu_codigo: $("#comu_codigo").val(),
            orga_codigo: $("#orga_codigo").val(),
            acti_fecha: $("#acti_fecha").val(),
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
            let labels = [
                "Ejecutada",
                "En avance conforme a plazo",
                "En avance con retraso",
                "Suspendida",
                "Descartada",
            ];
            let datos = [0, 0, 0, 0, 0];
            let porcentajes = [0, 0, 0, 0, 0];

            for (let i in data.actiData) {
                if (labels.indexOf(data.actiData[i].acti_avance) != -1) {
                    datos[labels.indexOf(data.actiData[i].acti_avance)] += 1;
                } else {
                    console.log(
                        `El label ${data.actiData[i].acti_avance} no esta contemplado`
                    );
                }
            }

            let total = datos.reduce((a, b) => a + b, 0);

            for (let i in datos) {
                porcentajes[i] = (datos[i] * 100) / total;
            }

            graficarEstados(datos, labels);
            graficarPorcentajes(porcentajes,labels)
        });
}

function graficarEstados(data, label) {
    const ActividadesEstados = document
        .getElementById("ActiEstados")
        .getContext("2d");
    var myChart1 = new Chart(ActividadesEstados, {
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
                        "rgb(13, 73, 160)",
                    ],
                    borderColor: [
                        "rgb(255, 99, 132)",
                        "rgb(255, 159, 64)",
                        "rgb(75, 192, 192)",
                        "rgb(153, 102, 255)",
                        "rgb(13, 73, 160)",
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

function graficarPorcentajes(data,labels) {
    var ctx = document.getElementById("ActiEstadosP").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            datasets: [
                {
                    data:data,
                    backgroundColor: [
                        "#191d21",
                        "#63ed7a",
                        "#ffa426",
                        "#fc544b",
                        "#6777ef",
                    ],
                },
            ],
            labels: labels,
        },
        options: {
            responsive: true,
            legend: {
                position: "bottom",
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data, inversion) {
                        return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
                    }
                }
            }
        },
    });
}
