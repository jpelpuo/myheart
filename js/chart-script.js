var ctx = document.getElementById("user-chart").getContext('2d');
		var myChart = new Chart(ctx, {
			type : 'bar',
			data: {
				labels: ['Total', 'Male', 'Female'],
				datasets:[{
					label:'Number of Users',
					data:[9,8,1],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)'
					],
					borderColor:[
					'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
					}],
			}
		}
);


var ctx = document.getElementById("user-health").getContext('2d');
		var myChart = new Chart(ctx, {
			type : 'pie',
			data: {
				labels: ['Total', 'Male', 'Female'],
				datasets:[{
					label:'Number of Users',
					data:[9,8,1],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)'
					],
					borderColor:[
					'rgba(255,99,132,1)',
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
				labels: ['Total', 'Male', 'Female'],
				datasets:[{
					label:'Number of Users',
					data:[9,8,1],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)'
					],
					borderColor:[
					'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
					}],
			}
		}
);