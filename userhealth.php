<?php 
	include('sys.php');
	session_page();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>myHeart</title>
 	<!-- Bootstrap CSS -->
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 	<!-- Fontawesome -->
 	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-free-5.6.3-web/css/all.css">
 	<!-- Custom CSS -->
 	<link rel="stylesheet" type="text/css" href="css/myHeart-css.css">
 	<!-- DataTables -->
 	<!-- <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"> -->
 	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 </head>
 <body>
 	<?php 
		include('navbar.php');
	?>

	<div class="wrapper no-gutters">
		<!-- Side Bar -->
		<?php include('sidenav.php') ?>


		<div id="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card alert-info">
							<div class="card-body">
								<h3 class=""><i class="fas fa-address-card fa-lg"></i> Patient Health Data </h3>
							</div>
						</div>
						
					</div>						
				</div>

				<div class="row mt-3">
					<div class="col-12">
						<div class="card">
							<div class="card-header"><h5>View Past Predictions</h5></div>

							<div class="card-body" style="overflow: auto;">
								<table class="table-striped display cell-border responsive no-wrap" id="userhealth" style="width: 100%;"> 
									<thead class="text-center">
										<tr>
											<th>No</th>
											<th>Patient ID</th>
											<th>Name</th>
											<!-- <th>Predicted value</th> -->
											<th>Last Prediction</th>
											<th>Last Prediction date</th>
											<th>Total predictions</th>
											<th>Actions</th>
										</tr>
									</thead>

									<tbody class="text-center">
										<?php $counter = 1; ?>
										<?php $diagnosis = ""; ?>
										<?php foreach ($items = getPredictionDetails() as $item): ?>

										<?php $date = date_create($item["last_prediction"]); ?>
											<tr>
												<td class=""><?php echo $counter; ?></td>
												<td><?php echo $item["patient_id"]; ?></td>
												<td><?php echo $item["name"]; ?></td>
												<td><?php echo (ctype_digit($item["diagnosis"])) ? $item["diagnosis_percent"]."%" : "No prediction made"; ?></td>
												<td><?php echo (ctype_digit($item["diagnosis"])) ? date_format($date,"d-F-Y") : "No Data";; ?></td>
												<td><?php echo (ctype_digit($item["diagnosis"])) ? $item["number_of_predictions"] : "No Data";; ?></td>
												<td><button type="submit" class="btn btn-link openPatientDialog" data-target="#viewModal" data-toggle="modal" data-id="<?php echo $item['patient_id']; ?>"><i class="fa fa-search"></i> View</button></td>
											<!-- <?php //endif; ?> -->
											</tr>
											<?php $counter += 1; ?>
										<?php endforeach; ?>
										<?php $myHeartConnection->closeConnection(); ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- View Modal -->
				<div class="modal patient-details fade m-auto" tabindex="-1" id="viewModal" role="dialog" data-keyboard="true" data-backdrop="true">
					<div class="modal-dialog modal-lg">
						<!-- Modal Content -->
						<div class="modal-content" style=" background-color: #f2f2f2 !important;">
							<div class="modal-header">
								<h5 class="modal-title">Prediction Details for Patient <span id="pid"></span>

								</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- <form class="form" id="saveForm" method="post"> -->
								<div class="modal-body">
									<!-- <h6 class="">Please specify/verify Patient ID</h6>
									<div class="form-group">
										<div class="input-group input-group-prepend">
											<label class="form-control input-group input-group-text">Patient ID</label>
											<input type="text" class="form-control" id="patient_id" required="required"></input>
										</div>
									</div> -->

									<span id="getpid"></span>
									<div class="row text-center">
										<div class="col-md text-left">
											<span class="font-weight-bold">Full Name: <span class="font-weight-normal" id="f-name"></span></span> 
										
										</div>

										<div class="col-md">
											<span class="font-weight-bold">Sex: <span class="font-weight-normal" id="sex"></span></span> 
										</div>

										<div class="col-md ">
											<span class="font-weight-bold">Date of Birth: <span class="font-weight-normal" id="dob"></span></span>
										</div>

										
									</div><hr>

									<!-- <div id="accordion"> -->
										<div class="row">
										<div class="col-md">
											<div class="card bg-light hover-shadow">
											<div class="card-header bg-light">
												<span class="font-weight-bold">Risk Level Information</span>

												<a class="card-link float-right" data-toggle="collapse" href="#collapseOne">
											        <i class="fas fa-window-minimize small text-dark"></i>
											     </a>
											</div>

											<div class="card-body collapse show" id="collapseOne">
												<canvas id="likelihood-history" height="130" aria-label="Prediction History">
													<p>Risk Level Information</p>
												</canvas>
											</div>
										</div>
										</div>
									</div><br>

									<div class="row">
										<div class="col-md">
											<div class="card bg-light hover-shadow">
											<div class="card-header bg-light">
												<span class="font-weight-bold">Serum Cholesterol Information</span>

												<a class="card-link float-right" data-toggle="collapse" href="#collapseTwo">
											        <i class="fas fa-window-minimize small text-dark"></i>
											     </a>
											</div>

											<div class="card-body collapse show" id="collapseTwo">
												<canvas id="cholesterol-history" height="130" aria-label="Prediction History">
													<p>Serum Cholesterol Information</p>
												</canvas>
											</div>
										</div>
										</div>
									</div><br>

									<div class="row">
										<div class="col-md">
											<div class="card bg-light hover-shadow">
											<div class="card-header bg-light">
												<span class="font-weight-bold">Resting Blood Pressure Information</span>

												<a class="card-link float-right" data-toggle="collapse" href="#collapseThree">
											        <i class="fas fa-window-minimize small text-dark"></i>
											     </a>
											</div>

											<div class="card-body collapse show" id="collapseThree">
												<canvas id="bp-history" height="130" aria-label="Prediction History">
													<p>Resting Blood Pressure Information</p>
												</canvas>
											</div>
										</div>
										</div>
									</div><br>

									<div class="row">
										<div class="col-md">
											<div class="card bg-light hover-shadow">
											<div class="card-header bg-light">
												<span class="font-weight-bold">Maximum Heart Rate Information</span>

												<a class="card-link float-right" data-toggle="collapse" href="#collapseFour">
											        <i class="fas fa-window-minimize small text-dark"></i>
											     </a>
											</div>

											<div class="card-body collapse show" id="collapseFour">
												<canvas id="heart_rate-history" height="130" aria-label="Prediction History">
													<p>Maximum Heart Rate Information</p>
												</canvas>
											</div>
										</div>
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<div class="form-group">
										<button class="btn btn-danger float-right" type="button" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>

									
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
	<!-- <script type="text/javascript" src="js/jquery.dataTables.min.js"></script> -->
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
	<script type="text/javascript" src="js/All.js"></script>

	<script>
		$(document).ready(function(){
			$('#userhealth').DataTable({
			// "scrollX" : true,
			});

			$(document).on("click", ".openPatientDialog", function(){
				var patient_id = $(this).data('id');

				$("#pid").text(patient_id);

				// document.cookie("patient_id="+patient_id);
				// alert("<?php //echo $pid; ?>");

				$.ajax({
					url : 'http://localhost/myHeartApp/public/api/get/'+patient_id,
					type:'get',
					success: function(data){
						// alert($(data['Data']).length);

						// for(i = 0; i < $(data['Data']).length; i++){
						// 	alert(JSON.stringify(data['Data'][i]['prediction_date']));
						// }
						// alert(JSON.stringify(data['Data']['name']));

						$('#f-name').html(data['Data'][0]['name']);
						$('#sex').html(data['Data'][0]['sex']);
						$('#dob').html(data['Data'][0]['dob']);
						// $('#age').html(data['Data'][0]['age']);

						var prediction_dates = [];
						var percentages = [];
						var cholesterol_levels = [];
						var blood_pressure_levels = [];
						var heart_rate_levels = []

					
						for(i = 0; i < $(data['Data']).length; i++){
							prediction_dates[i] = data['Data'][i]['prediction_date'];
							percentages[i] = data['Data'][i]['diagnosis_percent'];
							cholesterol_levels[i] = data['Data'][i]['serum_cholesterol'];
							blood_pressure_levels[i] = data['Data'][i]['resting_blood_pressure'];
							heart_rate_levels[i] = data['Data'][i]['max_heart_rate'];
						}

							// alert(prediction_dates + " " + percentages);

						var graph = document.getElementById("likelihood-history").getContext('2d');

							var line_graph = new Chart(graph, {
								type : 'line',
								data:{
									labels: prediction_dates,
									datasets : [{
										label: "Heart disease risk level for various dates",
										data : percentages,
										backgroundColor: [
											// 'rgba(255, 99, 132, 0.2)',
							                // 'rgba(98, 157, 235, 0.9)',
							                'rgba(64, 111, 188, 0.5)'
											],
										borderColor:[
											// 'rgba(255,99,132,1)',
							                // 'rgba(54, 162, 235, 1)',
							                'rgba(4, 26, 63, 1)'
											]
									}]
								},
								options:{
									scales:{
										yAxes:[{
											ticks:{
												min: 0,
												max: 100
											},
											scaleLabel:{
												display : true,
												labelString : 'Likelihood'
											}
										}],
										xAxes:[{
											scaleLabel:{
												display: true,
												labelString: 'Prediction Dates'
											}
										}]
									},
									title: {
							            display: true,
							            text: 'Heart disease risk levels for various dates'
							        }
								}
							});


							var graph = document.getElementById("cholesterol-history").getContext('2d');

							var line_graph = new Chart(graph, {
								type : 'line',
								data:{
									labels: prediction_dates,
									datasets : [{
										label: "Serum cholesterol values for various dates",
										data : cholesterol_levels,
										backgroundColor: [
											// 'rgba(255, 99, 132, 0.2)',
							                // 'rgba(98, 157, 235, 0.9)',
							                'rgba(64, 111, 188, 0.5)'
											],
										borderColor:[
											// 'rgba(255,99,132,1)',
							                // 'rgba(54, 162, 235, 1)',
							                'rgba(4, 26, 63, 1)'
											]
									}]
								},
								options:{
									scales:{
										yAxes:[{
											// ticks:{
											// 	min: 0,
											// 	max: 100
											// },
											scaleLabel:{
												display : true,
												labelString : 'Serum cholesterol'
											}
										}],
										xAxes:[{
											scaleLabel:{
												display: true,
												labelString: 'Prediction Dates'
											}
										}]
									},
									title: {
							            display: true,
							            text: 'Serum cholesterol levels for various dates'
							        }
								}
							});



							var graph = document.getElementById("bp-history").getContext('2d');

							var line_graph = new Chart(graph, {
								type : 'line',
								data:{
									labels: prediction_dates,
									datasets : [{
										label: "Resting blood pressure levels for various dates",
										data : blood_pressure_levels,
										backgroundColor: [
											// 'rgba(255, 99, 132, 0.2)',
							                // 'rgba(98, 157, 235, 0.9)',
							                'rgba(64, 111, 188, 0.5)'
											],
										borderColor:[
											// 'rgba(255,99,132,1)',
							                // 'rgba(54, 162, 235, 1)',
							                'rgba(4, 26, 63, 1)'
											]
									}]
								},
								options:{
									scales:{
										yAxes:[{
											// ticks:{
											// 	min: 0,
											// 	max: 100
											// },
											scaleLabel:{
												display : true,
												labelString : 'Resting Blood pressure'
											}
										}],
										xAxes:[{
											scaleLabel:{
												display: true,
												labelString: 'Prediction Dates'
											}
										}]
									},
									title: {
							            display: true,
							            text: 'Resting blood pressure levels for various dates'
							        }
								}
							});


							var graph = document.getElementById("heart_rate-history").getContext('2d');

							var line_graph = new Chart(graph, {
								type : 'line',
								data:{
									labels: prediction_dates,
									datasets : [{
										label: "Maximum heart rate levels for various dates",
										data : heart_rate_levels,
										backgroundColor: [
											// 'rgba(255, 99, 132, 0.2)',
							                // 'rgba(98, 157, 235, 0.9)',
							                'rgba(64, 111, 188, 0.5)'
											],
										borderColor:[
											// 'rgba(255,99,132,1)',
							                // 'rgba(54, 162, 235, 1)',
							                'rgba(4, 26, 63, 1)'
											]
									}]
								},
								options:{
									scales:{
										yAxes:[{
											// ticks:{
											// 	min: 0,
											// 	max: 100
											// },
											scaleLabel:{
												display : true,
												labelString : 'Maximum Heart Rate'
											}
										}],
										xAxes:[{
											scaleLabel:{
												display: true,
												labelString: 'Prediction Dates'
											}
										}]
									},
									title: {
							            display: true,
							            text: 'Maximum heart rate levels for various dates'
							        }
								}
							});
						
					}
				})
			});
		});	

	</script>
 </body>
 </html>