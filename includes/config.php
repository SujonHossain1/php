<?php
	
	class DATABASE{
		/*public $server = "localhost";
		public $user = "queendoh_sabuj";
		public $pass = "!@#sabuj#@!";
		public $db = "queendoh_queen";*/

		public $server = "localhost";
		public $user = "root";
		public $pass = "";
		public $db = "queen";

		public $con;
		public $error;

		public function __construct(){
			$this->connectDB();

		}

		private function connectDB(){
			$this->con = new mysqli($this->server,$this->user,$this->pass,$this->db);
			$this->con->set_charset("utf8"); 

			if(!$this->con){
				$this->error = "Connection Failed";
				return false;
			}
		}

		public function run($query){
			$result = $this->con->query($query);
			/*return $result;*/
			if(($this->con->affected_rows) >0){
				return $result;
			}else{
				return "false";
			}
		}
		public function test($query){
			$result = $this->con->query($query);
			return $query;
		/*	if($result->num_rows() >0){
				return $result;
			}else{
				return false;
			}*/
		}

		public function get_last_insert_id(){
			return $this->con->insert_id;
		}

	}

 ?>