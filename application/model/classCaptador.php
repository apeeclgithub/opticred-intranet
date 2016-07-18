<?php 

	require_once 'classDatabase.php';

	class Captador{

		private $captador;

		public function listCaptadores(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT captador.cap_id, cap_name, cap_phone, SUM(com_total) AS cap_total
										FROM captador 
										INNER JOIN comision ON captador.cap_id = comision.cap_id
										WHERE cap_active = 1
										GROUP BY captador.cap_id');

			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->captador;

		}

		public function selectCaptador($capName){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	cap_id 
										FROM 	captador 
										WHERE 	cap_name = :capName
										AND 	cap_active = 1');

			$sql->bindParam(':capName', $capName);

			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->captador;

		}

		public function addCaptador($capName, $capPhone){
			
			$objConn = new Database();
			$sql = $objConn->prepare('INSERT INTO captador (cap_name, cap_phone) 
										VALUES (:capName, :capPhone)');
		
			$sql->bindParam(':capName', $capName);
			$sql->bindParam(':capPhone', $capPhone);

			if(!(array)$this->selectCaptador($capName)){
				$this->captador = $sql->execute();
				$this->firstLoad();
			}

			
			return $this->captador;

		}

		public function firstLoad(){

			$objConn = new Database();
			$sql = $objConn->prepare('INSERT INTO comision (com_total, cap_id) 
										VALUES (0, (SELECT cap_id FROM captador ORDER BY cap_id DESC LIMIT 1))');
			$this->captador = $sql->execute();
			return $this->captador;
		}

		public function activateCaptador($capName, $capPhone){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE captador 
										SET	cap_active = 1,
											cap_phone = :capPhone
										WHERE cap_name = :capName');

			$sql->bindParam(':capName', $capName);
			$sql->bindParam(':capPhone', $capPhone);

			$this->captador = $sql->execute();

			return $this->captador;

		}

		public function updateCaptador($capId, $capName, $capPhone){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE captador 
										SET cap_name = :capName, 
											cap_phone = :capPhone
										WHERE cap_id = :capId');

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
										SET	cap_active = 0
										WHERE cap_id = :capId');

			$sql->bindParam(':capId', $capId);

			$this->captador = $sql->execute();

			return $this->captador;
		}

	}

?>