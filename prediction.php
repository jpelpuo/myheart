<?php 
	include('sys.php');
	session_page();

	$pat_id = null;
	$patient = null;

	if(isset($_GET['id'])){
		$pat_id = $_GET['id'];

		$patient = getUsers($pat_id);
	}
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>myHeart</title>
 	<!-- Bootstrap CSS -->
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<!-- Fontawesome -->
 	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-free-5.6.3-web/css/all.css">
 	<!-- Custom CSS -->
 	<link rel="stylesheet" type="text/css" href="css/myHeart-css.css">
 	<!-- DataTables -->
 	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
 </head>
 <body style="background-color: #f2f2f2 !important;">
 	<?php 
		include('navbar.php');
	?>

	<div class="wrapper no-gutters">
		<!-- Side Bar -->
		<?php include('sidenav.php') ?>


		<div id="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 mb-2">
						<div class="card alert-info">
							<div class="card-body">
								<h3><i class="fas fa-heartbeat fa-lg"></i> Heart Disease Risk Level Prediction </h3>
							</div>
						</div>
						
					</div>						
				</div>

				<div class="row">
					<div class="col-12">
						<div id="patient-indicator" class="card d-none">
							<div class="card-body">
								Prediction for patient <span id="patient_id"><?php echo $pat_id; ?></span><span class="float-right"><span class="font-weight-bold">Patient Name:</span> <?php echo $patient[0]['name']; ?></span>
							</div>
						</div>
					</div>
				</div>

				<!-- <div class="row mt-2">
					<div class="col-12">
						<div class="alert fade show alert-dismissible d-none alert-info" id="response-details">
							<span id="response-font"></span><button type="button" class="close p-2" data-dismiss="alert">&times;</button>
						</div>
					</div>
				</div> -->

				<div class="row mt-2">
					<div class="col-md">
						<div class="card input-square">
							<div class="card-body">
								<form class="form" method="post" id="prediction_form">
									<h5>Enter Attributes for Prediction</h5><hr>
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Date of Birth</label>
											<input type="date" class="form-control" id="dob" required="required" value="<?php echo $patient[0]['dob']; ?>" <?php echo (!is_null($patient[0]['dob'])) ? 'readonly="readonly"' : ''; ?>></input>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Sex</label>
											<select class="form-control" id="sex" <?php echo (!is_null($patient[0]['sex'])) ? 'disabled="disabled"' : '' ?> required>
												<option value="1" <?php echo $patient[0]['sex'] == 'Male' ? 'selected="selected"' : ''; ?>>Male</option>
												<option value="0" <?php echo $patient[0]['sex'] == 'Female' ? 'selected="selected"' : ''; ?>>Female</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Chest Pain</label>
											<select class="form-control" id="chest_pain" required>
												<option value="1">Typical Angina</option>
												<option value="2">Atypical Angina</option>
												<option value="3">Non-anginal pain</option>
												<option value="4">Asymptomatic</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Resting Blood Pressure</label>
											<input type="number" class="form-control" id="blood_pressure" required></input><span class="input-group-text input-group-append" min="90" max="250">mmHg</span> 
										</div>
									</div>

									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Serum Cholesterol</label>
											<input type="number" class="form-control" min="0" id="cholesterol" required></input><span class="input-group-text input-group-append">mg/dL</span>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Fasting Blood Sugar</label>
											<select class="form-control" id="fbs" required>
												<option value="" disabled selected>-- > 120 mg/dl ?-- </option>
												<option value="1">True</option>
												<option value="0">False</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Resting Electrocardiogram</label>
											<select class="form-control" id="resting_ECG" required>
												<!-- <option value="" disabled selected>-- 120 mg/dl ?-- </option> -->
												<option value="0">Normal</option>
												<option value="1">ST-T Wave Abnormality</option>
												<option value="2">Left Ventricular Hypertrophy</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Maximum Heart Rate</label>
											<input type="number" class="form-control" min="0" id="heart_rate" required></input>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Exercise Induced Angina</label>
											<select class="form-control" id="induced_angina" required>
												<!-- <option value="" disabled selected>--  120 mg/dl ?-- </option> -->
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">ST Depression</label>
											<input type="number" class="form-control" min="0" step=".01" id="st_depression" required></input>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Peak Exercise ST Segment</label>
											<select class="form-control" id="slope" required>
												<!-- <option value="" disabled selected>-- Slope of peak exercise ST segment-- </option> -->
												<option value="1">Upsloping</option>
												<option value="2">Flat</option>
												<option value="3">Downsloping</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Number of Vessels</label>
											<!-- <input type="number" class="form-control" min="0" max="3" id="no_of_vessels" required></input> -->
											<select class="form-control" id="no_of_vessels">
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group has-feedback input-group-prepend">
											<label class="input-group input-group-text form-control">Thallium Stress Test Result</label>
											<select class="form-control" id="thal" required>
												<!-- <option value="" disabled selected>-- Slope of peak exercise ST segment-- </option> -->
												<option value="3">Normal</option>
												<option value="6">Fixed Defect</option>
												<option value="7">Reversible Defect</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<button class="btn btn-success float-right shadow" type="submit" id="calculate">Calculate</button>
									</div>
								</form>
							</div>
						</div>
					</div>


					<div class="col-md">
						<div class="card h-sm-4 input-square" style="height: 55%;">
							<div class="card-body h-sm-4" style="height: 100%;">
								<h5 class="">Prediction Results</h5><hr>

								<div class="card-text text-center mx-auto" style="height: 80%;">
									<div id="spin" class=""></div><h6 class="" id="result">Prediction results will appear here</h6>

									<div class="mx-auto border bg-light progressbar-outer" id="progressbar-outer">
										<div class="mx-auto progressbar-inner font-weight-bold text-dark text-center" id="progressbar-inner" style="width: 100%; font-size: 15px;">
											
										</div>
									</div>
								</div>
								<!-- <form> -->
								<!-- <div class="form-group">
										<button class="btn float-right shadow" type="submit" id="saveDetails" style="background-color: #004466 !important; color: white;">Save Prediction</button>
								</div> -->
								<!-- </form> -->
							</div>

							<!-- <div class="card-footer"> -->
								
							<!-- </div> -->
						</div>

						<div class="card mt-2">
							<div class="card-body">
								<div class="alert fade show alert-dismissible d-none" id="response">
					 				<span id="response-text"></span><button type="button" id="close" class="close p-2" data-dismiss="alert">&times;</button>
								</div>
								<form class="form" id="saveDetails" method="post">
									<button class="btn float-left hover-shadow" type="submit" style="background-color: #004466 !important; color: white;" <?php echo !isset($pat_id) ? 'disabled="disabled"' : ''; ?>><i class="fa fa-save"></i> Save Prediction</button>
								</form>
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
		$('#saveDetails').on('submit', function(e){
			e.preventDefault();

			//Variables to store vlaues collected from the form
			var date = new Date();
			var dob = new Date($('#dob').val());
			var patient_id = $('#patient_id').text();
			var age = date.getFullYear() - dob.getFullYear();
			var sex = $('#sex').val();
			var chest_pain = $('#chest_pain').val();
			var blood_pressure = $('#blood_pressure').val();
			var cholesterol = $('#cholesterol').val();
			var fbs = $('#fbs').val();
			var resting_ECG = $('#resting_ECG').val();
			var heart_rate = $('#heart_rate').val();
			var induced_angina = $('#induced_angina').val();
			var st_depression = $('#st_depression').val();
			var slope = $('#slope').val();
			var no_of_vessels = $('#no_of_vessels').val();
			var thal = $('#thal').val();

			if(diagnosis_percent == null){
				$('#response-text').html("No prediction made. Data not saved.");
				$('#response').removeClass("alert-success");
				$('#response').removeClass("d-none");
				$('#response').addClass("alert-danger");
			}else{
				var prediction_details ={
				"patient_id": patient_id,
				"age":age.toString(),
				"sex":sex,
				"chest_pain":chest_pain,
				"blood_pressure":blood_pressure,
				"serum_cholestoral":cholesterol,
				"fasting_blood_sugar":fbs,
				"resting_ECG":resting_ECG,
				"max_heart_rate":heart_rate,
				"induced_angina":induced_angina,
				"ST_depression":st_depression,
				"slope":slope,
				"no_of_vessels":no_of_vessels,
				"thal":thal,
				"diagnosis": diagnosis,
				"diagnosis_percent": diagnosis_percent
			}

			predictionDetails = JSON.stringify(prediction_details);

			//Make a request to api to save prediction details in the prediction table
			$.ajax({
				url : 'http://localhost/myHeart/api/public/save',
				type : 'post',
				data : predictionDetails,
				headers: {
					"Content-Type": 'application/json'
				},
				dataType : 'json',
				success : function(data){
					if(data['Response Message'] == "Details saved"){
						$('#response-text').html(data['Response Message'] + " for patient " + patient_id + ".");
					}
					else{
						$('#response-text').html(data['Response Message']);
					}
					
					if(data['Success'] == true){
						$('#response').removeClass("alert-danger");
						$('#response').removeClass("d-none");
						$('#response').addClass("alert-success");
					}else{
						$('#response').removeClass("alert-success");
						$('#response').removeClass("d-none");
						$('#response').addClass("alert-danger");
					}
				}
			})	
			}

			
		});	
	</script>

	<script type="text/javascript">
	</script>
</body>
</html>