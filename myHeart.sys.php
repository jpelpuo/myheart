<?php 
	class myHeart{
		public $dbhost = "";
		public $dbname = "";
		public $dbuser = "";
		public $rows = "";
		public $items ="";
		public $dbpassword = "";

		public $connection = null;


		public function __construct(){
			$this->dbhost = "localhost";
			$this->dbuser = "root";
			$this->dbpassword = "";
			$this->dbname = "myHeart";

			$this->connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);

			if($this->connection->connect_errno){
				echo "<script>";
				echo "alert('Could not connect to the database')";
				echo "<script/>";
			}
		}


		//Run insert sql statements
		public function selectBySql($sql){
			$rows = $this->connection->query($sql);
			// $items = $rows->fetch_all(MYSQLI_ASSOC);
			return $rows;
		}

		//Run insert sql statements
		public function insertBySql($sql){
			$rows = $this->connection->query($sql);
			return $rows;
		}


		//Run insert sql statements
		public function updateBySql($sql){
			$rows = $this->connection->query($sql);
			return $rows;
		}

		//Run insert sql statements
		public function deleteBySql($sql){
			$rows = $this->connection->query($sql);
		}

		public function closeConnection(){
			$this->connection->close();
		}
	}


 ?>