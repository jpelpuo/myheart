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
						<h3><i class="fas fa-address-card fa-lg"></i> User Health Data </h3>
					</div>						
				</div>

				<div class="row mt-3">
					<div class="col-12">
						<div class="card">
							<div class="card-header">View User Health Data</div>

							<div class="card-body">
								<table class="table" id="userhealth">
									<thead>
										<tr>
											<td>ID</td>
											<td>Name</td>
											<td>Email</td>
											<td>Action</td>
										</tr>
									</thead>

									<tbody>
										<tr>
											
										</tr>
									</tbody>
								</table>
							</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/All.js"></script>

	<script>
		$(document).ready(function(){
			$('#userhealth').DataTable({
			"scrollX" : true
			});
		});	
	</script>
 </body>
 </html>