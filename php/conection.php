<?php
	class Conection {
		private $host;
		private $db;
		private $user;
		private $password;

		public function __construct(){
			$this->host = 'localhost';
			$this->db 	= 'mifacturalegal_landing_page';
			$this->user = 'mifacturalegal_userMiFacturaLegal';
			$this->password = 'M49bx3kk!!';
		}
		function conection(){
			$con 		= mysqli_connect($this->host, $this->user, $this->password, $this->db);
			if($con->connect_error)
		    {
		        die("Conexion fallida : ". $con->connect_error);
			}
			mysqli_set_charset($con, "utf8");
			return $con;
		}
		function base_url(){
			return 'https://mifacturalegal.com/';
		}
	}
?>