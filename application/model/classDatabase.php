<?php 

	class Database extends PDO{

		public function __construct(){
			
			try{                               
				parent::__construct('mysql:host=localhost;dbname=opticred','root','');
				parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				die('No se puede establecer la conexión al servidor.');
			}

		}

	}

?>

