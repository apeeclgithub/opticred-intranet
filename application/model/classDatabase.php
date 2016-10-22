<?php 

	class Database extends PDO{

		public function __construct(){
			
			try{     
				//parent::__construct('mysql:host=localhost;dbname=apeecl_opticred','apeecl_opticred','pDgusc_=-Tuu');                          
				parent::__construct('mysql:host=localhost;dbname=optic','root','');
				parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				die('No se puede establecer la conexión al servidor.');
			}

		}

	}

?>

