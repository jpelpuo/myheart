<?php 
	header('Content-type: application/json');
	//include('sys.php');

	$columns = array();
	$result = exec('python "C:/xampp/htdocs/myHeart/model.py"');

	echo $result;

 ?>