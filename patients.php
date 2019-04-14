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
						<h3><i class="fa fa-users fa-lg"></i> Patients </h3><hr>
					</div>						
				</div>

				<div class="alert fade show alert-dismissible d-none" id="response">
					 <span id="response-text"></span><button type="button" class="close p-2" data-dismiss="alert">&times;</button>
				</div>

				<div class="row mt-3">
					<!-- <div class="card-header"><h5>Add Patient</h5></div> -->
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<h6>Click on patient to go to prediction page</h6><hr>
								<table id="patient-data" class=" table text-center table-hover" style="width: 100%; border-bottom: none !important;" >
									<thead class="d-none">
										<tr class="">
											<th style="width: 10%;">No.</th>
											<th style="width: 15%;">Patient ID</th>
											<th>Full Name</th>
										</tr>
									</thead>

									<tbody>
										<?php $counter = 1; ?>
										<?php foreach ($items = getUsers() as $item): ?>
											<!-- <a href="prediction.php?id=<?php $item['patient_id']; ?>"> -->
											<tr class=" patient-datatable clickable-row" data-href='http://localhost/myHeart/prediction.php?id=<?php echo $item['patient_id']; ?>'>
												<td><?php echo $counter; ?></td>
												<td><?php echo $item['patient_id']; ?></td>
												<td><?php echo $item['name']; ?></td>
										
											</tr>
										<!-- </a> -->

										<?php $counter += 1; ?>
										<?php endforeach; ?>
										<?php $myHeartConnection->closeConnection(); ?>	
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!-- <script type="text/javascript" src="js/jquery.dataTables.min.js"></script> -->
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
	<script type="text/javascript" src="js/All.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			// e.preventDefault(e);

			$('#patient-data').DataTable({
				"bPaginate": false,
				"bLengthChange" : false
			});


			$(".clickable-row").click(function() {
        		window.location = $(this).data("href");
    		});
		});
	</script>

</body>
</html>