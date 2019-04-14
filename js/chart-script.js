var all_count = $('#all-count').html();
var male_count = $('#male-count').html();
var female_count = $('#female-count').html();
var male_positive = $('#male-positive').html();
var male_negative = $('#male-negative').html();
var female_positive = $('#female-positive').html();
var female_negative = $('#female-negative').html();

var ctx = document.getElementById("user-chart").getContext('2d');
		var myChart = new Chart(ctx, {
			type : 'horizontalBar',
			data: {
				labels: ['Male', 'Male', 'Female', 'Female'],
				datasets:[{
					label:'Number of patients by diagnosis and sex',
					data:[male_positive, male_negative,female_positive,female_negative],
					backgroundColor: [
					// 'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.9)',
	                'rgba(255, 206, 86, 0.9)'
					],
					borderColor:[
					// 'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
					}],
			},
			options:{
				scales:{
					yAxes : [{
						ticks :{
							beginAtZero : true
						}
					}]
				}
			}
		}
);


var ctx = document.getElementById("user-health").getContext('2d');
		var myChart = new Chart(ctx, {
			type : 'pie',
			data: {
				labels: ['Male', 'Female'],
				datasets:[{
					label:'Number of Patients',
					data:[male_count,female_count],
					backgroundColor: [
					// 'rgba(255, 99, 132, 0.2)',
	                'rgba(98, 119, 235, 0.9)',
	                'rgba(255, 206, 86, 0.9)'
					],
					borderColor:[
					// 'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
					}],
			}
		}
);

var ctx = document.getElementById("user-chart-line").getContext('2d');
		var myChart = new Chart(ctx, {
			type : 'line',
			data: {
				labels: ['Male', 'Female'],
				datasets:[{
					label:'Number of Patients',
					data:[male_count,female_count],
					backgroundColor: [
					// 'rgba(255, 99, 132, 0.2)',
	                'rgba(98, 157, 235, 0.9)',
	                'rgba(255, 206, 86, 0.9)'
					],
					borderColor:[
					// 'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
					}],
			}
		}
);



// var chartInstance = new FusionCharts({
//       type: 'column2D',
//       // width: '700', // Width of the chart
//       // height: '400', // Height of the chart
//       dataFormat: 'json', // Data type
//       renderAt:'user-chart', //container where the chart will render
//       dataSource: {
//           "chart": {
//               "caption": "Countries With Most Oil Reserves [2017-18]",
//               "subCaption": "In MMbbl = One Million barrels",
//               "xAxisName": "Country",
//               "yAxisName": "Reserves (MMbbl)",
//               "numberSuffix": "K",
//               "theme": "fusion",
//           },
//           // Chart Data
//           "data": [{
//               "label": "Venezuela",
//               "value": "290"
//           }, {
//               "label": "Saudi",
//               "value": "260"
//           }, {
//               "label": "Canada",
//               "value": "180"
//           }, {
//               "label": "Iran",
//               "value": "140"
//           }, {
//               "label": "Russia",
//               "value": "115"
//           }, {
//               "label": "UAE",
//               "value": "100"
//           }, {
//               "label": "US",
//               "value": "30"
//           }, {
//               "label": "China",
//               "value": "30"
//           }]
//       }
// });
// // Render
// chartInstance.render();