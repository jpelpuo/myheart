<?php 
	include('myHeart.sys.php');

	$myHeartConnection = new myHeart();

	function login($username, $password){
		global $myHeartConnection;

		if($username <> "" and $password <> ""){
			$sql = "SELECT * from admin where username = '$username' and password = '$password'";
			$rows = $myHeartConnection->selectBySql($sql);
			$row = $rows->fetch_assoc();


			if($row['username'] == $username && $row['password'] == $password){
				session_name();
				session_start();

				$_SESSION["start"] = time();
				$random = rand(100, 10000).$random;
				$_SESSION["sessionid"] = $random;
				$_SESSION["username"] = $row["username"];
				$_SESSION["name"] = $row["name"];
				header("Location: homepage.php");
				session_encode();
			}else{
				header("Location: index.php");
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


	// function getUsers(){
	// 	global $myHeartConnection;

	// 	$sql = "SELECT * from users";
	// 	$rows = $myHeartConnection->selectBySql($sql);
	// 	$json_data = array(
 //    		"draw"            => intval( $_REQUEST['draw'] ),
 //    		"recordsTotal"    => intval( $totaldata ),
 //    		"recordsFiltered" => intval( $totalfiltered ),
 //    		"data"            => $rows
	// 		);
	// 	return json_encode($json_data);
	// }


	function getUsers(){
		global $myHeartConnection;

		$sql = "SELECT * from users";
		$rows = $myHeartConnection->selectBySql($sql);
		return $rows->fetch_all(MYSQLI_ASSOC);
	}

	function closeDB(){
		global $myHeartConnection;
		$myHeartConnection->closeConnection();
	}

 ?>