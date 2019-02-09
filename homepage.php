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
						<h3><i class="fas fa-home fa-lg"></i> Dashboard</h3>
					</div>						
				</div>

				<div class="row mt-3">
					<div class="col-6">
						<a href="users.php" class="text-decoration-none text-dark link-card">
							<div class="card p-5 bg-light">
								<div class="card-body">
									<i class="far fa-address-card fa-6x"></i>
								</div>

								<div class="card-text text-center text">
									User Management
								</div>
							</div>
						</a>
					</div>

					<div class="col-6">
						<a href="userhealth.php" class="text-decoration-none text-dark link-card">
							<div class="card p-5 bg-light">
								<div class="card-body">
									<i class="fas fa-address-card fa-6x"></i>
								</div>

								<div class="card-text text-center text">
									User Health Data
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

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

			 
		});	

		$(".card").hover(function() {
				$(this).addClass("shadow");
				}, function() {
					$(this).removeClass("shadow");
				}); 

	</script>
 </body>
 </html>