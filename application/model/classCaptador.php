<?php 

	require_once 'classDatabase.php';

	class Captador{

		private $captador;

		public function listCaptadores(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT captador.CAP_ID, CAP_NAME, CAP_PHONE
										FROM captador 
										
										WHERE CAP_ACTIVE = 1
										GROUP BY captador.CAP_ID');

			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->captador;

		}

		public function selectCaptador($capName){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	CAP_ID 
										FROM 	captador 
										WHERE 	CAP_NAME = :capName
										AND 	CAP_ACTIVE = 1');

			$sql->bindParam(':capName', $capName);

			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->captador;

		}

		public function addCaptador($capName, $capPhone){
			
			$objConn = new Database();
			$sql = $objConn->prepare('INSERT INTO captador (CAP_NAME, CAP_PHONE) 
										VALUES (:capName, :capPhone)');
		
			$sql->bindParam(':capName', $capName);
			$sql->bindParam(':capPhone', $capPhone);
/*
			if(!(array)$this->selectCaptador($capName)){
				$this->captador = $sql->execute();
				$this->firstLoad();
			}
*/
			$this->captador = $sql->execute();
			return $this->captador;

		}

		public function firstLoad(){

			$objConn = new Database();
			$sql = $objConn->prepare('INSERT INTO comision (com_total, CAP_ID) 
										VALUES (0, (SELECT CAP_ID FROM captador ORDER BY CAP_ID DESC LIMIT 1))');
			$this->captador = $sql->execute();
			return $this->captador;
		}

		public function activateCaptador($capName, $capPhone){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE captador 
										SET	CAP_ACTIVE = 1,
											CAP_PHONE = :capPhone
										WHERE CAP_NAME = :capName');

			$sql->bindParam(':capName', $capName);
			$sql->bindParam(':capPhone', $capPhone);

			$this->captador = $sql->execute();

			return $this->captador;

		}

		public function updateCaptador($capId, $capName, $capPhone){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE captador 
										SET CAP_NAME = :capName, 
											CAP_PHONE = :capPhone
										WHERE CAP_ID = :capId');

			$sql->bindParam(':capId', $capId);
			$sql->bindParam(':capName', $capName);
			$sql->bindParam(':capPhone', $capPhone);

			//falta agregar un metodo para no repetir captadores
			$this->captador = $sql->execute();

			return $this->captador;

		}

		public function delCaptador($capId){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE captador 
										SET	CAP_ACTIVE = 0
										WHERE CAP_ID = :capId');

			$sql->bindParam(':capId', $capId);

			$this->captador = $sql->execute();

			return $this->captador;
		}

	}

?>