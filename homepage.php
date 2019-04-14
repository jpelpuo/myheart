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
 <body style="background-color: #f2f2f2 !important;">
 	<?php 
		include('navbar.php');
	?>

	<div class="wrapper no-gutters">
		<!-- Side Bar -->
		<?php include('sidenav.php'); ?>


		<div id="content">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3><i class="fas fa-chart-line fa-lg"></i> Analytics</h3><hr>
					</div>						
				</div>

				<div class="row mt-2">
					<div class="col-md">
						<div class="card hover-shadow bg-info text-light" style="border: none !important;">
							<div class="card-body text-center">
								<h3 class="font-weight-bold count" id="all-count"><?php echo $totalCount = getUserCount(); ?></h3>

								<p class="card-text count-text">
									Total Patients
								</p>
							</div>
						</div>
					</div>

					<div class="col-md">
						<div class="card hover-shadow bg-info text-light">
							<div class="card-body text-center">
								<h3 class="font-weight-bold count" id="male-count"><?php echo $totalMale = getUserCount("Male"); ?></h3>

								<p class="card-text count-text">
									Male Patients
								</p>
							</div>
						</div>
					</div>

					<div class="col-md">
						<div class="card hover-shadow bg-info text-light">
							<div class="card-body text-center">
								<h3 class="font-weight-bold count" id="female-count"><?php echo $totalFemale = getUserCount("Female"); ?></h3>
								<p class="card-text count-text">
									Female Patients
								</p>
							</div>
						</div>
					</div>

					<div class="col-md">
						<div class="card hover-shadow bg-info text-light">
							<div class="card-body text-center">
								<h3 class="font-weight-bold count">
									<?php 
									if($totalCount == 0){
										$totalPercent = 0;
									}else{
										$totalPercent = round((getUserCount("Male") / $totalCount)  * 100);
									}
									echo $totalPercent .'%'; 

									?>
									
								</h3>
								<p class="card-text count-text">
									% Male Patients
								</p>
							</div>
						</div>
					</div>

					<div class="col-md">
						<div class="card hover-shadow bg-info text-light">
							<div class="card-body text-center">
								<h3 class="font-weight-bold count">
									<?php 
									if($totalCount == 0){
										$totalPercent = 0;
									}else{
										$totalPercent = round((getUserCount("Female") / $totalCount)  * 100);
									}
									echo $totalPercent .'%'; 

									?>
										
									</h3>
								<p class="card-text count-text">
									% Female Patients
								</p>
							</div>
						</div>
					</div>

				</div>
				<div id="analytic-data" class="d-none">
					<span id="male-positive"><?php echo getAnalyticData(1,1); ?></span>
					<span id="male-negative"><?php echo getAnalyticData(1,0); ?></span>
					<span id="female-positive"><?php echo getAnalyticData(0,1); ?></span>
					<span id="female-negative"><?php echo getAnalyticData(0,0); ?></span>
				</div>
				<div class="row mt-4">

					<div class="col-md-6">
						<!-- <a href="userhealth.php" class="text-decoration-none text-dark link-card"> -->
							<div class="card bg-light hover-shadow">
								<!-- <div class="card-header bg">
									Number of users
								</div> -->
								<div class="card-body">
									<canvas id="user-chart" height="200"></canvas>
								</div>
							</div>
						<!-- </a> -->
					</div>

					<div class="col-md-6">
						<!-- <a href="userhealth.php" class="text-decoration-none text-dark link-card"> -->
							<div class="card bg-light hover-shadow">
								<!-- <div class="card-header">
									Number of Users
								</div> -->
								<div class="card-body">
									<canvas id="user-health" height="200"></canvas>
								</div>
							</div>
						<!-- </a> -->
					</div>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
	<script type="text/javascript" src="js/fusioncharts.js"></script>
	<script type="text/javascript" src="js/themes/fusioncharts.theme.fusion.js"></script>
	<script type="text/javascript" src="js/All.js"></script>
	<script type="text/javascript" src="js/chart-script.js"></script>

	<script>
		
	</script>
 </body>
 </html>