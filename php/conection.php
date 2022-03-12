<?php
	class Conection {
		private $host;
		private $db;
		private $user;
		private $password;
		private $charset;

		public function __construct(){
			$this->host = 'localhost';
			$this->db 	= 'mifacturalegal_landing_page';
			$this->user = 'mifacturalegal_userMiFacturaLegal';
			$this->password = 'M49bx3kk!!';
			$this->charset = 'utf8';
		}
		function conection_pdo(){
			// $con 		= mysqli_connect($this->host, $this->user, $this->password, $this->db);
			// if($con->connect_error)
		  //   {
		  //       die("Conexion fallida : ". $con->connect_error);
			// }
			// mysqli_set_charset($con, "utf8");
			// return $con;
			try{
				$connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
				$options = [
						PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
						PDO::ATTR_EMULATE_PREPARES   => false,
				];
				
				$pdo = new PDO($connection, $this->user, $this->password, $options);

				return $pdo;
			}catch(PDOException $e){
					print_r('Error connection: ' . $e->getMessage());
			}
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