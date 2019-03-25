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
						<h3><i class="far fa-address-card fa-lg"></i> Patient Management </h3><hr>
					</div>						
				</div>

				<div class="alert fade show alert-dismissible d-none" id="response">
					 <span id="response-text"></span><button type="button" class="close p-2" data-dismiss="alert">&times;</button>
				</div>

				<div class="card mt-3">
					<div class="card-header"><h5>Add Patient</h5></div>
					<div class="card-body">
						<form class="form" id="adduser" method="post">
							<h6>Enter patient details and click Add Patient.</h6>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
										    <label class=" input-group form-control input-group-text">First Name</label>
										    <input type="text" class="form-control" id="firstname" name="firstname"></input>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
										    <label class=" input-group form-control input-group-text">Last Name</label>
										    <input type="text" class="form-control" id="lastname" name="lastname"></input>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
										    <label class=" input-group form-control input-group-text">Sex</label>
										    <select class="form-control" id="sex" name="sex">
										    	<option value="Male">Male</option>
										    	<option value="Female">Female</option>
										    </select>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
										    <label class=" input-group form-control input-group-text">Date of Birth</label>
										    <input type="date" class="form-control" id="dob" name="dob"></input>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
										    <label class=" input-group form-control input-group-text">Email</label>
										    <input type="email" class="form-control" id="email" name="email"></input>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
										    <label class=" input-group form-control input-group-text">Contact Number</label>
										    <input type="tel" class="form-control" id="contact" name="contact"></input>
										</div>
									</div>
								</div>
							</div>

							<div class="flex-row-reverse">
								<div class="col-md-3 float-right">
									<div class="form-group">
										<button class="btn btn-success float-right" type="submit" id="add" name="add">Add Patient</button>
									</div>
								</div>
							</div>
						</form>
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

	<script type="text/javascript">
		$('#adduser').on('submit', function(e){
			e.preventDefault();

			var firstname = $('#firstname').val();
			var lastname = $('#lastname').val();
			// var name = firstname + " " + lastname;
			var sex = $('#sex').val();
			var dob = $('#dob').val();
			var email = $('#email').val();
			var contact = $('#contact').val();

			var user_details = {
				"firstname":firstname,
				"lastname":lastname,
				"sex":sex,
				"dob":dob,
				"email":email,
				"contact":contact
			}

			var userData = JSON.stringify(user_details);

			$('#response').removeClass("d-none");
			$('#response-text').html("Adding Patient... ");
			$('#response').addClass("alert-info");
			//Make request to api to add user to database
			$.ajax({
				url:'http://localhost/myHeartApp/public/api/add',
				type: 'post',
				data: userData,
				headers:{
					"Content-Type" : 'application/json'
				},
				dataType: 'json',
				success: function(data){
					$('#response-text').html(data['Response Message']);
					if(data['Success'] == true){
						$('#response').removeClass("d-none");
						$('#response').addClass("alert-success");
					}else{
						$('#response').removeClass("d-none");
						$('#response').addClass("alert-danger");
					}
				}
			})

		})
	</script>

</body>
</html>