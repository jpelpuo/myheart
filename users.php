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
						<h3><i class="far fa-address-card fa-lg"></i> User Management </h3>
					</div>						
				</div>

				<div class="row mt-3">
					<div class="col-12">
						<div class="card">
							<div class="card-header border border-info">View User Information</div>

							<div class="card-body">
								<table class="table" id="users">
									<thead>
										<tr>
											<th class="">ID</th>
											<th>Name</th>
											<th>Email</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($items = getUsers() as $item): ?>
											<tr>
												<td class=""><?php echo $item["id"] ?></td>
												<td><?php echo $item["name"] ?></td>
												<td><?php echo $item["email"] ?></td>
												<td><?php print_r($_SESSION) ?></td>
											</tr>
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



	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready(function(){
			 $('#sidebarCollapse').click(function (e) {
			 	e.preventDefault();
			 	if($('#sidebar').hasClass('active')){
			 		$('#sidebar').removeClass('active');
			 		$('#content').css('margin-left','230px');
			 	}else{
			 		$('#sidebar').addClass('active');
        			$('#content').css('margin-left','0px');
			 	}
        		
			});

			$("#usermenu-1").click(function(){
			 	$("#usersubmenu-1").slideToggle('fast');

			});

			$("#usermenu-2").click(function(){
			 	$("#usersubmenu-2").slideToggle('fast');
			});


			$('#users').DataTable({
			"scrollX" : true,

			});

			// $(".card").hover(function() {
			// 	$(this).addClass("shadow");
			// 	}, function() {
			// 	$(this).removeClass("shadow");
			// }); 
			
		});	


	</script>
 </body>
 </html>