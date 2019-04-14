<?php 
	session_start();
	include('sys.php');

	$staff_id = "";
	$password = "";

	if(isset($_POST['login'])){
		$staff_id = stripslashes($_POST['staff_id']);
		$password = stripslashes($_POST['password']);

		login($staff_id, $password);
	}

	$error = "Invalid credentials. Check username or password.";

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
	 <body class="login-background background-pic">
	 	<div class="container-fluid no-gutters">
	 		<div class="row">
	 			<div class="col-lg" style="background-color: white">
	 				<img src="img/myHeart.png" class="img-fluid" alt="myHeart" width="70">
	 				
	 				<p class="float-right pt-3" id="date"></p>
	 			</div>
	 		</div>

	 		<center>
			<div class="card col-lg-5 col-md-7 col-11 col-sm-8 input-square" style="margin-top: 70px;">
				<div class="card-body" style="background-color: white;">
					<form class="form" method="post" >
						<!-- <h4><i class="fa fa-lock fa-2x" style="color: #005580;"></i></h4> -->
						<h4 style="color: #005580;">Login</h4>
						<?php 
							if(isset($_SESSION["errors"])){
								$link = strtolower("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
								if($link == strtolower("http://localhost/myheart/index.php?login=failed")){
									echo '<div class="form-group p-1 border" style="background-color:#ffcccc; border-color:red !important;">';
									echo '<div>'. $error.'</div>'; 
									echo '</div>';
								}
								// session_unset();
							}
						 ?>
							<div class="form-group">
								<div class="input-group has-feedback input-group-prepend">
									<i class="form-control-feedback fa fa-user fa-lg input-group-text input-square icon-background" style="padding-top: 10px;"></i>
									<input type="text" class="form-control input-square" name="staff_id" id="staff_id" placeholder="ID Number" autofocus>
								</div>
							</div>
							<div class="form-group has-feedback">
								<div class="input-group input-group-prepend">
									<i class="form-control-feedback fa fa-lock fa-lg input-group-text input-square icon-background" style="padding-top: 10px;"></i>
									<input type="password" class="form-control input-square" name="password" id="password" placeholder="Password" maxlength="5">
									
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn-block btn btn-secondary input-square login-btn" name="login" id="login" style="margin-top: 10px !important;">Login</button>
							</div>
					</form>
				</div>
				</div>  <!-- Card -->
				</center>
	 	</div>
 
	 	<script type="text/javascript" src="js/jquery.min.js"></script>
 		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript">
				var date = new Date();
				var day = date.getDay();
				var day_date = date.getDate();
				var month = date.getMonth();
				var year = date.getFullYear();
				var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
				var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
				var strDate = days[day] + ", " + day_date + " " + months[month] + " " + year;
				document.getElementById("date").innerHTML = strDate;
		</script>
		<script>
			$(document).ready(function(){
				$("#login").hover(function() {
					$(this).addClass("shadow");
				}, function() {
					$(this).removeClass("shadow");
				});
			});
		</script>
 	</body>
 </html>