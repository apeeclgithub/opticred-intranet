<?php 

	require_once 'classDatabase.php';

	class User{

		private $user;

		public function loginUser($userRut, $userPass){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	usu_id,
												usu_name,
												usu_rut,
												usu_mail,
												usu_store,
												usu_type,
												usu_pass 
										FROM 	usuario 
										WHERE 	usu_rut = :userRut
										AND 	usu_pass = :userPass
										AND 	usu_active = 1');

			$sql->bindParam(':userRut', $userRut);
			$sql->bindParam(':userPass', $userPass);

			$this->user = $sql->execute();
			$this->user = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->user;

		}

		public function selectUser($userRut, $userMail){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	usu_id 
										FROM 	usuario 
										WHERE 	usu_rut = :userRut
										AND 	usu_mail = :userMail
										AND 	usu_active = 1');

			$sql->bindParam(':userRut', $userRut);
			$sql->bindParam(':userMail', $userMail);

			$this->user = $sql->execute();
			$this->user = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->user;

		}

		public function addUser($usuName, $usuMail, $usuRut, $usuPass, $usuStore){
			
			$objConn = new Database();
			$sql = $objConn->prepare('INSERT INTO usuario (usu_name, usu_mail, usu_rut, usu_pass, usu_store, usu_type) 
										VALUES (:usuName, :usuMail, :usuRut, :usuPass, :usuStore, 2)');
		
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
			$sql = $objConn->prepare('	UPDATE usuario 
										SET	usu_active = 1,
											usu_name = :usuName, 
											usu_pass = :usuPass,
											usu_store = :usuStore
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
			$sql = $objConn->prepare('	UPDATE usuario 
										SET usu_name = :usuName, 
											usu_mail = :usuMail, 
											usu_rut = :usuRut, 
											usu_pass = :usuPass,
											usu_store = :usuStore
										WHERE usu_id = :usuId');

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


		public function updateUserLogg($usuId, $usuName, $usuMail, $usuRut, $usuPass, $usuStore){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE usuario 
										SET usu_name = :usuName, 
											usu_mail = :usuMail, 
											usu_rut = :usuRut, 
											usu_pass = :usuPass,
											usu_store = :usuStore
										WHERE usu_id = :usuId');

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
			$sql = $objConn->prepare('	UPDATE usuario 
										SET	usu_active = 0
										WHERE usu_id = :usuId');

			$sql->bindParam(':usuId', $usuId);

			$this->user = $sql->execute();

			return $this->user;
		}


		public function listUsers(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	usu_id, 
												usu_name, 
												usu_mail, 
												usu_rut, 
												usu_pass, 
												usu_store 
										FROM 	usuario
										WHERE 	usu_type = 2
										AND 	usu_active = 1');

			$this->user = $sql->execute();
			$this->user = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->user;

		}

		public function cambioTienda($id, $tienda){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE usuario 
										SET	usu_store = :tienda
										WHERE usu_id = :id');

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
										FROM 	usuario 
										WHERE 	USU_RUT = :userRut');

			$sql->bindParam(':userRut', $rutRecover);

			$this->user = $sql->execute();
			$this->user = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->user;
		}

		public function send_mail($email,$message,$subject){      
			require_once('mailer/class.phpmailer.php');
			$mail = new PHPMailer();
			$mail->IsSMTP(); 
			$mail->SMTPDebug  = 0;                     
			$mail->SMTPAuth   = true;                  
			$mail->SMTPSecure = "ssl";                 
			$mail->Host       = "smtp.gmail.com";      
			$mail->Port       = 465;             
			$mail->AddAddress($email);
			$mail->Username="yourgmailid@gmail.com";  
			$mail->Password="yourgmailpassword";            
			$mail->SetFrom('you@yourdomain.com','Coding Cage');
			$mail->AddReplyTo("you@yourdomain.com","Coding Cage");
			$mail->Subject    = $subject;
			$mail->MsgHTML($message);
			$mail->Send();
		} 
	}

?>