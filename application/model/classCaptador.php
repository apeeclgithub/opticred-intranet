<?php 

	require_once 'classDatabase.php';

	class Captador{

		private $captador;

		public function listCaptadores(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT CAP_ID, CAP_NAME, CAP_PHONE
										FROM CAPTADOR
										WHERE CAP_ACTIVE = 1
										GROUP BY CAP_ID');

			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->captador;

		}
		
		public function traeMonto($id){
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT COALESCE(SUM(COM_TOTAL), 0)
										FROM COMISION
										WHERE CAPTADOR_CAP_ID = :id ');

			
			$sql->bindParam(':id', $id);
			
			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);
			foreach((array)$this->captador as $yo){
				foreach((array)$yo as $clave){
					return $this->captador = $clave;
				}
			}
			
		}

		public function selectCaptador($capName){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	CAP_ID 
										FROM 	CAPTADOR 
										WHERE 	CAP_NAME = :capName
										AND 	CAP_ACTIVE = 1');

			$sql->bindParam(':capName', $capName);

			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->captador;

		}

		public function addCaptador($capName, $capPhone){
			
			$objConn = new Database();
			$sql = $objConn->prepare('INSERT INTO CAPTADOR (CAP_NAME, CAP_PHONE, CAP_ACTIVE) 
										VALUES (:capName, :capPhone, 1)');
		
			$sql->bindParam(':capName', $capName);
			$sql->bindParam(':capPhone', $capPhone);

			// if(!(array)$this->selectCaptador($capName)){
				// $this->captador = $sql->execute();
				// $this->firstLoad();
			// }

			$this->captador = $sql->execute();
			return $this->captador;

		}

		public function firstLoad(){

			$objConn = new Database();
			$sql = $objConn->prepare('INSERT INTO COMISION (COM_TOTAL, CAPTADOR_CAP_ID) 
										VALUES (0, (SELECT CAP_ID FROM CAPTADOR ORDER BY CAPTADOR_CAP_ID DESC LIMIT 1))');
			$this->captador = $sql->execute();
			return $this->captador;
		}

		public function activateCaptador($capName, $capPhone){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE CAPTADOR 
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
			$sql = $objConn->prepare('	UPDATE CAPTADOR 
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
			$sql = $objConn->prepare('	UPDATE CAPTADOR 
										SET	CAP_ACTIVE = 0
										WHERE CAP_ID = :capId');

			$sql->bindParam(':capId', $capId);

			$this->captador = $sql->execute();

			return $this->captador;
		}

		public function pendingCommission(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT DISTINCT CAPTADOR.CAP_ID, CAP_NAME, 
										(SELECT SUM(COM_TOTAL) FROM COMISION WHERE CAPTADOR_CAP_ID = CAPTADOR.CAP_ID AND COM_PAID = \'Si\') AS COMTOTAL, 
										(SELECT SUM(PAG_TOTAL) FROM PAGO WHERE CAPTADOR_CAP_ID = CAPTADOR.CAP_ID ORDER BY CAPTADOR_CAP_ID DESC LIMIT 1) AS PAGTOTAL
										FROM CAPTADOR
										LEFT JOIN COMISION ON CAPTADOR.CAP_ID = COMISION.CAPTADOR_CAP_ID  
										LEFT JOIN PAGO ON CAPTADOR.CAP_ID = PAGO.CAPTADOR_CAP_ID
										WHERE CAP_ACTIVE = 1 
										GROUP BY CAP_ID');

			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->captador;
		}
		
		public function listCaptadorSale(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  CAP_NAME
										FROM CAPTADOR
										WHERE CAP_ACTIVE = 1');
			
			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->captador;

		}
		
		public function captadoresTotalClosingCash($searchDate){

			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	SUM(PAG_TOTAL) AS TOTAL
										FROM PAGO
										WHERE PAG_DATE = :searchDate');

			$sql->bindParam(':searchDate', $searchDate);
			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->captador;
		}

	}
?>