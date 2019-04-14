<?php 
	class myHeart{
		public $dbhost = null;
		public $dbname = null;
		public $dbuser = null;
		public $rows = null;
		public $items =null;
		public $dbpassword = null;

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

		//Run select sql statements
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


		//Run update sql statements
		public function updateBySql($sql){
			$rows = $this->connection->query($sql);
			return $rows;
		}

		//Run insert sql statements
		public function deleteBySql($sql){
			$rows = $this->connection->query($sql);
		}

		//CLose db connection
		public function closeConnection(){
			$this->connection->close();
		}
	}


 ?>