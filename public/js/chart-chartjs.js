"use strict";


var draw = Chart.controllers.line.prototype.draw;
Chart.controllers.lineShadow = Chart.controllers.line.extend({
	draw: function () {
		draw.apply(this, arguments);
		var ctx = this.chart.chart.ctx;
		var _stroke = ctx.stroke;
		ctx.stroke = function () {
			ctx.save();
			ctx.shadowColor = '#00000075';
			ctx.shadowBlur = 10;
			ctx.shadowOffsetX = 8;
			ctx.shadowOffsetY = 8;
			_stroke.apply(this, arguments)
			ctx.restore();
		}
	}
});
var ctx = document.getElementById("unidadesChart").getContext('2d');
var myChart = new Chart(ctx, {
	type: 'horizontalBar',
	data: {
		labels: ["Cuidado Entorno", "Vida Sana", "Cercanía"],
		datasets: [{
			label: 'Puntuación',
			data: [8,7,12],
			borderWidth: 2,
			backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',],
			borderColor:
            ['rgb(255, 99, 13)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)'],
			borderWidth: 2.5,
			pointBackgroundColor: '#ffffff',
			pointRadius: 4
		}]
	},
	options: {
        indexAxis: 'y',
		legend: {
			display: false
		},

		scales: {
			yAxes: [{
				gridLines: {
					drawBorder: true,
					color: '#f2f2f2',
				}
			}],
			xAxes: [{
				ticks: {
					display: true,
                    beginAtZero: true,
					stepSize: 5,
					fontColor: "#9aa0ac",
				},
				gridLines: {
					display: true
				}
			}]
		},
        responsive: true,
	}
});

var ctx = document.getElementById("organizacionesChart").getContext('2d');
var myChart = new Chart(ctx, {
	type: 'horizontalBar',
	data: {
		labels: ["Sindicatos/Gremios","Empresas","Ins. Educacionales","Gobierno","Soc.Civil"],
		datasets: [{
			label: 'Puntuación',
			data: [2,3,2,2,7],
			borderWidth: 2,
			backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)'],
			borderColor:[
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)'],
			borderWidth: 2.5,
			pointBackgroundColor: '#ffffff',
			pointRadius: 4
		}]
	},
	options: {
        indexAxis: 'y',
		legend: {
			display: false
		},

		scales: {
			yAxes: [{
				gridLines: {
					drawBorder: true,
					color: '#f2f2f2',
				}
			}],
			xAxes: [{
				ticks: {
					display: true,
                    beginAtZero: true,
					stepSize: 5,
					fontColor: "#9aa0ac",
				},
				gridLines: {
					display: true
				}
			}]
		},
        responsive: true,
	}
});

var ctx = document.getElementById("inverisionesChart").getContext('2d');
var myChart = new Chart(ctx, {
	type: 'doughnut',
	data: {
		datasets: [{
			data: [
				30,
				26,
				44,
			],
			backgroundColor: [
				'#191d21',
				'#63ed7a',
				'#ffa426',
			],
			label: 'Porcentaje',
		}],
		labels: [
			"Cuidado Entorno", "Vida Sana", "Cercanía"
		],
	},
	options: {
		responsive: true,
		legend: {
			position: 'bottom',
		},
	}
});
