<?php
	
	session_start();
	require '../model/classUser.php';
	$json['success'] = false; 

	$objUser= new User();

	switch (@$_GET['action']) {
		
		//AQUI SE HACE LOGIN CON LOS DATOS DEL USUARIO
		case 1:
			$usuRut  = $_POST['userRut'];
			$usuPass = $_POST['userPass'];

			$objUser->loginUser($usuRut, $usuPass);

			foreach ( (array) $objUser as $key ) {
				foreach ($key as $key2 => $value) {
					if(is_numeric($value['USU_ID'])){
						$_SESSION['user'] = array(
							'id'	=> $value['USU_ID'],
							'name' => $value['USU_NAME'],
							'type' => $value['USU_TYPE'],
							'store'=> $value['TIE_NAME'],
							'mail' => $value['USU_MAIL'],
							'rut'  => $value['USU_RUT'],
							'pass' => $value['USU_PASS']
							);
						$json['success'] = true;
						if($value['USU_TYPE'] == 1){
							$json['main'] = 'dashboard.php';
						}else if($value['USU_TYPE'] == 2){
							$json['main'] = 'nuevaVenta.php';
						}
						
					}		
				}
			}

			echo json_encode($json);

			break;

		//METODO PARA AGREGAR UN USUARIO A LA BBDD
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

		//METODO PARA MODIFICAR LOS USUARIOS DE LA BBDD
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

		//METODO PARA ELIMINAR USUARIOS DE LA BBDD 
		case 4:

			$usuId    = $_POST['delIdUser'];

			$json['success'] = $objUser->delUser($usuId);
		    echo json_encode($json);
			break;
		
		//METODO PARA MOFIFICAR LOS DATOS DE LA SESSION DE LA APLICACION
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

		//METODO PARA CAMBIAR DE TIENDA AL USUARIO ADMINISTRADOR
		case 6:

			$tienda = $_POST['tienda'];
			
			if($tienda == 1){
				$tienda = 2;
			}else if($tienda == 2){
				$tienda = 1;
			}

			$json['success'] = $objUser->cambioTienda($_SESSION['user']['id'], $tienda);
			if($json == true){
				$_SESSION['user']['store'] = $tienda;
			}
		    echo json_encode($json);
			break;	

		//METODO QUE ENVIA EL EMAIL PARA RECUPERAR LA CONTRASEÑA
		case 7:
			$rutRecover = $_POST['rutRecover'];

			$objUser->recoverPasword($rutRecover);
							foreach ( (array) $objUser as $key ) {
				foreach ($key as $key2 => $value) {
					$mail = $value['USU_MAIL'];
					$password = $value['USU_PASS'];


				}
			}
				$to      = $mail;
				$subject = 'Recuperar Password';
				$message = 'El password para ingresar al sistema de Optic-Red es: '."\n"."\n".$password."\n"."\n".'';
				$headers = 'From: Optic-Red' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();

				$sentmail= @mail($to, $subject, $message, $headers);

				if(!$sentmail)
				{
					$json['success'] = false;
				}else{
					$json['success'] = true;
				}
		    echo json_encode($json);
		break;	

		default:

		break;
	}

?>