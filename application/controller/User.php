<?php
	
	session_start();
	require '../model/classUser.php';
	$json['success'] = false; 

	$objUser= new User();

	switch (@$_GET['action']) {

		case 1:
			$usuRut  = $_POST['userRut'];
			$usuPass = $_POST['userPass'];

			$objUser->loginUser($usuRut, $usuPass);

			foreach ( (array) $objUser as $key ) {
				foreach ($key as $key2 => $value) {
					if(is_numeric($value['usu_id'])){
						$_SESSION['user'] = array(
							'id'	=> $value['usu_id'],
							'name' => $value['usu_name'],
							'type' => $value['usu_type'],
							'store'=> $value['usu_store'],
							'mail' => $value['usu_mail'],
							'rut'  => $value['usu_rut'],
							'pass' => $value['usu_pass']
							);
						$json['success'] = true;
						if($value['usu_type'] == 1){
							$json['main'] = 'dashboard.php';
						}else if($value['usu_type'] == 2){
							$json['main'] = 'nuevaVenta.php';
						}
						
					}		
				}
			}

			echo json_encode($json);

			break;

		case 2:

			$usuName  = $_POST['addNameUser'];
			$usuMail  = $_POST['addMailUser'];
			$usuRut   = $_POST['addRutUser'];
			$usuPass  = $_POST['addPassUser'];
			$usuStore = $_POST['addStoreUser'];

			$json['success'] = $objUser->addUser($usuName, $usuMail, $usuRut, $usuPass, $usuStore);
 
			if($json['success'] != true){
				$json['success'] = $objUser->activateUser($usuName, $usuMail, $usuRut, $usuPass, $usuStore);
			}

			echo json_encode($json);

			break;

		case 3:
		
			$usuId    = $_POST['editIdUser'];
			$usuName  = $_POST['editNameUser'];
			$usuMail  = $_POST['editMailUser'];
			$usuRut   = $_POST['editRutUser'];
			$usuPass  = $_POST['editPassUser'];
			$usuStore = $_POST['editStoreUser'];

			$json['success'] = $objUser->updateUser($usuId, $usuName, $usuMail, $usuRut, $usuPass, $usuStore);
			echo json_encode($json);

			break;

		case 4:

			$usuId    = $_POST['delIdUser'];

			$json['success'] = $objUser->delUser($usuId);
		    echo json_encode($json);
			break;
		
		case 5:

			$usuIdSession    = $_POST['editIdUserSession'];
			$usuNameSession  = $_POST['editNameUserSession'];
			$usuMailSession  = $_POST['editMailUserSession'];
			$usuRutSession   = $_POST['editRutUserSession'];
			$usuPassSession  = $_POST['editPassUserSession'];
			$usuStoreSession = $_POST['editStoreUserSession'];

			$json['success'] = $objUser->updateUser($usuIdSession, $usuNameSession, $usuMailSession, $usuRutSession, $usuPassSession, $usuStoreSession);

			if($json['success'] == true){
				$_SESSION['user'] = array(
					'id'   => $usuIdSession,
					'name' => $usuNameSession,
					'type' => 2,
					'store'=> $usuStoreSession,
					'mail' => $usuMailSession,
					'rut'  => $usuRutSession,
					'pass' => $usuPassSession
					);
			}
			echo json_encode($json);

			break;	

		case 6:

			$tienda = $_POST['tienda'];

			$json['success'] = $objUser->cambioTienda($_SESSION['user']['id'], $tienda);
			if($json == true){
				$_SESSION['user']['store'] = $tienda;
			}
		    echo json_encode($json);
			break;	

		case 7:

			$rutRecover = $_POST['rutRecover'];

			$json['success'] = $objUser->recoverPasword($rutRecover);
			$send = true;
			if($json['success'] == true){

				//http://localhost:8080/github%20apee/opticred-intranet/application/controller/User.php?action=7&rutRecover=123
				$to      = 'mario.meneses.a@gmail.com';
				$subject = 'Recuperar Contraseña';
				$message = 'La contraseña del usuario con rut: es ';
				$headers = 'From: webmaster@example.com' . "\r\n" .
				    'Reply-To: webmaster@example.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();

				$sentmail = @mail($to, $subject, $message, $headers);
				
				if(!$sentmail)
				{
					$json['success'] = false;
				}else{
					$json['success'] = true;
				}
			}


		    echo json_encode($json);
		break;	

		default:

		break;
	}

?>