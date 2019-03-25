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
						<h3><i class="far fa-address-card fa-lg"></i> User Management </h3><hr>
					</div>						
				</div>

				<div class="row mt-3">
					<div class="col-12">
						<div class="card">
							<div class="card-header"><h5>View User Information</h5></div>

							<div class="card-body">
								<table class="table-striped display cell-border" id="users" style="width: 100%;">
									<thead class="text-center">
										<tr>
											<th class="">No</th>
											<th>Patient ID</th>
											<th>Name</th>
											<th>Email</th>
											<th>Sex</th>
											<th>Date of Birth</th>
											<th>Actions</th>
										</tr>
									</thead>

									<tbody class="text-center">
										<?php $counter = 1; ?>
										<?php foreach ($items = getUsers() as $item): ?>
											<tr>
												<td class=""><?php echo $counter; ?></td>
												<td><?php echo $item["patient_id"] ?></td>
												<td><?php echo $item["name"] ?></td>
												<td><?php echo $item["email"] ?></td>
												<td><?php echo $item["sex"] ?></td>
												<td><?php echo $item["dob"] ?></td>
												<th><button class="btn btn-link"><i class="fa fa-redo-alt"></i> Update</button> <!-- <button class="btn btn-link text-danger"><i class="fa fa-trash-alt"></i> Delete</button> --></th>
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
			$('#users').DataTable({
			"scrollX" : true,
			});	
		});	
	</script>
 </body>
 </html>