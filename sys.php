<?php 
	include('myHeart.sys.php');

	$myHeartConnection = new myHeart();

	//Function for Login
	function login($staff_id, $password){
		global $myHeartConnection;

		if($staff_id <> "" and $password <> ""){
			$sql = "SELECT * from staff where staff_id = '$staff_id' and password = '$password'";
			$rows = $myHeartConnection->selectBySql($sql);
			$row = $rows->fetch_assoc();


			if($row['staff_id'] == $staff_id && $row['password'] == $password){
				session_name();
				session_start();

				$_SESSION["start"] = time();
				$random = rand(100, 10000);
				$_SESSION["sessionid"] = $random;
				$_SESSION["staff_id"] = $row["staff_id"];
				$_SESSION["name"] = $row["name"];
				$_SESSION["role"] = $row["role"];
				header("Location: homepage.php");
				session_encode();
			}else{
				$_SESSION["errors"] = "Invalid login credentials.";
				header("Location: index.php?login=failed");
			}
		}else{
			header("Location: index.php");
		}
	}


	function session_page(){
		session_name();
		session_start();
		// Destroy session after 30 minutes
		$inactive = 1800;
		if(isset($_SESSION["start"])){
			$session_life = time() - $_SESSION["start"];
			if($session_life > $inactive){
				header("Location: logout.php");
			}
		}
		$_SESSION["start"] = time();
		if(!($_SESSION["sessionid"])){
			session_unset();
			session_destroy();
			header("Location: index.php");
			exit;
		}
	}



	function logout(){
		session_name();
		session_start();
		session_unset();
		session_destroy();
		header("Location: index.php");
	}

	//get users from the Users Table
	function getUsers(){
		global $myHeartConnection;

		$sql = "SELECT * from patient";
		$rows = $myHeartConnection->selectBySql($sql);
		return $rows->fetch_all(MYSQLI_ASSOC);
	}

	//Get details from the prediction table
	function getPredictionDetails($patient_id = FALSE){
		global $myHeartConnection;

		if(!$patient_id){
			$sql = "SELECT *, COUNT(prediction.patient_id) as number_of_predictions, patient.name as name from prediction RIGHT JOIN patient on prediction.patient_id=patient.patient_id GROUP BY(prediction.patient_id) ORDER BY prediction.patient_id DESC";
		}else{
			$sql = "SELECT *, COUNT(prediction.patient_id) as number_of_predictions, patient.name as name from prediction WHERE prediction.patient_id = '$patient_id' RIGHT JOIN patient on prediction.patient_id=patient.patient_id GROUP BY(prediction.patient_";
		}
		$rows = $myHeartConnection->selectBySql($sql);
		return $rows->fetch_all(MYSQLI_ASSOC);
	}


	//Close connection to the database
	function closeDB(){
		global $myHeartConnection;
		$myHeartConnection->closeConnection();
	}


	//Function to get count of users by sex from the user table
	function getUserCount($sex = FALSE){
		global $myHeartConnection;
		if(!$sex){
			$sql = "SELECT * from patient";
		}else{
			$sql = "SELECT * FROM patient WHERE sex = '$sex'";
		}

		$count = $myHeartConnection->selectBySql($sql);
		return $count->num_rows;
	}

	//Function to convert chestpain type values to corresponding textual meanings
	function chestPainValueToText($value){
		switch ($value) {
			case '1':
				$text = "Typical Angina";
				break;
			case '2':
				$text = "Atypical Angina";
				break;
			case '3':
				$text = "Non-anginal pain";
			default:
				$text = "Asymptomatic angina";
				break;
		}

		return $text;
	}

	//Function to convert electrocardiogram values to corresponding textual meanings
	function ecgValueToText($value){
		switch ($value) {
			case '0':
				$text = "Normal";
				break;
			case '1':
				$text = "ST-T Wave abnormality";
			
			default:
				$text = "Left ventricular hypertrophy";
				break;
		}
		return $text;
	}

	//Function to convert thal values to corresponding textual meanings
	function thalValueToText($value){
		switch ($value) {
			case '3':
				$text = "Normal";
				break;

			case '6':
				$text = "Fixed Defect";
				break;
			
			default:
				$text = "Reversible Defect";
				break;
		}

		return $text;
	}

	// Function to convert slope values to corresponding textual meanings
	function slopeValueToText($value){
		switch ($value) {
			case '1':
				$text = "Upsloping";
				break;

			case '2':
				$text = "Flat";
				break;
			
			default:
				$text = "Downsloping";
				break;
		}

		return $text;
	}

	// Sex values to corresponding textual meanings
	function sexValueToText($value){
		switch ($value) {
			case '0':
				$text = "Female";
				break;
			
			default:
				$text = "Male";
				break;
		}

		return $text;
	}	

	// Fasting blood sugar values to corresponding textual meanings
	function fbsValueToText($value){
		switch ($value) {
			case '0':
				$text = "False";
				break;
			
			default:
				$text = "True";
				break;
		}

		return $text;
	}	

	// Exercise induced angina values to corresponding textual meanings
	function anginaValueToText($value){
		switch ($value) {
			case '0':
				$text = "No";
				break;
			
			default:
				$text = "Yes";
				break;
		}

		return $text;
	}

 ?>