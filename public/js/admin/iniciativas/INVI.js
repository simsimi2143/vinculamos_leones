function calcularIndice(inic_codigo) {
    let datos;
    let mecanismo, frecuencia, cobertura, resultados, evaluacion;
    let mecanismo_txt, frecuencia_txt, cobertura_txt, resultados_txt, evaluacion_txt;
    let mecanismo_puntaje, frecuencia_puntaje, cobertura_puntaje, resultados_puntaje, evaluacion_puntaje;
    let resultado1_aux, resultado2_aux;
    let divisor, dividendo;
    let partInicial, partFinal;
    let resuInicial, resuFinal;
    let indice;

    $.ajax({
        type: 'GET',
        url: window.location.origin + '/admin/iniciativa/invi/datos',
        data: {
            iniciativa: inic_codigo
        },
        success: function(resConsultar) {
            respuesta = JSON.parse(resConsultar);
            datos = respuesta.resultado;

            mecanismo = datos.mecanismo;
            frecuencia = datos.frecuencia;

            cobertura = datos.cobertura;
            resultados2 = datos.resultados2;
            evaluacion = datos.evaluacion;
            resultados_puntaje = 0;


            /* Mecanismo */
            if (mecanismo == null) {
                mecanismo_puntaje = 0;
            }
            if (mecanismo.meca_nombre == "Programa de Extensión" || mecanismo.meca_nombre ==
                "Centro de Recursos del Aprendizaje y Bienestar CRAB") {
                mecanismo_puntaje = 66;
            } else {
                mecanismo = mecanismo.meca_nombre;
                mecanismo_puntaje = 100;
            }


            console.log(datos);
            /* Frecuencia */
            if (frecuencia[0].prog_descripcion == null) {
                frecuencia_txt = "Falta Información";
                frecuencia_puntaje = 0;
            }
            /* Temporal */
            if (frecuencia[0].prog_descripcion == 'Temporal') {
                frecuencia_txt = "Temporal";
                frecuencia_puntaje = 66;
            }
            /* Permanente */
            if (frecuencia[0].prog_descripcion == 'Permanente') {
                frecuencia_txt = "Permanente";
                frecuencia_puntaje = 100;
            }

            /* Resultados */
            if (resultados2 != null) {
                dividendo = (isNaN(parseInt(resultados2[0].suma_inicial)) ? 0 : parseInt(resultados2[0]
                    .suma_inicial));
                divisor = (isNaN(parseInt(resultados2[0].suma_final)) ? 0 : parseInt(resultados2[0]
                    .suma_final));
                if (divisor == 0) {
                    resultados_puntaje = 0;
                } else {
                    resultado1_aux = ((dividendo / divisor) * 100) * 0.7;
                    resultados_puntaje = resultado1_aux; /* CAMBIAR CON RESULTADO 2 */
                }
            } else {
                resultados_puntaje = 0;
            }


            /* Cobertura */
            if (cobertura == null) {
                cobertura_puntaje = 0;
            } else {
                divisor = (isNaN(parseInt(cobertura[0].total_docentes_final)) ? 0 : parseInt(
                        cobertura[0].total_docentes_final)) +
                    (isNaN(parseInt(cobertura[0].total_estudiantes_final)) ? 0 : parseInt(cobertura[
                        0].total_estudiantes_final)) +
                    (isNaN(parseInt(cobertura[0].total_funcionarios_final)) ? 0 : parseInt(
                        cobertura[0].total_funcionarios_final));
                if (divisor == null || divisor == 0) {
                    divisor = 1;
                }
                dividendo = (isNaN(parseInt(cobertura[0].total_docentes)) ? 0 : parseInt(cobertura[
                        0].total_docentes)) +
                    (isNaN(parseInt(cobertura[0].total_estudiantes)) ? 0 : parseInt(cobertura[0]
                        .total_estudiantes)) +
                    (isNaN(parseInt(cobertura[0].total_funcionarios)) ? 0 : parseInt(cobertura[0]
                        .total_funcionarios));
                if (dividendo == null) {
                    dividendo = 0;
                }
                cobertura_puntaje = Math.round((dividendo / divisor) * 100);
                if (cobertura_puntaje > 100) {
                    cobertura_puntaje = 100;
                }
            }

            /* Evaluacion */

            if (evaluacion == null) {
                evaluacion_puntaje = 0;
            } else {
                evaluacion_puntaje = parseInt(evaluacion.suma_evaluaciones) / parseInt(evaluacion
                    .total_evaluaciones);
            }

            indice = Math.round(
                0.2 * mecanismo_puntaje +
                0.1 * frecuencia_puntaje +
                0.25 * resultados_puntaje +
                0.1 * cobertura_puntaje +
                0.35 * evaluacion_puntaje
            );

            if (resultados_puntaje == 0) {
                $('#resultados-nombre').text("Sin Datos");
            }
            if (cobertura_puntaje == 0) {
                $('#cobertura-nombre').text("Sin Datos");
            }
            if (evaluacion_puntaje == 0) {
                $('#evaluacion-nombre').text("No Evaluada");
            }
            /* $('#mecanismo-nombre').text(mecanismo_txt);*/
            $('#frecuencia-nombre').text(frecuencia_txt);
            $('#mecanismo-puntaje').text(mecanismo_puntaje);
            $('#frecuencia-puntaje').text(frecuencia_puntaje);
            $('#cobertura-puntaje').text(cobertura_puntaje);
            $('#resultados-puntaje').text(resultados_puntaje);
            $('#evaluacion-puntaje').text(evaluacion_puntaje);
            $('#valor-indice').text(indice);
            $('#modalINVI').modal('show');
            /* console.log(datos.length);
            console.log(cobertura[0]); */
        },
        error: function(error) {
            console.log(datos);
        }
    })
};
