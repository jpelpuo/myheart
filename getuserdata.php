<?php 
	header('Content-type: application/json');
	//include('sys.php');

	$columns = array();
	$result = shell_exec('python "C:/xampp/htdocs/myHeartApp/model.py" "[20,50]"');

	echo $result;

 ?>