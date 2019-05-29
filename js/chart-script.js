var all_count = $('#all-count').html();
var male_count = $('#male-count').html();
var female_count = $('#female-count').html();
var male_positive = $('#male-positive').html();
var male_negative = $('#male-negative').html();
var female_positive = $('#female-positive').html();
var female_negative = $('#female-negative').html();

var ctx = document.getElementById("user-chart").getContext('2d');
		var myChart = new Chart(ctx, {
			type : 'pie',
			data: {
				labels: ['Male with disease','Male with no disease', 'Female with disease', 'Female with no disease'],
				datasets:[{
					// label:'Proportion of male to female patients with and without disease',
					data:[male_positive,male_negative,female_positive,female_negative],
					backgroundColor: [
					// 'rgba(255, 99, 132, 0.2)',
	                'rgba(100, 200, 100, 0.9)',
	                'rgba(255, 206, 86, 0.9)',
	                'rgba(106, 50, 231, 0.9)',
	                'rgba(50, 150, 200, 0.9)'
					],
					borderColor:[
					// 'rgba(255,99,132,1)',
	                'rgba(100, 200, 100, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(106, 50, 231, 1)',
	                'rgba(50, 150, 200, 1)'
					],
					borderWidth: 1
					}],
			},
			options:{
				title: {
					display: true,
					text: 'Proportion of male to female patients with and without disease'
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
					// label:'Proportion of predictions made by males vs females',
					data:[male_negative + male_positive,female_negative + female_positive],
					backgroundColor: [
					// 'rgba(255, 99, 132, 0.2)',
	                'rgba(98, 119, 235, 0.9)',
	                'rgba(255, 206, 86, 0.9)'
					],
					borderColor:[
					// 'rgba(255,99,132,1)',
	                'rgba(98, 119, 235, 1)',
	                'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
					}],
			},
			options:{
				title: {
					display: true,
					text: 'Proportion of predictions made by males vs females'
				}
			}
		}
);

