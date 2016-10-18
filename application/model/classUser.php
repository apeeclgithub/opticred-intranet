<?php 

	require_once 'classDatabase.php';

	class User{

		private $user;

		public function loginUser($userRut, $userPass){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	USU_ID,
												USU_NAME,
												USU_RUT,
												USU_MAIL,
												TIENDA_TIE_ID,
												USU_TYPE,
												USU_PASS
										FROM 	USUARIO
										WHERE 	USU_RUT = :userRut
										AND 	USU_PASS = :userPass
										AND 	USU_ACTIVE = 1');

			$sql->bindParam(':userRut', $userRut);
			$sql->bindParam(':userPass', $userPass);

			$this->user = $sql->execute();
			$this->user = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->user;

		}

		public function selectUser($userRut, $userMail){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	USU_ID 
										FROM 	USUARIO 
										WHERE 	USU_RUT = :userRut
										AND 	USU_MAIL = :userMail
										AND 	USU_ACTIVE = 1');

			$sql->bindParam(':userRut', $userRut);
			$sql->bindParam(':userMail', $userMail);

			$this->user = $sql->execute();
			$this->user = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->user;

		}

		public function addUser($usuName, $usuMail, $usuRut, $usuPass, $usuStore){
			
			$objConn = new Database();
			$sql = $objConn->prepare('INSERT INTO USUARIO (USU_NAME, USU_MAIL, USU_RUT, USU_PASS, TIENDA_TIE_ID, USU_TYPE, USU_ACTIVE) 
										VALUES (:usuName, :usuMail, :usuRut, :usuPass, :usuStore, 2, 1)');
		
			$sql->bindParam(':usuName', $usuName);
			$sql->bindParam(':usuMail', $usuMail);
			$sql->bindParam(':usuRut', $usuRut);
			$sql->bindParam(':usuPass', $usuPass);
			$sql->bindParam(':usuStore', $usuStore);

			if(!(array)$this->selectUser($usuRut, $usuMail)){
				$this->user = $sql->execute();
			}

			return $this->user;

		}

		public function activateUser($usuName, $usuMail, $usuRut, $usuPass, $usuStore){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE USUARIO 
										SET	USU_ACTIVE = 1,
											USU_NAME = :usuName, 
											USU_PASS = :usuPass,
											TIENDA_TIE_ID = :usuStore
										WHERE pro_mail = :usuMail
										AND pro_rut = :usuRut');

			$sql->bindParam(':usuName', $usuName);
			$sql->bindParam(':usuPass', $usuPass);
			$sql->bindParam(':usuStore', $usuStore);
			$sql->bindParam(':usuMail', $usuMail);
			$sql->bindParam(':usuRut', $usuRut);

			$this->user = $sql->execute();

			return $this->user;

		}

		public function updateUser($usuId, $usuName, $usuMail, $usuRut, $usuPass, $usuStore){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE USUARIO 
										SET USU_NAME = :usuName, 
											USU_MAIL = :usuMail, 
											USU_RUT = :usuRut, 
											USU_PASS = :usuPass,
											TIENDA_TIE_ID = :usuStore
										WHERE USU_ID = :usuId');

			$sql->bindParam(':usuId', $usuId);
			$sql->bindParam(':usuName', $usuName);
			$sql->bindParam(':usuMail', $usuMail);
			$sql->bindParam(':usuRut', $usuRut);
			$sql->bindParam(':usuPass', $usuPass);
			$sql->bindParam(':usuStore', $usuStore);

			//falta agregar un metodo para no repetir usuarios
			$this->user = $sql->execute();

			return $this->user;

		}

		public function delUser($usuId){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE USUARIO 
										SET	USU_ACTIVE = 0
										WHERE USU_ID = :usuId');

			$sql->bindParam(':usuId', $usuId);

			$this->user = $sql->execute();

			return $this->user;
		}


		public function listUsers(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	USU_ID, 
												USU_NAME, 
												USU_MAIL, 
												USU_RUT, 
												USU_PASS, 
												TIE_NAME 
										FROM 	USUARIO
										INNER JOIN TIENDA ON USUARIO.TIENDA_TIE_ID = TIENDA.TIE_ID
										WHERE 	USU_TYPE = 2
										AND 	USU_ACTIVE = 1');

			$this->user = $sql->execute();
			$this->user = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->user;

		}

		public function cambioTienda($id, $tienda){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE USUARIO 
										SET	TIENDA_TIE_ID = :tienda
										WHERE USU_ID = :id');

			$sql->bindParam(':id', $id);
			$sql->bindParam(':tienda', $tienda);

			$this->user = $sql->execute();

			return $this->user;
		}

		public function recoverPasword($rutRecover){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	USU_RUT,
												USU_MAIL,
												USU_PASS,
												USU_NAME
										FROM 	USUARIO 
										WHERE 	USU_RUT = :userRut');

			$sql->bindParam(':userRut', $rutRecover);

			$this->user = $sql->execute();
			$this->user = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->user;
		}
	}

?>