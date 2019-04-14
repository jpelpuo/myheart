<?php 

	include("sys.php");
	if(isset($_GET)){

		$pid = $_GET["pid"];

	}

	$results = getPredictionDetails($pid);

	echo json_encode($results);
 ?>