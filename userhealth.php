<?php 
	include('sys.php');
	session_page();

	$pid = "";
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
 	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
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
						<h3><i class="fas fa-address-card fa-lg"></i> Patient Health Data </h3>
					</div>						
				</div>

				<div class="row mt-3">
					<div class="col-12">
						<div class="card">
							<div class="card-header"><h5>View Past Predictions</h5></div>

							<div class="card-body">
								<table class="table-striped display cell-border" id="userhealth" style="width: 100%;"> 
									<thead class="text-center">
										<tr>
											<th>No</th>
											<th>Patient ID</th>
											<th>Name</th>
											<!-- <th>Predicted value</th> -->
											<th>Likelihood</th>
											<th>Prediction date</th>
											<th>No. of Predictions</th>
											<th>Actions</th>
										</tr>
									</thead>

									<tbody class="text-center">
										<?php $counter = 1; ?>
										<?php $diagnosis = ""; ?>
										<?php foreach ($items = getPredictionDetails() as $item): ?>

										<?php $date = date_create($item["prediction_date"]); ?>
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
				<div class="modal fade m-auto" tabindex="-1" id="viewModal" role="dialog" data-keyboard="true" data-backdrop="true">
					<div class="modal-dialog">
						<!-- Modal Content -->
						<div class="modal-content">
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
									<div class="row">
										<div class="col-md">
											<span class="font-weight-bold">Full Name: </span> 
											<?php echo $pid; ?>
										</div>

										<div class="col-md">
											<span class="font-weight-bold">Prediction Date: </span> 
											<?php echo date_format($date,"d-F-Y"); ?>
										</div>
									</div><br>

									<div class="row">
										<div class="col-md">
											<span class="font-weight-bold">Age: </span> 
											<?php echo $item["age"]; ?>
										</div>

										<div class="col-md">
											<span class="font-weight-bold">Sex: </span> 
											<?php echo sexValueToText($item["sex"]); ?>
										</div>
									</div>

									<!-- <div class="row"> -->
									<ul class="list-group">
										<li class="list-group-item">
											<span class="font-weight-bold">Age: </span> 
											<?php echo $item["age"]; ?>
										</li>

										<li class="list-group-item">
											<span class="font-weight-bold">Sex: </span> 
											<?php echo sexValueToText($item["sex"]); ?>
										</li>
										<li class="list-group-item">
											
										</li>
										<li class="list-group-item">
											
										</li>
										<li class="list-group-item">
											
										</li>
										<li class="list-group-item">
											
										</li>
										<li class="list-group-item">
											
										</li>
										<li class="list-group-item">
											
										</li>
										<li class="list-group-item">
											
										</li>
										<li class="list-group-item">
											
										</li>
									</ul>
								<!-- </div> -->
								</div>

								<div class="modal-footer">
									<div id="response-message" class="p-2 rounded-sm form-group mr-auto d-none">
										
									</div>
									<div class="form-group">
										<button class="btn btn-success float-right" type="submit" id="save" data-toggle="modal" data-target="">Save</button>
									</div>
									<div class="form-group">
										<button class="btn btn-danger float-right" type="button" data-dismiss="modal">Close</button>
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
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/All.js"></script>

	<script>
		$(document).ready(function(){
			$('#userhealth').DataTable({
			"scrollX" : true
			});

			$(document).on("click", ".openPatientDialog", function(){
				var patient_id = $(this).data('id');

				$("#pid").text("<?php ob_start(); ?>" + patient_id + "<?php $pid = ob_get_contents(); ?>" + "<?php ob_end_flush(); ?>");

				// document.cookie("patient_id="+patient_id);
				alert("<?php echo $pid; ?>");
			});
		});	

	</script>
 </body>
 </html>